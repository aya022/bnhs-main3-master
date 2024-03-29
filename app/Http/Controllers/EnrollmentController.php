<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BackSubject;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\SchoolProfile;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
    public function changeStatus(Request $request)
    {
        SchoolProfile::where('id', $request->id)
            ->update([
                'school_enrollment_url' => $request->value == 'yes' ? true : false
            ]);
    }
    public function masterList($level,$year)
    {
        if ($level == "all") {
            $data = Enrollment::select(
                "enrollments.*",
                "roll_no",
                "enrollments.curriculum",
                "enrollments.isbalik_aral",
                "enrollments.last_schoolyear_attended",
                "sections.section_name",
                "strands.strand",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )->orderBy('sections.section_name')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->leftjoin('strands', 'enrollments.strand_id', 'strands.id')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                // ->where('school_years.status', 1)
                ->where('school_years.id', $year)
                ->get();
        } else {
            $explodeMe = explode("_",$level);
        if (count($explodeMe)<2) {
            $data = Enrollment::select(
                "enrollments.*",
                "roll_no",
                "enrollments.curriculum",
                "enrollments.isbalik_aral",
                "enrollments.last_schoolyear_attended",
                "sections.section_name",
                "strands.strand",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )->orderBy('sections.section_name')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->leftjoin('strands', 'enrollments.strand_id', 'strands.id')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                // ->where('school_years.status', 1)
                ->where('school_years.id', $year)
                ->where('enrollments.grade_level', $explodeMe[0])
                ->get();
        } else {
            $data = Enrollment::select(
                "enrollments.*",
                "roll_no",
                "enrollments.curriculum",
                "enrollments.isbalik_aral",
                "enrollments.last_schoolyear_attended",
                "sections.section_name",
                "strands.strand",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )->orderBy('sections.section_name')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->leftjoin('strands', 'enrollments.strand_id', 'strands.id')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                // ->where('school_years.status', 1)
                ->where('school_years.id', $year)
                ->where('enrollments.grade_level', $explodeMe[0])
                ->where('enrollments.term', $explodeMe[1])
                ->get();
        }
        
        }
        return response()->json(['data' => $data]);
    }


    public function enrolledSubject($enrolled)
    {
        $enrolledSubject = Enrollment::select('enrollments.student_id', 'enrollments.section_id', 'enrollments.grade_level', 'enrollments.curriculum')
            ->join('students', 'enrollments.student_id', 'students.id')
            ->where('enrollments.id', $enrolled)
            ->where('school_year_id', Helper::activeAY()->id)->first();
        $subjects = Subject::where('grade_level', $enrolledSubject->grade_level)->whereIn('subject_for', [$enrolledSubject->curriculum, 'GENERAL'])->get();

        if ($enrolledSubject->grade_level == 7) { //if grade 7
            Student::where('id', $enrolledSubject->student_id)->update([
                'orig_password' => Crypt::encrypt("bnhs"),
                'password' => Hash::make("bnhs"),
            ]);
        }

        $checkIfExistStudentGrade = Grade::where('student_id', $enrolledSubject->student_id)
            ->whereIn('subject_id', 
                Subject::select('id')->where('grade_level', $enrolledSubject->grade_level)
                    ->whereIn('subject_for', [$enrolledSubject->curriculum, 'GENERAL'])
                    ->pluck('id')
            )->where('is_retained','No')
            ->exists();

        if ($checkIfExistStudentGrade) { //if student enrolled change section here
            $val = Subject::select('id')->where('grade_level', $enrolledSubject->grade_level)
                ->whereIn('subject_for', [$enrolledSubject->curriculum, 'GENERAL'])
                ->pluck('id');
            foreach ($val as $key => $value) {
                Grade::where(
                    'id',
                    Grade::select('id')
                        ->where('subject_id', $value)
                        ->where('student_id', $enrolledSubject->student_id)
                        ->where('is_retained','No')
                        ->pluck('id')
                )->update([
                    'section_id' => $enrolledSubject->section_id
                ]);
            }
        } else {
            foreach ($subjects as $subject) {
                Grade::create([
                    'student_id' => $enrolledSubject->student_id,
                    'section_id' => $enrolledSubject->section_id,
                    'subject_id' => $subject->id
                ]);
            }
        }
    }

    public function store(Request $request)
    {

        if (Auth::user()->chairman_info->grade_level == 7) {
            $student = $this->storeStudenRequest($request);
            $enrolled = Enrollment::create([
                'student_id' => $student->id,
                'section_id' => $request->section_id,
                'grade_level' => empty($request->grade_level) ? '7' : $request->grade_level,
                'school_year_id' => Helper::activeAY()->id,
                'date_of_enroll' => date("d/m/Y"),
                'enroll_status' => empty($request->section_id) ? 'Pending' : 'Enrolled',
                'curriculum' => $request->curriculum,
                'student_type' => 'JHS',
                'state' => 'New',
                'last_school_attended' => $request->last_school_attended,
            ]);
            return $this->enrolledSubject($enrolled->id);
        } else {
            if ($request->status == "upperclass") {
                $student = Student::where('roll_no', $request->roll_no)->first();
                $countfail =  BackSubject::where('back_subjects.student_id', $student->id)
                    ->where('remarks', 'none')
                    ->count();
                return $this->enrollSave($request, $student, $countfail);
            } elseif ($request->status = "transferee") {
                $student = $this->storeStudenRequest($request);
                return $this->enrollSave($request, $student,);
            } else {
                return false;
            }
            if ($request->status == "upperclass") {
                $student = Student::where('roll_no', $request->roll_no)->first();
                $countfail =  Grade::whereId($student->id)
                ->where('avg','<','75')->whereNull('remarks')
                ->where('is_retained','No')->get()->count();
                return $this->enrollSave($request, $student, $countfail);
            } elseif ($request->status = "transferee") {
                $student = $this->storeStudenRequest($request);
                return $this->enrollSave($request, $student,0);
            } else {
                return false;
            }
        }
    }

    public function enrollSave($request, $student, $countFail = 0)
    {
        $action_taken = $countFail == 0 ? 'Promoted' : ($countFail < 3 ? 'Partialy Promoted' : 'Retained');
        $enrolled = Enrollment::create([
            'student_id' => $student->id,
            'section_id' => $request->section_id,
            'grade_level' => $request->grade_level,
            'school_year_id' => Helper::activeAY()->id,
            'date_of_enroll' => date("d/m/Y"),
            'action_taken' => $request->status == 'transferee' ? NULL : $action_taken,
            'enroll_status' => empty($request->section_id) ? 'Pending' : 'Enrolled',
            'state' => $request->status == 'upperclass' ? 'Old' : 'Transferee',
        ]);
        return $this->enrolledSubject($enrolled->id);
    }

    public function storeStudenRequest($request)
    {
        return  Student::create([
            'roll_no' => $request->roll_no,
            'student_firstname' => Str::title($request->student_firstname),
            'student_middlename' => Str::title($request->student_middlename),
            'student_lastname' => Str::title($request->student_lastname),
            'student_extension' => Str::title($request->student_extension),
            'date_of_birth' => $request->date_of_birth,
            'student_contact' => $request->student_contact,
            'gender' => $request->gender,
            'region' => $request->region,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'mother_name' => Str::title($request->mother_name),
            'mother_contact_no' => $request->mother_contact_no,
            'father_name' => Str::title($request->father_name),
            'father_contact_no' => $request->father_contact_no,
            'guardian_name' => Str::title($request->guardian_name),
            'guardian_contact_no' => $request->guardian_contact_no,
            'username' => Helper::create_username($request->student_firstname, $request->student_lastname),
            'orig_password' => Crypt::encrypt("bnhs"),
            'password' => Hash::make("bnhs"),
        ]);
    }

    public function edit($enrollment)
    {
        return response()->json(
            Enrollment::select(
            'enrollments.*',
            'enrollments.section_id',
            "students.roll_no",
            "students.student_firstname",
            "students.student_middlename",
            "students.student_lastname",
            DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname"))
            ->join('students', 'enrollments.student_id', 'students.id')
            ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
            ->where('enrollments.id', $enrollment)->first()
        );
    }

    public function destroy($enrollment)
    {
        $enroll = Enrollment::join('students', 'enrollments.student_id', 'students.id')->where('enrollments.id', $enrollment)->first();
        $subjects = Subject::where('grade_level', $enroll->grade_level)->whereIn('subject_for', [$enroll->curriculum, 'GENERAL'])->get();
        foreach ($subjects as $subject) {
            Grade::where('student_id', $enroll->student_id)->whereIn('subject_id', [$subject->id])->delete();
        }
        Enrollment::find($enrollment)->delete();
        if (Auth::user()->chairman_info->grade_level == 7) {
            Student::where('id', $enroll->student_id)->delete();
            Student::where('id', $enroll->student_id)->withTrashed()->first()->forceDelete();
        }
    }

    public function checkLRN($lrn, $curriculum, $status)
    {
        $findStudent = Student::where('students.roll_no', $lrn)->first();
        if($status=="upperclass"){
            $findStud = Student::where('students.roll_no', $lrn)->first();
            if ($findStud) {
            $isAlreadyinMasterlist = Enrollment::where('school_year_id', Helper::activeAY()->id)->where('student_id',$findStud->id)->exists();
               if ($isAlreadyinMasterlist) {
                    return response()->json( ['warning' => 'This student is already enrolled' ] );
               } else {
                    return response()->json([ 'student' => $findStud ]);
               }
            } else {
                      return response()->json( [ 'warning' => 'This student is can\'t find record' ] );
            }
        }else{
            if ($findStudent) {
                return response()->json( [ 'warning' => 'This student is have already record' ] );
            }
        }
    }
// section filter
    public function filterSection($curriculum)
    {
        return response()->json(
            Section::select('sections.section_name', 'sections.id')
                ->join('school_years', 'sections.school_year_id', 'school_years.id')
                ->where('school_years.status', 1)
                ->where("grade_level", auth()->user()->chairman_info->grade_level)
                ->where("class_type", $curriculum)
                ->get()
        );
    }

    public function totalStudentInSection($section)
    {
        return Enrollment::where("section_id", $section)->where('school_year_id', Helper::activeAY()->id)->count();
    }

    public function enrolled($enroll_id, $request)
    {
        // return $request->all();
        Enrollment::where('id', $enroll_id)
            ->where('school_year_id', Helper::activeAY()->id)
            ->update([  
                'section_id' => $request->section_again ?? $request->section,
                'curriculum' => $request->curriculum_again ?? $request->curriculum,
                'grade_level' => $request->grade_level_again ?? Auth::user()->chairman_info->grade_level,
                'enroll_status' => ($request->section_again ?? $request->section)?'Enrolled':'Pending',
            ]);
    }

    public function updateSection($request)
    {
        if (is_array($request->enroll_id)) {
            foreach ($request->enroll_id as  $value) {
                $this->enrolled($value, $request);
                $this->enrolledSubject($value);
            }
        } else {
            $this->enrolled($request->enroll_id, $request);
            $this->enrolledSubject($request->enroll_id);
        }
    }
    
    public function setSection(Request $request)
    {
        if ($request->status_now == 'force') {
            if ($this->totalStudentInSection($request->section_again) >= 45) {
                return response()->json(['warning' => 'This section reach the maximum number of student']);
            } else {
                $this->updateSection($request);
            }
        } else {
            if ($this->totalStudentInSection($request->section_again) > 40) {
                return response()->json(['warning' => 'Section is full']);
            } else {
                $this->updateSection($request);
            }
        }
    
    }

    // mass section
    public function massSectioning(Request $request)
    {
        $totalEnrollId = count($request->enroll_id);
        if (($this->totalStudentInSection($request->section) + $totalEnrollId) > 40) {
            return response()->json(['warning' => 'This section reach the maximum number of student']);
        } else {
            $this->updateSection($request);
        }
    }

    public function myClass()
    {
        return response()->json([
            'data' => Enrollment::select(
                "enrollments.id",
                "enrollments.student_id",
                "enrollments.enroll_status",
                "students.roll_no",
                "students.student_contact",
                "students.gender",
                "sections.section_name",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )
                ->join('sections', 'enrollments.section_id', 'sections.id')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                ->where('sections.teacher_id', Auth::user()->id)
                ->where('school_years.status', 1)
                ->where('enrollments.grade_level', Auth::user()->section->grade_level)
                ->whereIn('enrollments.enroll_status', ['Enrolled', 'Dropped'])
                ->orderBy('students.student_lastname')
                ->get()
        ]);
    }

    public function dropped(Enrollment $enrollment)
    {
        $enrollment->enroll_status = ($enrollment->enroll_status == 'Dropped') ? 'Enrolled' : 'Dropped';
        $enrollment->date_of_enroll = date("d/m/Y");
        return $enrollment->save();
    }
}
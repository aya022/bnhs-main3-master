<?php

namespace App\Exports;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrollmentExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function __construct(String $status, String $curriculum, int $grade_level)
    {
        $this->status = $status;
        $this->curriculum = $curriculum;
        $this->grade_level = $grade_level;
    }

    public function collection()
    {
        if ($this->status == 'All') {
            $data = Enrollment::select('students.roll_no', 'students.gender', 'students.date_of_birth', 'enrollments.curriculum', 'enrollments.state', 'students.student_contact', 'enrollments.enroll_status', 'students.mother_contact_no', 'students.mother_name', 'students.father_contact_no', 'students.father_name', 'students.guardian_name', 'students.guardian_contact_no', 
            DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"),
            DB::raw("CONCAT(barangay,', ',city,' ', province) AS address"))
                ->join('students', 'enrollments.student_id', 'students.id')
                ->where('enrollments.grade_level', $this->grade_level)
                ->where('enrollments.school_year_id', Config::get('activeAY')->id)
                ->where('enrollments.curriculum', strtoupper($this->curriculum))
                ->get();
        } else {
            $data = Enrollment::select('students.roll_no', 'students.gender', 'students.date_of_birth', 'enrollments.curriculum', 'enrollments.state', 'students.student_contact', 'enrollments.enroll_status', 'students.mother_contact_no', 'students.mother_name', 'students.father_contact_no', 'students.father_name', 'students.guardian_name', 'students.guardian_contact_no', 
            DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"),
            DB::raw("CONCAT(barangay,', ',city,' ', province) AS address"))
                ->join('students', 'enrollments.student_id', 'students.id')
                ->where('enrollments.enroll_status', $this->status)
                ->where('enrollments.grade_level', $this->grade_level)
                ->where('enrollments.school_year_id', Config::get('activeAY')->id)
                ->where('enrollments.curriculum', strtoupper($this->curriculum))
                ->get();
        }
        return $data;
        // orig
        // if ($this->status == 'All') {
        //     $data = Enrollment::select('students.student_contact', 'students.mother_contact_no', 'students.father_contact_no', 'students.guardian_contact_no', DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"))
        //         ->join('students', 'enrollments.student_id', 'students.id')
        //         ->where('enrollments.grade_level', $this->grade_level)
        //         ->where('enrollments.school_year_id', Config::get('activeAY')->id)
        //         ->where('students.curriculum', strtoupper($this->curriculum))
        //         ->get();
        // } else {
        //     $data = Enrollment::select('students.student_contact', 'students.mother_contact_no', 'students.father_contact_no', 'students.guardian_contact_no', DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"))
        //         ->join('students', 'enrollments.student_id', 'students.id')
        //         ->where('enrollments.enroll_status', $this->status)
        //         ->where('enrollments.grade_level', $this->grade_level)
        //         ->where('enrollments.school_year_id', Config::get('activeAY')->id)
        //         ->where('students.curriculum', strtoupper($this->curriculum))
        //         ->get();
        // }
        // return $data;
    }

    public function map($data): array
    {
        return [
            $data->roll_no,
            $data->fullname,
            $data->gender,
            $data->date_of_birth,
            $data->student_contact,
            $data->address,
            $data->mother_name,
            $data->mother_contact_no,
            $data->father_name,
            $data->father_contact_no,
            $data->guardian_name,
            $data->guardian_contact_no
        ];
    }

    public function headings(): array
    {
        return [
            'LRN',
            'STUDENT NAME',
            'GENDER',
            'DATE OF BIRTH',
            'STUDENT CONTACT NO',
            'ADDRESS',
            'MOTHER NAME',
            'MOTHER CONTACT NO',
            'FATHER NAME',
            'FATHER CONTACT NO',
            'GUARDIAN NAME',
            'GUARDIAN CONTACT NO'
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function list($grade_level)
    {
        return response()->json(Subject::where('grade_level', $grade_level)->get());
    }

    public function store(Request $request)
    {
        return Subject::updateorcreate(['id' => $request->id], [
            'grade_level' => $request->grade_level,
            'subject_code' => $request->subject_code,
            'descriptive_title' => $request->descriptive_title,
            'subject_for' => $request->subject_for,
        ]);
    }

    public function checkSubjects($subject_code, $term)
    {
        return Subject::where([['subject_code', $subject_code], ['term', $term]])->exists();
    }

    public function edit(Subject $subject)
    {
        return response()->json($subject);
    }

    public function destroy(Subject $subject)
    {
        return $subject->delete();
    }
}

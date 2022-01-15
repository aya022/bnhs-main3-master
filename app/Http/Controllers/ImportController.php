<?php

namespace App\Http\Controllers;

use App\Imports\GradingImport;
use App\Imports\TeacherImport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImportController extends Controller
{
    public function importMyTemplate($section,$subject,$type,Request $request){
        $file=$request->file('file');
         Excel::import(new GradingImport($section,$subject,$type),$file);
    }

    public function importTeacher(Request $request){
        $file=$request->file('file');
       Excel::import(new TeacherImport,$file);
   }

   public function importTeacherTemplate(){
       $filepath = public_path('teacher/template-teacher.xls');
       return Response::download($filepath); 
   }

   public function importStudent(Request $request){
       $file=$request->file('file');
      Excel::import(new StudentImport,$file);
  }

  public function importStudentTemplate(){
      $filepath = public_path('student/template-student.xls');
      return Response::download($filepath); 
  }
}

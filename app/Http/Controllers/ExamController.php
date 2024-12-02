<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use App\Models\exam;
class ExamController extends Controller
{
    //
    public function showResult($id){
        $studentResult = Student::with('showResult')->findOrFail($id);
        return view('student_result',compact('studentResult'));
    }

    public function searchPage(){
        return view('search_page');
    }

    public function searchResult(Request $request){
        $id = $request->input('student_id');
        $studentResult = Student::with('searchResult')->findOrFail($id);
        return view('student_result',compact('studentResult'));
    }
    
}

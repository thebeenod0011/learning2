<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentparent;
use App\Models\Student;

class StudentparentController extends Controller
{
    //
    public function parentStore($id)
    {
        $student = Student::find($id);
        return view('student_addParent',compact(['student']));
    }

    public function parentStoreSave(Request $request)
    {
        
        $request->validate([
            'student_id' => 'required',
            'father' => 'required|string',
            'mother' => 'required|string',
            'father_phone' => 'required',
        ]);
        Studentparent::create($request->all());
        return redirect()->route('student-list')->with('success','Parents Added Successfully');
    }

    public function parentUpdate($id){
        $studentparent = Student::with('studentParent')->find($id);
        return view('student_updateParent', compact('studentparent'));
    }

    public function parentUpdateSave(Request $request,$id){
        $request->validate([
            'father' => 'required|string',
            'mother' => 'required|string',
            'father_phone' => 'required'
        ]);
        $studentparent = Studentparent::find($id);
        $studentparent->update($request->all());
        return redirect()->route('student-details')->with('success','Parents Updated Successfully');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Studentparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('student', ['students' => $students]);
    }

    public function add()
    {
        //
        return view('student_add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|integer',
            'section' => 'required|in:A,B,C,D',
            'roll_no' => 'required|integer|unique:students',
            'email' => 'required|email|unique:students',
            'mobile' => 'required|numeric|unique:students',
            'pincode' => 'required|string|max:10',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        // Create a new student record
        Student::create($request->all());

        // Redirect to a page, such as the students index page
        return redirect()->route('student-list')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        $data = Student::findOrFail($id);
        return view('student_update', compact('data'));
    }
    public function updateSave(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $student->update(
            $request->only([
                'name',
                'class',
                'section',
                'roll_no',
                'email',
                'mobile',
                'pincode',
                'city',
                'address'

            ])
        );
        return redirect()->route('student-list')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Student $student)
    // {
    //     //
    //     $student->delete();
    // }
    public function deleteStudent($id)
    {
        // $student = Student::find($id);
        // $student->delete();

        // return redirect()->back()->with('success','Student Deleted Successfully');
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found!'
            ], 404);
        }

        $student->delete(); // Soft delete the student

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully'
        ]);
    }

    public function deletedStudentData()
    {
        $students = Student::onlyTrashed()->get();
        return view('student_deleted', compact('students'));
    }

    public function deletedStudentRestore($id)
    {
        $student = Student::withTrashed()->find($id);
        $student->restore();
        return redirect()->back()->with('success', 'Student Restored Successfully');
    }

    public function studentDetails()
    {
        $students = Student::with('studentParent')->get();
        return view('student_details', compact('students'));
    }

    public function studentImportForm()
    {
        return view('student_import');
    }

    public function studentImportSave(Request $request)
    {
        $validator = Validator::make($request->all(), ['csv' => 'required|file|mimes:csv|max:2048']);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $file = $request->file('csv');
        $filepath = $file->getRealPath();
        $data = array_map('str_getcsv', file($filepath));
        $header = array_shift($data);
        foreach ($data as $row) {
            if (empty($row) || count($row) < 9 || !isset($row[0])) { 
                continue; // Skip empty or malformed rows
            }
            try{
                Student::create([
                    'name' => $row[0],
                    'class' => $row[1],
                    'section' => $row[2],
                    'roll_no' => $row[3],
                    'email' => $row[4],
                    'mobile' => $row[5],
                    'pincode' => $row[6],
                    'city' => $row[7],
                    'address' => $row[8],
                ]);

            }catch(\Exception $e){
                Log::error('Error: '.json_encode($row).' | '.$e->getMessage());
            }
        }
        return back()->with('success', 'CSV File Imported Successfully!');
    }
}

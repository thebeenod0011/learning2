<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentparentController;
use App\Http\Controllers\ExamController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('student-list/',function(){
//     return view('student');
// })->named('student-list');


Route::get('student-list/', [StudentController::class, 'index'])->name('student-list');
Route::get('student-add/', [StudentController::class, 'add'])->name('student-add');
Route::post('student-store/', [StudentController::class, 'store'])->name('student-store');
Route::get('student-update/{id}', [StudentController::class, 'update'])->name('student-update');
Route::post('student-updateSave/{id}', [StudentController::class, 'updateSave'])->name('student-updateSave');

// Delete Student
Route::delete('student-delete/{id}', [StudentController::class, 'deleteStudent'])->name('student-delete');
Route::get('student-deleted', [StudentController::class, 'deletedStudentData'])->name('student-deleted');

Route::get('student-deletedRestore/{id}', [StudentController::class, 'deletedStudentRestore'])->name('student-deletedRestore');


// parent Details
Route::get('student-details', [StudentController::class, 'studentDetails'])->name('student-details');
Route::get('student-parentStore/{id}', [StudentparentController::class, 'parentStore'])->name('student-parentStore');
Route::post('student-parentStoreSave', [StudentparentController::class, 'parentStoreSave'])->name('student-parentStoreSave');

// Student Result
Route::get('student-result/{id}', [ExamController::class, 'showResult'])->name('student-result');

Route::get('search-page', [ExamController::class, 'searchPage'])->name('search-page');
Route::get('search-result/{id?}', [ExamController::class,'searchResult'])->name('search-result');

// parent update
Route::get('parent-update/{id}',[StudentparentController::class,'parentUpdate'])->name('parent-update');
Route::post('parent-UpdateSave/{id}',[StudentparentController::class,'parentUpdateSave'])->name('parent-UpdateSave');

// For CSV Files
Route::get('student-import',[StudentController::class,'studentImportForm'])->name('student-import');
Route::post('student-import',[StudentController::class,'studentImportSave'])->name('student-import');
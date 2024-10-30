<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

#university
Route::get('/',[UniversityController::class,'index'])->name('univer.index');
Route::post('/university/store',[UniversityController::class,'store'])->name('univer.store');
Route::delete('/university/delete/{university}',[UniversityController::class,'destroy'])->name('univer.delete');
Route::put('/university/update/{id}', [UniversityController::class, 'update'])->name('univer.update');
// Route::put('/university/update/{id}', [UniversityController::class, 'update'])->name('univer.update');


Route::get('/course',[CourseController::class,'index'])->name('course.index');


Route::get('/faculty',[FacultyController::class,'index'])->name('faculty.index');


Route::get('/field',[FieldController::class,'index'])->name('field.index');


Route::get('/group',[GroupController::class,'index'])->name('group.index');

Route::get('/location',[LocationController::class,'index'])->name('location.index');

Route::get('/student',[StudentController::class,'index'])->name('student.index');

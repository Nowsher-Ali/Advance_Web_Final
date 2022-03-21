<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseAPIController;
use App\Http\Controllers\DepartmentAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/course/all',[CourseAPIController::class,'getall']);
Route::get('/course/{id}',[CourseAPIController::class,'get']);
Route::get('/course/delete/{id}',[CourseAPIController::class,'DeleteCourse']);
Route::post('/course/add',[CourseAPIController::class,'add']);
Route::post('/course/edit',[CourseAPIController::class,'Edit']);

Route::get('/department/{id}',[DepartmentAPIController::class,'get']);
Route::post('/department/add',[DepartmentAPIController::class,'add']);
Route::post('/department/edit',[DepartmentAPIController::class,'Edit']);
Route::get('/department/delete/{id}',[DepartmentAPIController::class,'DeleteDepartment']);
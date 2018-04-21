<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});
Route::get("/token",function (){
   return view("tocken");
});
Route::group(["prefix" => "api","name" =>"api.","namespace" => "Api"],function(){
    Route::resource("student","StudentController");
    Route::resource("lecturer","LecturerController");
    Route::resource("department","DepartmentController");
    Route::resource("course","CourseController");
    Route::resource("branch","BranchController");
    Route::resource("field","FieldController");
    Route::resource("protection","ProtectionController");
});




// chức năng dành cho thư ký
Route::get("quan-ly-giang-vien",["as" => "thuky.quanlygiangvien","uses" => "SecretaryController@lecturersManage"]);
Route::get("quan-ly-sinh-vien",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@studentsManage"]);
Route::get("quan-ly-linh-vuc",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@fieldsManage"]);
//Chức năng danh cho admin
Route::get("quan-ly-dot-bao-ve",["as" => "admin.quanlydotbaove","uses" => "AdministratorController@protectionManage"]);
Route::get("quan-ly-dot-bao-ve/{id}",["as" => "admin.quanlydotbaove.id","uses" => "AdministratorController@protectionManage_id"]);
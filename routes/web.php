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

use Maatwebsite\Excel\Facades\Excel;

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
    Route::resource("topic","TopicController");
    Route::post("login","AuthController@login");
    Route::get("logout","AuthController@logout");
    Route::group(["prefix" => "extent","name" =>"extent.","namespace" => "Extent"],function(){
            Route::get("student/topics",["name" => "student.topic","uses" => "ExtentController@studentGetTopics"]);
            Route::get("student/topics/{id}",["name" => "student.topic.id","uses" => "ExtentController@studentGetTopic"]);
            Route::post("student/topics/{id}",["name" => "student.topic.id","uses" => "ExtentController@studentPostTopic"]);
    });
});
// Excel
Route::group(["prefix" => "excel"],function (){
   Route::get("lecturer",["uses" => "ExcelController@lecturer"]);
    Route::get("student",["uses" => "ExcelController@student"]);
});



// chức năng dành cho thư ký
Route::get("quan-ly-giang-vien",["as" => "thuky.quanlygiangvien","uses" => "SecretaryController@lecturersManage"]);
Route::get("quan-ly-sinh-vien",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@studentsManage"]);
Route::get("quan-ly-linh-vuc",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@fieldsManage"]);


Route::get("quan-ly-topic",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@topicManage"]);
//Chức năng danh cho admin
Route::get("quan-ly-dot-bao-ve",["as" => "admin.quanlydotbaove","uses" => "AdministratorController@protectionManage"]);
Route::get("quan-ly-dot-bao-ve/{id}",["as" => "admin.quanlydotbaove.id","uses" => "AdministratorController@protectionManage_id"]);


// student
Route::get("student/dang-ky-topic",["as" => "student.dangkytopic","uses" => "StudentController@topics"]);
Route::get("student/topic-cua-toi",["as" => "student.topiccuatoi","uses" => "StudentController@mytopic"]);
//auth

Route::get("login",["as" => "auth.login", "uses" => "AuthController@login"]);


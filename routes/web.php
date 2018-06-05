<?php



Route::get('/', ["uses" => "IndexController@index"])->name("home");
Route::post('/', ["uses" => "IndexController@postIndex"])->name("post_home");
Route::get("/statistical",["uses" => "ExcelController@statistical"])->name("statistical");
Route::get("/statistical-excel",["uses" => "ExcelController@statistical_excel"])->name("statistical.excel");
Route::get("/test-mail","ExcelController@testEmail");
Route::get("/token",function (){
   return view("tocken");
});
Route::get("/testdata",["uses" => "StatisticalController@getData"]);
Route::get("api-err-auth",function(){
    return Response::json(array(
        'code'      =>  403,
        'message'   =>  "auth not accept"
    ), 403);
})->name("api.err.auth");
Route::group(["prefix" => "api","name" =>"api.","namespace" => "Api"],function(){

   Route::group(["middleware" => "api.admin.secretary"],function (){
       Route::resource("student","StudentController");
       Route::resource("lecturer","LecturerController");
       Route::resource("department","DepartmentController");
       Route::resource("course","CourseController");
       Route::resource("branch","BranchController");
       Route::resource("field","FieldController");
       Route::resource("topic","TopicController");

   });

    Route::resource("protection","ProtectionController")->middleware("api.admin");


    Route::post("login","AuthController@login");
    Route::get("logout","AuthController@logout");
    Route::group(["prefix" => "extent","name" =>"extent.","namespace" => "Extent"],function(){
        //student
        //topic
           Route::group(["middleware" => "api.student"],function(){
               Route::get("student/topics",["name" => "student.topic","uses" => "ExtentController@studentGetTopics"]);
               Route::get("student/topics/{id}",["name" => "student.topic.get.id","uses" => "ExtentController@studentGetTopic"]);
               Route::post("student/topics/{id}",["name" => "student.topic.post.id","uses" => "ExtentController@studentPostTopic"]);
               //protection
               Route::get("student/protections",["name" => "student.protections","uses" => "ExtentController@studentGetProtections"]);
               Route::get("student/protection/{id}",["name" => "student.protection.get.id","uses" => "ExtentController@studentGetProtection"]);
               Route::post("student/protection/{id}",["name" => "student.protection.post.id","uses" => "ExtentController@studentPostProtection"]);
           });
            /// ------------------ -----------------------------------------------------------------------------------------------------------//
        //lecturer
        Route::group(["middleware" => "api.lecturer"],function(){
            Route::get("lecturer/topics",["name" => "lecturer.topic","uses" => "ExtentController@lecturerGetTopics"]);
            Route::get("lecturer/topic/{id}",["name" => "lecturer.topic.get.id","uses" => "ExtentController@lecturerGetTopic"]);

            Route::get("lecturer/topic-as-student/{id}",["name" => "lecturer.topic.get.student.id","uses" => "ExtentController@lecturerGetTopicAsStudent"]);
            Route::put("lecturer/topic/{id}",["name" => "lecturer.topic.put.id","uses" => "ExtentController@lecturerPutTopic"]);
            Route::delete("lecturer/topic/{id}",["name" => "lecturer.topic.delete.id","uses" => "ExtentController@lecturerDeleteTopic"]);
            Route::post("lecturer/topics",["name" => "lecturer.topic.post","uses" => "ExtentController@lecturerPostTopic"]);
            Route::put("lecturer/topic-as-student/{id}",["name" => "lecturer.topic.put.student.id","uses" => "ExtentController@lecturerPutTopicAsStudent"]);
            Route::delete("lecturer/topic-as-student/{id}",["name" => "lecturer.topic.delete.student.id","uses" => "ExtentController@lecturerDeleteTopicAsStudent"]);



        });

    });
});
// Excel
// chức năng dành cho thư ký
Route::group(["prefix" => "excel","middleware" => "secretary"],function (){
   Route::get("lecturer",["uses" => "ExcelController@lecturer"]);
    Route::get("student",["uses" => "ExcelController@student"]);
    Route::get("topics",["uses" => "ExcelController@topic"]);
});
Route::group(["middleware" => "secretary"],function (){
    Route::get("quan-ly-giang-vien",["as" => "thuky.quanlygiangvien","uses" => "SecretaryController@lecturersManage"]);
    Route::get("quan-ly-sinh-vien",["as" => "thuky.quanlysinhvien","uses" => "SecretaryController@studentsManage"]);
    Route::get("quan-ly-linh-vuc",["as" => "thuky.quanlylinhvuc","uses" => "SecretaryController@fieldsManage"]);
    Route::get("quan-ly-topic",["as" => "thuky.quanlytopic","uses" => "SecretaryController@topicManage"]);
});

//Chức năng danh cho admin
Route::group(["middleware" => "admin"],function (){
    Route::get("quan-ly-dot-bao-ve",["as" => "admin.quanlydotbaove","uses" => "AdministratorController@protectionManage"]);
    Route::get("quan-ly-dot-bao-ve/{id}",["as" => "admin.quanlydotbaove.id","uses" => "AdministratorController@protectionManage_id"]);
});


// student
Route::group(["middleware" => "student"],function(){
    Route::get("student/dang-ky-topic",["as" => "student.dangkytopic","uses" => "StudentController@topics"]);
    Route::get("student/de-tai-cua-toi",["as" => "student.detaicuatoi","uses" => "StudentController@mytopic"]);
});
//auth

Route::get("login",["as" => "auth.login", "uses" => "AuthController@login"]);
Route::get("/logout",["as" => "auth.logout", "uses" => "AuthController@logout"]);
//lecturer
Route::group(["middleware" => "lecturer"],function (){
    Route::get("lecturer/de-tai-cua-toi",["as" => "lecturer.detaicuatoi","uses" => "LecturerController@topics"]);
    Route::get("lecturer/de-tai-cua-toi/{id}",["as" => "lecturer.detaicuatoi.id","uses" => "LecturerController@topicId"]);
});



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
    if(Auth::guard("student")->check())
    {
        return Auth::guard("student")->user();
    }
    if(Auth::guard("employ")->check())
    {
        return Auth::guard("employ")->user();
    }
})->name("home");
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
        //student
        //topic
            Route::get("student/topics",["name" => "student.topic","uses" => "ExtentController@studentGetTopics"]);
            Route::get("student/topics/{id}",["name" => "student.topic.get.id","uses" => "ExtentController@studentGetTopic"]);
            Route::post("student/topics/{id}",["name" => "student.topic.post.id","uses" => "ExtentController@studentPostTopic"]);
            //protection
            Route::get("student/protections",["name" => "student.protections","uses" => "ExtentController@studentGetProtections"]);
            Route::get("student/protection/{id}",["name" => "student.protection.get.id","uses" => "ExtentController@studentGetProtection"]);
            Route::post("student/protection/{id}",["name" => "student.protection.post.id","uses" => "ExtentController@studentPostProtection"]);
            /// ------------------ -----------------------------------------------------------------------------------------------------------//
        //lecturer
            Route::get("lecturer/topics",["name" => "lecturer.topic","uses" => "ExtentController@lecturerGetTopics"]);
            Route::get("lecturer/topic/{id}",["name" => "lecturer.topic.get.id","uses" => "ExtentController@lecturerGetTopic"]);
            Route::put("lecturer/topic/{id}",["name" => "lecturer.topic.put.id","uses" => "ExtentController@lecturerPutTopic"]);
        Route::post("lecturer/topics",["name" => "lecturer.topic.post","uses" => "ExtentController@lecturerPostTopic"]);
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
Route::get("quan-ly-linh-vuc",["as" => "thuky.quanlylinhvuc","uses" => "SecretaryController@fieldsManage"]);


Route::get("quan-ly-topic",["as" => "thuky.quanlytopic","uses" => "SecretaryController@topicManage"]);
//Chức năng danh cho admin
Route::get("quan-ly-dot-bao-ve",["as" => "admin.quanlydotbaove","uses" => "AdministratorController@protectionManage"]);
Route::get("quan-ly-dot-bao-ve/{id}",["as" => "admin.quanlydotbaove.id","uses" => "AdministratorController@protectionManage_id"]);


// student
Route::group(["middleware" => "student"],function(){
    Route::get("student/dang-ky-topic",["as" => "student.dangkytopic","uses" => "StudentController@topics"]);
    Route::get("student/topic-cua-toi",["as" => "student.topiccuatoi","uses" => "StudentController@mytopic"]);
});
//auth

Route::get("login",["as" => "auth.login", "uses" => "AuthController@login"]);

//lecturer
Route::group(["middleware" => "lecturer"],function (){
    Route::get("lecturer/topic-cua-toi",["as" => "lecturer.topiccuatoi","uses" => "LecturerController@topics"]);
});



//test

//Route::get("checkAuth","Api\Extent\ExtentController@getAuth")->middleware("employ")->name("checkauth");
//Route::get("testlogin",function (){
//    if(Auth::guard("student")->check())
//    {
//        return Auth::guard("student")->user();
//    }
//    if(Auth::guard("employ")->check())
//    {
//        return Auth::guard("employ")->user();
//    }
//   return view("checkLogin");
//})->name("checklogin");
//
//Route::post("testlogin",function (\App\Http\Requests\AuthRequest $request){
//    if (Auth::guard("student")->attempt(['code' => $request->input("username"), 'password' => $request->input("password")], $request->input("remember")) ||
//        Auth::guard("employ")->attempt(['email' => $request->input("username"), 'password' => $request->input("password")], $request->input("remember"))
//    ) {
//
//        if(Auth::guard("student")->check())
//        {
//            return Auth::guard("student")->user();
//        }
//        if(Auth::guard("employ")->check())
//        {
//            return Auth::guard("employ")->user();
//        }
//        return  redirect()->route("checkauth");
//    }
//});
//Route::get("testlogout",function (){
//    if(Auth::guard("student")->check())
//    {
//        Auth::guard("student")->logout();
//    }
//    if(Auth::guard("employ")->check())
//    {
//         Auth::guard("employ")->logout();
//    }
//    return  redirect()->route("checklogin");
//});
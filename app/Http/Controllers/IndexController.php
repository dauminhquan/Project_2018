<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Lecturer;
use App\Models\Secretary;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        if(Auth::guard("student")->check())
        {
            $id_user = Auth::guard("student")->user()->id;
            return view("student.index",["user_data" => Student::where("students.id",$id_user)
                ->join("departments","students.id_department","departments.id")
                ->join("courses","courses.id","students.id_course")
                ->join("branches","branches.id","students.id_branch")
                ->select("students.*","branches.name_branch","departments.department_name","courses.name_course")->first()]);

        }
        if(Auth::guard("employ")->check())
        {
            if(Auth::guard("employ")->user()->auth == 1)
            {
                $id_user = Auth::guard("employ")->user()->id;
                $user_data =  Secretary::where("id_user",$id_user)->first();

                return view("secretary.index",["user_data" => $user_data]);
            }
            if(Auth::guard("employ")->user()->auth == 2)
            {
                $id_user = Auth::guard("employ")->user()->id;
                $user_data =  Lecturer::where("id_user",$id_user)->leftjoin("departments","departments.id","lecturers.id_department")->leftjoin("fields","fields.id","lecturers.id_field")->
                select("lecturers.*","departments.department_name","fields.field_name")->first();
                return view("lecturer.index",["user_data" => $user_data]);
            }
            if(Auth::guard("employ")->user()->auth == 0)
            {
                $id_user = Auth::guard("employ")->user()->id;
                $user_data =  Administrator::where("id_user",$id_user)->first();
                return view("admin.index",["user_data" => $user_data]);
            }

        }
        return  redirect()->route("auth.login");
    }
    public function postIndex(Request $request)
    {
        if(Auth::guard("student")->check())
        {
            $id_user = Auth::guard("student")->user()->id;
            if($request->has("update_info"))
            {
                $request->validate([
                    "student_name" => "required",
                    "address" => "required"
                ]);

                $student = Student::findOrFail($id_user);

                $student->student_name = $request->student_name;
                $student->address = $request->address;
                $student->save();
            }
            if($request->has("updateauth"))
            {


                $request->validate([
                    "now_password" => "required",
                    "password" => "required|confirmed|different:now_password",
                ]);
                $student = Student::findOrFail($id_user);

                if(Hash::check($request->now_password,$student->password))
                {
                    $student->password = Hash::make($request->password);
                    $student->save();
                }
            }
            return view("student.index",["user_data" => Student::where("students.id",$id_user)
                ->join("departments","students.id_department","departments.id")
                ->join("courses","courses.id","students.id_course")
                ->join("branches","branches.id","students.id_branch")
                ->select("students.*","branches.name_branch","departments.department_name","courses.name_course")->first()]);

        }
        if(Auth::guard("employ")->check())
        {
            if(Auth::guard("employ")->user()->auth == 1)
            {
                $id_user = Auth::guard("employ")->user()->id;



                if($request->has("update_info"))
                {

                    $request->validate([
                        "name_secretary" => "required",
                        "address_secretary" => "required",
                        "email_address_secretary" => "required",
                        "phone_number" => "required"
                    ]);

                    $sec = Secretary::where("secretaries.id_user",$id_user)->first();
                    $sec->name_secretary = $request->name_secretary;
                    $sec->address_secretary = $request->address_secretary;
                    $sec->email_address_secretary = $request->email_address_secretary;
                    $sec->phone_number = $request->phone_number;
                    $sec->update();
                }
                if($request->has("updateauth"))
                {

                    $request->validate([
                        "now_password" => "required",
                        "password" => "required|confirmed|different:now_password",
                    ]);
                    $user = User::findOrFail($id_user);

                    if(Hash::check($request->now_password,$user->password))
                    {
                        $user->password = Hash::make($request->password);
                        $user->update();
                    }
                }

                $user_data =  Secretary::where("id_user",$id_user)->first();

                return view("secretary.index",["user_data" => $user_data]);
            }
            if(Auth::guard("employ")->user()->auth == 2)
            {
                $id_user = Auth::guard("employ")->user()->id;


                if($request->has("update_info"))
                {

                    $request->validate([
                        "name_lecturer" => "required",
                        "address_lecturer" => "required",
                        "email_address_lecturer" => "required",
                        "phone_number" => "required"
                    ]);

                    $lec = Lecturer::where("lecturers.id_user",$id_user)->first();
                    $lec->name_lecturer = $request->name_lecturer;
                    $lec->address_lecturer = $request->address_lecturer;
                    $lec->email_address_lecturer = $request->email_address_lecturer;
                    $lec->phone_number = $request->phone_number;
                    $lec->update();
                }
                if($request->has("updateauth"))
                {


                    $request->validate([
                        "now_password" => "required",
                        "password" => "required|confirmed|different:now_password",
                    ]);
                    $user = User::findOrFail($id_user);

                    if(Hash::check($request->now_password,$user->password))
                    {
                        $user->password = Hash::make($request->password);
                        $user->update();
                    }
                }


                $user_data =  Lecturer::where("id_user",$id_user)->leftjoin("departments","departments.id","lecturers.id_department")->leftjoin("fields","fields.id","lecturers.id_field")->
                select("lecturers.*","departments.department_name","fields.field_name")->first();
                return view("lecturer.index",["user_data" => $user_data]);
            }
            if(Auth::guard("employ")->user()->auth == 0)
            {

                $id_user = Auth::guard("employ")->user()->id;


                if($request->has("update_info"))
                {

                    $request->validate([
                        "name_admin" => "required"
                    ]);

                    $admin = Administrator::where("administrators.id_user",$id_user)->first();
                  
                    $admin->name_admin = $request->name_admin;
                    $admin->update();
                }
                if($request->has("updateauth"))
                {


                    $request->validate([
                        "now_password" => "required",
                        "password" => "required|confirmed|different:now_password",
                    ]);
                    $user = User::findOrFail($id_user);

                    if(Hash::check($request->now_password,$user->password))
                    {
                        $user->password = Hash::make($request->password);
                        $user->save();
                    }
                }


                $user_data =  Administrator::where("id_user",$id_user)->first();
                return view("admin.index",["user_data" => $user_data]);
            }

        }
        return  redirect()->route("auth.login");
    }
}

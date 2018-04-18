<?php

namespace App\Services;

use App\Http\Requests\LecturerRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Field;
use App\Models\Lecturer;
use App\Models\LecturerProtection;
use App\Models\Protection;
use App\Models\Secretary;
use App\Models\Student;
use App\Models\Topic;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileService
{
    //
    // Sinh viên
    // --------------------------//
    /// lấy toàn bộ thông tin sinh viên
    public function getStudentsInfo()
    {
        return Student::join("departments","departments.id","students.id_department")
            ->join("courses","courses.id","students.id_course")
            ->join("branches","branches.id","students.id_branch")->select(["students.*","courses.name_course",
                "branches.name_branch"])->get();
    }
    // lay thong tin sinh vien theo id
    public function getStudentInfo($id)
    {
        return Student::where("students.id",$id) ->join("courses","courses.id","students.id_course")
            ->join("branches","branches.id","students.id_branch")->select(["students.*","courses.name_course",
                "branches.name_branch"])->first();
    }
    /// update thong tin sinh vien theo id
    /// update tung truong
    public function updateStudentAsColumn($id,$data,$column)
    {
        $student = Student::findOrFail($id);
        $student->$column = $data;
        $student->update();
    }
    /// update tat ca cac truong
    /// truong code không được update
    public function updateStudent($id,StudentRequest $request)
    {
        $student = Student::findOrFail($id);
        if($request->has("student_name"))
        {
            $student->student_name = $request->input("student_name");
        }
        if($request->has("address"))
        {
            $student->address = $request->input("address");
        }
        if($request->has("id_department"))
        {
            $student->id_department = $request->input("id_department");
        }
//        if($request->has("id_course"))
//        {
//            $student->student_name = $request->input("id_course");
//        }
        if($request->has("id_branch"))
        {
            $student->id_branch = $request->input("id_branch");
        }
        $student->update();
    }
    // them moi mot sinh vien
    public function addStudent(StudentRequest $request)
    {
        $student = new Student();
        $student->code = $request->input("code");
        $student->student_name = $request->input("student_name");
        $student->address = $request->input("address");
        $student->id_department = $request->input("id_department");
        $student->id_course = $request->input("id_course");
        $student->id_branch = $request->input("id_branch");
        $student->save();
    }
    // them nhieu sinh vien
    public function addStudents(array $students)
    {
        foreach ($students as $item)
        {
            $student = new Student();
            $student->code = $item->code;
            $student->student_name = $item->student_name;
            $student->address = $item->address;
            $student->id_department = $item->id_department;
            $student->id_course = $item->id_course;
            $student->id_branch = $item->id_branch;
            $student->save();
        }
    }
    // xoa sinh vien
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }

    //---------------------------------------//
    // Giang vien

    // lay thong tin cua tat ca giang vien
    public function getLecturersInfo()
    {
        $lecturer = Lecturer::join("lecturer_protection","lecturer_protection.id_lecturer","lecturers.id")
            ->join("departments","departments.id","lecturers.id_department")
            ->join("fields","fields.id","lecturers.id_field")
            ->join("protections","protections.id","lecturer_protection.id_protection")
            ->join("topics","topics.id_lecturer","lecturers.id")

            ->select("lecturers.*",
                "protections.time_start", "protections.time_end",
                "topics.name_topic",
                "fields.field_name",
                "departments.department_name"

                )

            ->get();
        return $lecturer;
    }

    public function getLecturerInfo($id)
    {
        $lecturer = Lecturer::where("lecturers.id",$id)->join("lecturer_protection","lecturer_protection.id_lecturer","lecturers.id")->
            join("lecturer_protection","lecturer_protection.id_lecturer","lecturers.id")
            ->join("departments","departments.id","lecturers.id_department")
            ->join("fields","fields.id","lecturers.id_field")
            ->join("protections","protections.id","lecturer_protection.id_protection")
            ->join("topics","topics.id_lecturer","lecturers.id")

            ->select("lecturers.*",
                "protections.time_start", "protections.time_end",
                "topics.name_topic",
                "fields.field_name",
                "departments.department_name"

            )->first();
        return $lecturer;
    }

    public function updateLecturerAsColumn($id,$data,$column)
    {
        // k
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->$column = $data;
        $lecturer->update();
    }

    public function updateLecturer($id,Request $request)
    {
        $lecturer = Lecturer::findOrFail($id);
        if($request->has("name_lecturer"))
        {
            $lecturer->name_lecturer = $request->input("name_lecturer");
        }
        if($request->has("address_lecturer"))
        {
            $lecturer->student_name = $request->input("address_lecturer");
        }
        if($request->has("email_address_lecturer"))
        {
            $lecturer->student_name = $request->input("email_address_lecturer");
        }
        if($request->has("phone_number"))
        {
            $lecturer->student_name = $request->input("phone_number");
        }
        if($request->has("id_department"))
        {
            $lecturer->student_name = $request->input("id_department");
        }
        if($request->has("id_field"))
        {
            $lecturer->student_name = $request->input("id_field");
        }
        if($request->has("password"))
        {
            $user = Users::findOrFail($lecturer->ïd_user);
            $user->password = Hash::make($request->input("password"));
        }
        $lecturer->update();
    }
    //

    public function addLecturer(LecturerRequest $request)
    {
        $lecturer = new Lecturer();
        $lecturer->name_lecturer = $request->input("name_lecturer");
        $lecturer->address_lecturer = $request->input("address_lecturer");
        $lecturer->email_address_lecturer = $request->input("email_address_lecturer");
        $lecturer->phone_number = $request->input("phone_number");
        $lecturer->id_department = $request->input("id_department");
        $lecturer->id_field = $request->input("id_field");

        $user = new Users();
        $user->email =  $request->input("email_address_lecturer");
        $user->password =  $request->input("password");
        $user->save();
        $lecturer->id_user = $user->id;


        $lecturer->save();

    }

    public function addLecturers(array $lecturers)
    {
        foreach ($lecturers as $item)
        {
            $lecturer = new Lecturer();
            $lecturer->name_lecturer = $item->name_lecturer;
            $lecturer->address_lecturer = $item->address_lecturer;
            $lecturer->email_address_lecturer = $item->email_address_lecturer;
            $lecturer->phone_number = $item->phone_number;
            $lecturer->id_department = $item->id_department;
            $lecturer->id_field = $item->id_field;

            $user = new Users();
            $user->email =  $item->email_address_lecturer;
            $user->password = Hash::make($item->password);
            $user->save();
            $lecturer->id_user = $user->id;


            $lecturer->save();
        }
    }

    public function deleteLecturer($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->delete();
    }
    ///----------------------------------------------/
    ///
    /// Thu ky
    ///
    ///
    public function getSecretariesInfo()
    {
        $secretary = Secretary::get();
        return $secretary;
    }

    public function getSecretaryInfo($id)
    {
        $secretary = Secretary::where("id",$id)->first();
        return $secretary;
    }

    public function updateSecretaryAsColumn($id,$data,$column)
    {
        // k
        $secretary = Secretary::findOrFail($id);
        $secretary->$column = $data;
        $secretary->update();
    }

    public function updateSecretary($id,Request $request)
    {
        $secretary = Secretary::findOrFail($id);
        if($request->has("name_secretary"))
        {
            $secretary->name_lecturer = $request->input("address_secretary");
        }
        if($request->has("email_address_secretary"))
        {
            $secretary->student_name = $request->input("phone_number");
        }
        if($request->has("phone_number"))
        {
            $secretary->student_name = $request->input("phone_number");
        }

        if($request->has("password"))
        {
            $user = Users::findOrFail($secretary->ïd_user);
            $user->password = Hash::make($request->input("password"));
        }
        $secretary->update();
    }
    //

    public function addSecretary(LecturerRequest $request)
    {
        $secretary = new Secretary();
        $secretary->name_secretary = $request->input("name_secretary");
        $secretary->address_secretary = $request->input("address_secretary");
        $secretary->email_address_secretary = $request->input("email_address_secretary");
        $secretary->phone_number = $request->input("phone_number");

        $user = new Users();
        $user->email =  $request->input("email_address_secretary");
        $user->password =  $request->input("password");
        $user->save();
        $secretary->id_user = $user->id;


        $secretary->save();

    }

    public function addSecretaries(array $secretaries)
    {
        foreach ($secretaries as $item)
        {
            $secretary = new Secretary();
            $secretary->name_secretary = $item->name_secretary;
            $secretary->address_secretary = $item->address_secretary;
            $secretary->email_address_secretary = $item->email_address_secretary;
            $secretary->phone_number = $item->phone_number;

            $user = new Users();
            $user->email =  $item->address_secretary;
            $user->password = Hash::make($item->password);
            $user->save();
            $secretary->id_user = $user->id;


            $secretary->save();
        }
    }

    public function deleteSecretary($id)
    {
        $secretary = Secretary::FindorFail($id);
        $secretary->delete();
    }

    // Linh vuc

    public function getFieldsInfo()
    {
        $field = Field::
        join("lecturers","fields.id","lecturers.id_field")
        ->select("lecturers.*",
                "fields.field_name"
            )
            ->get();
        return $field;
    }

    public function getFieldInfo($id)
    {

        $field = Field::where("fields.id",$id)->
        join("lecturers","fields.id","lecturers.id_field")
            ->select("lecturers.*",
                "fields.field_name"
            )
            ->first();
        return $field;
    }

    public function updateFieldAsColumn($id,$data,$column)
    {
        // k
        $field = Field::findOrFail($id);
        $field->$column = $data;
        $field->update();
    }

    public function updateField($id,Request $request)
    {
        $field = Field::findOrFail($id);
        if($request->has("field_name"))
        {
            $field->field_name = $request->input("field_name");
        }

        $field->update();
    }
    //

    public function addField(Request $request)
    {
        $field = new Field();
        $field->field_name = $request->input("field_name");

        $field->save();

    }

    public function addFields(array $fields)
    {
        foreach ($fields as $item)
        {
            $field = new Field();
            $field->field_name = $item->field_name;

            $field->save();
        }
    }

    public function deleteField($id)
    {
        $field = Field::FindorFail($id);
        $field->delete();
    }

    //
    // dot bao ve
    public function getProtections()
    {
        $protection = Protection::
            join("lecturer_protection","protections.id","lecturer_protection.id_protection")
        ->join("lecturers","lecturers.id","lecturer_protection.id_lecturer")

            ->select("lecturers.name_lecturer",
                "protections.time_start",
                "protections.time_end",
            "lecturer_protection.*"
            )
            ->get();
        return $protection;
    }

    public function getProtection($id)
    {

        $protection = Protection::where("protections.id",$id)->
        join("lecturer_protection","protections.id","lecturer_protection.id_protection")
            ->join("lecturers","lecturers.id","lecturer_protection.id_lecturer")

            ->select("lecturers.name_lecturer",
                "protections.time_start",
                "protections.time_end",
                "lecturer_protection.*"
            )
            ->first();
        return $protection;
    }

    public function updateProtectionAsColumn($id,$data,$column)
    {
        // k
        $protection = Protection::findOrFail($id);
        $protection->$column = $data;
        $protection->update();
    }

    public function updateProtection($id,Request $request)
    {
        $protection = Protection::findOrFail($id);
        if($request->has("time_start"))
        {
            $protection->time_start = $request->input("time_start");
        }
        if($request->has("time_end"))
        {
            $protection->time_end = $request->input("time_end");
        }


        $protection->update();
    }
    //

    public function addProtection(Request $request)
    {
        $protection = new Protection();
        $protection->time_start = $request->input("time_start");
        $protection->time_end = $request->input("time_end");
        $protection->save();

    }

    public function addProtections(array $protections)
    {
        foreach ($protections as $item)
        {
            $protection = new Protection();
            $protection->field_name = $item->time_start;
            $protection->field_name = $item->time_end;
            $protection->save();
        }
    }

    public function deleteProtection($id)
    {
        $protections = Protection::FindorFail($id);
        $protections->delete();
    }

    // de tai -topic

    public function getTopics()
    {
        $topic = Topic::

            join("lecturers","lecturers.id","topics.id_lecturer")

            ->select("lecturers.name_lecturer",
                "topics.*"
            )
            ->get();
        return $topic;
    }

    public function getTopic($id)
    {

        $topic = Topic::where("topics.id",$id)->
        join("lecturers","lecturers.id","topics.id_lecturer")

            ->select("lecturers.name_lecturer",
                "topics.*"
            )
            ->first();
        return $topic;
    }

    public function updateTopicAsColumn($id,$data,$column)
    {
        // k
        $topic = Topic::findOrFail($id);
        $topic->$column = $data;
        $topic->update();
    }

    public function updateTopic($id,Request $request)
    {
        $topic = Topic::findOrFail($id);
        if($request->has("id_lecturer"))
        {
            $topic->id_lecturer = $request->input("id_lecturer");
        }
        if($request->has("name_topic"))
        {
            $topic->name_topic = $request->input("name_topic");
        }
        if($request->has("accept"))
        {
            $topic->accept = $request->input("accept");
        }


        $topic->update();
    }
    //

    public function addTopic(Request $request)
    {
        $topic = new Topic();
        $topic->id_lecturer = $request->input("id_lecturer");
        $topic->name_topic = $request->input("name_topic");
        $topic->accept = $request->has("accept");
        $topic->save();

    }

    public function addTopics(array $protections)
    {
        foreach ($protections as $item)
        {
            $topic = new Topic();
            $topic->id_lecturer = $item->id_lecturer;
            $topic->name_topic = $item->name_topic;
            $topic->save();
        }
    }

    public function deleteTopic($id)
    {
        $topic = Topic::FindorFail($id);
        $topic->delete();
    }
    // danh sach giao vien cua dot bao ve
    public function getAllLecturerProtection()
    {
        $lecturer_protection = LecturerProtection::

        join("lecturers","lecturers.id","lecturer_protection.id_lecturer")
            ->join("protections","protections.id","lecturer_protection.id_protection")

            ->select("lecturers.name_lecturer",
                "lecturer_protection.*",
            "protections.time_start",
            "protections.time_end"
            )
            ->get();
        return $lecturer_protection;
    }


    //

    public function addLecturerProtection(Request $request)
    {
        $lecturer_protection = new LecturerProtection();
        $lecturer_protection->id_protection = $request->input("id_protection");
        $lecturer_protection->id_lecturer = $request->input("id_lecturer");
        $lecturer_protection->save();

    }

    public function addMultiLecturerProtection(array $mul_lecturer_protection)
    {
        foreach ($mul_lecturer_protection as $item)
        {
            $lecturer_protection = new LecturerProtection();
            $lecturer_protection->id_protection = $item->id_protection;
            $lecturer_protection->id_lecturer = $item->id_lecturer;
            $lecturer_protection->save();
        }
    }


}
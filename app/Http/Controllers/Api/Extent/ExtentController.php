<?php

namespace App\Http\Controllers\Api\Extent;

use App\Http\Requests\TopicRequest;
use App\Models\Lecturer;
use App\Models\Protection;
use App\Models\Topic;
use App\Models\TopicProtection;
use App\Services\StudentServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
class ExtentController extends Controller
{
    public function studentGetTopics()
    {
        $student = new StudentServices();
        return $student->getTopics();
    }

    public function studentGetTopic($id)
    {
        $student = new StudentServices();
        return $student->getTopic($id);
    }
    public function studentPostTopic(Request $request,$id)
    {
        if($request->has("check"))
        {
            if($request->check == 1)
            {
                $id_student = Auth::guard("student")->user()->id;
                $topic_pro = new TopicProtection();
                $topic_pro->id_student = $id_student;
                $topic_pro->id_topic = $id;
                $topic_pro->save();
            }

        }
    }
    public function studentGetProtections()
    {
        $pro = Protection::leftjoin("lecturer_protection","lecturer_protection.id_protection","protections.id")->leftjoin("lecturers","lecturers.id","lecturer_protection.id_lecturer")->get(["protections.*","lecturers.name_lecturer"]);
        $pro_list = [

        ];
        if(count($pro) == 0)
        {
            return Response::json(array(
                'code'      =>  404,
                'message'   =>  "Không tồn tại"
            ), 404);
        }
        foreach ($pro as $item)
        {

            $index = $this->hasKey($pro_list,$item,"time_start");
            if($index===false)
            {
                $pro_list[] = (object)[
                    "id" => $item->id,
                    "time_start" => $item->time_start,
                    "time_end" => $item->time_end,
                    "detail" => $item->detail,
                    "lis_lec" =>[
                        $item->name_lecturer
                    ]
                ];
            }
            else{
                $pro_list[$index]->lis_lec[] = $item->name_lecturer;
            }
        }
        return $pro_list;
    }
    public function studentGetProtection($id)
    {
        $pro = Protection::where("protections.id",$id)->leftjoin("lecturer_protection","lecturer_protection.id_protection","protections.id")->leftjoin("lecturers","lecturers.id","lecturer_protection.id_lecturer")->get(["protections.*","lecturers.name_lecturer"]);
        $pro_list = [

        ];
        if(count($pro) == 0)
        {
            return Response::json(array(
                'code'      =>  404,
                'message'   =>  "Không tồn tại"
            ), 404);
        }
        foreach ($pro as $item)
        {

            $index = $this->hasKey($pro_list,$item,"time_start");
            if($index===false)
            {
                $pro_list[] = (object)[
                    "id" => $item->id,
                    "time_start" => $item->time_start,
                    "time_end" => $item->time_end,
                    "lis_lec" =>[
                        $item->name_lecturer
                    ]
                ];
            }
            else{
                $pro_list[$index]->lis_lec[] = $item->name_lecturer;
            }
        }
        return $pro_list;
    }
    public function studentPostProtection($id)
    {

        $id_student = Auth::guard("student")->user()->id;

        TopicProtection::where("id_student",$id_student)->update(["id_protection"=>$id]);
        return Response::json(array(
            'code'      =>  200,
            'message'   =>  "Thành công"
        ), 200);

    }

    // lecturer

    public function lecturerGetTopics()
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        return Topic::where("id_lecturer",$id_lecturer)->get();
    }
    public function lecturerGetTopic($id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        return Topic::where("id_lecturer",$id_lecturer)->where("id",$id)->first();
    }
    public function lecturerGetTopicAsStudent($id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        return Topic::where("topics.id_lecturer",$id_lecturer)->where("topics.id",$id)->leftjoin("topic_protection","topic_protection.id_topic","topics.id")->join("students","students.id","topic_protection.id_student")
            ->leftjoin("protections","protections.id","topic_protection.id_protection")
            ->select("protections.time_start","protections.time_end","topic_protection.acceptance","topic_protection.scores","topic_protection.ok","topic_protection.time_run",
                "topic_protection.place","students.student_name","topic_protection.id_student")->get();

    }
    public function lecturerPutTopicAsStudent(Request $request,$id)
    {
        if($request->has("id_student") && $request->has("ok"))
        {
            TopicProtection::where("id_student",$request->id_student)->where("id_topic",$id)->update(["ok" => $request->ok]);
        }

    }

    public function lecturerPutTopic(TopicRequest $request,$id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        if(Topic::where("id_lecturer",$id_lecturer)->where("id","!=",$id)->where("name_topic",$request->name_topic)->count() > 0)
        {
            return Response::json(array(
                'code'      =>  403,
                'message'   =>  "Trùng tên topic"
            ), 403);
        }
        Topic::where("id_lecturer",$id_lecturer)->where("id",$id)->update(["name_topic" => $request->name_topic,"describe" => $request->describe]);
    }
    public function lecturerPostTopic(TopicRequest $request)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        $topic = new Topic();
        $topic->id_lecturer = $id_lecturer;
        $topic->name_topic = $request->name_topic;
        $topic->describe = $request->describe;
        $topic->save();
    }
    public function lecturerDeleteTopic($id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $id_lecturer = Lecturer::where("id_user",$id_lecturer)->first()->id;
        Topic::where("id_lecturer",$id_lecturer)->where("id",$id)->delete();
    }
    public function lecturerDeleteTopicAsStudent(Request$request,$id)
    {
        try{
            TopicProtection::where("id_student",$request->idStudent)->where("id_topic",$id)->delete();
        }catch (\Exception $e)
        {
            return Response::json(array(
                'code'      =>  404,
                'message'   =>  "Đã có lỗi"
            ), 404);
        }
    }

    private function hasKey($arr,$check,$key)
    {

        if(count($arr) == 0)
        {
            return false;
        }

        foreach ($arr as $index => $item)
        {
            if($check->$key == $item->$key)
            {
                return $index;
            }

        }
        return false;
    }

//    public function getAuth()
//    {
//
//        if(Auth::guard("student")->check())
//        {
//            return Auth::guard("student")->user();
//        }
//        if(Auth::guard("employ")->check())
//        {
//            return Auth::guard("employ")->user();
//        }
//    }
}

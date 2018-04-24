<?php

namespace App\Http\Controllers\Api\Extent;

use App\Http\Requests\TopicRequest;
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
        return Topic::where("id_lecturer",$id_lecturer)->get();
    }
    public function lecturerGetTopic($id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        return Topic::where("id_lecturer",$id_lecturer)->where("id",$id)->first();
    }

    public function lecturerPutTopic(TopicRequest $request,$id)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        Topic::where("id_lecturer",$id_lecturer)->where("id",$id)->update(["name_topic" => $request->name_topic,"describe" => $request->describe]);
    }
    public function lecturerPostTopic(TopicRequest $request)
    {
        $id_lecturer = Auth::guard("employ")->user()->id;
        $topic = new Topic();
        $topic->id_lecturer = $id_lecturer;
        $topic->name_topic = $request->name_topic;
        $topic->describe = $request->describe;
        $topic->save();
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

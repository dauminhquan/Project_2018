<?php

namespace App\Http\Controllers;

use App\Models\Protection;
use App\Models\TopicProtection;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class StudentController extends Controller
{
    public function topics()
    {
        if(TopicProtection::where("id_student",Auth::guard("student")->user()->id)->where("acceptance","!=",2)->count() > 0)
        {
//            return Response::json(array(
//                'code'      =>  403,
//                'message'   =>  "You cannot have more than one topic"
//            ), 403);
            return response()->redirectToRoute('student.detaicuatoi');
        }
        return view("student.topics");
    }
    public function mytopic()
    {
        $arrdata = TopicProtection::where("topic_protection.id_student",Auth::guard("student")->user()->id)->join("topics","topics.id","topic_protection.id_topic")
            ->join("lecturers","lecturers.id","topics.id_lecturer")
            ->leftjoin("protections","protections.id","topic_protection.id_protection")
            ->leftjoin("lecturer_protection","lecturer_protection.id_protection","protections.id")
            ->leftjoin(DB::raw("lecturers as l"), "lecturer_protection.id_lecturer","l.id")
            ->select(["topic_protection.*","lecturers.name_lecturer","protections.time_start","protections.time_end","topics.name_topic","topics.describe",DB::raw("l.name_lecturer as lec_pro_name")])->get();
        $listL = [];
        if(count($arrdata) > 0)
        {
            foreach ($arrdata as $item)
            {
                $listL[] = $item->lec_pro_name;
            }
        }
        else{
//            return Response::json(array(
//                'code'      =>  403,
//                'message'   =>  "Bạn chưa đăng ký chủ đề"
//            ), 403);
            return response()->redirectToRoute('student.dangkytopic');
        }

        $data = [
          // ten topic
            //ten giang vien
            //dọt dang ky
            //thoi gian bat dau
            //thoi gian ket thuc
            //diem so
            // tinh trang
            // qua -khong qua
            // danh sach giang vien bao ve
            "name_topic" => $arrdata[0]->name_topic,
            "name_lecturer" => $arrdata[0]->name_lecturer,
            "time_start" => $arrdata[0]->time_start,
            "time_end" => $arrdata[0]->time_end,
            "scores" => $arrdata[0]->scores,
            "acceptance" => $arrdata[0]->acceptance, // dang bao ve
            "ok" => $arrdata[0]->ok, // Được chấp nhân hương dẫn
            "pass" => $arrdata[0]->pass,
            "time_run" => $arrdata[0]->time_run,
            "place" => $arrdata[0]->place,
            "listLec" => $listL,
            "describe" => $arrdata[0]->describe
        ];
        return view("student.topic",["data" => (object)$data]);
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
}

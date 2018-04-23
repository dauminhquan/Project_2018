<?php

namespace App\Http\Controllers\Api\Extent;

use App\Models\TopicProtection;
use App\Services\StudentServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}

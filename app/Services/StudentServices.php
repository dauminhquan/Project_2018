<?php
/**
 * Created by PhpStorm.
 * User: quand
 * Date: 4/23/2018
 * Time: 4:18 PM
 */

namespace App\Services;


use App\Models\Topic;

class StudentServices
{
    public function getTopics()
    {
        return Topic::where("accept",1)->join("lecturers","lecturers.id","topics.id_lecturer")->select("topics.*","lecturers.name_lecturer")->get();
    }
    public function getTopic($id)
    {
        return Topic::where("accept",1)->where("topics.id",$id)->join("lecturers","lecturers.id","topics.id_lecturer")->select("topics.*","lecturers.name_lecturer")->limit(1)->first();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function topics()
    {
        return view("lecturer.topics");
    }
    public function topicId($id)
    {
        return view("lecturer.topic",["id"=>$id]);
    }
}

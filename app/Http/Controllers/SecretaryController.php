<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    //
    public function lecturersManage()
    {
        return view("secretary.lecturersManage");
    }
    public function studentsManage()
    {
        return view("secretary.studentsManage");
    }
    public function fieldsManage(){
        return view("secretary.fieldManage");
    }
}

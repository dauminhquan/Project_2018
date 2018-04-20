<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function protectionManage()
    {
        // quản lý đợt bảo vệ
        return view("secretary.lecturersManage");
    }
    public function topicProtectionManage()
    {
        // cho điểm
        return view("secretary.studentsManage");
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\LecturerProtection;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function protectionManage()
    {
        // quản lý đợt bảo vệ
        $pro = new ProfileService();
        $data = $pro->getProtections();
        return view("admin.protectionManage",["data" => $data]);
    }
    public function protectionManage_id($id)
    {
        //Thời gian bắt đầu
        // Thời gian kết thúc
        // Danh sách đề tài
        // Danh sách giảng viên phản biện
        // Thông tin giảng viên hướng dẫn
        //Thông tin sinh viên thực hiện
        // Dùng table
        $pro = new ProfileService();
        $lecturers = LecturerProtection::where("id_protection",$id)->get();
        $listLecturer =[];
        foreach ($lecturers as $item)
        {
            $listLecturer[] = $item->id_lecturer;
        }
        $listLecturer = implode(",",$listLecturer);
        return view("admin.protectionManage_id",["data" => (object)$pro->getProtection($id),"listLecturer" => $listLecturer]);
    }
    public function topicProtectionManage()
    {
        // cho điểm
        return view("secretary.topicProtectionManage");
    }

}

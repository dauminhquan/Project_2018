<?php

namespace App\Http\Controllers;

use App\Mail\SendPassword;
use App\Models\Department;
use App\Models\Protection;
use App\Models\TopicProtection;
use App\Services\ProfileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function lecturer(){
        $pro =  new ProfileService();
        $lec = $pro->getLecturersInfo();
        Excel::create('lecturers', function($excel) use ($lec) {
            $excel->sheet("sheet_1",function ($sheet) use ($lec)
            {
                $sheet->fromArray($lec);
            });
        })->download('xls');
    }
    public function student(){
        $pro =  new ProfileService();
        $lec = $pro->getStudentsInfo();
        Excel::create('students', function($excel) use ($lec) {
            $excel->sheet("sheet_1",function ($sheet) use ($lec)
            {
                $sheet->fromArray($lec);
            });
        })->download('xls');
    }
    public function topic(){
        $pro =  new ProfileService();
        $lec = $pro->getTopics();
        Excel::create('topics', function($excel) use ($lec) {
            $excel->sheet("sheet_1",function ($sheet) use ($lec)
            {
                $sheet->fromArray($lec);
            });
        })->download('xls');
    }

    public function testEmail()
    {
        $em = new SendPassword("admin","admin");
//        return $em->build();
        Mail::to( "dauminhquantlu@gmail.com")->send( new SendPassword("admin","admin"));
    }
    public function statistical()
    {
        $sv_dangky = TopicProtection::join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();
        // lay danh sach sinh vien đăng ký theo khoa
        $sv_dangkybv = TopicProtection::where('topic_protection.acceptance',1)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();
        $sv_pass = TopicProtection::where('scores','>',5)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();

        $dtb = TopicProtection::where('topic_protection.acceptance',1)->where('scores','!=',-1)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('AVG(topic_protection.scores) as avg'))->get();

        // lấy tất cả khoa ở trong trường

        $khoa = Department::get();

        $data = [];

        foreach ($khoa as $item)
        {
            $data[] = (Object)[
                'id' => $item->id,
                'department_name' => $item->department_name,
                'sv_dangky' => $this->get_dangkybv($item,$sv_dangky),
                'sv_dangkybv' => $this->get_dangkybv($item,$sv_dangkybv),
                'sv_pass' => $this->getsv_pass($item,$sv_pass),
                'dtb' => $this->get_avg($item,$dtb)
            ];
        }



        //
        // lượng sinh viên túng tuyển theo khoa

        // lương
        return view("statistical",['data' => $data]);
    }


    public function statistical_excel(){
        $sv_dangky = TopicProtection::join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();
        // lay danh sach sinh vien đăng ký theo khoa
        $sv_dangkybv = TopicProtection::where('topic_protection.acceptance',1)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();
        $sv_pass = TopicProtection::where('scores','>',5)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('COUNT(students.id) as count_sv'))->get();

        $dtb = TopicProtection::where('topic_protection.acceptance',1)->where('scores','!=',-1)->join('students','students.id','topic_protection.id_student')
            ->join('departments','departments.id','students.id_department')->groupBy('departments.id','department_name')->select('departments.id','departments.department_name',DB::raw('AVG(topic_protection.scores) as avg'))->get();

        // lấy tất cả khoa ở trong trường

        $khoa = Department::get();

        $data = [];

        foreach ($khoa as $item)
        {
            $data[] = [
                'id' => $item->id,
                'Tên khoa' => $item->department_name,
                'Số sinh viên đăng ký khóa luận' => $this->get_dangky($item,$sv_dangky),
                'Số sinh viên đăng ký bảo vệ' => $this->get_dangkybv($item,$sv_dangkybv),
                'Số sinh viên bảo vệ thành công' => $this->getsv_pass($item,$sv_pass),
                'Điểm trung bình của khoa' => $this->get_avg($item,$dtb)
            ];
        }




        return Excel::create('statistical', function($excel) use($data) {
            $excel->sheet('statistical', function($sheet) use($data) {
                $sheet->fromArray($data);
            });

        })->download('xls');
    }

    private function get_dangky($item,$sv_dangky)
    {
        if(count($sv_dangky) == 0)
        {
            return 0;
        }
        foreach ($sv_dangky as $value)
        {
            if($value->id == $item->id)
            {
                return $value->count_sv;
            }
        }
        return 0;
    }
    private function get_dangkybv($item,$sv_dangky)
    {
        if(count($sv_dangky) == 0)
        {
            return 0;
        }
        foreach ($sv_dangky as $value)
        {
            if($value->id == $item->id)
            {
                return $value->count_sv;
            }
        }
        return 0;
    }
    private function getsv_pass($item,$sv_pass)
    {
        if(count($sv_pass) == 0)
        {
            return 0;
        }
        foreach ($sv_pass as $value)
        {
            if($value->id == $item->id)
            {
                return $value->count_sv;
            }
        }
        return 0;
    }
    private function get_avg($item,$dtb)
    {
        if(count($dtb) == 0)
        {
            return 0;
        }
        foreach ($dtb as $value)
        {
            if($value->id == $item->id)
            {
                return $value->avg;
            }
        }
        return 0;
    }

}

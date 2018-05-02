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

    public function testEmail()
    {
        $em = new SendPassword("admin","admin");
//        return $em->build();
        Mail::to( "dauminhquantlu@gmail.com")->send( new SendPassword("admin","admin"));
    }
    public function statistical()
    {
        return view("statistical");
    }

}

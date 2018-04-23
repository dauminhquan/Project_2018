<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
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

}

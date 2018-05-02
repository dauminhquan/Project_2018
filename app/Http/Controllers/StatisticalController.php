<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Protection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function getData(){
        $arr_id_protection = Protection::get();
        $data = [];
        foreach ($arr_id_protection as $item)
        {
            $data[] = [
                "id" => $item->id,
                "time_start" => $item->time_start,
                "time_end" => $item->time_end,
                "value" =>
            Department::join("students","students.id_department","departments.id")->join("topic_protection","topic_protection.id_student","students.id")
                ->groupBy("departments.id","departments.department_name")
                ->join("protections","protections.id","topic_protection.id_protection")
                ->where("protections.id",$item->id)
                ->select("departments.department_name","departments.id",DB::raw("sum(topic_protection.pass) as sum"))->get()
            ];
        }
        return ["departments" => Department::get(),
            "data" => $data];
    }

}

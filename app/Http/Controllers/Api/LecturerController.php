<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LecturerRequest;
use App\Services\ProfileService;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LecturerController extends Controller
{

    public function index()
    {
        $profile = new ProfileService();
        return $profile->getLecturersInfo();
    }


    public function create()
    {

    }


    public function store(LecturerRequest $request)
    {
        //
        $profile = new ProfileService();

        if($request->hasFile("excel"))
        {
         return $profile->addLecturers( Excel::load($request->file("excel"))->get());
        }
        else{

            $profile->addLecturer($request);
        }

        return ["sc" => true];
    }


    public function show($id)
    {
        //
        $profile = new ProfileService();
        return $profile->getLecturerInfo($id);

    }


    public function edit($id)
    {
        //
    }


    public function update(LecturerRequest $request, $id)
    {
        //

        $profile = new ProfileService();
        return $profile->updateLecturer($id,$request);

    }


    public function destroy($id)
    {
        $profile = new ProfileService();
        $profile->deleteLecturer($id);
        return ["sc" => true];
    }
}

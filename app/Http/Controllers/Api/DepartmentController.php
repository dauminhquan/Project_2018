<?php

namespace App\Http\Controllers\Api;

use App\Services\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DepartmentController extends Controller
{

    public function index()
    {
        $profile = new ProfileService();
        return $profile->getDepartments();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

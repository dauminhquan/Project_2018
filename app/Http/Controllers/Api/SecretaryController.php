<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SecretaryRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecretaryController extends Controller
{

    public function index()
    {

        $profile = new ProfileService();
        return $profile->getSecretariesInfo();
    }


    public function create()
    {

    }


    public function store(SecretaryRequest $request)
    {

        $profile = new ProfileService();
         $profile->addSecretary($request);
         return ["sc" => true];
    }


    public function show($id)
    {

        $profile = new ProfileService();
        return $profile->getSecretaryInfo($id);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

        $profile = new ProfileService();
        return $profile->updateSecretary($request);
    }


    public function destroy($id)
    {
        $profile = new ProfileService();
        return $profile->deleteSecretary($id);
    }
}

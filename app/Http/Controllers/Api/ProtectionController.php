<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProtectionRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProtectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = new ProfileService();
        return $pro->getProtections();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProtectionRequest $request)
    {
        $pro = new ProfileService();
        return $pro->addProtection($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = new ProfileService();
        return $pro->getProtection($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProtectionRequest $request, $id)
    {
        $pro = new ProfileService();
        return $pro->updateProtection($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProtectionRequest $request,$id)
    {
        $pro = new ProfileService();
        return $pro->deleteProtection($id,$request);
    }
}

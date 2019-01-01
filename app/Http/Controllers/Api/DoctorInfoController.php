<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DoctorInfo\DoctorInfoCollection;
use App\Http\Resources\DoctorInfo\DoctorInfoResource;
use App\Model\DoctorInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorInfoController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoctorInfoCollection::collection(DoctorInfo::paginate(6));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorInfo $doctorInfo)
    {
        return new DoctorInfoResource($doctorInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorInfo $doctorInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorInfo $doctorInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoctorInfo  $doctorInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorInfo $doctorInfo)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\PatientInfo\PatientInfoCollection;
use App\Http\Resources\PatientInfo\PatientInfoResource;
use App\Model\PatientInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PatientInfoController extends Controller
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
        return PatientInfoCollection::collection(PatientInfo::paginate(20));
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
     * @param  \App\PatientInfo  $patientInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PatientInfo $patientInfo)
    {
        return new PatientInfoResource($patientInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientInfo  $patientInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientInfo $patientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientInfo  $patientInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientInfo $patientInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientInfo  $patientInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientInfo $patientInfo)
    {
        //
    }
}

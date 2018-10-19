<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Appoinment;
use App\Http\Resources\Appoinment\AppoinmentCollection;
use App\Http\Resources\Appoinment\AppoinmentResource;

class AppoinmentController extends Controller
{
    public function __construct(){
       // $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppoinmentCollection::collection(Appoinment::paginate(20));
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
        $this->validate($request, [
            'title' => 'required|string|min:4',
            'guest_id' => 'required|integer',
            'host_id' => 'required|integer',
            'appoinment_time' => 'required|string',

        ]);


        $appoinment = new Appoinment();
        $appoinment_date = date('Y-m-d H:i:s',strtotime($request->appoinment_time));



        $appoinment->title = $request->title;
        $appoinment->guest_id = $request->guest_id;
        $appoinment->host_id = $request->host_id;
        $appoinment->appoinment_time = $appoinment_date;


        $appoinment->save();

        return response([
            'data' => new AppoinmentResource($appoinment)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appoinment::findOrFail($id);
        return new AppoinmentResource($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appoinment::findOrFail($id);

        $appointment->update($request->all());

        return response([
            'data' => new AppoinmentRsource($appointment)
        ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appoinment::findOrFail($id);

        $appointment->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}

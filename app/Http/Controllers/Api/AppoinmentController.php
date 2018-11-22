<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Appoinment;
use App\Http\Resources\Appoinment\AppoinmentCollection;
use App\Http\Resources\Appoinment\AppoinmentResource;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
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


        return AppoinmentCollection::collection(Appoinment::paginate(20));

    }

    public function appointmentList($role_id=0, $user_id=0)
    {
        if($role_id ==2){

            return AppoinmentCollection::collection(Appoinment::where('doctor_id', '=', $user_id)->paginate(20));

        }

        return AppoinmentCollection::collection(Appoinment::where('patient_id', '=', $user_id)->paginate(20));

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
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer',
            'appoinment_time' => 'required|string'


        ]);

        $appoinment = new Appoinment();
        $appoinment_date = date('Y-m-d H:i:s',strtotime($request->appoinment_time));



        $appoinment->title = $request->title;
        $appoinment->doctor_id = $request->doctor_id;
        $appoinment->patient_id = $request->patient_id;
        $appoinment->appoinment_time = $appoinment_date;
        $appoinment->patient_secret_key = $this->generateRandomString();
        $appoinment->doctor_secret_key = $this->generateRandomString();


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
    public function show(Appoinment $appointment)
    {

        return new AppoinmentResource($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Appoinment $appoinment)
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


    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

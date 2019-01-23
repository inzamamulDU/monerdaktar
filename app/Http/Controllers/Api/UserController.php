<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Web\UserUpdateRequest;
use App\Model\PatientInfo;
use App\Model\DoctorInfo;
use App\Model\DoctorAvailability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\User;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Rules\Api\UniqueDataRule;

class UserController extends Controller
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
        return UserCollection::collection(User::paginate(20));
    }

    public function getUserDetails()
    {

       return Auth::guard('api')->user();

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
     * @param  \Illuminate\Http\Request  $request:
     * @return \Illuminate\Http\Response
     */
    public function store(UserUpdateRequest $request)
    {



        $user = new User();


        $user->password= bcrypt($request->get("password"));
        $user->email= $request->get("email");

        $user->phone= $request->get("phone");
        $user->role_id= $request->get("role_id");
        $user->name= $request->get("name");

        if($request->has("photo")) {
            $user->photo = $request->get("photo");
        }


        $user->save();



        if($user->role->id==2) {
            $doctorInfo = new DoctorInfo();


            $doctorInfo->address = $request->get("address");
            $doctorInfo->postcode = $request->get("postcode");
            $doctorInfo->city = $request->get("city");
            $doctorInfo->country = $request->get("country");


            $doctorInfo->user_id = $user->id;


            if ($request->has("designation")) {
                $doctorInfo->designation = $request->get("designation");

            }

            if ($request->has("institute")) {
                $doctorInfo->institute = $request->get("institute");

            }

            if ($request->has("degree")) {
                $doctorInfo->degree = $request->get("degree");

            }

            if ($request->has("available_time")) {
                $doctorInfo->available_time = $request->get("available_time");

            }

            if ($request->has("biography")) {
                $doctorInfo->biography = $request->get("biography");

            }

            if($request->has("is_consultant")) {
                $doctorInfo->is_consultant = $request->get("is_consultant");

            }

            if($request->has("is_psychotherapist")) {
                $doctorInfo->is_psychotherapist = $request->get("is_psychotherapist");

            }



            $doctorInfo->save();

            $user->doctor_info_id = $doctorInfo->id;
            $user->save();
            if($request->has('start_time')) {



                $statTime =$request->get('start_time');
                $endTime = $request->get('end_time');
                $day = $request->get('day');



                foreach ($statTime as $key => $val) {


                    $doctorAvailability = new DoctorAvailability();

                    $doctorAvailability->doctor_info_id = $doctorInfo->id;
                    $doctorAvailability->start_time= $statTime[$key];
                    $doctorAvailability->end_time= $endTime[$key];
                    $doctorAvailability->day= $day[$key];
                    $doctorAvailability->save();
                }
            }
        }


        elseif($user->role->id==3) {
            $patientInfo= new PatientInfo();


            $patientInfo->address= $request->get("address");
            $patientInfo->postcode= $request->get("postcode");
            $patientInfo->city= $request->get("city");
            $patientInfo->country= $request->get("country");

            $patientInfo->user_id = $user->id;

            $patientInfo->save();

            $user->patient_info_id = $patientInfo->id;
            $user->save();
        }


        return response([
            'data' => new UserResource($user)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Use  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $userId = isset($user) ? $user->id : null;

        $this->validate($request, [
            'name' => 'required|string',
            /*'password' => 'required|string|confirmed|min:8',*/
           'email' => [new UniqueDataRule($user->email)],
            'phone' => [new UniqueDataRule($user->phone)],
           /*'phone' =>  [function ($attribute, $value, $fail) { if ($value <= 10) { $fail(':attribute needs more cowbell!'); } }],*/

            /*'phone' => 'required|string|unique:users',*/


        ]);



        $patientInfoData = $request->patientInfo;

        $doctorInfoData = $request->doctorInfo;




        if(count($patientInfoData) > 0){



            $user->patientInfo()->update($patientInfoData);
        }

         if(count($doctorInfoData) >0){

             $user->doctorInfo()->update($doctorInfoData);
         }

        $user->update($request->all());

        return response([
            'data' => new UserResource($user)
        ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {

        $user->delete();
        return response([
            'message' => $user->name." has been deleted!"
        ],Response::HTTP_ACCEPTED);
    }
}

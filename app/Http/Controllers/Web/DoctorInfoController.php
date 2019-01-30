<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Mockery\Exception;
use App\Model\User;
use App\Model\Web\Common;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use Image;
use File;
use App\Http\Requests\Web\UserUpdateRequest;
use App\Http\Resources\User\DoctorInfoCollection;
use App\Http\Resources\User\DoctorInfoResource;
use Illuminate\Support\Facades\Route;


class DoctorInfoController extends Controller
{
    public function __construct()
    {
       /* $this->middleware('auth:api');*/
    }


    public function  index()
    {

        $apiUrl = route('doctorinfo.getdoctors');

        $param_url = route('doctorInfo.getDoctorInfoList', ['limit'=>6]);

        $request= Request::create($apiUrl,'POST',['url'=> $param_url]);


        $response = $this->getDoctorList($request);

        return view('doctorinfo.show',['results' => $response]);

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show()
    {



    }


    public function getOnlineDoctors(Request $request)
    {


        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];



        $apiUrl = route('doctorInfo.getSelectedDoctorInfo');


        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $errorResponse = null;
        $clientExceptionCode = null;
        $results= null;

        //response = $client->request('POST', [ 'headers' => [ 'Content-Type' => 'application/x-www-form-urlencoded' ], 'form_params' => $fruits ]);


        $form_params = [
            'online_users' => array_unique($request->get("online_users"))



        ];


        try {
            $response = $client->post($apiUrl, [
                'form_params' => $form_params
            ]);


            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $jsonResponse=$exception;


        }



        return view('doctorinfo.onlineusers',['results' => $results]);


    }

    public function getDoctorList(Request $request)
    {




        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];


        $apiUrl = $request->get('url');



        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $errorResponse = null;
        $clientExceptionCode = null;
        $results= null;


        try {
            $response = $client->get($apiUrl);
            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $errorResponse=$exception;


        }

        //$results=null;

        return view('doctorinfo.list',['results' => $results]);
    }



    public function edit(){


    }

    public function update(Request $request,User $user){



    }
}

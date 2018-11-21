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


class DoctorInfoController extends Controller
{
    public function __construct()
    {
       /* $this->middleware('auth:api');*/
    }


    public function  index($limit=0, $page=0)
    {
        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';

        if($page==0) {
            $apiUrl = env('API_URL') . 'api/doctor-info';
        } else {
            $apiUrl = env('API_URL') . 'api/doctor-info/' . $limit.'?page='.$page;
        }




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




        return view('doctorinfo.doctorlist',['results'=>$results]);

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

    public function getDoctors($limit=0 , $page =0)
    {



    }



    public function edit(){


    }

    public function update(Request $request,User $user){



    }
}

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


        $apiUrl = env('API_URL') . 'doctorinfo/getdoctors';
        $param_url = env('API_URL') . 'api/doctor-info';

        $request= Request::create($apiUrl,'POST',['url'=> $param_url]);


        $response = $this->getDoctorList($request);

        $response = preg_replace( "/\r|\n/", "", $response );
        $response = str_replace("'", '"', $response);

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

    public function getDoctorList(Request $request)
    {




        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';

        if($request!=null){
            $apiUrl = $request->get('url');
        } else {
            $apiUrl = env('API_URL') . 'api/doctor-info';
        }

       //





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

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


class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function create()
    {
/*
        $article = Article::get();
        foreach ($article as $key=>$value){
            foreach($value->comments as $key1=>$value1){
                dd($value1->user);
            }

        }*/

        return view('user.create');
    }

    public function store(UserUpdateRequest $request)
    {

       /* $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
            'email' => 'required|string|unique:users',
            'phone' => 'required|string|unique:users',
            'photo' => 'image||mimes:jpeg,png,jpg',
            'role_id' => 'required'

        ]);*/

        dd($request->all());


        //$loggedUserID= Auth::user()->id;
        $apiToken= env('API_TOKEN');
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        /*dd($loggedUserID);*/

        $form_params = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'phone' => $request->get("phone"),
            'password' => $request->get("password"),
            'password_confirmation' => $request->get("password_confirmation"),
            'address' => $request->get("address"),
            'postcode' => $request->get("postcode"),
            'city' => $request->get("city"),
            'country' => $request->get("country"),
            'role_id' => $request->get("role_id")



        ];

        if($request->has('photo')){
            $image = $request->file('photo');
            $phone = time().$request->input('phone');
            $imageName = $phone.".".$image->getClientOriginalExtension();

            $upload = new Common();
            $imageUpload = $upload->uploadImage($phone,$image,'/images/userphoto/');

            $form_params['photo']=$imageName;

        }

        if($request->has("designation")) {
            $form_params['designation'] = $request->get("designation");

        }

        if($request->has("institute")) {
            $form_params['institute'] = $request->get("institute");

        }

        if($request->has("degree")) {
            $form_params['degree'] = $request->get("degree");

        }

        if($request->has("available_time")) {
            $form_params['available_time'] = $request->get("available_time");

        }

        if($request->has("biography")) {
            $form_params['biography'] = $request->get("biography");

        }



        $apiUrl= env('API_URL').'api/user';
        //$apiUrl= 'http://localhost/api/user';


        /*dd( $form_params);*/
        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $jsonResponse = null;
        $clientExceptionCode = null;
        $results= null;


        try {
            $response = $client->post($apiUrl, [
                'form_params' => $form_params
            ]);
            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $jsonResponse=$exception;


        }


        dd([$jsonResponse,$results]);

        if($results){

            if (Auth::attempt(['email' => $request->get("email"), 'password' => $request->get("password")])) {
                return redirect("/home");
            }

        }


        //$results = json_decode($response->getBody()->getContents());

        return redirect(route('user.create'))->with('fail','true')->with('message',$jsonResponse->getMessage()['message']);

    }

    public function show()
    {
        //$apiToken= "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFlNDg4MjEwMzdmMTcyYWRjNGE2YjllODEyYjY4ZjkzYzI4OTVhMmY4MmQ3N2FmZmQxMjRhZGM2NWExN2ZkZWMwYzY5NTFiOGM0Zjk0YjBiIn0.eyJhdWQiOiIxIiwianRpIjoiMWU0ODgyMTAzN2YxNzJhZGM0YTZiOWU4MTJiNjhmOTNjMjg5NWEyZjgyZDc3YWZmZDEyNGFkYzY1YTE3ZmRlYzBjNjk1MWI4YzRmOTRiMGIiLCJpYXQiOjE1Mzk0MjYzMjUsIm5iZiI6MTUzOTQyNjMyNSwiZXhwIjoxNTcwOTYyMzI1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.u1ceEXJCiiO6x2LLjh55Ej7er9gZ5l1xt99f2nAQfhElCCU_8-9mpSgGEYZvgIkUsoDc_UZifhEiwExoh33ilHrQ6VvVHn-5NF24pxGTmk3wHYHHFLOvqgx66ouRP8zbPQVfzs-Wbzt_Sshbm_I4m9dkC5zeph9Bt0Q_xU2aEqH8pKseaUIfWypNju06by4Si6Qd3-UaWywHzWmWn5e-UkGDbqYwdEB3H02NTVuy7yTEa4guq45pwwH1fn8Z3ZP6zAOEgSol8brsYTIA81DsEzMmbH3tx6CapUVfN0HwsSq0V4NuK2fbHyTlZ7ajFAAJOZMcBkDkDNb9k-Vj5YBSGRW4xgL2Ingv4MBzN7KroEWuxZbMIXv8mY4wjb04BzsFkWkMNCDV487VX5MhkbGVvi5uSaUDu6mMghlpP9zkputp9nZP_9I_g17ktNq8Xr0pbw6Ac3e7VbNqDNCkqi5E_7u4kIUJnDgIEwzPBUvZa0dh2t6k1UOK8YfVC-ujh2N5n9UoHJrQ_Ly-huDtEM2HSoMxSlxeZBpsxRC5Lr8MTifMj-CRREInyhGyoQ1GYE9metF9H_-ll_86fd6rFG5UsAzo2WapohBWbMFpnxrPsUJ4XxxIzfbufeqvEOyoKq4Nlou5sACgIzvuLNldqxclnpUqx3wWKMjcI7Zv94OmgGo";
        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';
        $apiUrl= env('API_URL').'api/user';


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


        return view('user.show',['results'=>$results]);



    }

    public function getDoctors($limit=0 , $page =0)
    {
        //$apiToken= "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFlNDg4MjEwMzdmMTcyYWRjNGE2YjllODEyYjY4ZjkzYzI4OTVhMmY4MmQ3N2FmZmQxMjRhZGM2NWExN2ZkZWMwYzY5NTFiOGM0Zjk0YjBiIn0.eyJhdWQiOiIxIiwianRpIjoiMWU0ODgyMTAzN2YxNzJhZGM0YTZiOWU4MTJiNjhmOTNjMjg5NWEyZjgyZDc3YWZmZDEyNGFkYzY1YTE3ZmRlYzBjNjk1MWI4YzRmOTRiMGIiLCJpYXQiOjE1Mzk0MjYzMjUsIm5iZiI6MTUzOTQyNjMyNSwiZXhwIjoxNTcwOTYyMzI1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.u1ceEXJCiiO6x2LLjh55Ej7er9gZ5l1xt99f2nAQfhElCCU_8-9mpSgGEYZvgIkUsoDc_UZifhEiwExoh33ilHrQ6VvVHn-5NF24pxGTmk3wHYHHFLOvqgx66ouRP8zbPQVfzs-Wbzt_Sshbm_I4m9dkC5zeph9Bt0Q_xU2aEqH8pKseaUIfWypNju06by4Si6Qd3-UaWywHzWmWn5e-UkGDbqYwdEB3H02NTVuy7yTEa4guq45pwwH1fn8Z3ZP6zAOEgSol8brsYTIA81DsEzMmbH3tx6CapUVfN0HwsSq0V4NuK2fbHyTlZ7ajFAAJOZMcBkDkDNb9k-Vj5YBSGRW4xgL2Ingv4MBzN7KroEWuxZbMIXv8mY4wjb04BzsFkWkMNCDV487VX5MhkbGVvi5uSaUDu6mMghlpP9zkputp9nZP_9I_g17ktNq8Xr0pbw6Ac3e7VbNqDNCkqi5E_7u4kIUJnDgIEwzPBUvZa0dh2t6k1UOK8YfVC-ujh2N5n9UoHJrQ_Ly-huDtEM2HSoMxSlxeZBpsxRC5Lr8MTifMj-CRREInyhGyoQ1GYE9metF9H_-ll_86fd6rFG5UsAzo2WapohBWbMFpnxrPsUJ4XxxIzfbufeqvEOyoKq4Nlou5sACgIzvuLNldqxclnpUqx3wWKMjcI7Zv94OmgGo";
        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';

        if($page==0) {
            $apiUrl = env('API_URL') . 'api/user/getAllDoctors/' . $limit;
        } else {
            $apiUrl = env('API_URL') . 'api/user/getAllDoctors/' . $limit.'?page='.$page;
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




        return view('user.doctorlist',['results'=>$results]);



    }



    public function edit(){

        $loggedUserID= Auth::user()->id;
        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';
        $apiUrl= env('API_URL').'api/user/'.$loggedUserID;


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



        if($results) {
            return view('user.edit', ['results' => $results]);
        }

        return redirect(route('/'));
    }

    public function update(Request $request,User $user){



        $loggedUserID=Auth::user()->id;
        $apiToken= env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        /*dd($loggedUserID);*/




        $form_params = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'phone' => $request->get("phone"),


        ];

        if($request->has('photo')){
            $image = $request->file('photo');
            $phone = time().$request->input('phone');
            $imageName = $phone.".".$image->getClientOriginalExtension();

            $upload = new Common();
            $imageUpload = $upload->updateImage($phone,$image,'/images/userphoto/');

            $form_params['photo']=$imageName;

        }

        if($request->has('password') && $request->get('password')!='' ) {
            $form_params['password'] = $request->get("password");
            $form_params['password_confirmation'] = $request->get("password_confirmation");
        }




        if(Auth::user()->role_id ==2) {

            $doctorInfo =[];

            //$form_params['patientInfo'] = $patientInfo;

            if($request->has('address')) {
                $doctorInfo['address'] = $request->get('address');
            }

            if($request->has('postcode')) {
                $doctorInfo['postcode'] = $request->get('postcode');
            }

            if($request->has('city')) {
                $doctorInfo['city'] = $request->get('city');
            }

            if($request->has('country')) {
                $doctorInfo['country'] = $request->get('country');
            }

            if($request->has('designation')) {
                $doctorInfo['designation'] = $request->get('designation');
            }


            if($request->has('institute')) {
                $doctorInfo['institute'] = $request->get('institute');
            }



            if($request->has('degree')) {
                $doctorInfo['degree'] = $request->get('degree');
            }

            if($request->has('available_time')) {
                $doctorInfo['available_time'] = $request->get('available_time');
            }

            if($request->has('biography')) {
                $doctorInfo['biography'] = $request->get('biography');
            }





            $form_params['doctorInfo'] = $doctorInfo;

        }else if(Auth::user()->role_id ==3) {


            $patientInfo =[];

            //$form_params['patientInfo'] = $patientInfo;

            if($request->has('address')) {
                $patientInfo['address'] = $request->get('address');
            }

            if($request->has('postcode')) {
                $patientInfo['postcode'] = $request->get('postcode');
            }

            if($request->has('city')) {
                $patientInfo['city'] = $request->get('city');
            }

            if($request->has('country')) {
                $patientInfo['country'] = $request->get('country');
            }


            $form_params['patientInfo'] = $patientInfo;



        }

        $apiUrl= env('API_URL').'api/user/'.$loggedUserID;
        //$apiUrl= 'http://localhost/api/user';

        // dd([$apiUrl,$form_params]);
        /*dd( $form_params);*/
        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $jsonResponse = null;
        $clientExceptionCode = null;
        $results= null;

        try {
            $response = $client->put($apiUrl, [
                'form_params' => $form_params


            ]);
            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $jsonResponse=$exception;


        }



        return redirect(route('user.edit'));
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Model\Appoinment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Mockery\Exception;
use App\Model\User;
use App\Model\Web\Common;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';
        $apiUrl=route('doctorInfo.getDoctorInfoList', ['limit'=>0]);;



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

        $apiUrl = env('API_URL') . 'appoinment/get-appointments';
        $param_url = env('API_URL') . 'api/appoinment/'.Auth::user()->role_id.'/'.Auth::user()->id;

        $articleListReq= Request::create($apiUrl,'POST',['url'=> $param_url]);


        $articleListRes = $this->getAppointmentList($articleListReq);




        return view('appoinment.create',['results'=>$results,'html_data'=>$articleListRes]);
    }

    public function store(Request $request)
    {



        $this->validate($request, [
            'title' => 'required|string|min:4',
            'type' => 'required|string',
            'doctor_id' => 'required|integer',
            'start_time' => 'required|string',
            'end_time' => 'required|string'


        ]);



        $apiToken= env('API_TOKEN');//"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFlNDg4MjEwMzdmMTcyYWRjNGE2YjllODEyYjY4ZjkzYzI4OTVhMmY4MmQ3N2FmZmQxMjRhZGM2NWExN2ZkZWMwYzY5NTFiOGM0Zjk0YjBiIn0.eyJhdWQiOiIxIiwianRpIjoiMWU0ODgyMTAzN2YxNzJhZGM0YTZiOWU4MTJiNjhmOTNjMjg5NWEyZjgyZDc3YWZmZDEyNGFkYzY1YTE3ZmRlYzBjNjk1MWI4YzRmOTRiMGIiLCJpYXQiOjE1Mzk0MjYzMjUsIm5iZiI6MTUzOTQyNjMyNSwiZXhwIjoxNTcwOTYyMzI1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.u1ceEXJCiiO6x2LLjh55Ej7er9gZ5l1xt99f2nAQfhElCCU_8-9mpSgGEYZvgIkUsoDc_UZifhEiwExoh33ilHrQ6VvVHn-5NF24pxGTmk3wHYHHFLOvqgx66ouRP8zbPQVfzs-Wbzt_Sshbm_I4m9dkC5zeph9Bt0Q_xU2aEqH8pKseaUIfWypNju06by4Si6Qd3-UaWywHzWmWn5e-UkGDbqYwdEB3H02NTVuy7yTEa4guq45pwwH1fn8Z3ZP6zAOEgSol8brsYTIA81DsEzMmbH3tx6CapUVfN0HwsSq0V4NuK2fbHyTlZ7ajFAAJOZMcBkDkDNb9k-Vj5YBSGRW4xgL2Ingv4MBzN7KroEWuxZbMIXv8mY4wjb04BzsFkWkMNCDV487VX5MhkbGVvi5uSaUDu6mMghlpP9zkputp9nZP_9I_g17ktNq8Xr0pbw6Ac3e7VbNqDNCkqi5E_7u4kIUJnDgIEwzPBUvZa0dh2t6k1UOK8YfVC-ujh2N5n9UoHJrQ_Ly-huDtEM2HSoMxSlxeZBpsxRC5Lr8MTifMj-CRREInyhGyoQ1GYE9metF9H_-ll_86fd6rFG5UsAzo2WapohBWbMFpnxrPsUJ4XxxIzfbufeqvEOyoKq4Nlou5sACgIzvuLNldqxclnpUqx3wWKMjcI7Zv94OmgGo";
        //env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        /*dd($loggedUserID);*/

        $form_params = [
            'title' => $request->get("title"),
            'type' => $request->get("type"),
            'doctor_id' => $request->get("doctor_id"),
            'start_time' => date('Y-m-d H:i:s',strtotime($request->get("start_time"))),
            'end_time' => date('Y-m-d H:i:s',strtotime($request->get("end_time"))),
            'patient_id' => Auth::user()->id
        ];


        $apiUrl= env('API_URL').'api/appoinment';
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




        if($results){

            return redirect()->back()->with('success','Your appointment created successfully');

        }

        return redirect()->back()->with('error','appointment creation failed');


    }

    public function show()
    {



    }








    public function edit(){


    }

    public function update(Request $request,User $user){


    }

    public function destroy(Request $request, User $user)
    {

    }


    public function ongoing($id)
    {

        $appointment = Appoinment::findOrFail($id);
        if(Auth::user()->role_id ==2 && Auth::user()->id!=$appointment->doctor_id){
            return redirect()->back()->with('error','No Available Appointment');
        }

        if(Auth::user()->role_id ==3 && Auth::user()->id!=$appointment->patient_id){
            return redirect()->back()->with('error','No Available Appointment');
        }


        if(Auth::user()->role_id ==2) {

            $results=['my_peer_id' => $appointment->doctor_secret_key, 'remote_peer_id' => $appointment->patient_secret_key];
        } else {
            $results=['my_peer_id' => $appointment->patient_secret_key, 'remote_peer_id' => $appointment->doctor_secret_key];
        }


        return view('appoinment.ongoing',['results'=>$results]);
    }

    public function getAppointmentList(Request $request)
    {




        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';

        $apiUrl = $request->get('url');

        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $errorResponse = null;
        $clientExceptionCode = null;
        $results= null;

        try {
            $response = $client->get($apiUrl);
            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $clientExceptionCode=$exception;


        }



        //$results=null;

        return view('appoinment.list',['appointmentList' => $results]);
    }


}

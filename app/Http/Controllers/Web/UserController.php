<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Mockery\Exception;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        //$loggedUserID= Auth::user()->id;
        $apiToken= env('API_TOKEN');//"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFlNDg4MjEwMzdmMTcyYWRjNGE2YjllODEyYjY4ZjkzYzI4OTVhMmY4MmQ3N2FmZmQxMjRhZGM2NWExN2ZkZWMwYzY5NTFiOGM0Zjk0YjBiIn0.eyJhdWQiOiIxIiwianRpIjoiMWU0ODgyMTAzN2YxNzJhZGM0YTZiOWU4MTJiNjhmOTNjMjg5NWEyZjgyZDc3YWZmZDEyNGFkYzY1YTE3ZmRlYzBjNjk1MWI4YzRmOTRiMGIiLCJpYXQiOjE1Mzk0MjYzMjUsIm5iZiI6MTUzOTQyNjMyNSwiZXhwIjoxNTcwOTYyMzI1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.u1ceEXJCiiO6x2LLjh55Ej7er9gZ5l1xt99f2nAQfhElCCU_8-9mpSgGEYZvgIkUsoDc_UZifhEiwExoh33ilHrQ6VvVHn-5NF24pxGTmk3wHYHHFLOvqgx66ouRP8zbPQVfzs-Wbzt_Sshbm_I4m9dkC5zeph9Bt0Q_xU2aEqH8pKseaUIfWypNju06by4Si6Qd3-UaWywHzWmWn5e-UkGDbqYwdEB3H02NTVuy7yTEa4guq45pwwH1fn8Z3ZP6zAOEgSol8brsYTIA81DsEzMmbH3tx6CapUVfN0HwsSq0V4NuK2fbHyTlZ7ajFAAJOZMcBkDkDNb9k-Vj5YBSGRW4xgL2Ingv4MBzN7KroEWuxZbMIXv8mY4wjb04BzsFkWkMNCDV487VX5MhkbGVvi5uSaUDu6mMghlpP9zkputp9nZP_9I_g17ktNq8Xr0pbw6Ac3e7VbNqDNCkqi5E_7u4kIUJnDgIEwzPBUvZa0dh2t6k1UOK8YfVC-ujh2N5n9UoHJrQ_Ly-huDtEM2HSoMxSlxeZBpsxRC5Lr8MTifMj-CRREInyhGyoQ1GYE9metF9H_-ll_86fd6rFG5UsAzo2WapohBWbMFpnxrPsUJ4XxxIzfbufeqvEOyoKq4Nlou5sACgIzvuLNldqxclnpUqx3wWKMjcI7Zv94OmgGo";
        //env('API_TOKEN');

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


        if($request->has("job_title")) {

            $form_params['job_title']=$request->get("job_title");
            $form_params['orgnization']=$request->get("orgnization");

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


            $results=$exception;


        }



        if($results){
            return redirect(route('home'))->with('success','true')->with('message',"User Created");
        }
        //$results = json_decode($response->getBody()->getContents());

        return redirect(route('home'))->with('fail','true')->with('message',$jsonResponse->getMessage()['message']);

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
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','getArticleList');
    }

    public function index() {

        $apiUrl = env('API_URL') . 'article/get-articles';
        $param_url = env('API_URL') . 'api/article';

        $request= Request::create($apiUrl,'POST',['url'=> $param_url]);


        $response = $this->getArticleList($request);



        return view('article.show',['results' => $response]);

    }

    public function create()
    {

        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';
        $apiUrl= env('API_URL').'api/article-category/';



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


        return view('article.create',['results'=>$results]);
    }

    public function store(Request $request)
    {

        $apiToken= env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        $form_params = [
            'name' => $request->get("name")

        ];

        $apiUrl= env('API_URL').'api/article';



        $client = new Client(['http_errors'=>true,'headers'=>$headers]);
        $jsonResponse = null;
        $clientExceptionCode = null;
        $results= null;


        try {
            $response = $client->post($apiUrl, [
                'form_params' => array(
                'title' => $request->get("title"),
                 'articlecategory_id' => $request->get("article_category_id"),
                  'article_content' => $request->get("article_content"),
                    'user_id' => Auth::user()->id
                )
            ]);
            $results = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {


            $jsonResponse=$exception;


        }



        if($results){
            return redirect()->back()->with('success','Your Article created successfully');
        }


        return redirect()->back()->with('error','Article creation failed');

    }

    public function show()
    {
        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];


        $apiUrl= env('API_URL').'api/article';



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

        //dd($results);



        return view('article.show',['results'=>$results]);



    }


    public function getArticleList(Request $request){




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


            $errorResponse=$exception;


        }

        return view('article.list',['results' => $results]);
    }


}

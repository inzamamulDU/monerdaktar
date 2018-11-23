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
        $this->middleware('auth');
    }

    public function index() {


        $apiToken=env('API_TOKEN');

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$apiToken,
        ];

        //$apiUrl= 'http://localhost/api/user';
        $apiUrl= env('API_URL').'api/article/';



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

        $articleObject = null;

        if($results) {
            $articleObject = new \stdClass();

            $articleObject->links = $results->links;

            $articleObject->meta = $results->meta;
        }

        return view('article.show',['results'=>$results,'articleObject' => $articleObject]);

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
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI2OGY4ZDc1MWY0NmRiMzU0MDMyMThkZjRlMGQzOTkxYzJhMjIzZjcwYzhhZDdlM2M5ZTQxMGU3NDNiMjgwNDk4MjdmZjk2MDY2NjdhZmU5In0.eyJhdWQiOiIxIiwianRpIjoiYjY4ZjhkNzUxZjQ2ZGIzNTQwMzIxOGRmNGUwZDM5OTFjMmEyMjNmNzBjOGFkN2UzYzllNDEwZTc0M2IyODA0OTgyN2ZmOTYwNjY2N2FmZTkiLCJpYXQiOjE1MzkzNTQzMzYsIm5iZiI6MTUzOTM1NDMzNiwiZXhwIjoxNTcwODkwMzM2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.wKOoAyiJL0HGj2I5BuFTnAMNs7Ip98xcr0XTJjSP_q-t1SS2vWaJOkeVagvq6BbxXHrqGOSTlJj6jsxo3xJRzo-3WDJ74WogzbRwR4t3Fb0SFgMy8-HP5X6pwi7-WWsosmL790g8AJVIKnnsy_SBdcNkIQvgv_NH5L6RBSw8E0fr9Bxw6MtcQgSG-gyANcY84azcjgJmgQ7fGdPw06MA4UF4Vck5XbWD-D1nHfuLp8ySt53oCok7FPwbq7elsZshX1YXTLjTBdi0avxWb3tXZXfSdk_DQh8wa14KjlftOIEmQx1wtNUFzo9SzwFlr87enk3-aUmHvkgMTXDJM0Ei5StCZzkfSfBsV9htX64010QDEYhVpCNrVm-xKbiHo7_XQ5EAMaHrNhnQGo2evfaEhDNFxce1ROfcv4DlNaOTqxShNpvp2pJcR-vdoP-7GTDOgaN30EqktUbHeaNGT7WH9i8WNLjTafBuHrU0ggPtGGlMpnWmZFHu1GSXDVEEhCfdN4qQvhJO9OYpTFl4nfhYXwg6gUMbHJYVGHv2bkg1KD3Cs-SFWOkAxSbzhJSCstEz3uA6uZdY2s0wZC5pyXobBH0gMILv4HDI4sgO3fjjKIaLlogZAvcqiPCvqSnNx9uOgl-tH-5zFTjF6qH_4bpun8hNgCOdMa_k-quJww5FHz0',
        ];


        $apiUrl= env('API_URL').'api/article-category';



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



        return view('articlecategory.show',['results'=>$results]);



    }
}

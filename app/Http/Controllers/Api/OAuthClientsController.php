<?php
/**
 * Created by PhpStorm.
 * User: akramul
 * Date: 1/30/19
 * Time: 5:29 PM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\OAuthClients\OAuthClientsCollection;
use App\Model\OauthClients;
use Illuminate\Http\Request;

class OAuthClientsController extends  Controller
{
    public function __construct(){
        //$this->middleware('auth:api');
    }

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    public function index()
    {


        return OAuthClientsCollection::collection(OauthClients::paginate());

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


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }



}
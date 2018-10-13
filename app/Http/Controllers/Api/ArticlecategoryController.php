<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Articlecategory;
use App\Http\Resources\Articlecategory\ArticlecategoryCollection;
use App\Http\Resources\Articlecategory\ArticlecategoryResource;

class ArticlecategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticlecategoryCollection::collection(Articlecategory::paginate(20));
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
        $this->validate($request, [
            'name' => 'required|string|min:4|unique:articlecategories',

        ]);



        $articleCategory = new Articlecategory();

        $articleCategory->name = $request->name;

        $articleCategory->save();

        return response([
            'data' => new ArticlecategoryResource($articleCategory)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Articlecategory $articlecategory)
    {
        //
        return new ArticlecategoryResource($articlecategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Articlecategory $articlecategory)
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
    public function update(Request $request, Articlecategory $articlecategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articlecategory $articlecategory)
    {
        //
        $articlecategory->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}

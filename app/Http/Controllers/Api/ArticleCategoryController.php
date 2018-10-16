<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\ArticleCategory;
use App\Http\Resources\ArticleCategory\ArticleCategoryCollection;
use App\Http\Resources\ArticleCategory\ArticleCategoryResource;

class ArticleCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleCategoryCollection::collection(ArticleCategory::paginate(20));
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
            'name' => 'required|string|min:4|unique:article_categories',

        ]);



        $articleCategory = new ArticleCategory();

        $articleCategory->name = $request->name;

        $articleCategory->save();

        return response([
            'data' => new ArticleCategoryResource($articleCategory)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articlecategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        return $articleCategory;
        //return new ArticleCategoryResource($articleCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
  /*  public function edit(ArticleCategory $articlecategory)
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
    public function update(Request $request,ArticleCategory $articleCategory)
    {


        //$articlecategory = ArticleCategory::findOrFail($id);

        $articleCategory->update($request->all());

       return response([
        'data' => new ArticleCategoryResource($articleCategory)
    ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ArticleCategory $articleCategory)
    {

        /*$articlecategory = ArticleCategory::findOrFail($id);
        $tempName = $articlecategory->name;*/
        $articleCategory->delete();

        return response([
            'message' => $articleCategory->name. " article category has been deleted!"
        ],Response::HTTP_ACCEPTED);;
    }
}

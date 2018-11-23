<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Article;
use App\Http\Resources\Article\ArticleCollection;
use App\Http\Resources\Article\ArticleResource;

class ArticleController extends Controller
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
        return ArticleCollection::collection(Article::paginate(5));
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
            'title' => 'required|string|min:10',
            'article_content' => 'required|min:100',
            'user_id' => 'required|integer',
            'articlecategory_id' => 'required|integer',
        ]);


        $article = new Article();

        $article->title = $request->title;
        $article->article_content = $request->article_content;
        $article->user_id = $request->user_id;
        $article->articlecategory_id = $request->articlecategory_id;

        $article->save();

        return response([
            'data' => new ArticleResource($article)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
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


        $article = Article::findOrFail($id);

        $article->update($request->all());

        return response([
            'data' => new ArticleResource($article)
        ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $article = Article::findOrFail($id);

        $article->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}

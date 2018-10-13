<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Model\User;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{
    public function __construct(){
       // $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserCollection::collection(User::paginate(20));
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
            'name' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
            'email' => 'required|string|unique:users',
            'phone' => 'required|string|unique:users',
            'role_id' => 'required'

        ]);
//        regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|
        $user = new User();

        $user->name= $request->get("name");
        $user->password= bcrypt($request->get("password"));
        $user->email= $request->get("email");
        $user->phone= $request->get("phone");

        $user->address= $request->get("address");
        $user->postcode= $request->get("postcode");
        $user->city= $request->get("city");
        $user->country= $request->get("country");

        if($request->has("job_title")) {
            $user->job_title = $request->get("job_title");
        }

        if($request->has("orgnization")) {
            $user->orgnization = $request->get("orgnization");
        }

        $user->role_id= $request->get("role_id");
        //$user->photo= $request->get("photo");

        $user->save();
        /*$this->validate($request, [
            'name' => 'required|string|min:4|unique:articlecategories',

        ]);



        $articleCategory = new Articlecategory();

        $articleCategory->name = $request->name;

        $articleCategory->save();*/

        return response([
            'data' => new UserResource($user)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Use  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return response([
            'data' => new UserResource($user)
        ],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user= User::findOrFail($id);
        $user->delete();
        return response([
            'message' => $user->name." has been deleted!"
        ],Response::HTTP_NO_CONTENT);
    }
}

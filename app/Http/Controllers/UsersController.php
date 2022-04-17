<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\users;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'email'=>'required|email',
            'password'=>'required'
        ]);
        return users::create($request->all());
        auth()->login($user);
        return users::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return users::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }
    public function decodeJWT()
    {
        $token = JWTAuth::getToken();
        $api = JWTAuth::getPayload($token)->toArray();
        return response(['role'=>$api['role'], 'email'=>$api['email'], 'id_user'=>$api['id_user']], 200);
    }
}

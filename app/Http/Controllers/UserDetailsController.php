<?php

namespace App\Http\Controllers;

use App\Models\user_details;
use Illuminate\Http\Request;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
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
        return user_details::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return user_details::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function edit(user_details $user_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return user_details::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_details $user_details)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }
}

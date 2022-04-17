<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\jobs;
use JWTAUth;
class ApplicationController extends Controller
{
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
        return applications::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = JWTAuth::user();
//        $id_user = $user->id_user;
        $role = $user->role;
        $applications = array();
        if($role == 1){
            $application = applications::find($id);
        }
        elseif($role == 2){
            $jobs = jobs::all()->where('id_company', $id);
            foreach ($jobs as $job){
                if(!is_null($job)) {
                    $application = applications::all()->where('id_user', $id)->where('id_job', $job->id_job)->toArray();
                    $applications+=$application;

                }
            }
        }
        return $applications;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aplications  $applications
     * @return \Illuminate\Http\Response
     */
    public function edit($id,  Request $request)
    {
        //return formular
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aplications  $applications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jobs $jobs)
    {
        return jobs::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aplications  $applications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }
}

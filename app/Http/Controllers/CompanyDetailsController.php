<?php

namespace App\Http\Controllers;

use App\Models\company_details;
use Illuminate\Http\Request;

class CompanyDetailsController extends Controller
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
        return company_details::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return company_details::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function edit(company_details $company_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return company_details::update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(company_details $company_details)
    {
        return response(['error'=>false, 'error-msg'=>'Not permitted'], 403);
    }
}

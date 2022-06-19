<?php

namespace App\Http\Controllers;

use App\Models\RequestedComponent;
use App\Http\Requests\StoreRequestedComponentRequest;
use App\Http\Requests\UpdateRequestedComponentRequest;

class RequestedComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRequestedComponentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestedComponentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestedComponent  $requestedComponent
     * @return \Illuminate\Http\Response
     */
    public function show(RequestedComponent $requestedComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestedComponent  $requestedComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestedComponent $requestedComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestedComponentRequest  $request
     * @param  \App\Models\RequestedComponent  $requestedComponent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestedComponentRequest $request, RequestedComponent $requestedComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestedComponent  $requestedComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestedComponent $requestedComponent)
    {
        //
    }
}

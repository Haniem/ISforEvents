<?php

namespace App\Http\Controllers;

use App\Models\Request_statuses;
use App\Http\Requests\StoreRequest_statusesRequest;
use App\Http\Requests\UpdateRequest_statusesRequest;

class RequestStatusesController extends Controller
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
     * @param  \App\Http\Requests\StoreRequest_statusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest_statusesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request_statuses  $request_statuses
     * @return \Illuminate\Http\Response
     */
    public function show(Request_statuses $request_statuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request_statuses  $request_statuses
     * @return \Illuminate\Http\Response
     */
    public function edit(Request_statuses $request_statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequest_statusesRequest  $request
     * @param  \App\Models\Request_statuses  $request_statuses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest_statusesRequest $request, Request_statuses $request_statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request_statuses  $request_statuses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request_statuses $request_statuses)
    {
        //
    }
}

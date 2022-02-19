<?php

namespace App\Http\Controllers;

use App\Models\Event_stages;
use App\Http\Requests\StoreEvent_stagesRequest;
use App\Http\Requests\UpdateEvent_stagesRequest;

class EventStagesController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_stagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_stagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_stages  $event_stages
     * @return \Illuminate\Http\Response
     */
    public function show(Event_stages $event_stages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_stages  $event_stages
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_stages $event_stages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_stagesRequest  $request
     * @param  \App\Models\Event_stages  $event_stages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_stagesRequest $request, Event_stages $event_stages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_stages  $event_stages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_stages $event_stages)
    {
        //
    }
}

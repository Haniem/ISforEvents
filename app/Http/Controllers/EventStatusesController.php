<?php

namespace App\Http\Controllers;

use App\Models\Event_statuses;
use App\Http\Requests\StoreEvent_statusesRequest;
use App\Http\Requests\UpdateEvent_statusesRequest;

class EventStatusesController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_statusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_statusesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_statuses  $event_statuses
     * @return \Illuminate\Http\Response
     */
    public function show(Event_statuses $event_statuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_statuses  $event_statuses
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_statuses $event_statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_statusesRequest  $request
     * @param  \App\Models\Event_statuses  $event_statuses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_statusesRequest $request, Event_statuses $event_statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_statuses  $event_statuses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_statuses $event_statuses)
    {
        //
    }
}

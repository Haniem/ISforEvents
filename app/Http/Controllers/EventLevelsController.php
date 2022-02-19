<?php

namespace App\Http\Controllers;

use App\Models\Event_levels;
use App\Http\Requests\StoreEvent_levelsRequest;
use App\Http\Requests\UpdateEvent_levelsRequest;

class EventLevelsController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_levelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_levelsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_levels  $event_levels
     * @return \Illuminate\Http\Response
     */
    public function show(Event_levels $event_levels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_levels  $event_levels
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_levels $event_levels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_levelsRequest  $request
     * @param  \App\Models\Event_levels  $event_levels
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_levelsRequest $request, Event_levels $event_levels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_levels  $event_levels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_levels $event_levels)
    {
        //
    }
}

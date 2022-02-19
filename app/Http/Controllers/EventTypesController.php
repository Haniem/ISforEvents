<?php

namespace App\Http\Controllers;

use App\Models\Event_types;
use App\Http\Requests\StoreEvent_typesRequest;
use App\Http\Requests\UpdateEvent_typesRequest;

class EventTypesController extends Controller
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
     * @param  \App\Http\Requests\StoreEvent_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent_typesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_types  $event_types
     * @return \Illuminate\Http\Response
     */
    public function show(Event_types $event_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_types  $event_types
     * @return \Illuminate\Http\Response
     */
    public function edit(Event_types $event_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_typesRequest  $request
     * @param  \App\Models\Event_types  $event_types
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvent_typesRequest $request, Event_types $event_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_types  $event_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event_types $event_types)
    {
        //
    }
}

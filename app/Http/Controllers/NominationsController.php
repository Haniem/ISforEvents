<?php

namespace App\Http\Controllers;

use App\Models\Nominations;
use App\Http\Requests\StoreNominationsRequest;
use App\Http\Requests\UpdateNominationsRequest;

class NominationsController extends Controller
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
     * @param  \App\Http\Requests\StoreNominationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNominationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nominations  $nominations
     * @return \Illuminate\Http\Response
     */
    public function show(Nominations $nominations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nominations  $nominations
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominations $nominations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNominationsRequest  $request
     * @param  \App\Models\Nominations  $nominations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNominationsRequest $request, Nominations $nominations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nominations  $nominations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominations $nominations)
    {
        //
    }
}

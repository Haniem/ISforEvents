<?php

namespace App\Http\Controllers;

use App\Models\Comissions;
use App\Http\Requests\StoreComissionsRequest;
use App\Http\Requests\UpdateComissionsRequest;

class ComissionsController extends Controller
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
     * @param  \App\Http\Requests\StoreComissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComissionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comissions  $comissions
     * @return \Illuminate\Http\Response
     */
    public function show(Comissions $comissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comissions  $comissions
     * @return \Illuminate\Http\Response
     */
    public function edit(Comissions $comissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComissionsRequest  $request
     * @param  \App\Models\Comissions  $comissions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComissionsRequest $request, Comissions $comissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comissions  $comissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comissions $comissions)
    {
        //
    }
}

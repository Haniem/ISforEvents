<?php

namespace App\Http\Controllers;

use App\Models\Stage_status;
use App\Http\Requests\StoreStage_statusRequest;
use App\Http\Requests\UpdateStage_statusRequest;

class StageStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreStage_statusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStage_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage_status  $stage_status
     * @return \Illuminate\Http\Response
     */
    public function show(Stage_status $stage_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage_status  $stage_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage_status $stage_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStage_statusRequest  $request
     * @param  \App\Models\Stage_status  $stage_status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStage_statusRequest $request, Stage_status $stage_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage_status  $stage_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage_status $stage_status)
    {
        //
    }
}

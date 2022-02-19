<?php

namespace App\Http\Controllers;

use App\Models\Requests_students;
use App\Http\Requests\StoreRequests_studentsRequest;
use App\Http\Requests\UpdateRequests_studentsRequest;

class RequestsStudentsController extends Controller
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
     * @param  \App\Http\Requests\StoreRequests_studentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequests_studentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requests_students  $requests_students
     * @return \Illuminate\Http\Response
     */
    public function show(Requests_students $requests_students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requests_students  $requests_students
     * @return \Illuminate\Http\Response
     */
    public function edit(Requests_students $requests_students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequests_studentsRequest  $request
     * @param  \App\Models\Requests_students  $requests_students
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequests_studentsRequest $request, Requests_students $requests_students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requests_students  $requests_students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests_students $requests_students)
    {
        //
    }
}

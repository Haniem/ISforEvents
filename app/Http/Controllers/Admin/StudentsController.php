<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Groups;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();

        return view('admin.students.students', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $groups = Groups::all();

        return view('admin.students.create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required',
            'student_surname' => 'required',
            'student_lastname' => 'required',
            'course' => 'required',
            'group_name' => 'required',
        ]);

        

        $group = Groups::where('group_name', $data["group_name"])->first();


        $department = Departments::where('department_name', $group -> department)->first();

        // dd($data, $department);

        Students::create([
            'student_name' => $data['student_name'],
            'student_surname' => $data['student_surname'],
            'student_lastname' => $data['student_lastname'],
            'course' => $data['course'],
            'group_name' => $data['group_name'],
            'department' => $department -> department_name
        ]);

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::where('id', $id)->first();
        $groups = Groups::all();

        return view('admin.students.edit', [
            'student' => $student,
            'groups' => $groups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'student_name' => 'required',
            'student_surname' => 'required',
            'student_lastname' => 'required',
            'course' => 'required',
            'group_name' => 'required',
        ]);
        $group = Groups::where('group_name', $data["group_name"])->first();
        $department = Departments::where('department_name', $group -> department)->first();

        Students::where('id', $id)->update([
            'student_name' => $data['student_name'],
            'student_surname' => $data['student_surname'],
            'student_lastname' => $data['student_lastname'],
            'course' => $data['course'],
            'group_name' => $data['group_name'],
            'department' => $department -> department_name
        ]);
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Students::destroy($id);

        return redirect(route('students.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Groups;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    function showLists() {

        return view('lists.lists');
    }

    //Отображение страницы групп
    function showGroups() {

        $departments = Departments::all();
        $groups = Groups::all();

        return view('lists.groups', [
            'departments' => $departments,
            'groups' => $groups
        ]);
    }

    //Добавление группы  
    function addGroup(Request $request) {

        $data = $request->validate([
            "name" => "required",
            "department" => "required"
        ]);

        DB::table('groups')->insert([

            'group_name' => $data['name'],
            'department' => $data['department']

        ]);

        return redirect()->back();
    }

    //Удалить группу
    function deleteGroup(Request $request) {

        $id = $request->input('id');

        Groups::find($id)->delete();

        return redirect()->back();

    }

    //Отображение страницы отделений
    function showDeaprtments() {

        $departments = Departments::all();

        return view('lists.departments',[
            'departments' => $departments
        ]);
    }

    //Добавление отделения
    function addDepartment(Request $request) {

        $data = $request->validate([
            "department_name" => "required"
        ]);

        DB::table('departments')->insert([

            'department_name' => $data['department_name'],

        ]);

        return redirect()->back();

    }

    function deleteDepartment(Request $request) {

        $id = $request->input('id');

        Departments::find($id)->delete();

        return redirect()->back();

    }

    //Отображение страницы студенты
    function showStudents() {

        $groups = Groups::all();
        $students = Students::all();

        return view('lists.students',[
            'groups' => $groups,
            'students' => $students,
        ]);
    }

    //Добавление студента
    function addStudent(Request $request) {

        $data = $request->validate([
            "name" => "required",
            "surname" => "required",
            "lastname" => "required",
            "course" => "required",
            "group" => "required"
        ]);

        $group = Groups::where('group_name', $data["group"])->first();

        $department = Departments::where('department_name', $group -> department)->first();

        DB::table('students')->insert([
            "student_name" => $data["name"],
            "student_surname" => $data["surname"],
            "student_lastname" => $data["lastname"],
            "course" => $data["course"],
            "group_name" => $data["group"],
            "department" => $department -> department_name
        ]);

        
        return redirect()->back();

    }

    //Удаление студента
    function deleteStudent(Request $request) {

        $id = $request->input('id');

        Students::find($id)->delete();

        return redirect()->back();

    }
}

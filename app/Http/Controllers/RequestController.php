<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Students;
use GuzzleHttp\Psr7\Request;

class RequestController extends Controller
{
    function index() {

        $param = request()->all();

        $request = Requests::all()->where('id', 1);

        // $student = [
        //     'name' => $request -> student['student_name'],
        //     'surname' => $request -> student['student_surname'],
        //     'lastname' => $request -> student['student_lastname'],
        //     'course' => $request -> student['course'],
        //     'surname' => $request -> student['group_name'],
        //     'surname' => $request -> student['department'],
        // ] ;

        dump($request);
        

        // foreach($requests as $request) {

        //     // $nums = [1, 2, 3];

        //     // $request = array_push($nums);

        //     $student = Students::where('id', $request['id_student'])->first();

        //     $student->toArray();

        //     $request = array_push($student -> student_name);
        //     $request = array_push($student -> student_surname);
        //     $request = array_push($student -> student_lastname);
        //     $request = array_push($student -> student_course);
        //     $request = array_push($student -> group_name);
        //     $request = array_push($student -> department);

        //     dump($student);
        //     dump($request);
        // };

        return ;
    }
}


// http://isforevents/requests?event=1&nomination=1&stage=1
<?php

namespace App\Http\Controllers;

use App\Writing;
use Illuminate\Http\Request;

class StudentWritingExamController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('student');


    }
    public function index($writing_id){


        $writing = Writing::find($writing_id);



        return view('student_exam.writing_test.writing_exam')->withWriting($writing);






    }

}

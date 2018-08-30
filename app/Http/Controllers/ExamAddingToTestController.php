<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class ExamAddingToTestController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($test_id){

        $exams = array();


        $exams_from_test_id   = Test::findorFail($test_id)->course->exams;

        $course_name          = Test::findorFail($test_id)->course->name;

        $exams['exams']       = $exams_from_test_id;

        $exams['course_name'] = $course_name;


        return view('exam_controller.add_exam_to_test')->with('exams',$exams);

    }
    public function addExam($test_id,$exam_id){


        $test = Test::find($test_id);

        if ($test->exams()->sync($exam_id,false)){

            \Session::flash('msg', 'Exam added Successfully' );
            return redirect()->back();

        }


    }



}

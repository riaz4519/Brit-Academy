<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Reading;
use Illuminate\Http\Request;

class ExamStepController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('admin');

    }
    public function index($exam_id){


        $exam = Exam::find($exam_id);

        return view('exam_controller.practice_exam.exams_steps')->with('exam',$exam);


    }

    public function addReadingPage($exam_id){

//        getting the exams_course_id f

        $exam_course_id = Exam::find($exam_id)->course_id;



//        getting reading steps form course_id
         $readings = Reading::where('course_id', '=', $exam_course_id)->get();

         return view('exam_controller.reading.show_reading_for_add')->withReadings($readings);

    }

//    in this function we are adding reading steps to exams

    public  function addReadingToExam($exam_id,$reading_id){


        $exam = Exam::find($exam_id);

        $exam->reading_id = $reading_id;
        $exam->save();

        \Session::flash('msg','Reading added Successfully');

        return redirect()->route('ExamStepsIndex',$exam_id);

    }

    public function updateReadingPage($exam_id){

        //        getting the exams_course_id f

        $exam = Exam::find($exam_id);

        $exam_course_id = $exam->course_id;
        $exam_reading_id= $exam->reading_id;



//        getting reading steps form course_id
         $readings = Reading::where('course_id', '=', $exam_course_id)
                                ->where('id','!=',$exam_reading_id)
                                ->get();


        return view('exam_controller.reading.show_reading_for_update')->withReadings($readings);



    }

    public function updateReadingToExam($exam_id,$reading_id){


        $exam = Exam::find($exam_id);

        $exam->reading_id = $reading_id;
        $exam->save();

        \Session::flash('msg','Reading Updated Successfully');

        return redirect()->route('ExamStepsIndex',$exam_id);


    }




}

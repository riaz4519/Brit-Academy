<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\Course;

class ExamController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('admin');

    }
    public function index(){

        return view('exam_controller.practice_exam.index');

    }
    public function createPage(){

        $course = Course::all();

        return view('exam_controller.practice_exam.create')->with('courses',$course);


    }

    public function createExam(Request $request){

        $request->validate([
            'name'        => 'min:25|max:200|required',
            'description' =>'min:25|required',
            'course'      => 'required',

        ]);

        $exam = new Exam();

        $exam->name        = $request->name;
        $exam->description = $request->description;
        $exam->course_id   = $request->course;
        $exam->save();
        \Session::flash('msg', 'Exam Created Successfully' );
        return redirect()->back();


    }

    public function examList(){


        $exam_list = array();

         $exam_list['all']      = Exam::all();
         $exam_list['academic'] = Course::find(1)->exams;
         $exam_list['general']  = Course::find(2)->exams;

        return view('exam_controller.practice_exam.exam_list')->with('exams',$exam_list);





    }
}

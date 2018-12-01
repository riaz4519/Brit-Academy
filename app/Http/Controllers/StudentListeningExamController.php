<?php

namespace App\Http\Controllers;

use App\Listening;
use App\Lquestion;
use Illuminate\Http\Request;

class StudentListeningExamController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('student');

    }

    public function index($litening_id){

       $listening = Listening::find($litening_id);

       return view('student_exam.listening_test.listening_exam')->withListening($listening);

    }

    public function exam_finish(Request $request,$listening_id){




        foreach ($request->question as $key=>$value) {


          $question_ans = Lquestion::find($key)->answers->answer;

          echo $question_ans."<br>";



        }

    }
}

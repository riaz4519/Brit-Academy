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

        $correct = 0;
        $answer_given  = 0;
        $total_question = 40;



        foreach ($request->question as $key=>$value) {


            if (!is_null($value)){

                $answer_given++;

                $question_ans = Lquestion::find($key)->answers->answer;

                if ($question_ans == $value){
                    $correct++;

                }
            }

        }

        $not_touched = $total_question - $answer_given;
        $wrong_answer = $answer_given - $correct;

        $status = array();

        $status['correct'] = $correct;
        $status['total'] = $total_question;
        $status['answer_given'] = $answer_given;
        $status['not_touched'] = $not_touched;
        $status['wrong_answer'] = $wrong_answer;
        $status['ielts_point']  = $this->calculate_ielts_point($correct);






        return view('student_exam.listening_test.listening_answer')->withStatus($status);






    }

    public function calculate_ielts_point($correct){

        $ielts_point = 0;

        if ($correct >=4 && $correct <=5){
            $ielts_point = 2.5;

        }
        else if($correct >=6 && $correct <=7){
            $ielts_point = 3;
        }
        else if($correct >=8 && $correct <10){

            $ielts_point = 3.5;
        }
        else if($correct >=10 && $correct <=12){
            $ielts_point = 4;
        }
        else if($correct >=13 && $correct <=15){
            $ielts_point = 4.5;
        }
        else if($correct >=16 && $correct <=17){
            $ielts_point = 5;
        }
        else if($correct >=18 && $correct <=22){

            $ielts_point = 5.5;
        }
        else if($correct >=23 && $correct <=25){
            $ielts_point = 6;
        }
        else if($correct >=26 && $correct <=29){
            $ielts_point = 6.5;

        }
        else if($correct >=30 && $correct <=31){
            $ielts_point = 7;

        }
        else if($correct >=32 && $correct <=34){

            $ielts_point = 7.5;
        }
        else if($correct >=35 && $correct <=36){

            $ielts_point = 8;
        }
        else if($correct >=37 && $correct <=38){
            $ielts_point = 8.5;
        }
        else if($correct >=39 && $correct <=40){
            $ielts_point = 9;
        }
        else{

            $ielts_point = 0;

        }
        return $ielts_point;

    }
}

<?php

namespace App\Http\Controllers;

use App\Reading;
use App\Rquestion;
use Illuminate\Http\Request;

class StudentReadingExamController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('student');

    }

    public function index($reading_id){

        $reading = Reading::find($reading_id);

        return view('student_exam.reading_test.reading_exam')->withReading($reading);

    }
    public function finish(Request $request,$reading_id){

        $correct = 0;
        $answer_given  = 0;
        $total_question = 40;

        foreach ($request->question as $key=>$value){

            if (!is_null($value)){

                $answer_given++;

                $question_ans = Rquestion::find($key)->answer->answer;

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

        if (Reading::find($reading_id)->course->name == 'Academic Test'){

            $status['ielts_point']  = $this->calculate_ielts_point_academic($correct);

        }else{

            $status['ielts_point']  = $this->calculate_ielts_point_general($correct);
        }


        return view('student_exam.reading_test.reading_answer')->withStatus($status);

    }
    public function calculate_ielts_point_general($correct){



        if ($correct >=6 && $correct <=8){
            $ielts_point = 2.5;

        }
        else if($correct >=9 && $correct <=11){
            $ielts_point = 3;
        }
        else if($correct >=12 && $correct <=14){

            $ielts_point = 3.5;
        }
        else if($correct >=15 && $correct <=18){
            $ielts_point = 4;
        }
        else if($correct >=19 && $correct <=22){
            $ielts_point = 4.5;
        }
        else if($correct >=23 && $correct <=26){
            $ielts_point = 5;
        }
        else if($correct >=27 && $correct <=29){

            $ielts_point = 5.5;
        }
        else if($correct >=30 && $correct <=31){
            $ielts_point = 6;
        }
        else if($correct >=32 && $correct <=33){
            $ielts_point = 6.5;

        }
        else if($correct >=34 && $correct <=35){
            $ielts_point = 7;

        }
        else if($correct == 36){

            $ielts_point = 7.5;
        }
        else if($correct >=37 && $correct <= 38){

            $ielts_point = 8;
        }
        else if($correct == 39){
            $ielts_point = 8.5;
        }
        else if($correct == 40){
            $ielts_point = 9;
        }
        else{

            $ielts_point = 0;

        }

        return $ielts_point;

    }
    public function calculate_ielts_point_academic($correct){



        if ($correct >=4 && $correct <=5){
            $ielts_point = 2.5;

        }
        else if($correct >=6 && $correct <=7){
            $ielts_point = 3;
        }
        else if($correct >=8 && $correct <=9){

            $ielts_point = 3.5;
        }
        else if($correct >=10 && $correct <=12){
            $ielts_point = 4;
        }
        else if($correct >=13 && $correct <=14){
            $ielts_point = 4.5;
        }
        else if($correct >=15 && $correct <=18){
            $ielts_point = 5;
        }
        else if($correct >=19 && $correct <=22){

            $ielts_point = 5.5;
        }
        else if($correct >=23 && $correct <=26){
            $ielts_point = 6;
        }
        else if($correct >=27 && $correct <=29){
            $ielts_point = 6.5;

        }
        else if($correct >=30 && $correct <=32){
            $ielts_point = 7;

        }
        else if($correct >=33 && $correct <=34){

            $ielts_point = 7.5;
        }
        else if($correct >=35 && $correct <= 36){

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

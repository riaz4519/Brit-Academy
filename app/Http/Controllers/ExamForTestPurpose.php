<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Reading;
use App\Rquestion;
use App\Test;
use Illuminate\Http\Request;

class ExamForTestPurpose extends Controller
{
    //



    public function index(){


        $readings = Reading::all();


        return view('test.exam.test-exam-index')->withReadings($readings);
    }
    public function give($reading_id){


        $reading = Reading::find($reading_id);


        return view('test.exam.exam-page')->withReading($reading);

    }
    public  function post(Request $request){

        $i = 0;
        $null = 0;

      foreach ($request->question as $key=>$value){

          echo  $value;

      $ans = Rquestion::where('number','=',$key)->first()->id;


     if (Answer::where('rquestion_id','=',$ans)->first()->answer == $value){

         $i++;

     }





      }
      return $i;



    }

}

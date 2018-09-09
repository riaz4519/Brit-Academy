<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Rquestion;
use App\Rsub;
use Illuminate\Http\Request;

class ReadingSubsectionQuestionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');

    }


    public function index($reading_id,$rsection_id,$rsub_id){


        $rsub = Rsub::find($rsub_id);



        return view('exam_controller.reading.section.sub-section.add_question')->withRsub($rsub);
    }

    public function addDropDownTypeQuestion($reading_id,$rsection_id,$rsub_id,Request $request){

       $this->validate($request,[

           'question' => 'required',
           'answer'   => 'required',

       ]);

       $question = new Rquestion();

       $question->rsub_id = $rsub_id;
       $question->question= $request->question;
       $question->number  = $request->number;

       $question->save();

       $answer = new Answer();

       $answer->rquestion_id = $question->id;
       $answer->answer = $request->answer;

       $answer->save();

       \Session::flash('msg','New Question adder To Sub-section'.$rsection_id);

       return redirect()->back();



    }

}

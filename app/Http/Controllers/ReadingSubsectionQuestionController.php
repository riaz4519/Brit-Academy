<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Rquestion;
use App\Rsection;
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


       $rsub = Rsub::find($rsub_id);


       if ((($rsub->end-$rsub->start)+1)- $rsub->rquestions->count() == 0){

           \Session::flash('msg','All the question has been added to '.$rsection_id);
           return redirect()->route('reading.show.section',[$reading_id,$rsection_id]);

       }



       \Session::flash('msg','New Question adder To Sub-section'.$rsection_id);

       return redirect()->back();



    }
    public function checkboxIndex($reading_id,$rsection_id,$rsub_id){

        $rsub = Rsub::find($rsub_id);

        return view('exam_controller.reading.section.sub-section.add_checkbox')->withRsub($rsub);

    }
    public function checkboxStore($reading_id,$rsection_id,$rsub_id,Request $request){

        $this->validate($request,[

            'question' => 'required',
            'answer'   => 'required',

        ]);

        $question = new Rquestion();

        $question->rsub_id = $rsub_id;
        $question->question= $request->question;
        $question->number  = $request->number;

        $question->save();

        $count = sizeof($request->answer);

        for ($i=0;$i<$count;$i++){

            $answer = new Answer();
            $answer->rquestion_id = $question->id;
            $answer->answer = $request->answer[$i];
            $answer->save();


        }
        \Session::flash('msg','New Question added To Sub-section'.$rsection_id);

        return redirect()->route('reading.show.section',[$reading_id,$rsection_id]);





    }

}

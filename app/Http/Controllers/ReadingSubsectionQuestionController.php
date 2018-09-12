<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Qoption;
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

    public function radioIndex($reading_id,$rsection_id,$rsub_id){
        $rsub = Rsub::find($rsub_id);
        return view('exam_controller.reading.section.sub-section.add_radio')->withRsub($rsub);

    }
    public function radioStore($reading_id,$rsection_id,$rsub_id,Request $request){


        $this->validate($request,[

            'question' => 'required',
            'answer'   => 'required',
            'option'   => 'required',

        ]);

        $question = new Rquestion();

        $question->rsub_id = $rsub_id;
        $question->question= $request->question;
        $question->number  = $request->number;

        $question->save();

        $answer = new Answer();
        $answer->answer = $request->answer;
        $answer->rquestion_id = $question->id;
        $answer->save();

        $count = sizeof($request->option);

        for ($i=0;$i<$count;$i++){

            $option = new Qoption();
            $option->rquestion_id = $question->id;
            $option->option = $request->option[$i];
            $option->value = $request->value[$i];
            $option->save();


        }

        $rsub = Rsub::find($rsub_id);

        if ((($rsub->end-$rsub->start)+1)- $rsub->rquestions->count() == 0){

            \Session::flash('msg','All the question has been added to '.$rsection_id);
            return redirect()->route('reading.show.section',[$reading_id,$rsection_id]);

        }



        \Session::flash('msg','New Question adder To Sub-section'.$rsection_id);

        return redirect()->back();
    }

    public function passageGapIndex($reading_id,$rsection_id,$rsub_id){

        $rsub = Rsub::find($rsub_id);
        return view('exam_controller.reading.section.sub-section.add_passage_gap')->withRsub($rsub);

    }
    public function passageGapStore($reading_id,$rsection_id,$rsub_id,Request $request){

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

            \Session::flash('msg','All the passage Gap question has been added to '.$rsection_id);
            return redirect()->route('reading.show.section',[$reading_id,$rsection_id]);

        }



        \Session::flash('msg','New Question added To Sub-section'.$rsection_id);

        return redirect()->back();

    }

    public function passageDropDownIndex($reading_id,$rsection_id,$rsub_id){

        $rsub = Rsub::find($rsub_id);
        return view('exam_controller.reading.section.sub-section.add_passage_dropdown')->withRsub($rsub);

    }
    public function passageDropDownStore($reading_id,$rsection_id,$rsub_id,Request $request){





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

}

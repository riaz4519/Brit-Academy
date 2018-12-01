<?php

namespace App\Http\Controllers;

use App\Lanswer;
use App\Lqoption;
use App\Lquestion;
use App\Lsubsection;
use App\Rquestion;
use Illuminate\Http\Request;

class LquestionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function single_line_index($listening_id,$section_id,$sub_section_id){



        $lsubsection =  Lsubsection::find($sub_section_id);

        /*if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
            return redirect()->route('listening.section.index',$listening_id);
        }*/

        return view('exam_controller.listening.section.sub-section.question_type.single_line_gap')->withLsubsection($lsubsection);

    }
    public function single_line_store(Request $request,$listening_id,$section_id,$sub_section_id){

       // return $request;

        $this->validate($request,[

            'qnumber'   => 'required',
            'question'  => 'required',
            'answer'    => 'required'

        ]);

        $example = false;

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;

        }

        $question = new Lquestion();

        $question->lsubsection_id = $sub_section_id;
        $question->qnumber  = $request->qnumber;
        $question->question = $request->question;
        $question->example  = $example;

        $question->save();

        $answer = new Lanswer();

        $answer->lquestion_id = $question->id;
        $answer->answer = $request->answer;

        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();











    }

    public function table_two_row_left_ans($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);

        /*if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
            return redirect()->route('listening.section.index',$listening_id);
        }*/

        return view('exam_controller.listening.section.sub-section.question_type.table_two_row_left_ans')->withLsubsection($lsubsection);

    }
    public function table_two_row_left_ans_store(Request $request,$listening_id,$section_id,$sub_section_id){


        // return $request;

        $this->validate($request,[

            'qnumber'   => 'required',
            'question'  => 'required',
            'answer'    => 'required'

        ]);

        $example = false;

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;

        }

        $question = new Lquestion();

        $question->lsubsection_id = $sub_section_id;
        $question->qnumber  = $request->qnumber;
        $question->question = $request->question;
        $question->example  = $example;

        $question->save();

        $answer = new Lanswer();

        $answer->lquestion_id = $question->id;
        $answer->answer = $request->answer;

        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();



    }
    public function radio_type_self_option_index($listening_id,$section_id,$sub_section_id){
        $lsubsection =  Lsubsection::find($sub_section_id);

        if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
           return redirect()->route('listening.section.index',$listening_id);
       }

        return view('exam_controller.listening.section.sub-section.question_type.radio_type_self_option')->withLsubsection($lsubsection);

    }
    public function radio_type_self_option_store(Request $request,$listening_id,$section_id,$sub_section_id){


        $this->validate($request,[

            'qnumber'   =>'required ',
            'lquestion' =>'required',
            'option'    =>'required|array',
            'value'     =>'required|array',
            'answer'    =>'required',

        ]);

        $example = false;

        $lquestion = new Lquestion();

        $lquestion->lsubsection_id = $sub_section_id;

        $lquestion->qnumber        = $request->qnumber;

        $lquestion->question       = $request->lquestion;

        $lquestion->example        = $example;

        $lquestion->save();

        $lquestion_id = $lquestion->id;

        $option = $request->option;

        for ($i=0;$i<count($option);$i++){

            $lqoption = new Lqoption();

            $lqoption->lquestion_id = $lquestion_id;
            $lqoption->option = $request->option[$i];
            $lqoption->value = $request->value[$i];
            $lqoption->save();

        }

        $answer = new Lanswer();
        $answer->lquestion_id = $lquestion_id;
        $answer->answer = $request->answer;
        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");
        return redirect()->back();





    }

    public function single_line_drop_down_left_index($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);


        if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
            return redirect()->route('listening.section.index',$listening_id);
        }


        return view('exam_controller.listening.section.sub-section.question_type.single_line_drop_down_left')->withLsubsection($lsubsection);

    }

    public function single_line_drop_down_left_store(Request $request,$listening_id,$section_id,$sub_section_id){

        $this->validate($request,[

            'qnumber'   => 'required',
            'question'  => 'required',
            'answer'    => 'required'

        ]);

        $example = false;

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;

        }

        $question = new Lquestion();

        $question->lsubsection_id = $sub_section_id;
        $question->qnumber  = $request->qnumber;
        $question->question = $request->question;
        $question->example  = $example;

        $question->save();

        $answer = new Lanswer();

        $answer->lquestion_id = $question->id;
        $answer->answer = $request->answer;

        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();

    }
    public function question_three_column_random_drop_index($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);

        return view('exam_controller.listening.section.sub-section.question_type.three_column_drop_down_random')->withLsubsection($lsubsection);


    }

    public function question_three_column_random_drop_store(Request $request,$listening_id,$section_id,$sub_section_id){


        $this->validate($request,[

            'qnumber'  => 'required',
            'column1'  => 'required',
            'column2'  => 'required',
            'column3'  => 'required',


        ]);

        $question_input = "<td>".$request->column1."</td> <td>".$request->column2."</td> <td>".$request->column3." </td>";


        $example = false;

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;

        }

        $question = new Lquestion();

        $question->lsubsection_id = $sub_section_id;
        $question->qnumber  = $request->qnumber;
        $question->question = $question_input;
        $question->example  = $example;

        $question->save();




        if (!$request->has('example')){
            $answer = new Lanswer();
            $answer->lquestion_id = $question->id;
            $answer->answer = $request->answer;

            $answer->save();
        }



        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();

    }

    public function single_label_answer_index($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);

        if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
            return redirect()->route('listening.section.index',$listening_id);
        }

        return view('exam_controller.listening.section.sub-section.question_type.single_label_answer')->withLsubsection($lsubsection);




    }
    public function single_label_answer_store(Request $request,$listening_id,$section_id,$sub_section_id){

        $this->validate($request,[

            'answer' =>'required'


        ]);

        $lquestion = new Lquestion();
        $lquestion->lsubsection_id = $sub_section_id;
        $lquestion->question = 'null';
        $lquestion->qnumber  = $request->qnumber;
        $lquestion->example   = false;
        $lquestion->save();

        $answer = new Lanswer();

        $answer->lquestion_id = $lquestion->id;
        $answer->answer = $request->answer;
        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();

    }

    public function single_line_right_gap_index($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);

        if ($lsubsection->questions->where('example','=',false)->count() == ($lsubsection->end - $lsubsection->start)+1){
            return redirect()->route('listening.section.index',$listening_id);
        }

        return view('exam_controller.listening.section.sub-section.question_type.single_line_right_gap')->withLsubsection($lsubsection);
    }

    public function single_line_right_gap_store(Request $request,$listening_id,$section_id,$sub_section_id){

        // return $request;

        $this->validate($request,[

            'qnumber'   => 'required',
            'question'  => 'required',
            'answer'    => 'required'

        ]);

        $example = false;

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;

        }

        $question = new Lquestion();

        $question->lsubsection_id = $sub_section_id;
        $question->qnumber  = $request->qnumber;
        $question->question = $request->question;
        $question->example  = $example;

        $question->save();

        $answer = new Lanswer();

        $answer->lquestion_id = $question->id;
        $answer->answer = $request->answer;

        $answer->save();

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();

    }

    public function table_row_two_right_list_item_index($listening_id,$section_id,$sub_section_id){

        $lsubsection =  Lsubsection::find($sub_section_id);

        return view('exam_controller.listening.section.sub-section.question_type.table_row_two_right_list_item_index')->withLsubsection($lsubsection);

    }

    public function table_row_two_right_list_item_store(Request $request,$listening_id,$section_id,$sub_section_id){




        $this->validate($request,[
            'question',
            'qnumber'
        ]);

        $example = false;

        $question = '';

        if ($request->has('example')){

            $example = true;
            $request->qnumber = 0;




            if ($request->has('row_start')){

                $question = '<tr><td>'.$request->first_data.'</td>  <td><ul><li>'.$request->question.'</li>';



            }
            else if ($request->has('row_end')){

                $question = '<li>'.$request->question. '</li> </ul></td></tr>';



            }
            else{
                $question = '<li>'.$request->question.'</li>';
            }

        }else{



            if ($request->has('row_start')){

                 $question = '<tr><td>'.$request->first_data.'</td>  <td><ul><li>'.$request->question.'<span class="list-item-right" value="'.(Lquestion::all()->last()->id + 1).'">'.$request->qnumber.'</span></li>';



            }
            else if ($request->has('row_end')){

                $question = '<li>'.$request->question.'<span class="list-item-right" value="'.(Lquestion::all()->last()->id + 1).'">'.$request->qnumber.'</span> </li> </ul></td></tr>';



            }
            else{
                $question = '<li>'.$request->question.'<span class="list-item-right" value="'.(Lquestion::all()->last()->id + 1).'">'.$request->qnumber.'</span></li>';
            }



        }



        $lquestion = new Lquestion();

        $lquestion->lsubsection_id = $sub_section_id;

        $lquestion->question = $question;
        $lquestion->qnumber = $request->qnumber;
        $lquestion->example = $example;
        $lquestion->save();



        if (!$request->has('example')){

            $lanswer = new Lanswer();

            $lanswer->answer = $request->answer;
            $lanswer->lquestion_id = $lquestion->id;
            $lanswer->save();


        }

        \Session::flash('msg','Question number '.$request->qnumber." Created");

        return redirect()->back();






    }

}

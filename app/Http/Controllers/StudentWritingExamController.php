<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Examanswerstore;
use App\Examwritingstore;
use App\Writing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentWritingExamController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('student');


    }
    public function index($writing_id){


        $writing = Writing::find($writing_id);



        return view('student_exam.writing_test.writing_exam')->withWriting($writing);






    }
    public function finish(Request $request,$writing_id){


        $this->validate($request,
            [
                'passage' =>'required |min:150'
            ]
        );

        $exam_id = Writing::find($writing_id)->exam->id;

        /*now check if the exam is available for the user*/

        $user_id = Auth::user()->id;

         @$ans = Examanswerstore::where([

            ['user_id','=',$user_id],
            ['exam_id','=',$exam_id]
        ])->count();

        if ($ans >0){

        }else{


            $exam_answer_store = new Examanswerstore();

            $exam_answer_store->user_id = $user_id;
            $exam_answer_store->exam_id = $exam_id;
            $exam_answer_store->writing_point = -1;

            $exam_answer_store->save();

            $exam_writing_store = new Examwritingstore();

            $exam_writing_store->examanswerstore_id = $exam_answer_store->id;

            $exam_writing_store->answer = $request->passage;

            $exam_writing_store->wsection_id = $wsection_id;

            $exam_writing_store->viewed = false;

            $exam_writing_store->save();

            return view('student_exam.writing_test_writing_test');



        }






    }

}

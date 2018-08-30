<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class AddedExamsOperationController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('admin');

    }
    public function index($test_id){

        $exams = Test::find($test_id)->exams;

        return view('exam_controller.test_exam_operations.index')->withExams($exams);

    }

    public function remove($test_id,$exam_id){

        $test = Test::find($test_id);

        $test->exams()->detach($exam_id,false);



    }



}

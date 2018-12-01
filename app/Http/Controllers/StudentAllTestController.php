<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Course;

class StudentAllTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('student');
    }

    public function index($test_type)
    {
        //

        $list = array();

        $list['academic'] = Course::findOrFail(1)->tests->where('status',1);
        $list['general'] = Course::findOrFail(2)->where('status',1);
        $list['type'] = $test_type;
        $list['all'] = Test::where('status',1)->get();


        return view('student_exam.all_test')->with('list',$list);
    }

    public function test_room($test_id){

        $singe_test = Test::find($test_id);

       return view('student_exam.test_room')->with('single_test',$singe_test);

    }

}

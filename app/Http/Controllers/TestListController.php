<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use Illuminate\Http\Request;

class TestListController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');

    }

    public function index(){

        $list = array();

        $list['academic'] = Course::findOrFail(1)->tests;
        $list['general'] = Course::findOrFail(2)->tests;
        $list['all'] = Test::all();


        return view('exam_controller.test_list')->with('list',$list);


    }

}

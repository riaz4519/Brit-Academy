<?php

namespace App\Http\Controllers;

use App\Course;
use App\Test;
use Illuminate\Http\Request;


class TestController extends Controller
{


    public function __construct()
    {
         $this->middleware('admin');
    }

    //
    public function index(){

        $course = Course::all();

        return view('exam_controller.create')->with('courses',$course);

    }
    public function create(Request $request){

        $this->validate($request,array(

            'title' =>'max:255',


        ));

        $test = new Test();

        $test->title = $request->title;
        $test->image = "empty";
        $test->save();
        $test->courses()->sync($request->test_type,false);
        return redirect()->back();




    }
}

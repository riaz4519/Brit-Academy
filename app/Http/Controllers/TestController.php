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

            'title'       =>'max:255 | required',
            'description' => 'min:25|required',
            'test_type'   =>'required',


        ));

        $test = new Test();

        $test->title       = $request->title;
        $test->description = $request->description;
        $test->image       = "empty";
        $test->course_id   = $request->test_type;
        $test->save();
        //$test->courses()->sync($request->test_type,false);
        \Session::flash('msg', 'Test Created Successfully' );
        return redirect()->back();




    }
}

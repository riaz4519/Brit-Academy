<?php

namespace App\Http\Controllers;

use App\Course;
use App\Reading;
use Illuminate\Http\Request;

class AdminReadingTestController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('admin');

    }
    public function createPage(){

        $courses = Course::all();

        return view('exam_controller.reading.create')->with('courses',$courses);

    }

    public function create(Request $request){

        $request->validate([
            'title'        => 'min:25|max:200|required',
            'description' =>'min:25|required',
            'course'      => 'required',


        ]);

        $read = new Reading();

        $read->title = $request->title;
        $read->description = $request->description;
        $read->course_id = $request->course;
        $read->status = false;
        $read->save();
        \Session::flash('msg', 'Created Successfully' );
        return redirect()->back();

    }


}

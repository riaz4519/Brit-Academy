<?php

namespace App\Http\Controllers;

use App\Course;
use App\Writing;
use Illuminate\Http\Request;

class AdminWritingTestController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create(){


        $courses = Course::all();


        return view('exam_controller.writing.create')->withCourses($courses);


    }
    public function store(Request $request){


        $this->validate($request,[

            'title'       => 'required|min:25',
            'description' => 'required|min:25',
            'course'      => 'required'

        ]);



        $writing = new Writing();

        $writing->title = $request->title;
        $writing->description = $request->description;
        $writing->course_id = $request->course;
        $writing->save();
        \Session::flash('msg', 'Created Successfully' );
        return redirect()->back();





    }


}

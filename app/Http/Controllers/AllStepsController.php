<?php

namespace App\Http\Controllers;

use App\Reading;
use Illuminate\Http\Request;

class AllStepsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){



        $reading = Reading::all();

        return view('exam_controller.reading.show_all_steps')->withReadings($reading);


    }


}

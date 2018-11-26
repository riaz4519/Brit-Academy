<?php

namespace App\Http\Controllers;

use App\Listening;
use App\Reading;
use App\Writing;
use Illuminate\Http\Request;

class AllStepsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        $steps = array();
        $steps['reading']   = Reading::all();
        $steps['writing']   = Writing::all();
        $steps['listening'] = Listening::all();

        return view('exam_controller.reading.show_all_steps')->withSteps($steps);


    }


}

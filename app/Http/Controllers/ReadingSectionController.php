<?php

namespace App\Http\Controllers;

use App\Reading;
use App\Rsection;
use Illuminate\Http\Request;

class ReadingSectionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index($reading_id){


        return view('exam_controller.reading.section.index');


    }

    public function create($reading_id,Request $request){

        $this->validate($request,[
            'passage' => 'required|min:10',
            'title'   => 'required|min:10'

        ]);


        $rsection = new Rsection();
        $rsection->passage = $request->passage;
        $rsection->title = $request->title;
        $rsection->starts = 0;
        $rsection->end = 0;
        $rsection->image = 'empty';
        $rsection->save();
        $rsection->readings()->sync($reading_id,false);

        \Session::flash('msg','Reading Updated Successfully');

        return redirect()->back();








    }

    public function check(){


        $read = Reading::find(1);
        return $read->rsections->get(0)->starts;

    }

}

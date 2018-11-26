<?php

namespace App\Http\Controllers;

use App\Listening;
use App\Lsection;
use Illuminate\Http\Request;

class ListeningSectionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($id){

        $listening = Listening::find($id);

        return view('exam_controller.listening.section.index')->withListening($listening);

    }

    public function create($listening_id){

        return view('exam_controller.listening.section.create');

    }

    public function store(Request $request,$listening_id){



        $this->validate($request,
            [
                'section_number' => 'required|min:0|max:4'
            ]
        );

        $section_number = $request->section_number;

        $start = 0;
        $end = 0;

        if ($section_number == 1){


            $start = 1;
            $end = 10;

        }elseif ($section_number == 2){

            $start = 11;
            $end = 20;

        }elseif ($section_number == 3){

            $start = 21;
            $end = 30;
        }elseif ($section_number == 4){

            $start = 31;
            $end = 40;

        }

        $lsection = new Lsection();

        $lsection->listening_id = $listening_id;

        $lsection->section_number = $section_number;

        $lsection->start = $start;

        $lsection->end   = $end;

        $lsection->save();

        return redirect()->back();



    }

}

<?php

namespace App\Http\Controllers;

use App\Lsubsection;
use App\Lsubsectiondrop;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LsubsectiondropController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function create($listening_id,$section_id,$sub_section_id){

        $lsubsection = Lsubsection::find($sub_section_id);

        return view('exam_controller.listening.section.sub-section.sub-drop.add_drop_down')->withLsubsection ($lsubsection);

    }
    public function store(Request $request,$listening_id,$section_id,$sub_section_id){


        $this->validate($request,[

            'option'    => 'required | array',


        ]);

        $option = $request->option;

        for ($i = 0;$i<count($option);$i++){

            $lsubsection_drop = new Lsubsectiondrop();

            $lsubsection_drop->lsubsection_id = $sub_section_id;

            $lsubsection_drop->option = $request->option[$i];

            $lsubsection_drop->save();


        }


        return redirect()->route('listening.section.index',$listening_id);



    }

}

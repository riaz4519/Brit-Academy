<?php

namespace App\Http\Controllers;

use App\Lsubsectiondrop;
use Illuminate\Http\Request;
use App\Lsubsection;

class LsubThreeColumnTableDropdownController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create($listening_id,$section_id,$sub_section_id){


        $lsubsection = Lsubsection::find($sub_section_id);

        return view('exam_controller.listening.section.sub-section.sub-drop.three_column_drop_down_random')->withLsubsection ($lsubsection);


    }
    public function store(Request $request,$listening_id,$section_id,$sub_section_id){

        $this->validate($request,[

            'option'    => 'required | array',
            'value'     => 'required | array'


        ]);

        $option = $request->option;

        for ($i = 0;$i<count($option);$i++){

            $lsubsection_drop = new Lsubsectiondrop();

            $lsubsection_drop->lsubsection_id = $sub_section_id;

            $lsubsection_drop->option = $request->option[$i];
            $lsubsection_drop->value = $request->value[$i];

            $lsubsection_drop->save();


        }


        return redirect()->route('listening.section.index',$listening_id);


    }
}

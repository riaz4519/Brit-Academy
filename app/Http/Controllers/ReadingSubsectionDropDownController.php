<?php

namespace App\Http\Controllers;

use App\Rdrop;
use App\Rsub;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ReadingSubsectionDropDownController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('admin');

    }

    public function create($reading_id,$rsection_id,$rsub_id){

        $rsub  = Rsub::find($rsub_id);

        return view('exam_controller.reading.section.sub-section.sub_section_dropdown')->withRsub($rsub);


    }
    public function store($readingd_id,$rsection_id,$rsub_id,Request $request){



        $this->validate($request,[

            'option' =>'required',
            'value'  =>'required',

        ]);


        $option_count = $request->option;
        $count = sizeof($option_count);
        $option = array();
        $value = array();

        $option = $request->option;
        $value = $request->value;
       for ($i=0;$i<$count;$i++){
           $rdrop = new Rdrop();

           $rdrop->option  = $option[$i];
           $rdrop->value   = $value[$i];
           $rdrop->rsub_id = $rsub_id;
           $rdrop->save();

       }
        \Session::flash('msg','DropDown Added Successfully');
        return redirect('/admin/show-all-steps/add-section/'.$readingd_id.'/show-section/'.$rsection_id);






    }


}

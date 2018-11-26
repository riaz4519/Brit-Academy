<?php

namespace App\Http\Controllers;

use App\Reading;
use App\Rsection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReadingSectionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($reading_id){

        //getting reading sections value by reading id

        $reading_steps_values = Reading::find($reading_id)->rsections;

        return view('exam_controller.reading.section.index')->withSections($reading_steps_values);

    }

    public function sectionForm($reading_id){



       $reading_section_count = Reading::find($reading_id)->rsections->count();

       if ($reading_section_count >= 3){

           \Session::flash('msg','Already 3 Steps Are added');
           return redirect()->back();
       }

        return view('exam_controller.reading.section.section-form')->with('count',$reading_section_count);


    }

    public function create($reading_id,Request $request){

        $this->validate($request,[
            'passage' => 'required|min:10',
            'title'   => 'required|min:10',
            'start'   => 'required',
            'end'     => 'required'

        ]);


        $rsection = new Rsection();
        $rsection->passage = $request->passage;
        $rsection->title = $request->title;
        $rsection->starts = $request->start;
        $rsection->end = $request->end;
        $rsection->image = 'empty';
        $rsection->save();
        $rsection->readings()->sync($reading_id,false);

        \Session::flash('msg','Reading created Successfully');

        return redirect('/admin/show-all-steps/add-section/'.$reading_id);








    }


    public function showSection($reading_id,$section_id){



        $rsection = Rsection::find($section_id);

        return view('exam_controller.reading.section.show-section')->withRsection($rsection);

    }

    public function check(){


        $read = Reading::find(1);
         return $read->rsections->get(1)->pivot->rsection_id;


    }
    public function updateSection($reading_id,$section_id){

        $rsection = Rsection::find($section_id);

        return view('exam_controller.reading.section.update-section')->withRsection($rsection);



    }

    public function update($reading_id,$section_id,Request $request){

        $this->validate($request,[
            'passage' => 'required|min:10',
            'title'   => 'required|min:10',
            'start'   => 'required',
            'end'     => 'required'

        ]);


        $rsection = Rsection::find($section_id);
        $rsection->passage = $request->passage;
        $rsection->title = $request->title;
        $rsection->starts = $request->start;
        $rsection->end = $request->end;
        $rsection->image = 'empty';
        $rsection->save();
        $rsection->readings()->sync($reading_id,false);

        \Session::flash('msg','Section Updated Successfully');

        return redirect()->back();

    }


}

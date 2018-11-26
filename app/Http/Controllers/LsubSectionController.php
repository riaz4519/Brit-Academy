<?php

namespace App\Http\Controllers;

use App\Lsubsection;
use App\Ltype;
use Illuminate\Http\Request;

class LsubSectionController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('admin');

    }

    public function create($listening_id,$section_id){


        $types = Ltype::all();

        return view('exam_controller.listening.section.sub-section.create')->withTypes($types);



    }

    public function store(Request $request,$listening_id,$section_id){

        $this->validate($request,[

            'ltype_id' => 'required',
            'time_start' =>'required',

        ]);

        $detail=$request->body;

        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($detail);

        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            if (!strpos($data,'img/listening_sub')){

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                $image_name= time().$k.'.png';
                $image_asset = "/img/listening_sub/$image_name";
                $path = public_path() .'/img/listening_sub/'. $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_asset);

            }


        }
        $detail = $dom->savehtml();

        $lsubSection = new Lsubsection();

        $lsubSection->lsection_id = $section_id;
        $lsubSection->body = $detail;

        $lsubSection->time_start = $request->time_start;
        $lsubSection->time_end = $request->time_end;
        $lsubSection->ltype_id = $request->ltype_id;
        $lsubSection->start = $request->start;
        $lsubSection->end = $request->end;
        $lsubSection->save();


        \Session::flash('msg', 'Created Successfully');
        return redirect()->route('listening.section.index',$listening_id);
    }
}

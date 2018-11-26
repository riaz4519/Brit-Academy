<?php

namespace App\Http\Controllers;

use App\Writing;
use App\Wsection;
use Illuminate\Http\Request;

class WritingSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($writing_id)
    {
        //


        $writing = Writing::find($writing_id);

        return view('exam_controller.writing.section.index')->withWriting($writing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reading_id)
    {

        return view('exam_controller.writing.section.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$writing_id)
    {

        $this->validate($request,[

            'title' => 'required',
            'passage' =>'required',

        ]);

        $detail=$request->passage;

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $image_asset = url('/')."/img/writing_task/$image_name";
            $path = public_path() .'/img/writing_task/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_asset);
        }
        $detail = $dom->savehtml();

        $wsection = new Wsection();

        $wsection->title = $request->title;
        $wsection->body = $detail;
        $wsection->writing_id = $writing_id;
        $wsection->save();

        \Session::flash('msg', 'Created Successfully');
        return redirect()->back();






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($writing_id,$wsection_id)
    {
        //

        $wsection = Wsection::find($wsection_id);

        return view('exam_controller.writing.section.edit')->withWsection($wsection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $writing_id,$wsection_id)
    {
        //

        $this->validate($request,[

            'title' => 'required',
            'passage' =>'required',

        ]);

        $detail=$request->passage;

        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($detail);

        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            if (!strpos($data,'img/writing_task')){

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                $image_name= time().$k.'.png';
                $image_asset = url('/')."/img/writing_task/$image_name";
                $path = public_path() .'/img/writing_task/'. $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_asset);

            }


        }
      $detail = $dom->savehtml();

        $wsection =  Wsection::find($wsection_id);

        $wsection->title = $request->title;
        $wsection->body = $detail;
        $wsection->writing_id = $writing_id;
        $wsection->save();

        \Session::flash('msg', 'Created Successfully');
        return redirect()->route('writing.section.index',$writing_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($writing_id,$wsection_id)
    {
        //

         Wsection::find($wsection_id)->delete();

         return redirect()->back();

    }
}

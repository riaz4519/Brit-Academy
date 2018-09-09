<?php

namespace App\Http\Controllers;

use App\Rsub;
use App\Type;
use Illuminate\Http\Request;

class ReadingSubSectionController extends Controller
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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reading_id,$sub_id)
    {
        //

        $type = Type::all();

        return view('exam_controller.reading.section.sub-section.create')->withTypes($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($reading_id,$rsection_id,Request $request)

    {



        $this->validate($request,[
            'passage' => 'required|min:10',
            'start'   => 'required',
            'type'    => 'required',
            'end'     => 'required'

        ]);


        $rsub = new Rsub();
        $rsub->body = $request->passage;
        $rsub->type_id = $request->type;
        $rsub->rsection_id = $rsection_id;
        $rsub->start = $request->start;
        $rsub->end = $request->end;
        $rsub->save();

        \Session::flash('msg','Sub section Has been created');

        return redirect('http://localhost:8000/admin/show-all-steps/add-section/'.$reading_id.'1/show-section/'.$rsection_id);

        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addQuestion(){



    }
}

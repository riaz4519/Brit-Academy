@extends('layout.exam_controller')

@section('title','Single label question')

@section('container')
    <div class="container">

        <div class="row mt-5">

            <div class="col-7 offset-3">

                <div class="card">

                    @if(Session::has('msg'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong> {!! Session::get('msg') !!}</strong>
                        </div>

                    @endif

                    {{--variable--}}

                    @php

                        $question_added = $lsubsection->questions->where('example','=',false)->count();

                        $question_needed = ($lsubsection->end - $lsubsection->start)+1;


                    @endphp

                    {{--end variable--}}

                    <div class="card-header text-center border border-info">
                        <h5 class="font-bold">Single Label answer question @if($question_needed == $question_added) <span class="font-bold badge-info">(Example)</span> @endif</h5>
                        <span class="font-italic">Question number : {{ $lsubsection->questions->where('example','=',false)->count() }} of {{ ($lsubsection->end - $lsubsection->start)+1 }} ({{$lsubsection->start.' - '. $lsubsection->end }})</span>

                    </div>

                    <form method="post" action="{{ route('listening.sub.single_label_answer_store',['listening_id'=>Request::Segment(3),'section_id'=>Request::Segment(5),'sub_section_id'=>$lsubsection->id]) }}" >
                        {{csrf_field()}}

                        <input type="text" name="qnumber" value="{{ $lsubsection->start+$lsubsection->questions->where('example','=',false)->count() }}" hidden>

                        <div class="card-body">

                            <div class="row mt-5">

                                <div class="col example-hide">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Answer</label>
                                        <input type="text" class="form-control" name="answer" id="formGroupExampleInput" placeholder="Answer" required>
                                    </div>

                                </div>

                            </div>





                        </div>

                        <div class="card-footer">

                            <div class="row justify-content-end">

                                <div class="col-3">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>

                            </div>

                        </div>

                    </form>



                </div>

            </div>



        </div>

    </div>

    @endsection
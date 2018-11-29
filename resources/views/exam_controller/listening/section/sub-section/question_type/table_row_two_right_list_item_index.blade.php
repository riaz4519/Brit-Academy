@extends('layout.exam_controller')

@section('title','Table two row -right list item')

@section('container')

    <div class="container">

        <div class="row mt-5">

            <div class="col-10 offset-1">

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
                        <h5 class="font-bold">Single Line Right Gap @if($question_needed == $question_added) <span class="font-bold badge-info">(Example)</span> @endif</h5>
                        <span class="font-italic">Question number : {{ $lsubsection->questions->where('example','=',false)->count() }} of {{ ($lsubsection->end - $lsubsection->start)+1 }} <b>({{ $lsubsection->start.' - '.$lsubsection->end }})</b> now ({{ $lsubsection->start + $question_added}})</span>

                    </div>



                    <form method="post" action="{{ route('listening.sub.table_row_two_right_list_item_store',['listening_id'=>Request::Segment(3),'section_id'=>Request::Segment(5),'sub_section_id'=>$lsubsection->id]) }}" >
                        {{csrf_field()}}

                        <input type="text" name="qnumber" value="{{ $lsubsection->start+$lsubsection->questions->where('example','=',false)->count() }}" hidden>

                        <div class="card-body">



                            <div class="row justify-content-center font-bold" @if($question_needed == $question_added) hidden @endif >

                                <div class="form-check form-check-inline">

                                    <label class="form-check-label" for="inlineRadio1">Select Question type:</label>
                                    <div class="divider"></div>
                                </div>

                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input example_input" type="checkbox"  id="example_check" name="example">
                                    <label class="form-check-label" for="example_check">Example</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input row_check" type="checkbox"  id="row_start" name="row_start">
                                    <label class="form-check-label" for="row_start">Row Start</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input " type="checkbox" id="row_end" name="row_end">
                                    <label class="form-check-label" for="row_end">Row End</label>
                                </div>

                            </div>



                            <div class="row mt-5 ">

                                <div class="col row_start" >

                                    <div class="form-group ">
                                        <label for="formGroupExampleInput">First Table Data</label>
                                        <input type="text" class="form-control row_start_input" name="first_data" id="formGroupExampleInput" placeholder="first table data" >
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Question</label>
                                        <input type="text" class="form-control question"   id="formGroupExampleInput" name="question" placeholder="Question" required>
                                    </div>

                                </div>
                                <div class="col example-hide">

                                    <div class="form-group ">
                                        <label for="formGroupExampleInput">Answer</label>
                                        <input type="text" class="form-control answer_input" name="answer" id="formGroupExampleInput" placeholder="Answer" required>
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

@section('script')

    <script>

        $(document).ready(function () {

            $('.row_start').hide();


             $('.example_input').on('click',function () {

             if ($(this).context.checked){

             $('.example-hide').hide();

             $('.answer_input').removeAttr('required');

             }else{
             $('.example-hide').show();
                 $('.answer_input').attr('required','required');
             }


             });

            $('.row_check').on('click',function () {

                if($(this).context.checked){

                    $('.row_start').show();

                    $('.row_start_input').attr('required','required');
                }
                else{


                    $('.row_start').hide();

                    $('.row_start_input').removeAttr('required');

                }

            });




        });


    </script>

@endsection
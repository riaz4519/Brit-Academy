@extends('layout.exam_controller')

@section('title','Listening section')



@section('container')

    <div class="container">

        <div class="row">

            <div class="col-8">


                {{-- audio goes here --}}

                <div class="row">

                    <div class="col-12">

                        <audio controls id="audio_sound" class="" style="width: 100%">

                            <source src="{{url($listening->audio)}}"  type="audio/ogg" >


                        </audio>


                    </div>




                </div>

                {{--audio end here--}}


                {{--section goes here--}}

                {{--section info--}}

                <div class="row justify-content-center ">



                        <div class="col-12 mt-3">

                            <div class="card border-info">

                                <div class="card-header text-center">

                                    <h5>Listening Info Box</h5>

                                </div>

                                <div class="card-body ">

                                    <div class="row ">

                                        <div class="col border-success">
                                            <span><b>Number of section</b></span>

                                            @if($listening->lsections->count() == 0)

                                                <p >No section Added</p>
                                                <a href="{{ route('listening.section.create',$listening->id) }}" class="btn btn-danger">Add Section</a>

                                                @elseif($listening->lsections->count() >=1 && $listening->lsections->count() <=3)

                                                    <p class="border-success">{{ $listening->lsections->count() }} - Section Added</p>
                                                    <a href="{{ route('listening.section.create',$listening->id) }}" class="btn btn-danger">Add Section</a>


                                            @endif




                                        </div>
                                        <div class="col border-success">

                                            <span><b>sub section</b></span>


                                        </div>
                                        <div class="col border-success">

                                            <span><b>Question</b></span>


                                        </div>

                                    </div>



                                </div>

                            </div>

                        </div>





                </div>

                {{--end section info--}}


                {{--start show section--}}

                @foreach($listening->lsections as $lsection)

                    <div class="section-subsection-wrapper  border border-dark p-1 mt-2">


                        <div class="row  mt-2">
                            {{--section header with section number and section range--}}
                            <span class="font-bold col-10">Section {{ $lsection->section_number }} : QUESTION {{ $lsection->start .'-'. $lsection->end }} </span>

                            {{--edit section link--}}
                            <span class="col-2 "><a href="" class="btn btn-sm btn-link btn-outline-dark">Edit Section</a></span>

                        </div>

                        {{--sub section adding if the question adding is not enough--}}


                        {{--getting the require values--}}
                            @php

                            $end_point_of_section = $lsection->end;
                            $end_point_of_subsection = $lsection->lsubsections->max('end');

                            $question_needed_for_section = ($lsection->end - $lsection->start)+1;

                            $min_point_of_subsection = $lsection->lsubsections->min('start');

                            $number_question_added = ($end_point_of_subsection - $min_point_of_subsection)+1;

                            $number_question_need_now = ($question_needed_for_section - $number_question_added);

                            @endphp


                      {{--       @foreach($lsection->lsubsections as $lsubsection)

                                 @php
                                     $number_of_question_added_to_section += $lsubsection->questions->where('example','=',false)->count();
                                 @endphp


                                 @endforeach

                             @php
                            $decision_for_sub_section = $number_of_question_needed_for_section-$number_of_question_added_to_section;

                            @endphp--}}


                        {{--end getting the require values--}}


                        @if($end_point_of_section != $end_point_of_subsection)

                            <div class="row mt-2 ">

                                <div class="col-6">
                                    <p class="font-bold" style="color: red">{{$number_question_need_now}} question Left .Need to add subsection</p>
                                </div>


                                <div class="col-3 ">

                                    <a href="{{ route('listening.section.sub.create',['listening_id'=>Request::Segment(3),'section_id'=>$lsection->id]) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-plus-square"></i> Add Subsection</a>
                                </div>
                            </div>

                            @endif


                        {{--end subsection adding--}}

                        {{--sub section--}}





                        {{--when there is no sub-section--}}
{{--                            @if($lsection->lsubsections->count() == 0)

                            <div class="row mt-2">

                                <div class="col-3">
                                    <p class="font-bold" style="color: red">No sub section Added</p>
                                </div>


                                <div class="col-3 ">

                                    <a href="{{ route('listening.section.sub.create',['listening_id'=>Request::Segment(3),'section_id'=>$lsection->id]) }}" class="btn btn-outline-info">Add Subsection</a>
                                </div>
                            </div>--}}

                        {{--end when there is no sub-section--}}

                                {{--start iterate sub section--}}

                                @if($lsection->lsubsections->count() > 0)


                                @foreach($lsection->lsubsections as $lsubsection)

                                    <div class="row mt-2">

                                        <div class="col-3">
                                            <p class="font-bold " style="font-size: 1.3em">Questions {{ $lsubsection->start }} - {{ $lsubsection->end }}</p>

                                        </div>

                                        <div class="col-3">
                                            <span class="btn btn-outline-info btn-sm"><i class="fa fa-edit "></i>Edit</span>

                                        </div>

                                        <div class="col-3">
                                            <span class="btn btn-outline-info btn-sm button-start-from" value="{{ $lsubsection->time_start }}"><i class="fa fa-headphones"></i>Listen from here</span>

                                        </div>

                                        <div class="col-3">
                                            <span class="btn btn-outline-info btn-sm"><i class="fa fa-clipboard"></i>Show Notepad</span>
                                        </div>


                                    </div>

                                    {{--decleartion of varible --}}

                                        @php
                                            $number_of_question_added = $lsubsection->questions->where('example','=',false)->count();
                                            $number_of_question_needed = ($lsubsection->end - $lsubsection->start)+1

                                        @endphp

                                    {{--end of decleartion of variable--}}






                                <div class="row ">


                                        <div class="col-12">
                                            <hr >

                                            {!! $lsubsection->body !!}



                                        </div>

                                    </div>

                                {{--is the number of question added is zero--}}

                                @if($number_of_question_added == 0)


                                    <div class="row">

                                        <div class="col-6 ">

                                            {{--for subsection drop down check--}}

                                            @if($lsubsection->ltypes->name == 'Single Line - Drop Down Left' )

                                                @if($lsubsection->lsubsectionDrops->count() == 0 )

                                                    <p class="font-bold border border-danger text-center" style="color: red"> Nedd To add Drop Option first For the Subsection</p>


                                                    @else
                                                        <p class="font-bold border border-danger text-center" style="color: red">No Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->count()." Question"  }} </p>

                                                @endif

                                            @elseif($lsubsection->ltypes->name == 'Table 3-column.Random Drop Down')

                                                @if($lsubsection->lsubsectionDrops->count() == 0 )

                                                    <p class="font-bold border border-danger text-center" style="color: red"> Nedd To add Drop Option first For the Subsection</p>

                                                @else
                                                    <p class="font-bold border border-danger text-center" style="color: red">No Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->count()." Question"  }} </p>

                                                @endif

                                            @else

                                                <p class="font-bold border border-danger text-center" style="color: red">No Question Added.Have to Add {{ ( ($lsubsection->end - $lsubsection->start) +1)-$lsubsection->questions->count()." Question"  }} </p>
                                            @endif

                                            {{--end sub section drop down check--}}

                                        </div>
                                        <div class="col-3">

                                            @if($lsubsection->ltypes->name == 'fill Blank - single line ')

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_q',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                                @elseif($lsubsection->ltypes->name == 'Table - Two Row - Answer Left')

                                                    <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.table_row_two_left_ans_create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                                @elseif($lsubsection->ltypes->name == 'Radio type')
                                                    <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.radio_type_self_option_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                                @elseif($lsubsection->ltypes->name == 'Single Line - Drop Down Left' )

                                                    {{--for drop down--}}
                                                    @if($lsubsection->lsubsectionDrops->count() == 0)

                                                    <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.drop.create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add DropDown</a>

                                                     @else

                                                        <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_drop_down_left_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                                    @endif



                                                @elseif($lsubsection->ltypes->name == 'Table 3-column.Random Drop Down' )

                                                    {{--for drop down--}}
                                                    @if($lsubsection->lsubsectionDrops->count() == 0)

                                                        <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.three_column_drop_create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add DropDown</a>

                                                    @else

                                                        <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.three_column_drop_down_random_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                                    @endif


                                                @elseif($lsubsection->ltypes->name == 'Single Label Answer' )

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_label_answer_create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>
                                                @elseif($lsubsection->ltypes->name == 'Single Line Right Gap' )

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_right_gap_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>
                                                @elseif($lsubsection->ltypes->name == 'Table row two - list item right' )

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.table_row_two_right_list_item_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>



                                            @endif

                                        </div>

{{--
                                        showing dropp down list for three column drop down random

                                        @if($lsubsection->ltypes->name == 'Table 3-column.Random Drop Down' && $lsubsection->lsubsectionDrops->count() > 0)


                                            <table class="table table-bordered table-hover">

                                                <tbody>

                                                @foreach($lsubsection->lsubsectionDrops as $)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                            @endif



                                        end of drop down threee column random--}}


                                    </div>
                                    {{-- zero end--}}


                                    {{-- if the number of question is greater then zero but less the number of question needed--}}

                                @elseif($number_of_question_added > 0 && $number_of_question_added < $number_of_question_needed)

                                    {{--question showing for fill the blank -single line--}}

                                    @if($lsubsection->ltypes->name == 'fill Blank - single line ')
                                        {{--status--}}
                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added.Now You can Only Add Example Question </p>


                                            </div>
                                            <div class="col-3">
                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_q',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                            </div>


                                        </div>
                                        {{--status--}}

                                        {{--question showing for fill the blank -single line--}}

                                        <div class="row">

                                            <div class="col-12 ">
                                                <table class="table table-bordered table-hover">

                                                    <thead >

                                                    <tr>

                                                        <th class="text-center">Question</th>
                                                        <th class="text-center">Answer</th>

                                                    </tr>


                                                    </thead>
                                                    <tbody>

                                                    {{--shwoing question--}}

                                                    @foreach($lsubsection->questions as $question)
                                                        <tr>
                                                            <td>{{ $question->question }}</td>
                                                            <td>
                                                                {{--example --}}
                                                                @if($question->example)
                                                                    {{ $question->answers->answer }}
                                                                    <span class="font-bold">(Example)</span>
                                                                    {{--end example--}}

                                                                    {{--answer field with number--}}
                                                                @else
                                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                                    <span><input type="text"  class="input-fild-border" name="question[{{$question->id}}]"></span>

                                                                    {{--end answer field with number--}}

                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                    {{--end of showing question--}}

                                                </table>
                                            </div>



                                        </div>

                                        {{--end of question for fill the blank single line--}}


                                    {{--Table - Two Row - Answer Left--}}

                                @elseif($lsubsection->ltypes->name == 'Table - Two Row - Answer Left')


                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-danger text-center" style="color: red">{{ $lsubsection->questions->where('example','=',false)->count() }} Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->where('example','=',false)->count()." Question"  }} </p>

                                            </div>
                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.table_row_two_left_ans_create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-12 ">
                                                <table class="table table-bordered table-hover">


                                                    <tbody>

                                                    {{--shwoing question--}}

                                                    @foreach($lsubsection->questions as $question)
                                                        <tr>

                                                            <td>
                                                                {{--example --}}
                                                                @if($question->example)
                                                                    {{ $question->answers->answer }}
                                                                    <span class="font-bold">(Example)</span>
                                                                    {{--end example--}}

                                                                    {{--answer field with number--}}
                                                                @else
                                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                                    <span><input type="text"  class="input-fild-border" name="question[{{$question->id}}]"></span>

                                                                    {{--end answer field with number--}}

                                                                @endif
                                                            </td>
                                                            <td class="font-bold pl-4 pr-5 text-center"> {{ $question->question }} </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                    {{--end of showing question--}}

                                                </table>
                                            </div>



                                        </div>



                                    {{--end Table - Two Row - Answer Left--}}

                                        {{--start radio type self --}}

                                    @elseif($lsubsection->ltypes->name == 'Radio type')

                                        {{--status--}}

                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-danger text-center" style="color: red">{{ $lsubsection->questions->where('example','=',false)->count() }} Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->where('example','=',false)->count()." Question"  }} </p>

                                            </div>
                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.radio_type_self_option_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>

                                        </div>

                                        {{--status--}}



                                        @foreach($lsubsection->questions as $question)
                                            <div class="form-group pl-4">
                                                <div class="row">
                                                    <span class="green-number">{{$question->qnumber}}</span><strong class="col-9">{{$question->question}}</strong>
                                                </div>


                                                @foreach($question->lqoptions as $lqoption)

                                                    <div class="form-check">
                                                        <strong class="mr-4 text-center">{{$lqoption->option}}.</strong><input class="form-check-input" name="{{$question->qnumber}}[]" type="radio" value="" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            {{$lqoption->value}}
                                                        </label>
                                                    </div>

                                                @endforeach

                                            </div>
                                        @endforeach



                                        {{--end radio type self --}}

                                        {{--random type three column--}}

                                    @elseif($lsubsection->ltypes->name == 'Table 3-column.Random Drop Down')

                                        <table class="table table-bordered ">

                                            <tbody >
                                            @foreach($lsubsection->questions as $question )


                                                <tr value="{{ $question->id }}">
                                                    {!! $question->question !!}
                                                </tr>

                                                @endforeach

                                            </tbody>

                                        </table>
                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-danger text-center" style="color: red">{{ $lsubsection->questions->where('example','=',false)->count() }} Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->where('example','=',false)->count()." Question"  }} </p>

                                            </div>
                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.three_column_drop_down_random_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>

                                        </div>

                                        {{--end random type thre column--}}


                                        {{--single label anser --}}

                                    @elseif($lsubsection->ltypes->name == 'Single Label Answer')

                                        <div class="row">

                                            @foreach($lsubsection->questions as $question)
                                            <div class="col-12 mt-4 ml-2">
                                                <span class="green-number" >{{ $question->qnumber }}</span>

                                                <span><input type="text"  class="input-fild-border ml-3" name="question[{{$question->id}}]"></span>

                                            </div>
                                                @endforeach
                                        </div>

                                        {{--end single label answer--}}

                                        {{--single line right gap--}}

                                    @elseif($lsubsection->ltypes->name == 'Single Line Right Gap' )

                                        {{--status--}}

                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-danger text-center" style="color: red">{{ $lsubsection->questions->where('example','=',false)->count() }} Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->where('example','=',false)->count()." Question"  }} </p>

                                            </div>
                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_right_gap_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>

                                        </div>

                                        {{--status--}}

                                    {{--question--}}

                                        <div class="row">

                                            @foreach($lsubsection->questions as $question)
                                                <div class="col-12 mt-4 ml-2">
                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                    <span><b>{{ $question->question }}</b></span>

                                                    <span><input type="text"  class="input-fild-border ml-3" name="question[{{$question->id}}]"></span>

                                                </div>
                                            @endforeach
                                        </div>


                                    {{--end question--}}

                                        {{--end single line right gap--}}



                                    @elseif($lsubsection->ltypes->name == 'Table row two - list item right' )
                                        {{--status--}}

                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-danger text-center" style="color: red">{{ $lsubsection->questions->where('example','=',false)->count() }} Question Added.Have to Add {{ ( $lsubsection->end - $lsubsection->start +1)-$lsubsection->questions->where('example','=',false)->count()." Question"  }} </p>

                                            </div>
                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.table_row_two_right_list_item_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>



                                            </div>

                                        </div>

                                        {{--status--}}

                                        {{--table row two  - list item table showing--}}

                                        <div class="row">

                                            <div class="col-12">

                                                <table class="table table-bordered font-bold" >
                                                    <tbody>

                                                    @foreach($lsubsection->questions as $question)

                                                        {!! $question->question !!}

                                                    @endforeach

                                                    </tbody>
                                                </table >

                                            </div>



                                        </div>






                                @endif

                                    {{--end of less then the question needed--}}



                                {{-- all the question added showin list--}}

                                @elseif( $number_of_question_added == $number_of_question_needed)

                                    {{-- start this is inner if for section type --}}

                                    {{--question showing for fill the blank -single line--}}

                                    @if($lsubsection->ltypes->name == 'fill Blank - single line ')

                                        {{--status--}}
                                    <div class="row justify-content-center">

                                        <div class="col-6 ">

                                            <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added.Now You can Only Add Example Question </p>


                                        </div>

                                        <div class="col-3">
                                            <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.single_line_q',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>

                                        </div>


                                    </div>
                                        {{--status--}}

                                    {{--question showing for fill the blank -single line--}}

                                    <div class="row">

                                        <div class="col-12 ">
                                            <table class="table table-bordered table-hover">

                                                <thead >

                                                <tr>

                                                    <th class="text-center">Question</th>
                                                    <th class="text-center">Answer</th>

                                                </tr>


                                                </thead>
                                                <tbody>

                                                {{--shwoing question--}}

                                                @foreach($lsubsection->questions as $question)
                                                    <tr>
                                                        <td>{{ $question->question }}</td>
                                                        <td>
                                                            {{--example --}}
                                                            @if($question->example)
                                                                {{ $question->answers->answer }}
                                                                <span class="font-bold">(Example)</span>
                                                                {{--end example--}}

                                                                {{--answer field with number--}}
                                                            @else
                                                                <span class="green-number" >{{ $question->qnumber }}</span>

                                                                <span><input type="text"  class="input-fild-border" name="question[{{$question->id}}]"></span>

                                                                {{--end answer field with number--}}

                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>

                                                {{--end of showing question--}}

                                            </table>
                                        </div>



                                    </div>

                                    {{--end of question for fill the blank single line--}}

                                        {{--Table - Two Row - Answer Left--}}

                                    @elseif($lsubsection->ltypes->name == 'Table - Two Row - Answer Left')


                                        {{--status--}}
                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added.Now You can Only Add Example Question </p>

                                            </div>

                                            <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.table_row_two_left_ans_create',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>


                                        </div>
                                        {{--end of status--}}


                                        {{--table--}}

                                        <div class="row">

                                            <div class="col-12 ">
                                                <table class="table table-bordered table-hover">


                                                    <tbody>

                                                    {{--shwoing question--}}

                                                    @foreach($lsubsection->questions as $question)
                                                        <tr>

                                                            <td>
                                                                {{--example --}}
                                                                @if($question->example)
                                                                    {{ $question->answers->answer }}
                                                                    <span class="font-bold">(Example)</span>
                                                                    {{--end example--}}

                                                                    {{--answer field with number--}}
                                                                @else
                                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                                    <span><input type="text"  class="input-fild-border" name="question[{{$question->id}}]"></span>

                                                                    {{--end answer field with number--}}

                                                                @endif
                                                            </td>
                                                            <td class="font-bold pl-4 pr-5 text-center"> {{ $question->question }} </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                    {{--end of showing question--}}

                                                </table>
                                            </div>



                                        </div>

                                        {{--end table--}}


                                        {{--end Table - Two Row - Answer Left--}}

                                    @elseif($lsubsection->ltypes->name == 'Radio type')



                                        {{--status--}}

                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added. </p>


                                            </div>
                                  {{--          <div class="col-3">

                                                <a class="btn btn-outline-info text-center btn-sm" href="{{ route('listening.sub.radio_type_self_option_index',[Request::Segment(3),$lsection->id,$lsubsection->id]) }}">Add New Question</a>


                                            </div>--}}

                                        </div>

                                        {{--status--}}



                                        @foreach($lsubsection->questions as $question)
                                            <div class="form-group pl-4 ">
                                                <div class="row">
                                                    <span class="green-number">{{$question->qnumber}}</span><strong class="col-9">{{$question->question}}</strong>
                                                </div>


                                                @foreach($question->lqoptions as $lqoption)

                                                    <div class="form-check">
                                                        <strong class="mr-4 text-center">{{$lqoption->option}}.</strong><input class="form-check-input" name="{{$question->id}}[]" type="radio" value="" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            {{$lqoption->value}}
                                                        </label>
                                                    </div>

                                                @endforeach

                                            </div>
                                        @endforeach

                                        {{--end radio type--}}


                                        {{--drop down--}}

                                        @elseif($lsubsection->ltypes->name == 'Single Line - Drop Down Left')
                                            <div class="row justify-content-center">

                                                <div class="col-6 ">

                                                    <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added. </p>

                                                </div>

                                            </div>

                                        @foreach($lsubsection->questions as $question)
                                            <div class="form-group pl-4 ">
                                                <div class="row">
                                                    <span class="green-number">{{$question->qnumber}}</span>
                                                    <select class=" ml-2 col-3 form-control input-sm">
                                                        <option></option>
                                                        @foreach($lsubsection->lsubsectionDrops as $lsubsectionDrop)
                                                            <option value="{{ $lsubsectionDrop->option }}">{{ $lsubsectionDrop->option }}</option>
                                                            @endforeach
                                                    </select>
                                                    <strong class="col-6 mt-1">{{$question->question}}</strong>
                                                </div>

                                            </div>
                                        @endforeach

                                        {{--end drop down--}}


                                        {{--start three column table random drop down--}}

                                    @elseif($lsubsection->ltypes->name == 'Table 3-column.Random Drop Down')

                                        <table class="table table-bordered ">

                                            <tbody >
                                            @foreach($lsubsection->questions as $question )


                                                <tr value="{{ $question->id }}">
                                                    {!! $question->question !!}
                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>
                                        <table class="table table-bordered table-hover">

                                            <tbody>

                                            @foreach($lsubsection->lsubsectionDrops as $lsubsectionDrop)
                                                <tr>
                                                    <td>{{ $lsubsectionDrop->option }}</td>
                                                    <td>{{ $lsubsectionDrop->value }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>

                                        {{--end of three column random drop down--}}




                                        {{--single label anser --}}

                                    @elseif($lsubsection->ltypes->name == 'Single Label Answer')

                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added. </p>

                                            </div>

                                        </div>

                                        <div class="row">

                                            @foreach($lsubsection->questions as $question)
                                                <div class="col-12 mt-4 ml-2">
                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                    <span><input type="text"  class="input-fild-border ml-3" name="question[{{$question->id}}]"></span>

                                                </div>
                                            @endforeach
                                        </div>

                                        {{--end single label answer--}}



                                        {{--single line right gap--}}

                                    @elseif($lsubsection->ltypes->name == 'Single Line Right Gap' )

                                        {{--status--}}


                                        <div class="row justify-content-center">

                                            <div class="col-6 ">

                                                <p class="font-bold border border-info text-center" style="color: green">{{ $number_of_question_added }} of {{ $number_of_question_added }} have been added. </p>

                                            </div>

                                        </div>

                                        {{--status--}}

                                        {{--question--}}

                                        <div class="row">

                                            @foreach($lsubsection->questions as $question)
                                                <div class="col-12 mt-4 ml-2">
                                                    <span class="green-number" >{{ $question->qnumber }}</span>

                                                    <span><b>{{ $question->question }}</b></span>

                                                    <span><input type="text"  class="input-fild-border ml-3" name="question[{{$question->id}}]"></span>

                                                </div>
                                            @endforeach
                                        </div>


                                        {{--end question--}}

                                        {{--end single line right gap--}}



                                    @elseif($lsubsection->ltypes->name == 'Table row two - list item right' )

                                        <div class="row">

                                            <div class="col-12">

                                                <table class="table table-bordered " >
                                                    <tbody>

                                                    @foreach($lsubsection->questions as $question)

                                                        {!! $question->question !!}

                                                    @endforeach

                                                    </tbody>
                                                </table >

                                            </div>



                                        </div>


                                    @endif
                                    {{-- end this is inner if for section type --}}



                                @endif

                                {{--end all the question added showing list--}}


                                @endforeach

                                {{--end iterate sub section --}}


                                @endif

                        {{--end sub section--}}

                    </div>






                    @endforeach

                {{--end show section--}}


                {{--end section here--}}


            </div>
            <div class="col-4">

            </div>

        </div>


    </div>

    @endsection

@section('script')


    @foreach($listening->lsections as $lsection)


        @foreach($lsection->lsubsections as $lsubsection)

            @if($lsubsection->ltypes->name == "Table 3-column.Random Drop Down")

                <script>

                    $(document).ready(function () {


                        $('.random-three-drop').each(function () {

                            var value = $(this).html();
                            var question_number_real = $(this).parent().parent().attr('value');
                            var input = '';

                            input += '<span class="green-number">';

                            input += value;

                            input += '</span>';
                            input += '<select name="question['+question_number_real+']" class="option-width-listening form-control" >';
                            input +='<option></option>';
                            @foreach($lsubsection->lsubsectionDrops as $lsubsectionDrop)

                            input += '<option  value="{{$lsubsectionDrop->option}}">';
                            input += '{{$lsubsectionDrop->option}}';
                            input += '</option>';

                            @endforeach
                            input += '</select>';



                            $(this).html(input);



                            //this.html('foo');
                        });

                    })

                </script>

                @endif

            @endforeach




        @endforeach


    <script>

        $(document).ready(function () {

            $('.button-start-from').on('click',function () {


                var start_from = parseInt($(this).attr('value')*60);

                audioPlay(parseInt(start_from));

            });


            /*recursive*/

            function audioPlay(start_from) {

                //alert(start_from);

               var audio =  $('#audio_sound');

                audio.prop('currentTime',start_from);

                if(audio.prop('currentTime') != start_from){

                    audioPlay(start_from);

                }
                audio.trigger('play');


            }


            /*for table two row with left list iltem*/


            $('.list-item-right').each(function () {

                var question_number = $(this).html();

                var question_id = $(this).attr('value');

                var input = '';

                input = '<span class="green-number">'+question_number+'<input name="question['+question_id+']" type="text" class=" input-fild-border">';

                $(this).html(input);



            });


        });


    </script>


    @endsection
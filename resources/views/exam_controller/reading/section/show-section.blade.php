@extends('layout.exam_controller')




@section('css')

    <style>

        /* The box-wrapper */
        .box-wrapper {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

        }

        /* Hide the browser's default checkbox */
        .box-wrapper input {
            position: absolute;
            opacity: 0;
            cursor: pointer;


        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border: 3px solid black;
        }

        /* On mouse-over, add a grey background color */
        .box-wrapper:hover input ~ .checkmark {
            background-color: whitesmoke;

        }

        /* When the checkbox is checked, add a blue background */
        .box-wrapper input:checked ~ .checkmark {
            background-color: darkslateblue;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .box-wrapper input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .box-wrapper .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

    </style>
    @endsection

@section('container')

    <div class="container-fluid mt-2">

        {{--This is for the question showing section for admin adding also--}}

        {{--start showing section for admin--}}

        <div class="row" >

            {{--start showing for passage--}}
            <div class="col over-flow-style-for-reading-section" style="background-color:#D6E4DA; border-right: 5px solid #898989">

                <div class="data">

                    {!! $rsection->passage !!}

                </div>
            </div>

            {{--end of showing for passage--}}

            {{--question showing and adding section start--}}
            <div class="col over-flow-style-for-reading-section ml-3" >

                {{--flash massage start--}}

                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>

                @endif

                {{--flash massage end--}}

                {{--counting question--}}

                @php($count = 0)

                @foreach($rsection->rsubs as $rsub)

                    @php($count = $count + $rsub->rquestions->count())

                @endforeach

                {{--end counting question--}}

                {{--finding need of question--}}

                @php($needed_question = ($rsection->end-$rsection->starts)+1)

                {{--end need of question--}}


                {{--start the subsection showing--}}
                @if($rsection->rsubs()->count() <1)

                    <div class=" text-center">

                        <h4 class="alert alert-info">{{ 'no sub section been added' }}</h4>

                        <p><strong>Add {{$needed_question-$count}} questions in differentsub sections </strong></p>
                        <a href="{{ route('reading.sub-section.create',['reading_id'=>Request::segment(4),'sub_id'=>$rsection->id]) }}" class="btn btn-info">Add Sub section</a>
                    </div>
                    @endif
                @if($rsection->rsubs()->count() >=1 && $rsection->rsubs->where('end','=',$rsection->end)->count() == 0)


                    <div class=" text-center">

                        <h4 class="alert alert-info"> <strong>{{$rsection->rsubs()->count()}} </strong>{{'sub section has been added ' }}</h4>

                        <p><strong>Add {{ 13-$count }} more questions in different sub sections </strong></p>
                        <a href="{{ route('reading.sub-section.create',['reading_id'=>Request::segment(4),'sub_id'=>$rsection->id]) }}" class="btn btn-info">Add Sub section</a>
                    </div>

                @endif
                <hr>

                <div class="sub-section-question">

                    @foreach($rsection->rsubs->sortBy('end') as $rsub)

                        <h4>Question {{ $rsub->start }}-{{ $rsub->end }}</h4>

                        {!! $rsub->body !!}




                        @if($rsub->type->name == 'Drop Down')
                            <div class="text-center">

                                @if($rsub->rdrops->count() == 0)

                                    <p class="alert alert-danger "><strong>Add options first for the Section the Add the question</strong></p>

                                    <a href="{{route('reading.sub-section.dropdown.create',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id])}}" class="btn btn-info text-center mb-2">Add DropDown Options</a>
                                @else

                                    @if($rsub->rquestions()->count() < ($rsub->end-$rsub->start)+1)
                                        <div class="text-center">

                                            <p class="text-center alert alert-info"><strong>Sub section added.Now Add {{ ($rsub->end+1)-($rsub->start+$rsub->rquestions()->count()) }}-{{ $rsub->type->name }} Questions </strong></p>

                                            <a href="{{ route('reading.sub-section.question.index',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}" class="btn btn-secondary">Add Question</a>

                                        </div>

                                    @endif

                                @endif

                            </div>

                            @if($rsub->rquestions->count() > 0)

                                <div class="mt-3">

                                    @foreach($rsub->rquestions as $rquestion)
                                        <div class="form-group row">
                                            <p class="" style="font-weight: bold">{{$rquestion->number}}.</p>
                                            <select class="col-2 form-control offset-1 input-sm">
                                                <option></option>
                                                @foreach($rsub->rdrops as $rdrop)
                                                    <option>{{$rdrop->option}}</option>
                                                @endforeach
                                            </select>
                                            <p class="col-6 mt-2"><strong>{{$rquestion->question}}</strong></p>

                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            {{--check box question start--}}

                        @elseif($rsub->type->name == 'Checkbox')


                            {{--if there is no option added then this function runs--}}
                            @if($rsub->rdrops->count() < 1)

                                <p class="alert alert-danger "><strong>Add checkbox option option for Sub-section</strong></p>

                                <a href="{{route('reading.sub-section.dropdown.create',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id])}}" class="btn btn-info text-center mb-2">Add Checkbox Options</a>

                                {{--end of add  option--}}


                                {{--if there is no question added--}}

                            @elseif($rsub->rquestions->count() < 1)

                                <p class="text-center alert alert-info"><strong>Add 1 Questions </strong></p>

                                <a href="{{ route('reading.sub-section.question.checkbox',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}" class="btn btn-secondary">Add Question</a>

                                {{--if there is no question added end--}}

                                @else

                                {{--showing checkbox question--}}

                                <strong>{{ $rsub->rquestions->get(0)->question }}</strong>

                                @foreach($rsub->rdrops as $rdrop)

                                    <label class="box-wrapper">{{ $rdrop->value }}
                                        <input type="checkbox" value="{{ $rdrop->option }}">
                                        <span class="checkmark"></span>
                                    </label>

                                @endforeach

                                {{--end showing checkbox question--}}



                            @endif


                            {{--check box question end--}}


                            {{--radio type--}}

                            @elseif($rsub->type->name == 'Radio')

                            @if(!(($rsub->end-$rsub->start)+1)-$rsub->rquestions->count() == 0)

                                <p class="text-center alert alert-info"><strong> {{ $rsub->rquestions->count() }} Question Added.Have to Add {{(($rsub->end-$rsub->start)+1)-$rsub->rquestions->count()}} Radio Question </strong></p>

                                <a href="{{ route('reading.sub-section.question.checkbox',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}" class="btn btn-secondary">Add Question</a>



                            @endif





                            {{--type of radio end--}}


                        @endif




                    @endforeach

                </div>

            </div>

            {{--question showing and adding section end--}}

        </div>

        {{--end of showing section for admin--}}

    </div>


@endsection



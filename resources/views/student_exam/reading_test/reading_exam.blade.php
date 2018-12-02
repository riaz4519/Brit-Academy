@extends('layout.main')

@section('title','Reading Exam')

@section('css')

    <style>
        .option-width{
            padding: 0px 5px;

            border-radius: 2px;

            border: 1px solid #aaa;

            margin: 0px 5px;

            outline: none;
            display: inline;
            height: 10px;


            max-width: 130px;

        }
        .input-drop-passage{
            font-family: "Nunito",sans-serif;

            font-size: 16px;

            line-height: 1.5;

            color: #282828;
        }
        .input-gap-passage{
            font-family: "Nunito",sans-serif;

            font-size: 18px;

            font-weight: bold;

            line-height: 1.5;
            mso-line-spacing: 3;

            color: #282828;
            text-align: left;
        }

        .green-number{

            display: inline-block;

            width: 30px;

            height: 30px;

            border-radius: 50%;

            background-color: #327846;

            font-size: 14px;

            font-weight: 700;

            font-family: "Montserrat",sans-serif;

            text-align: center;

            line-height: 30px;

            color: #fff;

        }


        /*radio start*/

        .radio {
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

        /* Hide the browser's default radio button */
        .radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark-radio {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: whitesmoke;
            border-radius: 50%;
            border: 1px solid black;
        }

        /* On mouse-over, add a grey background color */
        .radio:hover input ~ .checkmark-radio {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .radio input:checked ~ .checkmark-radio {
            background-color: black;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark-radio:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .radio input:checked ~ .checkmark-radio:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .radio .checkmark-radio:after {
            top: 4px;
            left: 4px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: white;
        }

        /*radio end*/




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


    <div class="container-fluid">

        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu1">Section 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Section 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu3">Section 3</a>
            </li>
        </ul>

        <!-- Tab panes -->

        <form action="{{ route('test.library.exam.reading-exam.finish',$reading->id) }}"method="post">
            {{csrf_field()}}
            <div class="tab-content">


                @foreach($reading->rsections as $rsection)
                    @php($i=1)
                    <div id="menu{{ $i++ }}" class=" tab-pane "><br>

                        <div class="row">

                            {{--start showing for passage--}}
                            <div class="col over-flow-style-for-reading-section" style="background-color:#D6E4DA; border-right: 5px solid #898989">

                                <div class="data">

                                    {!! $rsection->passage !!}

                                </div>
                            </div>

                            {{--end of showing for passage--}}

                            {{--start showing for passage--}}
                            <div class="col over-flow-style-for-reading-section" >

                                <div class="data">

                                    <div class="sub-section-question">

                                        @foreach($rsection->rsubs->sortBy('end') as $rsub)

                                            <h4>Question {{ $rsub->start }}-{{ $rsub->end }}</h4>

                                            {!! $rsub->body !!}




                                            @if($rsub->type->name == 'Drop Down')


                                                @if($rsub->rquestions->count() > 0)

                                                    <div class="mt-3">

                                                        @foreach($rsub->rquestions as $rquestion)
                                                            <div class="form-group row">
                                                                <p class="mr-2 green-number" style="font-weight: bold">{{$rquestion->number}}</p>
                                                                <select class="col-2 form-control  input-sm" name="question[{{$rquestion->id}}]">
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




                                                @foreach($rsub->rdrops as $rdrop)

                                                    <label class="box-wrapper">{{ $rdrop->value }}
                                                        <input name="option[{{$rdrop->id}}]" type="checkbox" value="{{ $rdrop->option }}">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                @endforeach

                                                {{--end showing checkbox question--}}






                                                {{--check box question end--}}


                                                {{--radio type--}}

                                            @elseif($rsub->type->name == 'Radio')


                                                {{--showing radio--}}

                                                @if($rsub->rquestions->count() > 0)



                                                    <div class="mt-3">

                                                        @foreach($rsub->rquestions as $rquestion)
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <span class="green-number">{{$rquestion->number}}</span><strong class="col-9">{{$rquestion->question}}</strong>
                                                                </div>


                                                                @foreach($rquestion->qoptions as $roption)

                                                                    <div class="form-check">
                                                                        <strong class="mr-4 text-center">{{$roption->option}}.</strong><input class="form-check-input" name="question[{{ $rquestion->id }}]" type="radio" value="" id="defaultCheck1">
                                                                        <label class="form-check-label" for="defaultCheck1">
                                                                            {{$roption->value}}
                                                                        </label>
                                                                    </div>

                                                                @endforeach

                                                            </div>
                                                        @endforeach
                                                    </div>



                                                @endif

                                                {{--end showing radio--}}







                                                {{--type of radio end--}}


                                                {{--start of passage gap--}}

                                            @elseif($rsub->type->name == 'Passage Gap')

                                                {{--showing passage gap--}}

                                                @if($rsub->rquestions->count() > 0)

                                                    <div class="input-drop-passage">


                                                        @foreach($rsub->rquestions as $rquestion)

                                                            {!! $rquestion->question !!}

                                                        @endforeach


                                                    </div>


                                                @endif
                                                {{--end showing passage gap--}}

                                                {{--start of passage drop down--}}

                                                {{--end of passage drop down--}}

                                            @elseif($rsub->type->name == 'Passage Dropdown')

                                                <div class="text-center">


                                                    {{--showing passage gap--}}

                                                    @if($rsub->rquestions->count() > 0)

                                                        <div class="input-gap-passage">


                                                            @foreach($rsub->rquestions as $rquestion)

                                                                {!! " ".$rquestion->question." " !!}

                                                            @endforeach


                                                        </div>


                                                    @endif
                                                    {{--end showing passage gap--}}


                                                </div>

                                                {{--end of passage gap--}}

                                            @endif




                                        @endforeach

                                    </div>

                                </div>
                            </div>

                            {{--end of showing for passage--}}

                        </div>

                    </div>
                @endforeach


            </div>
            <div class="row">

                <div class="col-12">

                    <input type="submit" class="btn btn-block btn-success" value="Submit" >

                </div>

            </div>


        </form>

    </div>


@endsection

@section('script')


    @if($result = $rsection->rsubs->where('type_id','=','5')->first())

        {{--{{ $result->rdrops }}--}}

        @foreach($rsection->rsubs as $rsub)

            @if($rsub->type_id == '5')

                <script>

                    $(document).ready(function () {


                        $('.passage-drop').each(function () {

                            var value = $(this).html();
                            var question_id = $(this).attr('value');

                            var input = '';
                            input += '<span class="green-number">'

                            input += value;

                            input += '</span>';
                            input += '<select name="question['+ question_id +']" class="option-width form-control">';
                            input +='<option></option>'
                            @foreach($rsub->rdrops as $rdrop)
                                input += '<option  value="{{$rdrop->option}}">';
                            input += '{{$rdrop->option}}';
                            input += '</option>';

                            @endforeach
                                input += '</select>';



                            $(this).html(input);

                            //this.html('foo');
                        });

                    })

                </script>

                @break
            @endif

        @endforeach

    @endif


    <script>



        $(document).ready(function () {


            $('.passage-gap').each(function () {

                var value = $(this).html();
                var question_id = $(this).attr('value');


                var input  = '<span class="green-number"> '+value+' </span> <input type="text" name="question['+question_id+']">';
                $(this).html(input);

                //this.html('foo');
            });

        })

    </script>


    <script>

        $(document).ready(function () {

            $('.tab-content .tab-pane:first').addClass('active');
            $('.nav-item').click(function () {

                $('.tab-pane').removeClass('active');

                $('.tab-pane').eq($(this).index()).addClass('active');
                console.log($(this).index());


            });


        });


    </script>

@endsection

@extends('layout.main')

@section('title','Exam title')

@section('container')


    <div class="container">

        <div class="row">

            <form class="col-8" action="{{ route('test-library.exam.listening-exam.finish',Request::segment(4))}}" method="post">

                {{ csrf_field() }}



                {{-- audio goes here --}}

                <div class="row">

                    <div class="col-12">

                        <audio controls id="audio_sound" class="" style="width: 100%">

                            <source src="{{url($listening->audio)}}"  type="audio/ogg" >


                        </audio>

                    </div>


                </div>

                {{--audio end here--}}

                {{--start show section--}}

                @foreach($listening->lsections as $lsection)

                    <div class="section-subsection-wrapper  border border-dark p-1 mt-2">


                        {{--start iterate sub section--}}




                            @foreach($lsection->lsubsections as $lsubsection)

                                <div class="row mt-2">

                                    <div class="col-3">
                                        <p class="font-bold " style="font-size: 1.3em">Questions {{ $lsubsection->start }} - {{ $lsubsection->end }}</p>

                                    </div>



                                    <div class="col-3">
                                        <span class="btn btn-outline-info btn-sm button-start-from" value="{{ $lsubsection->time_start }}"><i class="fa fa-headphones"></i>Listen from here</span>

                                    </div>

                                    <div class="col-3">
                                        <span class="btn btn-outline-info btn-sm"><i class="fa fa-clipboard"></i>Show Notepad</span>
                                    </div>


                                </div>

                                <div class="row ">


                                    <div class="col-12">
                                        <hr >

                                        {!! $lsubsection->body !!}



                                    </div>

                                </div>





                                    {{-- start this is inner if for section type --}}

                                    {{--question showing for fill the blank -single line--}}

                                    @if($lsubsection->ltypes->name == 'fill Blank - single line ')



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


                                        @foreach($lsubsection->questions as $question)
                                            <div class="form-group pl-4 ">
                                                <div class="row">
                                                    <span class="green-number">{{$question->qnumber}}</span><strong class="col-9">{{$question->question}}</strong>
                                                </div>


                                                @foreach($question->lqoptions as $lqoption)

                                                    <div class="form-check">
                                                        <strong class="mr-4 text-center">{{$lqoption->option}}.</strong><input class="form-check-input" name="question[{{$question->id}}]" type="radio" value="" id="defaultCheck1">
                                                        <label class="form-check-label" >
                                                            {{$lqoption->value}}
                                                        </label>
                                                    </div>

                                                @endforeach

                                            </div>
                                        @endforeach

                                        {{--end radio type--}}


                                        {{--drop down--}}

                                    @elseif($lsubsection->ltypes->name == 'Single Line - Drop Down Left')


                                        @foreach($lsubsection->questions as $question)
                                            <div class="form-group pl-4 ">
                                                <div class="row">
                                                    <span class="green-number">{{$question->qnumber}}</span>
                                                    <select class=" ml-2 col-3 form-control input-sm" name="question[{{$question->id}}]">
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


                                {{--end all the question added showing list--}}


                            @endforeach

                            {{--end iterate sub section --}}


                    </div>

                @endforeach

                {{--end show section--}}

                <div class="row justify-content-center">

                    <div class="col-12">

                        <input type="submit" value="Finish Exam" class="btn btn-success btn-block btn-lg">

                    </div>



                </div>
            </form>



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
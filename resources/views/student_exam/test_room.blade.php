@extends('layout.main')

@section('title','Test Room')

@section('container')

    <div class="container">

        @foreach($single_test->exams as $exam)



        <div class="row justify-content-center mt-5" style="text-align: center">



            <div class="card border border-info col-12">
                <div class="card-header">

                    <h6>{{ $exam->name }}</h6>

                </div>

                <div class="card-body row">



                    {{--start listening--}}

                    <div class="single-test-adding col align-self-center" >
                        <a href="" class=""> <span class=""><i class="fa fa-headphones fa-5x"></i></span></a>

                        <br>

                        @if(is_null($exam->listening_id))

                            <p  class=" mt-3 ">Test Not Available</p>

                        @else

                            <a href="{{ route('test-library.exam.listening-exam',$exam->listening_id) }}" class="btn btn-info mt-3">Take Test</a>

                        @endif

                    </div>

                    {{--end listening--}}

                    {{--start reading--}}

                    <div class="single-test-adding col">
                        <a href=""> <span class=""><i class="fa fa-book fa-5x"></i></span></a>

                        <br>

                        @if(is_null($exam->reading_id))

                            <p  class=" mt-3 ">Test Not Available</p>

                        @else

                            <a href="" class="btn btn-success mt-3">Take Test</a>

                        @endif
                    </div>

                    {{--end reading--}}

                    {{--start wriring--}}

                    <div class="single-test-adding col">
                        <a href=""> <span class=""><i class="fa fa-pencil fa-5x"></i></span></a>

                        <br>

                        @if(is_null($exam->writing_id))
                            <p  class=" mt-3 ">Test Not Available</p>

                        @else

                            <a href="" class="btn btn-info mt-3">Take Test</a>
                        @endif
                    </div>

                    {{--end writing--}}

                    {{--start speaking--}}

                    <div class="single-test-adding col">
                        <a href=""> <span class=""><i class="fa fa-microphone fa-5x"></i></span></a>

                        <br>

                        @if(is_null($exam->speaking_id))
                            <p  class=" mt-3 alert ">Test Not Available</p>

                        @else

                            <a href="" class="btn btn-info mt-3">Take Test</a>


                        @endif
                    </div>

                    {{--end speaking--}}

                </div>

            </div>





        </div>

            @endforeach


    </div>

    @endsection
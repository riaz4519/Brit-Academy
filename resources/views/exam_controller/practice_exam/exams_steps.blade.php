@extends('layout.exam_controller')



@section('container')


    <div class="container">
        <div class="justify-content-center">
            @if (Session::has('msg'))

                <div class="alert alert-success alert-dismissible text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong>
                    {!!Session::get('msg')!!}

                </div>
            @endif

        </div>

    <div class="row justify-content-center mt-5" style="text-align: center">



        {{--start listening--}}

        <div class="single-test-adding col align-self-center" >
            <a href="" class=""> <span class=""><i class="fa fa-headphones fa-5x"></i></span></a>

            <br>

            @if(is_null($exam->listening_id))

                <a href="" class="btn btn-secondary mt-3">Add Listening</a>

                 @else
                <a href="" class="btn btn-light mt-3 ">Update Listening</a>

                @endif

        </div>

        {{--end listening--}}

        {{--start reading--}}

        <div class="single-test-adding col">
            <a href=""> <span class=""><i class="fa fa-book fa-5x"></i></span></a>

            <br>

            @if(is_null($exam->reading_id))

            <a href="{{route('addReadingPage',Request::segment(4)) }}" class="btn btn-success mt-3">Add Reading</a>
                 @else
                <a href="{{route('updateReadingPage',Request::segment(4)) }}" class="btn btn-light mt-3 ">Update Reading</a>

            @endif
        </div>

        {{--end reading--}}

        {{--start wriring--}}

        <div class="single-test-adding col">
            <a href=""> <span class=""><i class="fa fa-pencil fa-5x"></i></span></a>

            <br>

            @if(is_null($exam->writing_id))
            <a href="" class="btn btn-info mt-3">Add Writing</a>
                 @else
                <a href="" class="btn btn-light mt-3 ">Update Writing</a>
            @endif
        </div>

        {{--end writing--}}

        {{--start speaking--}}

        <div class="single-test-adding col">
            <a href=""> <span class=""><i class="fa fa-microphone fa-5x"></i></span></a>

            <br>

            @if(is_null($exam->speaking_id))
            <a href="" class="btn btn-light mt-3">Add Speaking</a>
                @else
                <a href="" class="btn btn-light mt-3 ">Update Speaking</a>


            @endif
        </div>

        {{--end speaking--}}

    </div>




    </div>


    @endsection
@extends('layout.main')


@section('title','Writing Exam')

@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">

@endsection

@section('container')



    <div class="container">

        {{--for showing two exams--}}

        <div class="row">


            @foreach($writing->wsections as $wsection)

                <div class="card   col-11">


                    <div class="card-header border-danger ">
                        <div class="float-left" >

                            <b>{{ $wsection->title }}</b>

                        </div>
                        <div class="float-right">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$wsection->id}}">Large modal</button>


                            {{--<a href="{{ route('writing.section.edit',['writing_id'=>$writing->id,'wsection_id'=>$wsection->id]) }}" class="btn btn-info">Take test</a>--}}

                        </div>
                    </div>
                    <div class="card-body">
                        {!! $wsection->body !!}


                    </div>


                </div>

                <div class="modal modal-example fade bd-example-modal-lg{{$wsection->id}} "  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> {{ $wsection->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{ route('test.library.exam.listening-exam.finish',[$writing->id,$wsection->id]) }}" class="modal-body" method="post" >

                                {{ csrf_field() }}

                                <textarea  name="passage" class="summernote-ui summernote" required >{{ old('passage') }}</textarea>


                                <input type="submit" class="btn btn-success " value="Submit">



                            </form>
                        </div>
                    </div>
                </div>



            @endforeach


        </div>


        {{--end showing two exams--}}

    </div>

    @endsection

@section('script')

    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Insert Passeage for section',
                tabsize: 2,
                height: 400,

            });
        });


    </script>

    @endsection
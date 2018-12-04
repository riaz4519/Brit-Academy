@extends('layout.main')


@section('title','Writing Exam')

@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.css') }}">

@endsection

@section('container')



    <div class="container">

        {{--for showing two exams--}}

        <form   action="{{ route('test.library.exam.listening-exam.finish',$writing->id) }}"  method="post" class="row">

            @php

            $i=1;
            $j=1;
            @endphp

            @foreach($writing->wsections as $wsection)

                <div  class="card   col-11">


                    <div class="card-header border-danger ">
                        <div class="float-left" >

                            <b>{{ $wsection->title }}</b>

                        </div>
                        <div class="float-right">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$wsection->id}}">Start Writing</button>


                            {{--<a href="{{ route('writing.section.edit',['writing_id'=>$writing->id,'wsection_id'=>$wsection->id]) }}" class="btn btn-info">Take test</a>--}}

                        </div>
                    </div>
                    <div class="card-body">
                        {!! $wsection->body !!}


                    </div>


                </div>

                <div class="modal modal-example fade bd-example-modal-lg{{$wsection->id}} "   data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> {{ $wsection->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" >

                                {{ csrf_field() }}

                                <textarea  name="passage{{ $i++ }}" class="summernote-ui summernote" id="idsummer{{ $j++ }}" required >{{ old('passage') }}</textarea>






                            </div>
                        </div>
                    </div>
                </div>



            @endforeach


        </form>


        {{--end showing two exams--}}

    </div>

    @endsection

@section('script')

    <script src="{{ asset('summernote/summernote-bs4.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#idsummer1').summernote({
                placeholder: 'Insert Passeage for section',
                tabsize: 2,
                height: 400,
                toolbar: false,

            });
            $('#idsummer2').summernote({
                placeholder: 'Insert Passeage for section',
                tabsize: 2,
                height: 400,
                toolbar: false,


            });
        });


    </script>

    @endsection
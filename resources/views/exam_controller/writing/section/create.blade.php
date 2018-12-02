@extends('layout.exam_controller')

@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">

@endsection

@section('container')

    <div class="container">

        <div class="row justify-content-center" >

            <div class="col-8">



                <form method="post" action="{{route('writing.section.store',Request::segment(3))}}" class="mt-5  form-horizontal">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Title</div>
                            </div>
                            <input type="text"  name="title" class="form-control"  placeholder="Insert task title">
                        </div>

                    </div>


                    <textarea id="summernote" name="passage" class="summernote-ui "></textarea>
                    <button type="submit"  class="btn btn-success mt-2">Submit</button>

                </form>



            </div>

        </div>

    </div>

    @endsection


@section('script')

    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Insert Passeage for section',
                tabsize: 2,
                height: 300,

            });
        });


    </script>

@endsection
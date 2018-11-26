@extends('layout.exam_controller')
@section('css')

    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}">

@endsection

@section('container')

    <div class="container ">

        <div class="row">

            <div class="col-1">

            </div>

            <div class="col-10 justify-content-center">
                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('writing.section.edit.store',['writing_id'=>$wsection->writing->id,'wsection_id'=>$wsection->id])}}" class="mt-5  form-horizontal">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Title</div>
                            </div>
                            <input type="text" value="{{ $wsection->title }}"  name="title" class="form-control"  placeholder="Insert task title">
                        </div>

                    </div>



                    <textarea id="summernote" name="passage" class="summernote"></textarea>
                    <button type="submit"  class="btn btn-success mt-2">UPDATE</button>
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
                tabsize: 1,
                height: 350,

            });


            //assign the variable passed from controller to a JavaScript variable.
            var content = {!! json_encode($wsection->body) !!}

                //set the content to summernote using `code` attribute.
                $('.summernote').summernote('code', content);


        });


    </script>

@endsection
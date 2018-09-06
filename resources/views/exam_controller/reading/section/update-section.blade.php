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
                <form method="post" action="{{route('reading.updatePost.section',['reading_id'=>Request::segment(4),'section_id'=>$rsection->id])}}" class="mt-5  form-horizontal">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title"><strong>Title</strong></label>

                        <input type="text" id="title" value="{{$rsection->title}}" class="form-control" name="title">

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
                tabsize: 2,
                height: 330,

            });


            //assign the variable passed from controller to a JavaScript variable.
            var content = {!! json_encode($rsection->passage) !!}

            //set the content to summernote using `code` attribute.
            $('.summernote').summernote('code', content);


        });


    </script>

@endsection
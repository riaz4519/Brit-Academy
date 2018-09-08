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

            <h3 class="center">
                Please Passage @if($count == 0)
                                   {{ 'one' }}
                                   @elseif($count == 1)
                                   {{ 'Two ' }}
                                   @elseif($count == 2)
                                   {{ 'Three' }}
                                   @endif
            </h3>

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
            <form method="post" action="{{route('reading.section-form.create',Request::segment(4))}}" class="mt-5  form-horizontal">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>

                    <input type="text" id="title" class="form-control" name="title">

                </div>

                <div class="form-group">
                    <label for="start">start</label>

                    <input type="text" id="start" class="form-control" name="start">

                </div>

                <div class="form-group">
                    <label for="end">end</label>

                    <input type="text" id="end" class="form-control" name="end">

                </div>


                <textarea id="summernote" name="passage" class="summernote-ui"></textarea>
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
                height: 200,

            });
        });


    </script>

    @endsection
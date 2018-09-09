@extends('layout.exam_controller')


@section('container')



    <div class="container">

        <div class="row">

            <div class="col-2">


            </div>


            <div class="col-8">
                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>
                @endif
                <div class="card ">
                    <div class="card-header alert alert-info text-center">

                        <strong>Add question ( {{ $rsub->start }}-{{ $rsub->end }} ) Now add Question {{ $rsub->rquestions->count() + 1 }}</strong>
                    </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('reading.sub-section.question.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}">

                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                                    <div class="col-sm-10">
                                        <textarea type="text"  class="form-control" id="staticEmail" name="question" required></textarea>
                                    </div>
                                </div>

                                @if($rsub->type->name == 'Drop Down')


                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Answer:</strong></label>

                                            <select class="form-control col-sm-10" name="answer" required>

                                                <option ></option>

                                                @foreach($rsub->rdrops as $rdrop)
                                                    <option value="{{ $rdrop->option }}">{{ $rdrop->value }}</option>


                                                @endforeach
                                            </select>

                                    </div>


                                    @endif

                                <input type="hidden" name="number" value=" {{ $rsub->rquestions->count() + 1 }} ">

                                <input type="submit" class="form-control btn-sm offset-4 col-5">


                            </form>



                        </div>




                </div>

            </div>

        </div>




    </div>



    @endsection
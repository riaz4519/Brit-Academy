@extends('layout.exam_controller')


@section('container')



    <div class="container">

        <div class="row">

            <div class="col-2">
                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>
                @endif

            </div>




            <div class="col-8">

                <div class="card ">
                    <div class="card-header alert alert-info text-center">

                        <strong>Add question ( {{ $rsub->start }}-{{ $rsub->end }} ) Now add Question {{ ($rsub->start+$rsub->rquestions->count())  }} of {{ $rsub->type->name }}</strong>
                        <p>{{ "<span class='passage-drop'>".($rsub->start+$rsub->rquestions->count())."</span>" }}</p>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('reading.sub-section.question.passageDrop.store',['reading_id'=>Request::segment(4),'rsection_id'=>Request::segment(6),'rsub_id'=>$rsub->id]) }}">

                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Question:</strong></label>
                                <div class="col-sm-9">
                                    <textarea type="text"  class="form-control" id="staticEmail" name="question" required placeholder="add <span class='passage-drop'>{{($rsub->start+$rsub->rquestions->count()) }}</span> for question"></textarea>
                                </div>
                            </div>


                            {{--radio--}}



                            {{--answer--}}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Answer:</strong></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="answer">

                                        @foreach($rsub->rdrops as $rdrop)

                                        <option value="{{$rdrop->option}}">{{$rdrop->value}}</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>



                            {{--radio end--}}







                            <input type="hidden" name="number" value="{{ $rsub->start+$rsub->rquestions->count()  }}">

                            <input type="submit" class="form-control btn-sm offset-4 col-5">


                        </form>



                    </div>




                </div>

            </div>

        </div>




    </div>



@endsection





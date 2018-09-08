@extends('layout.exam_controller')


@section('container')

    <div class="container-fluid mt-5">


        <div class="row" >


            <div class="col over-flow-style-for-reading-section" style="background-color:#D6E4DA; border-right: 5px solid #898989">

                       <div class="data">
                         {!! $rsection->passage !!}

                       </div>


            </div>


            {{--this is for shoing the question--}}
            <div class="col over-flow-style-for-reading-section">
                @if (Session::has('msg'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        {!!Session::get('msg')!!}

                    </div>
                @endif


                @if($rsection->rsubs()->count() <1)

                    <div class=" text-center">

                        <h4 class="alert alert-info">{{ 'no sub section been added' }}</h4>

                        <p><strong>Add 13 questions in differentsub sections </strong></p>
                        <a href="{{ route('reading.sub-section.create',['reading_id'=>Request::segment(4),'sub_id'=>$rsection->id]) }}" class="btn btn-info">Add Sub section</a>
                    </div>
                    @elseif($rsection->rsubs()->count() == 1)

                        <div class=" text-center">

                            <h4 class="alert alert-info">{{ 'sub section one has been added ' }}</h4>

                            <p><strong>Add 13 questions in differentsub sections </strong></p>
                            <a href="{{ route('reading.sub-section.create',['reading_id'=>Request::segment(4),'sub_id'=>$rsection->id]) }}" class="btn btn-info">Add Sub section</a>
                        </div>




                    @endif
                <hr>

                <div class="sub-section-question">

                    @foreach($rsection->rsubs as $rsub)

                        {!! $rsub->body !!}

                        @if($rsub->rquestions()->count() == 0)
                            <div class="text-center">



                            <p class="text-center alert alert-info"><strong>Sub section added.Now Add {{ $rsub->end }}-{{ $rsub->type->name }} Questions </strong></p>

                                <a href="" class="btn btn-secondary">Add Question</a>

                            </div>

                            @endif

                        @endforeach

                </div>





            </div>



        </div>


    </div>


    @endsection
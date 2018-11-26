@extends('layout.exam_controller')

@section('title','Radio Type')

@section('container')


    <div class="container">

        <div class="row">
            {{--radio type container for the form--}}
            <div class="col-6 offset-3">
                <div class="card  ">

                    @if(Session::has('msg'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong> {!! Session::get('msg') !!}</strong>
                        </div>

                    @endif

                    {{--variable--}}

                    @php

                        $question_added = $lsubsection->questions->where('example','=',false)->count();

                        $question_needed = ($lsubsection->end - $lsubsection->start)+1;


                    @endphp
                    <div class="card-header text-center">
                        <h5>Insert Radio type Question</h5>
                        <span class="font-italic">Question number : {{ $question_added }} of {{ $question_needed}} <b>({{ $lsubsection->start.' - '.$lsubsection->end }})</b></span>


                    </div>
                    <div class="card-body">

                       <form action="{{ route('listening.sub.radio_type_self_option_store',['listening_id'=>Request::Segment(3),'section_id'=>Request::Segment(5),'sub_section_id'=>$lsubsection->id]) }}" method="post">
                           {{csrf_field()}}


                           <input type="text" name="qnumber" value="{{ $question_added + $lsubsection->start }}" hidden>

                           <div class="form-group">

                               <label for="question">Question</label>
                               <input type="text" class="form-control" name="lquestion" id="question" placeholder="Enter Question" required>

                           </div>

                            <div class=" form-row">

                                <div class="form-group col-9">
                                    <label for="number_of_radio">Number of option</label>
                                    <input type="number" class="form-control"  id="number_of_radio" placeholder="Number of radio option">

                                </div>
                                <div class="form-group col-3 mt-4 pt-1">

                                    <button class="btn btn-outline-secondary button-click-number form-control" >Enter</button>

                                </div>



                            </div>
                            <div class="option-value" style="visibility: hidden">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Option</label>

                                    </div>
                                    <div class="form-group col-6">
                                        <label>Value</label>

                                    </div>

                                </div>

                                <div id="option-value-wrapper">



                                </div>


                                <div class="form-group">

                                    <label for="answer">Answer</label>
                                    <input type="text" class="form-control" name="answer" id="answer" placeholder="Enter answer from option" required>

                                </div>



                                <div class="submit-button">

                                    <input type="submit" class="form form-control btn btn-secondary" value="Insert">

                                </div>

                            </div>









                       </form>



                    </div>

                </div>

            </div>

            {{--end of radion type form contaner--}}





        </div>

    </div>

    @endsection


@section('script')

    <script>

        $(document).ready(function () {

            $('.button-click-number').on('click',function (event) {
                event.preventDefault();

                var number_of_radio = $('#number_of_radio').val();

                var html_add = '';

                for (var i = 0;i<number_of_radio;i++){

                    html_add += '<div class="form-row"> <div class="form-group col-6"> <input type="text" placeholder="Option'+(i+1)+'" name="option[]" class="form-control form-control-sm" required> </div> <div class="form-group col-6"> <input type="text" placeholder="Value'+(i+1)+'" name="value[]" class="form-control form-control-sm" required> </div> </div>';

                }
                if (number_of_radio != 0){

                    $('.option-value').css('visibility','visible');

                    $('#option-value-wrapper').html(html_add);

                }



            });

        });

    </script>

    @endsection


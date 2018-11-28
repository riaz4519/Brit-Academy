@extends('layout.exam_controller')

@section('title','Adding Drop down to subsection')

@section('container')

    <div class="container">

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    @if(Session::has('msg'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong> {!! Session::get('msg') !!}</strong>
                        </div>

                    @endif
                    <div class="card-header text-center">
                        <h6>Adding Drop down to Subsection</h6>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('listening.sub.drop.store',['listening_id'=>Request::Segment(3),'section_id'=>Request::Segment(5),'sub_section_id'=>$lsubsection->id]) }}" method="post">

                            {{csrf_field()}}
                            <div class="form-row">

                                <div class="input-group col">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Number of Drop down</span>
                                    </div>
                                    <input type="number" class="form-control number-of-option" placeholder="number" >
                                    <div class="input-group-append">
                                        <span class="input-group-text btn btn-outline-secondary button-number">Insert</span>
                                    </div>
                                </div>

                            </div>


                            <div id="option-value" class="mt-2">



                            </div>

                            <div class="form-row justify-content-center button-row" style="visibility: hidden">


                                <input type="submit" class="btn btn-success" value="Create">

                            </div>

                        </form>

                    </div>

                </div>


            </div>

        </div>

    </div>

    @endsection

@section('script')

    <script>

        $(document).ready(function () {

            $('.button-number').on('click',function () {


                var html = '';

                var numberOfOption = $('.number-of-option').val();

                if(numberOfOption >0){

                    for (var i = 0;i<numberOfOption;i++){

                        html +='<div class="form-row"> <div class="form-group col"> <input type="text" name="option[]" class="form-control" placeholder="option'+(i+1)+'" required> </div> </div>';

                    }


                    $('#option-value').html(html);
                    $('.button-row').css('visibility','visible');


                }




            });

        });

    </script>

    @endsection
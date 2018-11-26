@extends('layout.exam_controller')

@section('title','Create Listening section')

@section('container')

    <div class="container">

        <div class="row">

            <div class="col-8 offset-2 border mt-2 p-5" style="background: #EBEBEB">


                <form class="form-horizontal p-5 " action="{{ route('listening.section.store',Request::segment(3)) }}" method="post" style="background: white; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="row justify-content-center">


                        <h4 class="">Create Listening Section</h4>

                    </div>

                    {{--section number--}}

                    <div class="row">
                        <div class="form-group col-12 ">
                            <label for="section_number">Section number</label>
                            <input type="number" min="1" max="4" class="form-control border-top-0 border-left-0 border-right-0"  name="section_number" id="section_number" aria-describedby="section_number" placeholder="Enter Section number" required>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="form-group">

                                <input type="submit" value="submit" name="submit" class="form-control btn btn-success">

                            </div>

                        </div>

                    </div>









                </form>

            </div>

        </div>

    </div>


    @endsection
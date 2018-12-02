@extends('layout.main')

@section('title','Reading Ans')

@section('container')

    <div class="container">

        <div class="col-8 offset-2">
            <div class="card border border-info">


                <div class="card-header  text-center"> <h5>Reading Result Info</h5></div>

                <div class="card-body">


                    <table class="table table-bordered table-hover">

                        <tbody>


                        <tr>

                            <th>Number of Question : </th>
                            <td>{{ $status['total'] }}</td>
                        </tr>

                        <tr>
                            <th>Question Answered : </th>
                            <td>{{ $status['answer_given'] }}</td>
                        </tr>
                        <tr>
                            <th>Number of correct answer : </th>
                            <td>{{ $status['correct'] }}</td>
                        </tr>
                        <tr>
                            <th>Number of Wrong answer : </th>
                            <td>{{ $status['wrong_answer'] }}</td>
                        </tr>
                        <tr class="border border-success">
                            <th>Ielts Point : </th>
                            <td>{{ $status['ielts_point'] }}</td>
                        </tr>



                        </tbody>

                    </table>

                </div>

            </div>

        </div>




    </div>

@endsection
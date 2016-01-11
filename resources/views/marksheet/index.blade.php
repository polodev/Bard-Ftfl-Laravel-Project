@extends('master_trainer/master')
@section('content')<br>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <h1 style="text-align: center;">List of exam created by u.</h1>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name of the Exam</th>
                    <th>Add Marks</th>
                    <th>View Marks</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td>{{$exam->title}}</td>
                        <td><a href="marksheet/{{$exam->id}}/{{$exam->course_id}}/traineesOfThatExam">Add Marks</a></td>
                        <td><a href="listOfstudentsAndMarks/{{$exam->course_id}}">View Marks</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
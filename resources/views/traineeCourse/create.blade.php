@extends('admin/layouts/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <center><h1>Trainee Course Relationship</h1></center>
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h3 style="text-align: center;">{{ $course_name }}</h3>
            {!! Form::open(['route'=>'traineeCourse.store'])!!}

            <div class="form-group">
                {!! Form::hidden('course_id', $trackId,['class' => 'form-control'])!!}
            </div>

            <div class="form-group">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newTrainees as $id=>$trainee)
                        <tr>
                            <td>{!! Form::checkbox($id+1,$trainee) !!}</td>
                            @foreach($trainees as $traineeq)
                                @if($trainee==$traineeq->id)
                                    <td>{{$traineeq->name}}</td>
                                    <td> {{$traineeq->email}}</td>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--@foreach($newTrainees as $id=>$trainee)
                    {!! Form::checkbox($trainee, $id) !!}{{$trainee}}<br>
                @endforeach--}}

            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>

@endsection
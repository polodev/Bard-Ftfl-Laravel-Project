@extends('admin/layouts/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <center><h1>Training Trainee Relationship</h1></center>
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::model($data, ['method'=>'PATCH','route' => ['user_traininginfo.update',$data->id],'files' => true ]) !!}
            <div class="form-group">
                {!!Form::label('Trainee ID :')!!}
                {!! Form::select('trainings_id', $training, null,['class' => 'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('user_id','Subject')!!}
                {!! Form::select('user_id', $trainees, null,['class' => 'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>

@endsection
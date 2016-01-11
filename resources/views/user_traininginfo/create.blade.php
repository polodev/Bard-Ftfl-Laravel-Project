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

            {!! Form::open(['route'=>'user_traininginfo.store'])!!}

            <div class="form-group">
                {!! Form::label('training_id','Training Name')!!}
                {!! Form::select('training_id', $training, null,['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                @foreach($newTrainees as $id=>$trainee)
                    {!! Form::checkbox($id+1,$trainee) !!}
                    @foreach($trainees as $traineeq=>$key)
                        @if($trainee==$key)
                            {{$traineeq}}
                        @endif
                    @endforeach
                    <br>
                @endforeach
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>

@endsection
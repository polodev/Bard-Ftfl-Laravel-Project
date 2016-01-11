@extends('admin/layouts/master')
@section('content')<br>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <h1 style="text-align: center;">Marksheet Entry Form</h1>

            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!!Form::open(['route'=>'marksheet.store', 'files'=> true])!!}

            @foreach($trainees as $trainee)

                <div class="form-group">
                    <label for="male">{{$trainee->name}}</label>
                    <input type="number" name="{{$trainee->user_id}}" id="{{$trainee->name}}" class="form-control">
                </div>

            @endforeach
            <input type="hidden" name="examId" id="{{$examId}}" class="form-control" value="{{$examId}}">

            <div class="form-group">

                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>

@endsection
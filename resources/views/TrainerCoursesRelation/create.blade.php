@extends('admin/layouts/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
         <div class="well well bs-component">
            @foreach($errors->all() as $error)
                   <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            @if(session('status'))
                <div class="btn btn-success">
                        {{session('status')}}
                </div>
            @endif
            {!!Form::open(['route'=>'trainer_course.store'])!!}
                <div class="form-group">
                    {!!Form::label('Trainer:')!!}
                    {!!Form::select('trainer_rel',$trainers,null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Course:')!!}
                    {!!Form::select('course_rel', $courses,null,['class'=>'form-control'])!!}
                 </div>

                      {!!Form::submit('create',['class'=>'btn btn-primary'])!!}

            {!!Form::close()!!}
          </div>
    </div>
@endsection
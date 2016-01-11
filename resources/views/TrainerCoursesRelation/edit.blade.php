@extends('admin/layouts/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
         <div class="well well bs-component">
             {!! Form::model($trainer_course, ['method'=>'PATCH','route' => ['trainer_course.update',$trainer_course->id],'files' => true ]) !!}

             <div class="form-group">
                    {!!Form::label('Trainer:')!!}
                    {!!Form::select('trainer_rel',$trainers,$trainer_course->trainer_id,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Course:')!!}
                    {!!Form::select('course_rel',$courses,$trainer_course->course_id,['class'=>'form-control'])!!}
                 </div>

                      {!!Form::submit('Update',['class'=>'btn btn-primary'])!!}

            {!!Form::close()!!}
          </div>
    </div>
@endsection
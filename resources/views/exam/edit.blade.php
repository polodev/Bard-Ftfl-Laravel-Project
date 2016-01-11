@extends('master_trainer/master')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="box box-primary">
                        <div class="box-header text-center">
                            <h3 class="box-title">Edit Exam Form</h3>
                        </div>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach


                        {!! Form::model($data, ['method'=>'PATCH','route' => ['exam.update',$data->id],'files' => true ]) !!}


                        <div class="box-body">

                            <div class="form-group">
                                {!! Form::label('course_id','Subject')!!}
                                {!! Form::select('course_id', $courses, null,['class' => 'form-control'])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Exam Title') !!}
                                {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('exam_description', 'Exam Description') !!}
                                {!! Form::textarea('exam_description', null, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('exam_date', 'Exam Date')!!}<span style="color: red">*</span>

                                {!! Form::text('exam_date', null, array('class' => 'form-control', 'placeholder' => '1987/11/07')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Exam_mark', 'Mark:')!!}<span style="color: red">*</span>
                                {!! Form::number('exam_mark', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group ">
                                {!! Form::submit('Submit', array('class'=>'btn btn-primary btn-block')) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link href="{!! asset('css/datepicker.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet"
          href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <script type="text/javascript"
            src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $('#exam_date')
                    .datepicker({
                        format: 'yyyy/mm/dd'
                    })
        });

    </script>
@show

@endsection

@extends('admin/layouts/master')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="well">
                    <div class="box box-primary">
                        <div class="box-header text-center">
                            <h3 class="box-title">Create Volume</h3>
                        </div>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        {!! Form::open(['route' => 'volume.store', 'files'=> true]) !!}

                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('title', 'Title') !!}<span style="color: red">*</span>
                                {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description') !!}<span style="color: red">*</span>
                                {!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('language', 'Language')!!}

                                {!! Form::text('language', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('journals_id','List of Journal')!!}
                                {!! Form::select('journals_id', $journals, null,['class' => 'form-control'])!!}
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
@endsection

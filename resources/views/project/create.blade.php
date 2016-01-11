@extends('admin/layouts/master')
@section('content')
    <h1 style="text-align: center">Project - CREATE</h1>
    <div class="container col-md-8 col-md-offset-2">
        <div class="row">
            <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                {!!Form::open(['route'=>'project.store'])!!}
                <div class="form-group">
                    {!!Form::label('title')!!}
                    {!!Form::text('title',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Description')!!}
                    {!!Form::textarea('description',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('Language ')!!}<br>
                    {!!Form::text('language',null,['class'=>'form-control'])!!}
                </div>


                <div class="form-group">

                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                </div>

                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@extends('admin/layouts/master')
@section('content')
    <h1 style="text-align: center">ACADEMIC CALENDER - CREATE</h1>
    <div class="container col-md-8 col-md-offset-2">
        <div class="row">
            <div class="well well bs-component">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {!!Form::open(['route'=>'calendar.store', 'files'=> true])!!}
                <div class="form-group">
                    {!!Form::label('title')!!}
                    {!!Form::text('title',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Description')!!}
                    {!!Form::textarea('description',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('Image ')!!}<br>
                    {!! Form::file('img', ['class' => 'field','id' => 'img_path'])!!}
                    <p class="help-block">Dimention Home Page: 240px X 140px (image must be smaller than 150KB)<br/>Dimention
                        Slide: 480px X 306px(image must be smaller than 150KB)</p>
                </div>


                <div class="form-group">

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>

                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection
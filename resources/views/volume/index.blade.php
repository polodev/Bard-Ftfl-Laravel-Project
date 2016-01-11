@extends('admin/layouts/master')
@section('content')<br>
<div class="container col-md-8 col-md-offset-2">
    <h1 style="text-align: center;">Volume List</h1>
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach($volumes as $volume)
        <div class="well well bs-component">
            <h2 style="text-align: center;">{{$volume->title}}</h2>

            <p><mark>Description</mark> :{{$volume->description}}</p>

            <p><mark>Language</mark> :{{$volume->language}}</p>
            <a href="volume/{{$volume->id}}/edit" class="btn btn-success" type="button">
                <i class="fa fa-edit">Edit</i>
            </a>
            {!! Form::open(array('method'=>'DELETE', 'route'=>array('volume.destroy',$volume->id)))!!}
            {!! Form::submit('Delete', array('class'=>'btn btn-danger','onclick' => 'return confirm("Are you sure want to Delete?");'))!!}
            {!! Form::close()!!}
        </div>

    @endforeach
</div>
@endsection
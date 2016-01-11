@extends('admin/layouts/master')
@section('content')
    <h1 style="text-align: center">FILES - EDIT</h1>
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
                {{--                {!!Form::open(['route'=>'file.update', $file->id, 'files'=> true, 'method'=>'PUT'])!!}--}}
                {!! Form::model($file, ['method'=>'PATCH','route' => ['BARD_modules.update',$file->id],'files' => true ]) !!}

                <div class="form-group">
                    {!!Form::label('author')!!}
                    {!!Form::text('author',null,['class'=>'form-control','required'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('abstract')!!}
                    {!!Form::textarea('abstract',null,['class'=>'form-control','required'])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('references')!!}
                    {!!Form::text('references',null,['class'=>'form-control','required'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('Select Project')!!}
                    {!!Form::select('project_id',$issues, null,['class'=>'form-control','required'])!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('file')!!}<br>
                    {!! Form::file('filepath', ['class' => 'field','id' => 'img_path'])!!}
                </div>


                <div class="form-group">

                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>

                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection
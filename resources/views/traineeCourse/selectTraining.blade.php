@extends('admin/layouts/master')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <div class="container col-md-8 col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h2 style="text-align: center">Select any Training</h2>
            @foreach($trainings as $trainingId=>$training)

                <a href="traineeCourse/{{$trainingId}}/training" type="button" class="btn btn-danger">
                   {{$training}} <i class="fa fa-cog fa-fw"></i>
                </a>
            @endforeach
    </div>
@endsection
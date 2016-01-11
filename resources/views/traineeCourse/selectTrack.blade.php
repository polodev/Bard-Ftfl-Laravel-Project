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
        @foreach($courseId as $coursesId)
{{--            {{$coursesId->id}}--}}
            @foreach($courses as $key=>$course)
                @if($key==$coursesId->id)
{{--                                            {{$key}}{{$course}}--}}
                    <a href="{{url('/track/'.$coursesId->id.'/'.$TrainingId)}}" type="button" class="btn btn-success">
                        {{$course}} <i class="fa fa-truck"></i>
                    </a>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection
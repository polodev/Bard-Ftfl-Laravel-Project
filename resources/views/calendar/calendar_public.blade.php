@extends('master/master')
@section('content')<br>
<div class="container col-md-8 col-md-offset-2">
    <h1 style="text-align: center;">SCHEDULES OF BARD</h1>
    @foreach($calenders as $calender)
        <div class="well well bs-component">
            <h2 style="text-align: center;">{{$calender->title}}</h2>

            <p>{{$calender->description}}</p>
            <img src="{{$calender->img}}" class="thumb img-responsive" alt="{{$calender->title}}"><br>
        </div>
    @endforeach
</div>
@endsection
@extends('master.trainee_master')
@section('title', 'All Forum  Info')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> All forum's posts. </h2>
            </div>
            @if (Empty($contents))
                <p> There is no post.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>User Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $ticket)
                        <tr>
                            <td><a href="{!! action('ForumController@show', $ticket->id) !!}">{!! $ticket->title !!} </a></td>
                            <td> {!! $ticket->name !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        
        <a href="{{ URL::to('/forum_create/'.$t_id) }}"> <button class="btn btn-success">CREATE POST</button><a>
    </div>

@endsection
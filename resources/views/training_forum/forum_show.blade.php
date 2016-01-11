@extends('master.trainee_master')
@section('title', 'Forum show')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $ticket->title !!}</h2>
                <p> {!! $ticket->content !!} </p>
            </div>
<!--
           <a href="{!! action('ForumController@edit', $ticket->id) !!}" class="btn btn-info">Edit</a>
            <a href="#" class="btn btn-info">Delete</a> 

-->



    <!--  comment section goes here-->


        @foreach($comments as $comment)
            <div class="well well bs-component">
                <div class="content">
                    <h4 align="left"> Comment: {!! $comment->content !!}</h4>
                    <br>

                    <br>
                   <div class="row">
                       <div class="col-md-8"> <h4 align="left"> <font color="gray">Commented by:{!! $comment->name !!}</font> </h4></div>
                       <div class="col-md-4"><h4 align="right"><font color="gray"> Commented on: {!! $comment->created_at !!} </font></h4></div>
                   </div>

                </div>
            </div>
        @endforeach
        <form class="form-horizontal" method="post" action="{{ URL::to('/comment') }}">

            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="post_id" value="{!! $ticket->id !!}">

            <fieldset>
                <legend>Reply</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </fieldset>
        </form>


    </div>
    </div>
@endsection





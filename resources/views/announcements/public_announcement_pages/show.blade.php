@extends('master.master')
@section('title', 'Announcement')
<style>

    hr{
        background-color: burlywood;
    }

    div {
        text-align: justify;
        text-justify: inter-word;
    }

    label{
        color: #00695C;
        font-size: larger;
    }

    b{
        font-size: larger;
    }

</style>

@section('content')
    <div class="container col-md-12 col-md-offset-0">
        <div class="well well bs-component">
            <div class="content">
                <div class="well well bs-component" style="background-color: #43A047; color:white; font-size:larger" align="center"><h1 align="center">Announcement</h1></div>
                <div class="well well bs-component">
                    <label>Heading</label><hr>
                    <b>{!! $announcement->heading !!}</b></br><br>
                    <b>Published On:&nbsp;{!! $announcement->created_at  !!}</b>
                </div>

                <div class="well well bs-component">
                    <label>Description</label><hr>
                    <p>{!! $announcement->content !!}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.master')
@section('title', 'View a announcement')
    <style>

        hr{
            background-color: purple;
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
    <script>
        function check(){
            return confirm("Are You Sure? You Want To Delete This Announcement's Information.");
        }
    </script>

@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="well well bs-component">
            <div class="content">
                <div class="well well bs-component" style="background-color: #43A047; color:white; font-size:larger" align="center"><h1>Announcements</h1></div>
                <div class="well well bs-component" style="background-color: #4DB6AC; color: white;">
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
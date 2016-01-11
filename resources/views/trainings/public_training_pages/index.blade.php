@extends('master.master')
@section('title', '`Trainings')
    <style>
        hr{
            background-color: #FFCC80;
        }
    </style>
@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: whitesmoke; color: black;">
                <h2 align="center">Trainings</h2>
            </div>

            @if ($trainings->isEmpty())
                <b>No Training Available.</b>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        <h2 align="center"><font color="black">Ongoing Training</font></h2><hr>

                        @if ($ongoingTrainings->isEmpty())
                            <h4>&nbsp;&nbsp;No Available Ongoing Trainings.</h4>
                        @else
                            @foreach($ongoingTrainings as $training)
                                <div class="col-sm-4">
                                    <div class="course_gellary">
                                        <div class="course_image">
                                            <img src="{!! $training->image_path !!}" alt="No Training Image">
                                        </div>
                                        <div class="course_title">
                                            <a href="{!! action('TrainingsController@publicShow', $training->id) !!}">{!! $training->training_name !!} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h2 align="center"><font color="black">Upcoming Training</font></h2><hr>
                        @if ($upcomingTrainings->isEmpty())
                            <h4>&nbsp;&nbsp;No Available upcoming Trainings.</h4>
                        @else
                            @foreach($upcomingTrainings as $training)
                                <div class="col-md-4">
                                    <div class="course_gellary">
                                        <div class="course_image">
                                            <img src="{!! $training->image_path !!}" alt="Course Image">
                                        </div>
                                        <div class="course_title">
                                            <a href="{!! action('TrainingsController@publicShow', $training->id) !!}">{!! $training->training_name !!} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h2 align="center"><font color="black">Past Training</font></h2><hr>
                        @if ($pastTrainings->isEmpty())
                            <h4>&nbsp;&nbsp;No Past Trainings.</h4>
                        @else
                            @foreach($pastTrainings as $training)
                                <div class="col-md-4">
                                    <div class="course_gellary">
                                        <div class="course_image">
                                            <img src="{!! $training->image_path !!}" alt="Course Image">
                                        </div>
                                        <div class="course_title">
                                            <a href="{!! action('TrainingsController@publicShow', $training->id) !!}">{!! $training->training_name !!} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
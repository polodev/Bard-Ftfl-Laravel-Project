@extends('admin.layouts.master')
@section('title', 'View Information')

    <style>
        label{
            color: green;
            font-size: larger;
        }
        hr{
            background-color: purple;
        }

        h5{
            font-family: Arial;
            font-size: larger;
        }


    </style>
@section('content')
    <div class="container">
        <div class="well well bs-component">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--8-col">
                    <div class="well" style="background-color: darkseagreen;">
                            <h3 align="center">Trainings List</h3>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col"></div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--2-col"></div>
                <div class="mdl-cell mdl-cell--8-col">
                    <div class="well well bs-component">
                        @if ($trainings->isEmpty())
                            <p> There is no available trainings.</p>
                        @else
                            <label><h4>Ongoing Training</h4></label><hr>
                            <div>
                                @foreach($trainings as $training)
                                    @if(date('Y-m-d')>=$training->start_date && date('Y-m-d')<=$training->end_date )
                                        <h5>{!! $training->training_name !!}<a href="{!! action('TrainingsController@show', $training->id) !!}" class="btn btn-info" style="float: right;">VIEW</a></h5>
                                    @endif
                                @endforeach
                            </div>

                            <label><h4>Upcoming Training</h4></label><hr>
                            <div>
                                @foreach($trainings as $training)
                                    @if(date('Y-m-d')<$training->start_date)
                                        <h5>{!! $training->training_name !!}<a href="{!! action('TrainingsController@show', $training->id) !!}" class="btn btn-info" style="float: right;">VIEW</a></h5>
                                    @endif
                                @endforeach
                            </div>

                            <label><h4>Past Training</h4></label><hr>
                            <div class="inline">
                                @foreach($trainings as $training)
                                    @if(date('Y-m-d')>$training->end_date)
                                        <h5>{!! $training->training_name !!}<a href="{!! action('TrainingsController@show', $training->id) !!}" class="btn btn-info" style="float: right;">VIEW</a></h5>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--2-col"></div>
            </div>
        </div>
    </div>
@endsection
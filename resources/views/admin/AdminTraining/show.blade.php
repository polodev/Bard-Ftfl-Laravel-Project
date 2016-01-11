@extends('admin.layouts.master')
@section('title', 'View Information')
    <style>
        label{
            color: green;
            font-size: larger;
        }

        b{
            font-family: Arial;
            font-size: larger;
        }

        hr{
            background-color: purple;
        }
    </style>
@section('content')
    <div class="container">
        <div class="well well bs-component">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="well" style="background-color: darkseagreen;font-size: larger">
                        <header align="center">
                            <b>Bangladesh Academy For Rural Development(BARD)</b><br>
                            <b>Kotbari,Comilla,Bangladesh</b><br>
                            <b>{!! $training->training_name !!}</b>
                        </header>
                    </div>
                </div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col">
                    <div class="well well bs-component">
                        <div>
                            <label>Training Type</label>
                            <p>{!! $training->training_type  !!}</p>
                        </div><hr>

                        <div>
                            <label>List of Courses</label>
                            <br>
                            @if ($courses->isEmpty())
                                <p> There is no available courses.</p>
                            @else
                                @foreach($courses as $course)
                                    <b><a href="{!! action('CourseController@show', $course->id) !!}">{!! $course->course_name !!}</a></b><br>
                                @endforeach
                            @endif

                        </div><hr>

                        <div>
                            <label>Duration:</label>&nbsp;{!! $training->start_date !!}&nbsp;to&nbsp;{!! $training->end_date !!}

                        </div><hr>

                        <div>
                            <label>Information How to Apply</label>
                            <p>
                                {!! $training->applying_information !!}
                            </p>
                        </div><hr>


                        <div>
                            <label>Resources Provided by to a Particular Training</label>
                            <p>
                                {!! $training->provided_resources !!}
                            </p>
                        </div><hr>

                        <div>
                            <label>Information About Accommodation</label>
                            <p>
                                {!! $training->accommodation !!}
                            </p>
                        </div>


                    </div>
                </div>

                <div class="mdl-cell mdl-cell--6-col">
                    <div class="well well bs-component">
                        <div>
                            <label>Description</label><br><hr>
                            <p>
                                {!! $training->description !!}
                            </p>
                        </div><hr>

                        <div>
                            <label>Objectives</label>
                            <p>
                                {!! $training->objectives !!}
                            </p>
                        </div><hr>
                        <div>
                            @if (!$testimonials->isEmpty())
                                <label>Testimonial</label><br><hr>
                                @foreach($testimonials as $testimonial)
                                    <p>{!! $testimonial->testimonial !!}</p><br>
                                    <i>Written by &nbsp;&nbsp;{!! $testimonial->author_name !!}</i>
                                @endforeach
                            @endif
                        </div>
                        <hr>
                        <div>
                            <label>Daily Schedule</label>
                            <p>
                                {!! $training->daily_schedule !!}
                            </p>
                        </div><hr>

                        <div>
                            <label>Fees Structure</label>
                            <p>
                                {!! $training->fees_structure !!}
                            </p>
                        </div><hr>

                        <div>
                            <label>Responsible person for Trainees</label>
                            <p>
                                {!! $training->responsible_person !!}
                            </p>
                        </div>


                    </div>
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <a href="{!! action('TrainingsController@edit', $training->id) !!}" class="btn btn-info pull-left">Edit</a>
                    <form method="post" action="{!! action('TrainingsController@destroy', $training->id) !!}" class="pull-left">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin/layouts.master')
@section('title', 'View all courses')
@section('content')

    <div class="container">
        <div class="row all_report">
        <div class="col-sm-4">
            <a style="background-color: #E91E63; color: #fff;" class="btn btn-square btn-lg btn-primary"  href="{!! URL::to('/trainingId/'. $trainingId->id) !!}"><i class="fa fa-comment"></i> Feedbacks</a>
        </div>
    </div>

        <h2> Courses </h2>

        @if ($courses->isEmpty())
            <p> There is no course available.</p>
        @else
            <div class="row">
                @foreach($courses as $course)

                    <div class="col-sm-4">
                        <div class="course_gellary">
                            <div class="course_image">
                                <img src="{!! asset($course->course_image) !!}" alt="Course Image">
                            </div>
                            <div class="course_title">
                                <a href="{!! action('ViewTraineeReportController@view_trainee_report', $course->id) !!}">{!! $course->course_name !!} </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif

    </div>
    
@endsection
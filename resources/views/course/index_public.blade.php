@extends('master.master')
@section('title', 'View all courses')
@section('content')

    <div class="container">

        <h2> Courses </h2>

        @if ($courses->isEmpty())
            <p> There is no course available.</p>
        @else
            <div class="row">
                @foreach($courses as $course)

                    <div class="col-md-4">
                        <div class="course_gellary">
                            <div class="course_image">
                                <img src="{!! $course->course_image !!}" alt="Course Image">
                            </div>
                            <div class="course_title">
                                <a href="{!! action('CoursePublicController@show', $course->id) !!}">{!! $course->course_name !!} </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif

    </div>

@endsection
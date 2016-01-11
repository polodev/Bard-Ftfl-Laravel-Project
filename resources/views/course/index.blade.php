@extends('admin.layouts.master')
@section('title', 'View all courses')
@section('content')

    <div class="container">

        <h2> Courses </h2>

        @if ($courses->isEmpty())
            <p> There is no course available.</p>
        @else
            <div class="row">


                    <table class="table">
                        <thead>
                        <tr>
                            <th>COURSE ID</th>
                            <th>COURSE NAME</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{!! $course->id !!} </td>
                                <td>
                                    <a href="{!! action('CourseController@show', $course->id) !!}">{!! $course->course_name !!} </a>
                                </td>
                                <td>
                                    <a href="{!! action('CourseController@edit', $course->id) !!}" class="btn btn-info pull-left">Edit</a>

                                    <form method="post" action="{!! action('CourseController@destroy', $course->id) !!}" class="pull-left">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

            </div>
        @endif

    </div>

@endsection
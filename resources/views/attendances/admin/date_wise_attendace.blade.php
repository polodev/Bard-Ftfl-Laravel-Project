@extends('admin.layouts.master')
@section('title', 'All Attendance')
@section('content')

    <div class="container col-md-12">
        <div class="well well bs-component">
            <div class="content">
                <table class="table">
                    <thead>
                    <tr style="background-color:seagreen;color:white">
                        <th>Session</th>
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($attendance as $attendance_session)
                            @if($attendance_session['present']!=0 || $attendance_session['absent']!=0 )
                            <tr>
                                <td>
                                    <a href="{!! action('AttendanceController@DateWiseAttendance',[$course_id,$attendance_session['session_name'],$date]) !!}">{!! $attendance_session['session_name'] !!}</a>
                                </td>
                                <td>
                                    {!! $attendance_session['present'] !!}
                                </td>
                                <td>
                                    {!! $attendance_session['absent'] !!}
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

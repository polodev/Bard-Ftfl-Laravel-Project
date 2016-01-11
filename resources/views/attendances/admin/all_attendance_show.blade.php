@extends('admin.layouts.master')
@section('title', 'All Attendance')
@section('content')
    <div class="container col-md-12">
        <div class="well well bs-component" style="background-color:lavender">

            <!-- for getting attendance session wise -->
            <div class="row">
                <form class="form-horizontal"action="{!! action('AttendanceController@showDateAdminAttendance') !!}" method="post">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                    <div class="col-md-6 col-md-offset-3"><h4 align="center"><label> Give Particular date</label>
                    <input type="date" class="form-control"  align="center" name="date"/></div><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Get attendance" class="btn btn-primary"></h4>
                </form>
            </div>
            <!-- for specific date only -->
            @if(!empty($date_attendance))
            <div>

                <h2 align="center"><u><i>Attendance record for  date :&nbsp;{{ $date }}</i></u></h2>
                <label><strong>COURSE :</strong>&nbsp;{{ $course_name }}</label>
                </br>
                </br>
                <table class="table table-hover">
                    <thead>
                    <tr style="background-color:seagreen;color:white">
                        <th><h4>Session</h4></th>
                        <th><h4>Present</h4></th>
                        <th><h4>Absent</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($date_attendance as $attendance_session)
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
            @endif

            <!-- for five days -->
            <div>
                <legend align="center"><u><i>PREVIOUS 5 DAYS ATTENDANCE</i></u></legend>
                @if(empty($attendance))
                    <h2 align="center"> No Attendance for last five days. Those days might be off days.</h2>
                @else
                    <table class="table table-hover">
                        <thead>
                        <tr style="background-color:seagreen;color:white">
                            <th><h4>Date</h4></th>
                            <th><h4>Session</h4></th>
                            <th><h4>Present</h4></th>
                            <th><h4>Absent</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; $j=0; ?>
                        @foreach($attendance as $attendance_date)
                            @foreach($attendance_date as $attendance_session)
                                @if($attendance_session['present']!=0 || $attendance_session['absent']!=0 )
                                    @if($i++==1)
                                        <tr>
                                            <td><?php echo date('Y-m-d',strtotime("$j days")) ?></td>
                                            <td>
                                                <a href="{!! action('AttendanceController@AdminAttendanceShowTrainee',[$course_id,$attendance_session['session_name'],date('Y-m-d',strtotime("$j days"))]) !!}">{!! $attendance_session['session_name'] !!}</a>
                                            </td>
                                            <td>
                                                {!! $attendance_session['present'] !!}
                                            </td>
                                            <td>
                                                {!! $attendance_session['absent'] !!}
                                            </td>
                                        </tr>

                                        @else
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a href="{!! action('AttendanceController@AdminAttendanceShowTrainee',[$course_id,$attendance_session['session_name'],date('Y-m-d',strtotime("$j days"))]) !!}">{!! $attendance_session['session_name'] !!}</a>
                                                </td>
                                                <td>
                                                    {!! $attendance_session['present'] !!}
                                                </td>
                                                <td>
                                                    {!! $attendance_session['absent'] !!}
                                                </td>
                                            </tr>
                                        @endif
                                @endif
                            @endforeach
                            <?php $i=1;$j-- ?>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

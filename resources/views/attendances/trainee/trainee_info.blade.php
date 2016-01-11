@extends('master.trainee_master')
@section('title','Trainee Attendance')
@section('content')

    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:lightgreen;color:purple">
                <center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>
                    <legend><u><h3>Attendence Sheet</h3></u><small>(For Trainees)</small></legend>

                    <h2 align="center"> <i><u>MY ATTENDANCE RECORD</u></i> </h2>
            </div>
                <table class="table table-hover">
                    <thead>
                    <tr style="background-color:seagreen;color:white">
                        <th>COURSE</th>
                        <th>ABSENT</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courseAttendance as $courseAttendance)
                        <tr>
                            <td>
                                {!! $courseAttendance['course_name'] !!}
                            </td>

                            <td>
                                {!! $courseAttendance['absent'] !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class="panel-heading" style="background-color:lightgreen;color:purple">

            </div>
        </div>
    </div>
@endsection
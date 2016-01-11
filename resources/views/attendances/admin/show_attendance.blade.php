@extends('master')
@section('title', 'View a course')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div ><center><h5>Bangladesh Academy for Rural Development<br/>
                        Kotbari, Comilla</h5>
                    <legend><u><h3>Attendence Sheet</h3></u><small>(For Trainees)</small></legend>
                    <h4><b>Name of Training Course  : 3<sup>rd</sup> FTFL Foundation Training Course<br/>
                            Participants                : FTFL Trainers of Bangladesh Computer Council<br/>
                            Duration                    : 01 August - 29 October 2015</b></h4> </center>  <br/>
            </div>
            <div class="content">
                <h3 class="header"><p>Date :{!! $date !!}</p><p>Session:{!! $session_name !!}</p></h3>
                <table class="table">
                    <thead>
                    <tr style="background-color:seagreen;color:white">
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a href="">{!!$present !!} </a>
                        </td>
                        <td>
                            <a href="">{!! $absent !!} </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@extends('master_trainer/master')
@section('title', 'Trainers')
@section('content')

<div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Health Report </h2>
            </div>
            @if(empty($abc))
                <div class="alert alert-warning">
                    <p>There is no available health information</p>
                </div>
            @else
                <table class="table">
                    
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($abc as $a)
                        <tr>
                            <td>{!! $a['id'] !!} </td>
                            <td>{!! $a['name'] !!} </td>
                            <td>
                                <a href="{!! URL::to('/traineeReportView/'.$a['id']) !!}">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                     
                </table>
              @endif
        </div>
    </div>



@endsection
@extends('admin.layouts.master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Feedback Report </h2>
            </div>
            @if(Empty($trainer))
                <div class="alert alert-warning">
                    <p>No feedback is given yet</p>
                </div>
            @else
            
                <table class="table">
                    <thead>
                    <tr>
                        <th>Trainer Name</th>
                        <th>Track</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($trainer as $tr)
                                
                            <tr>
                                <td>{!! $tr->name !!}  </td>
                                <td>{!! $tr->course_name !!} </td>
                                <td>
                                    <a href="{!! URL::to('/trainersFeedback/'.$tr->trainer_id) !!}">View</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
               @endif
        </div>
    </div>

@endsection
@extends('master.trainee_master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Feedback Report </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
               
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Trainer Name</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trainers as $feedback)
                                <tr>                               
                                    <td>{!! $feedback->name !!} </td>
                                    <td>
                                        <a href="{!! action('FeedbacksController@show', $feedback->id) !!}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              
            </div>
    </div>

@endsection
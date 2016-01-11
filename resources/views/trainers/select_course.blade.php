@extends('master_trainer/master')
@section('title', 'Trainers')
@section('content')
  <section class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                     <h2> Courses  </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (Empty($trainer))
                    <p> There is no course available.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Training Name</th>
                                <th>Track</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($trainer as $tra)
                                <tr>
                                    <td>{!! $tra->training_name !!}</td>
                                    <td>{!! $tra->course_name !!} </td>
                                    <td>
                                       <a href="{!! action('TrainersController@view_trainee_report', $tra->id) !!}">View</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            
                        </tbody>
                    </table>
                @endif
            
    </div>
  </section>
@endsection


@extends('master_trainer/master')
@section('title', 'Trainer')
@section('content')
  <section class="content-2" style="background-color: rgb(255, 255, 255);">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Health Report </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($trainings->isEmpty())
                    <p> There is no health information of trainees.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Training ID</th>
                                <th>Training Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trainings as $training)
                                <tr>
                                    <td>{!! $training->id !!} </td>
                                    <td>{!! $training->training_name !!} </td>
                                    <td>
                                       <a href="{!! URL::to('/trainingsCourse/'.$training->id) !!}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            
    </div>
  </section>
@endsection

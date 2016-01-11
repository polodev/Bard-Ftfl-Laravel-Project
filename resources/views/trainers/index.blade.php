@extends('master_trainer/master')
@section('title', 'Trainers')
@section('content')
    
    <div class="container col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2> Trainers Information </h2>
                    </div>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                     @endforeach
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($trainers->isEmpty())
                        <p> There is no data in database.</p>
                    @else
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>                                    
                                    <th>Country</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainers as $trainer)
                                    <tr>
                                        <td> {!! $trainer->id !!}  </td>
                                       <td> <a href="{!! action('TrainersController@show', $trainer->id) !!}">{!! $trainer->name !!} </a></td>
                                        
                                        <td>{!! $trainer->country !!}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
        </div>
@endsection 

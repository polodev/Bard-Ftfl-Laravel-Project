@extends('master_trainer/master')
@section('title', 'Trainee')
@section('content')
 <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>All the Trainees</h2>
                </div>
                @if ($infos->isEmpty())
                    <p> There is no data in database.</p>
                @else
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                
                                <th>Trainee ID</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($infos as $info)
                                <tr>
                                    <td> <a href="{!! action('InfosController@show', $info->id) !!}">{!! $info->name !!} </a> </td>
                                    
                                    <td>{!! $info->trainee_id !!}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>
@endsection
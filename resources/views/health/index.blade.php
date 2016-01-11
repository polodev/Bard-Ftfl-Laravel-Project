@extends('master.trainee_master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Health Report </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($healthInfos->isEmpty())
                    <p> There is no health information of trainees.</p>
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
                            @foreach($healthInfos as $health)
                                <tr>
                                    <td>{!! $health->user_id !!} </td>
                                    <td>{!! Auth::user()->name !!} </td>
                                    <td>
                                        <a href="{!! action('HealthController@show', $health->user_id) !!}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection
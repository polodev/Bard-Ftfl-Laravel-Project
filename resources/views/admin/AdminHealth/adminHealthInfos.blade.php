@extends('admin.layouts.master')
@section('title', 'All Info')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Health Report </h2>
            </div>
            
                <table class="table">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($healthReport as $trainee)
                        <tr>
                            <td>{!! $trainee->trainee_id !!} </td>
                            <td>{!! $trainee->name !!} </td>
                            <td>
                                <a href="{!! action('AdminController@show', $trainee->trainee_id) !!}">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
           
        </div>
    </div>

@endsection
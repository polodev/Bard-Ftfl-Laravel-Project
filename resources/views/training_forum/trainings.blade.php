@extends('master.trainee_master')
@section('title', 'All Forum')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Forums </h2>
            </div>
            @if (Empty($tra))
                <p> There is no forum</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Training Name</th>
                        <th>Forum links</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tra as $t)
                        <tr>
                            <td>{!! $t->training_name !!}</td>
                            <td><a href="{!! URL::to('/forumIndex/'.$t->id) !!}">See Here </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
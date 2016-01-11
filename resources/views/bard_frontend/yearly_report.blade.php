@extends('master/master')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <!--available -- table class =    .table-striped, .table-bordered, .table-hover, .table-condensed-->
            <!--available -- contextual tr class = active, success, warning, danger, info-->
            <thead>
            <tr>
                <th>Year</th>
                <th>No of Trainings</th>
                <th>No of course</th>
                <th>No of Participants</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                <tr>
                    <th scope="row">{{ $report['year'] }}</th>
                    <td>{{ $report['number_of_trainings'] }}</td>
                    <td>{{ $report['number_of_courses'] }}</td>
                    <td>{{ $report['number_of_trainee'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
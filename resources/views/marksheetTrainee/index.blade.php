@extends('master.trainee_master')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
                    <h1>List of all exam marks </h1>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Exam Name</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($marks as $key=>$mark)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $mark->title }}</td>
                                <td>{{ $mark->mark }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

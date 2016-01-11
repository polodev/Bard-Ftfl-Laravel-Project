@extends('master_trainer/master')
@section('content')<br>
    <div class="container col-md-8 col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h2 style="text-align: center">Marksheet</h2>
        <table class="table">
            <thead>
            <tr>
                <th>DB ID</th>
                <th>Trainee</th>
                <th>Mark</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marksheets as $key=>$marksheet)
                <tr>
                    <td>{{$marksheet->id}}</td>
                    <td>{{$marksheet->name}}</td>
                    <td>{{$marksheet->mark}}</td>
                    <td><a href="/marksheet/{{$marksheet->id}}/edit" class="btn btn-primary">Edit</a></td>
                    <td>
                        {!! Form::open(array('class'=>'form-inline', 'method'=>'DELETE','route'=>array('marksheet.destroy',$marksheet->id))) !!}

                        {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
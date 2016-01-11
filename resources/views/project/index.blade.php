@extends('admin/layouts/master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Language</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->language}}</td>
                <td>
                    <a href="project/{{$project->id}}/edit" type="button">Edit</a>
                    {!!Form::open(array('class'=>'form-inline','method'=>'Delete','route'=>['project.destroy',$project->id]))!!}
                    {!!Form::submit('DELETE',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
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
                @foreach($issues as $issue)
                    <tr>
                        <td>{{$issue->id}}</td>
                        <td>{{$issue->title}}</td>
                        <td>{{$issue->description}}</td>
                        <td>{{$issue->language}}</td>
                        <td>
                            <a href="issue/{{$issue->id}}/edit" type="button">Edit</a>
                            {!!Form::open(array('class'=>'form-inline','method'=>'Delete','route'=>['issue.destroy',$issue->id]))!!}
                                {!!Form::submit('DELETE',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
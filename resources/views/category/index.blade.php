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
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->language}}</td>
                <td>
                    <a href="category/{{$category->id}}/edit" type="button">Edit</a>
                    {!!Form::open(array('class'=>'form-inline','method'=>'Delete','route'=>['category.destroy',$category->id]))!!}
                    {!!Form::submit('DELETE',['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
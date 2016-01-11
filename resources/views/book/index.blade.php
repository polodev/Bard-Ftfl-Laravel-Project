@extends('admin/layouts/master')
@section('content')

    <div class="row col-md-10  custyle">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th> Author</th>
                <th> Abstract</th>
                <th> Filepath</th>
                <th> References</th>
                <th> Category Id</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            {{--{!! Form::open(['route'=>'file.index','method'=>'GET','class'=>'Class_name']) !!}

            {!! Form::text('id') !!}
            {!! Form::submit() !!}
            {!! Form::close() !!}--}}
            <tbody>
            @foreach($alldata as $data)
                <tr>
                    <td>{{$data->author}}</td>
                    <td>{{$data->abstract}}</td>
                    <td class="col-sm-2"><img src="{{asset($data->filepath)}}" class="img-responsive"></td>
                    <td>{{$data->references}}</td>
                    <td>{{$data->category_id}}</td>
                    <td class="text-center"><a class='btn btn-info btn-xs' href="{{Route('BARD_book.edit',$data->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        {!! Form::open(array('route'=>['BARD_book.destroy',$data->id],'class'=>'form-horizental','method'=>'delete')) !!}

                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        {{--{!!Form::open(array('class'=>'form-horizental','method'=>'Delete','route'=>['file.destroy',$issue->id]))!!}
                        {!!Form::submit('DELETE',['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}--}}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
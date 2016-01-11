@extends('admin/layouts/master')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $key=>$data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->english_name}}</td>
                        <td>{{$data->e_mail}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->updated_at}}</td>
                        <td>
                            <a href="registration/{{$data->id}}" class="btn btn-primary" type="button"><i class="fa fa-eye"> Show</i></a>
                            {{--<a href="registration/{{$data->id}}/edit" class="btn btn-success" type="button"><i class="fa fa-edit">Edit</i></a>--}}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

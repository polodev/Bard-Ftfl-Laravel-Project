@extends('admin/layouts/master')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <div class="container col-md-8 col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h2 style="text-align: center">Trainee Course Relationship</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Serial No</th>
                <th>User Name</th>
                <th>Trainings Subject</th>
                <th>ACTION
            </tr>
            </thead>
            <tbody>
            @foreach($userTraining as $key=>$trainingSubject)
                {{--{{$key}}{{$trainingSubject}}--}}
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @foreach($trainees as $name=>$id)
                            @if($id==$trainingSubject->user_id)
                                {{$name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($training as $trainingId=>$trainingName)
                            @if($trainingId==$trainingSubject->trainings_id)
                                {{$trainingName}}
                            @endif
                        @endforeach
{{--                        {{$trainingSubject->trainings_id}}--}}
                    </td>
                    <td>
                        <a href="user_traininginfo/{{$trainingSubject->id}}/edit" type="button">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        {!! Form::open(array('method'=>'DELETE', 'route'=>array('user_traininginfo.destroy',$trainingSubject->id)))!!}
                        {{--                        {!! Form::submit('Delete', array('Delete','onclick' => 'return confirm("Are you sure want to Delete?");'))!!}--}}
                        <button type="submit"><i class="fa fa-times"></i></button>
                        {!! Form::close()!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
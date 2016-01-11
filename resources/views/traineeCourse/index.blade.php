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
                <th>Trainee Name</th>
                <th>Course Name</th>
                <th>ACTION
            </tr>
            </thead>
            <tbody>
            @foreach($traineeCourse as $key=>$traineeCourse)
                <tr>
                    <td>{{$key+1}}</td>
{{--                                    <td>{{$traineeCourse->trainee_id}}</td>--}}
                    <td>
                        @foreach($trainees as $id=>$trainee)
                            @if($id==$traineeCourse->trainee_id)
                                {{ $trainee }}
                            @endif
                        @endforeach
                    </td>
{{--                                    <td>{{$traineeCourse->course_id}}</td>--}}
                    <td>
                        @foreach($courses as $id=>$course)
                            @if($id==$traineeCourse->course_id)
                                {{ $course }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="traineeCourse/{{$traineeCourse->id}}/edit" type="button">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        {!! Form::open(array('method'=>'DELETE', 'route'=>array('traineeCourse.destroy',$traineeCourse->id)))!!}
{{--                        {!! Form::submit('Delete', array('<i class="fa fa-pencil-square-o"></i>','onclick' => 'return confirm("Are you sure want to Delete?");'))!!}--}}
                        <button type="submit"><i class="fa fa-times"></i></button>
                        {!! Form::close()!!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
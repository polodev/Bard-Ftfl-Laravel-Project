@extends('admin/layouts/master')
@section('content')
        <div class="container col-md-8 col-md-offset-2">
                <div class="well well bs-component">
               @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
               @endforeach
               @if(session('status'))
                    <div class="alert alert-success">
                          {{session('status')}}
                    </div>
               @endif
               <h2 style="text-align: center">TRAINER COURSE LIST</h2>
               <table class="table">
                    <thead>
                           <tr>
                                <td>ID</td>
                                <td>Trainer</td>
                                <td>Course</td>
                                <td>Edit</td>
                                <td>Delete</td>
                           </tr>
                    </thead>
                    <tbody>
                            @foreach($trainers as $trainer)
                                <tr>
                                    <td>{{$trainer->id}}</td>
{{--                                    <td>{{$trainer->trainer_id}}</td>--}}
                                    <td>
                                        @foreach($trainersList as $id=>$trainerFromList)
                                            @if($id==$trainer->trainer_id)
                                                {{ $trainerFromList }}
                                            @endif
                                        @endforeach
                                    </td>
{{--                                    <td>{{$trainer->course_id}}</td>--}}
                                    <td>
                                        @foreach($courses as $id=>$course)
                                            @if($id==$trainer->course_id)
                                                {{ $course }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td><a href="/trainer_course/{{$trainer->id}}/edit" class="btn btn-success">Edit</a></td>
                                    <td>
                                        {!!Form::open(array('class'=>'form-inline','method'=>'Delete','route'=>['trainer_course.destroy',$trainer->id]))!!}
                                        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
               </table>
               </div>
        </div>
@endsection
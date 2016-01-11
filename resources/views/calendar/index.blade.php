@extends('admin/layouts/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><center>SCHEDULES OF BARD</center></h2>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        {{--<th>Frequency</th>--}}
                        <th>Logo</th>
                        {{--<th>Language</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($calenders as $calender)
                        <tr>
                            <td>{{$calender->id}}</td>
                            <td>{{$calender->title}}</td>
                            <td>{{$calender->description}}</td>
                            {{--<td>{{$journal->frequency}}</td>--}}
                            <td><img src="{{asset($calender->img)}}" class="thumb img-responsive" alt="a picture" style="width: 250px;"><br/></td>
{{--                            <td>{{$journal->language}}</td>--}}

                            <td>
                                <form><a href="calendar/{{$calender->id}}/edit">edit</a></form>

                                {!! Form::open(array('class'=>'form-inline', 'method'=>'DELETE',
                               'route'=>array('calendar.destroy',$calender->id))) !!}


                                {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}

                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
@extends('master_trainer/master')
@section('content')<br>
<div class="container col-md-8 col-md-offset-2">
    <h1 style="text-align: center;">Exam List</h1>
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @foreach($exams as $exam)
        <div class="well well bs-component">
            <h2 style="text-align: center;">{{$exam->title}}</h2>

            <p><mark>Exam Description</mark> :{{$exam->exam_description}}</p>
            <p><mark>Exam Date</mark> :{{$exam->exam_date}}</p>
            <p><mark>Exam Total Mark</mark> :{{$exam->exam_mark}}</p>
            <a href="exam/{{$exam->id}}/edit" class="btn btn-success" type="button">
                <i class="fa fa-edit">Edit</i>
            </a>
            {!! Form::open(array('method'=>'DELETE', 'route'=>array('exam.destroy',$exam->id)))!!}
            {!! Form::submit('Delete', array('class'=>'btn btn-danger','onclick' => 'return confirm("Are you sure want to Delete?");'))!!}
            {!! Form::close()!!}
        </div>

    @endforeach
</div>
@endsection
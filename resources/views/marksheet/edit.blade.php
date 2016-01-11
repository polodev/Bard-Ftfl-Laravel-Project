@extends('master_trainer/master')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <center><h1>MARKSHEET EDIT FORM</h1></center>
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!!Form::model($marksheet,['method'=>'PATCH','route'=>['marksheet.update',$marksheet->id]])!!}

            {{-- <div class="form-group">
                         {!!Form::label('Name of the exam :')!!}
                         <select>
                               @foreach($exams as $exam)
                                     <option value="{{$exam->id}}">{{$exam->description}}</option>
                               @endforeach
                         </select>
                         --}}{{--{!! Form::select('marital_status', ['Married' => 'Married', 'Unmarried' => 'Unmarried', 'Single' => 'Single'], null,['class' => 'form-control'])!!}--}}{{--

             </div>--}}
            {{-- <div class="form-group">
                                {!!Form::label('Name of the exam :')!!}
                                <select>
                                      @foreach($exams as $exam)
                                            <option value="{{$exam->id}}">{{$exam->description}}</option>
                                      @endforeach
                                </select>
                                --}}{{--{!! Form::select('marital_status', ['Married' => 'Married', 'Unmarried' => 'Unmarried', 'Single' => 'Single'], null,['class' => 'form-control'])!!}--}}{{--

             </div>--}}
            <hr>
            <div class="form-group">
                {!!Form::label('Name of the trainee : ')!!}
                <h3>{{$traineeName}}</h3>
            </div>
            <div class="form-group">
                {!!Form::label('Marks :')!!}
                {!!Form::text('mark',null,['class'=>'form-control'])!!}
            </div>


            <div class="form-group">

                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>

@endsection
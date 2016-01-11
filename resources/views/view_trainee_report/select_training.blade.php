@extends('admin/layouts.master')
@section('title', 'View all courses')
@section('content')
    <style>
        .all_report  i.fa {
            display: block;
            margin-top: 50px;
            margin-bottom: 20px;
            font-size: 40px;
        }
        .all_report .col-sm-3 {
            margin-bottom: 20px;
        }

        .btn-square{
            width: 12em;
            height: 12em;
        }
        .btn-square a span{
            display: block;
        }
    </style>

    <div class="container">
        <div class="row all_report">
            <div class="col-sm-3">
                <a class="btn btn-square btn-lg btn-primary"  href="{{ URL::to('admin/yearly_report') }}"><i class="fa fa-newspaper-o"></i> <span>Yearly Report</span></a>
            </div>
        </div>
        <hr>
        <h2>Report As per Training</h2>

        @if ($trainings->isEmpty())
            <p> There is no training available.</p>
        @else
            <br><br>
            <div class="row">
                @foreach($trainings as $training)

                    <div class="col-sm-4">
                        <div class="course_gellary">
                            <div class="course_image">
                                <img src="{{ $training->image_path }}" alt="Training Image">
                            </div>
                            <div class="course_title">
                                <a href="{!! action('ViewTraineeReportController@select_course', $training->id) !!}">{!! $training->training_name !!} </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif

    </div>
 
@endsection
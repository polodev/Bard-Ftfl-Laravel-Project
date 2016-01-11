@extends('master/master')
@section('title', 'View all trainings information')
<style>
    b{
        font-size: large;
        color: #2E7D32;
    }

    label{
        font-size: larger;
        color: #00695C;
    }

    p{
        font-size: medium;
    }

    div{
        text-align: justify;
        text-justify: inter-word;
    }

    hr{
        background-color: #FFD180;
    }
</style>
@section('content')
    <div class="container col-md-12 col-sm-12 col-xs-12" style="background-color: #FFFFFF;">
                <header align="center">
                    <b>Bangladesh Academy For Rural Development(BARD)</b><br>
                    <b>Kotbari,Comilla,Bangladesh</b>
                    <h1 style="color: #2E7D32;">{!! $training->training_name !!}</h1>
                </header><br>
        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 well well bs-component">

                <div class="col-md-6 col-sm-6">
                    <label>
                        <img src="{{asset ($training->image_path) }}" class="img-thumbnail" width="150px" height=150px alt="No Training Image">
                    </label><br><br>

                    <label>List of Courses</label><hr>
                    <br>
                    @if ($courses->isEmpty())
                        <p> There is no available courses.</p>
                    @else
                        @foreach($courses as $course)
                            <b><a href="{!! action('CoursePublicController@show', $course->id) !!}">{!! $course->course_name !!}</a></b><br>
                        @endforeach
                    @endif
                    <hr>

                    <label>Duration:</label>&nbsp;{!! $training->start_date !!}&nbsp;to&nbsp;{!! $training->end_date !!}<hr>

                    <label>Description</label><hr>
                    <p>{!! $training->description !!}</p>

                    <label>Objectives</label><hr>
                    <p>{!! $training->objectives !!}</p>

                    <label>Information How to Apply</label><hr>
                    <p>{!! $training->applying_information !!}</p>

                    <label>Information About Accommodation</label><hr>
                    <p>{!! $training->accommodation !!}</p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <label>Daily Schedule</label><hr>
                    <p>{!! $training->daily_schedule !!}</p>

                    <label>Fees Structure</label><hr>
                    <p>{!! $training->fees_structure !!}</p>

                    <label>Responsible person for Trainees</label><hr>
                    <p>{!! $training->responsible_person !!}</p>

                    <label>Resources Provided by to a Particular Training</label><hr>
                    <p>{!! $training->provided_resources !!}</p>
                </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0">
                @if (!$testimonials->isEmpty())
                    <h2 class="mbr-section__header"><font color="#006064">Testimonials</font></h2>
                    <ul class="mbr-reviews mbr-reviews--wysiwyg row">
                        @foreach($testimonials as $testimonial)
                            <li class="mbr-reviews__item col-sm-6 col-md-4">
                                <div class="mbr-reviews__text"><p class="mbr-reviews__p" style="font-size: larger; color: black;">{!! $testimonial->testimonial !!}</p></div>
                                <div class="mbr-reviews__author mbr-reviews__author--short">
                                    <div class="mbr-reviews__author-name" style="font-size: larger; color: black;">{!! $testimonial->author_name !!}</div>
                                </div>
                            </li>
                        @endforeach
                        @endif
                    </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0">
                @if(!$FAQs->isEmpty())
                    <h2 align="center"><font color="#006064">Frequently Asked Questions(FAQs)</font></h2><br>
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        @foreach($FAQs as $FAQ)
                           <div class="panel-group">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <label data-toggle="collapse" data-target="#{{ $FAQ->id }}" href="" style="color: #4CAF50;">{!! $FAQ->question !!}</label>
                                      </h4>
                                   </div>
                                   <div id="{{ $FAQ->id }}" class="panel-collapse collapse">
                                       <div class="panel-body">
                                           <font size="3" class="" >{!! $FAQ->answer !!}</font>
                                           <h4 align="right"><i>Written By</i> &nbsp; &nbsp;{!! $FAQ->author_name !!}</h4>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
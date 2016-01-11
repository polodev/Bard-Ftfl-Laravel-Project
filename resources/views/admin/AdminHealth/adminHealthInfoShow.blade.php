@extends('admin.layouts.master')
@section('script')
    <link href="{!! asset('css/datepicker.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function(){
            $('#datePicker')
                    .datepicker({
                        format: 'yyyy/mm/dd'
                    })
        });
    </script>
@show

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <fieldset>
                <legend align="center"><b>Bangladesh Academy For Rural Development</b></legend>
                <h5 align="center"><b>Kotbari, Comilla</b></h5>
                <h3 align="center"><b><u><i>Health Examination Report</i></u></b></h3>

                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Name of the training Course: </label>
                    <h4><b><br>3rd FTFL Foundation Training Course<br></b></h4>
                </div>

                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Participants: </label>
                    <h4><b>FTFL Trainees of Bangladesh Computer Council</b></h4>
                </div>

                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Duration: </label>
                    <h4><b>01 August-29 October 2015</b></h4>
                </div>
            </fieldset>
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <div id="messages"></div>
                </div>
            </div>
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form id="contactForm" class="form-horizontal" method="post">
                <!-- #messages is where the messages are placed inside -->
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <div class="form-group">
                    <label class="col-md-3 control-label">ID Code</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->user_id !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Present Address</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->present_address !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Permanent Address</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->permanent_address !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-3 control-label">Date of birth</label>
                    <div class="col-xs-5 date">
                        <div>
                            <h4><b>{!! $healthInfo->birth_date !!}</b></h4>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Age at the beginning of the course</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->age_beginning_course !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Marital Status</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->marital_status !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Presently are you suffering from any disease(High blood pressure, Diabetics etc?)</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->present_disease !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Do you have any physical disability?</label>
                    <div class="col-md-6">
                        <h4><b>{!! $healthInfo->physical_disability !!}</b></h4>
                    </div>
                </div>

                <!--Starts health exam-->

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputName" class="control-label">General Examination</label>
                    </div>
                    <div class="col-sm-6">
                        a. Navel:<h4><b>{!! $healthExam->navel !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        d. Anemia:<h4><b>{!! $healthExam->anemia !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        b. Blood Pressure:<h4><b>{!! $healthExam->blood_pressure !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        e. Jaundice:<h4><b>{!! $healthExam->jaundice !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        c. Respiration:<h4><b>{!! $healthExam->respiration !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        f. Weight:<h4><b>{!! $healthExam->weight !!}</b></h4>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputName" class="control-label">Systemic Examination</label>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        a. Heart:<h4><b>{!! $healthExam->heart !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        e. Kidney:<h4><b>{!! $healthExam->kidney !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        b. Lung:<h4><b>{!! $healthExam->lung !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        f. Hernia:<h4><b>{!! $healthExam->hernia !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        c. Liver:<h4><b>{!! $healthExam->liver !!}</b></h4>
                    </div><br>
                    <div class="col-sm-6">
                        g. Hydrocil:<h4><b>{!! $healthExam->hydrocil !!}</b></h4>
                    </div>
                    <div class="col-sm-6">
                        d. Spleen:<h4><b>{!! $healthExam->spleen !!}</b></h4>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="inputSight" class="control-label">Eye Sight:</label>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            Left Eye: <h4><b>{!! $healthExam->left_eye !!}</b></h4>
                        </div><br>
                        <div class="col-sm-6">
                            Right Eye:<h4><b>{!! $healthExam->right_eye !!}</b></h4>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputComments" class="control-label">Comments of the Medical Officer</label>
                        <br>
                        <div>
                            <h4><b>{!! $healthExam->comments_mofficer !!}</b></h4>
                        </div>
                    </div>
                </div>
                <!--end health exam-->
            </form>
        </div>
    </div>
@endsection



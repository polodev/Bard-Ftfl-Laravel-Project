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
                        <input type="text" class="form-control" name="user_id" placeholder="Enter UserID here" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Present Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="present_address" rows="5" placeholder="Enter Present Address here"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Permanent Address</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="permanent_address" rows="5" placeholder="Enter Permanent Address here"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-3 control-label">Date of birth</label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="text" class="form-control" name="birth_date" placeholder="1990/11/11"/>
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Age at the beginning of the course</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="age_beginning_course" placeholder="Enter age at the beginning of the course"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Marital Status</label>
                    <div class="col-md-6">
                        <select class="form-control" name="marital_status" id="sel1">
                            <option value="Married">Married</option>
                            <option value="Unmarried">Unmarried</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Presently are you suffering from any disease(High blood pressure, Diabetics etc?)</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="present_disease" rows="5" placeholder="Presently are you suffering from any disease"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Do you have any physical disability?</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="physical_disability" rows="3" placeholder="Presently are you suffering from any disease?"></textarea>
                    </div>
                </div>

                <!--Starts health exam-->

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputName" class="control-label">General Examination</label>
                    </div>
                    <div class="col-sm-6">
                        a. Navel:<input type="name" class="form-control" id="inputNavel" placeholder="" name="navel">
                    </div><br>
                    <div class="col-sm-6">
                        d. Anemia:<input type="name" class="form-control" id="inputAnemia" placeholder="" name="anemia">
                    </div><br>
                    <div class="col-sm-6">
                        b. Blood Pressure:<input type="name" class="form-control" id="inputPressure" placeholder="" name="blood_pressure">
                    </div><br>
                    <div class="col-sm-6">
                        e. Jaundice:<input type="name" class="form-control" id="inputJaundice" placeholder="" name="jaundice">
                    </div><br>
                    <div class="col-sm-6">
                        c. Respiration:<input type="name" class="form-control" id="inputRespiration" placeholder="" name="respiration">
                    </div><br>
                    <div class="col-sm-6">
                        f. Weight:<input type="name" class="form-control" id="inputWeight" placeholder="" name="weight">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputName" class="control-label">Systemic Examination</label>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        a. Heart:<input type="name" class="form-control" id="inputHeart" placeholder="" name="heart">
                    </div><br>
                    <div class="col-sm-6">
                        e. Kidney:<input type="name" class="form-control" id="inputKidney" placeholder="" name="kidney">
                    </div><br>
                    <div class="col-sm-6">
                        b. Lung:<input type="name" class="form-control" id="inputLung" placeholder="" name="lung">
                    </div><br>
                    <div class="col-sm-6">
                        f. Hernia:<input type="name" class="form-control" id="inputHernia" placeholder="" name="hernia">
                    </div><br>
                    <div class="col-sm-6">
                        c. Liver:<input type="name" class="form-control" id="inputLiver" placeholder="" name="liver">
                    </div><br>
                    <div class="col-sm-6">
                        g. Hydrocil:<input type="name" class="form-control" id="inputHydrocil" placeholder="" name="hydrocil">
                    </div>
                    <div class="col-sm-6">
                        d. Spleen:<input type="name" class="form-control" id="inputSpleen" placeholder="" name="spleen">
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="inputSight" class="control-label">Eye Sight:</label>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            Left Eye: <input type="text" class="form-control" placeholder="" name="left_eye">
                        </div><br>
                        <div class="col-sm-6">
                            Right Eye: <input type="text" class="form-control" placeholder="" name="right_eye">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputComments" class="control-label">Comments of the Medical Officer</label>
                        <br>
                        <div>
                            <textarea class="form-control" rows="5" id="comments_mofficer" name="comments_mofficer"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
                <!--end health exam-->
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#contactForm').bootstrapValidator({
                container: '#messages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_id: {
                        validators: {
                            notEmpty: {
                                message: 'The userId is required and cannot be empty'
                            },
                            integer: {
                                message: 'The value is not an integer',
                                // The default separators
                                thousandsSeparator: '',
                                decimalSeparator: '.'
                            }
                        }
                    },
                    present_address: {
                        validators: {
                            notEmpty: {
                                message: 'The present address is required and cannot be empty'
                            }
                        }
                    },
                    permanent_address: {
                        validators: {
                            notEmpty: {
                                message: 'The permanent address is required and cannot be empty'
                            }
                        }
                    },
                    age_beginning_course: {
                        validators: {
                            notEmpty: {
                                message: 'The age is required and cannot be empty'
                            },
                            integer: {
                                message: 'The value is not an integer',
                                // The default separators
                                thousandsSeparator: '',
                                decimalSeparator: '.'
                            }
                        }
                    },
                    present_disease: {
                        validators: {
                            notEmpty: {
                                message: 'The present disease is required and cannot be empty'
                            }
                        }
                    },
                    physical_disability: {
                        validators: {
                            notEmpty: {
                                message: 'The physical disability is required and cannot be empty'
                            }
                        }
                    },
                }
            });
        });
    </script>
@endsection



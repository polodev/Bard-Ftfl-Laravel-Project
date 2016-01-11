@extends('master.trainee_master')
@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="box box-primary">
                        <div class="box-header text-center">
                            <h3 class="box-title">REGISTRATION FORM</h3>
                            <P>Foundation training course</P>
                            <P>FTFL Trainees of Bangladesh Computer Council</P>
                            <P>01 August - 29 October 2015</P>
                        </div>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                        {!! Form::open(['route' => 'registration.store', 'files'=> true]) !!}

                        <div class="box-body">
                            <h3>Name of the participant</h3>
                            <hr>
                            <div class="form-group">
                                {!! Form::label('bengali_name', 'Bangali') !!}
                                {!! Form::text('bengali_name', null, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('english_name', 'English')!!}<span style="color: red">*</span>
                                <small>(In block letter)</small>
                                {!! Form::text('english_name', null, array('class' => 'form-control', 'placeholder' => 'ex: SHAMANUR')) !!}
                            </div>
                            </br>

                            <div class="form-group">
                                {!! Form::label('father_name', 'Father Name')!!}<span style="color: red">*</span>
                                <small>(In block letter)</small>
                                {!! Form::text('father_name', null, array('class' => 'form-control', 'placeholder' => 'ex: NURUZZAMAN')) !!}
                            </div>
                            </br>
                            <div class="form-group">
                                {!! Form::label('mother_name', 'Mother Name')!!}<span style="color: red">*</span>
                                <small>(In block letter)</small>
                                {!! Form::text('mother_name', null, array('class' => 'form-control', 'placeholder' => 'ex: MONOWARA')) !!}
                            </div>
                            </br>
                            <div class="form-group">
                                {!! Form::label('date_of_birth', 'Date of Birth')!!}<span style="color: red">*</span>
                                <small>(In block letter)</small>
                                {!! Form::text('date_of_birth', null, array('class' => 'form-control', 'placeholder' => '1987/11/07')) !!}
                            </div>
                            </br>

                            <h3>Permanent Address:</h3>
                            <hr>

                            <div class="form-group">
                                {!! Form::label('village', 'Village/town/home no:')!!}<span style="color: red">*</span>
                                {!! Form::text('village', null, array('class' => 'form-control')) !!}
                            </div>
                            </br>
                            <div class="form-group">
                                {!! Form::label('post_office', 'Post Office:')!!}<span style="color: red">*</span>
                                {!! Form::text('post_office', null, array('class' => 'form-control')) !!}
                            </div>
                            </br>
                            <div class="form-group">
                                {!! Form::label('upazila', 'Upazila no:')!!}<span style="color: red">*</span>
                                {!! Form::text('upazila', null, array('class' => 'form-control')) !!}
                            </div>
                            </br>
                            <div class="form-group">
                                {!! Form::label('district', 'District:')!!}<span style="color: red">*</span>
                                {!! Form::text('district', null, array('class' => 'form-control')) !!}
                            </div>

                            <h3>present Address:</h3>
                            <hr>

                            <div class="form-group">
                                {!! Form::label('id_code', 'ID Code:')!!}<span style="color: red">*</span>
                                {!! Form::text('id_code', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('organization', 'Organization:')!!}<span style="color: red">*</span>
                                {!! Form::text('organization', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telephone', 'Telephone:')!!}
                                {!! Form::number('telephone', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('fax', 'Fax:')!!}
                                {!! Form::number('fax', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('e-mail', 'E-mail:')!!}<span style="color: red">*</span>
                                {!! Form::email('e-mail', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('mobile', 'Mobile:')!!}<span style="color: red">*</span>
                                {!! Form::number('mobile', null, array('class' => 'form-control')) !!}
                            </div>

                            <h3>Educational Qualification</h3><small>last  one Degree</small>
                            <hr>
                            <div class="form-group">
                                {!! Form::label('name_of_degree', 'Name of the Degree(s):')!!}
                                {!! Form::text('name_of_degree', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('subject', 'Subject:')!!}<span style="color: red">*</span>
                                {!! Form::text('subject', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Year', 'year:')!!}<span style="color: red">*</span>
                                {!! Form::text('Year', null, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('board', 'Board/University:')!!}<span style="color: red">*</span>
                                {!! Form::text('board', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            {!! Form::label('marital_status','Marital Status')!!}
                            {!! Form::select('marital_status', ['Married' => 'Married', 'Unmarried' => 'Unmarried', 'Single' => 'Single'], null,['class' => 'form-control'])!!}
                        </div>
                        <hr>
                        <div class="form-group">
                            {!! Form::label('joining_date', 'Joining Date:')!!}
                            {!! Form::text('joining_date', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('service_code', 'Service Code:')!!}
                            {!! Form::text('service_code', null, array('class' => 'form-control')) !!}
                        </div>
                        <h3>Contact Person in case of Emergency</h3>
                        <hr>
                        <div class="form-group">
                            {!! Form::label('contact_person_name', 'Name:')!!}<span style="color: red">*</span>
                            {!! Form::text('contact_person_name', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contact_person_address', 'Address:')!!}<span style="color: red">*</span>
                            {!! Form::text('contact_person_address', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contact_person_tel', 'Telephone/Mobile:')!!}<span style="color: red">*</span>
                            {!! Form::number('contact_person_tel', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('participant_rel', 'Relation with the Participant:')!!}
                            {!! Form::text('participant_rel', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group ">
                            {!! Form::label('Image ')!!}<br>
                            {!! Form::file('img_path', ['class' => 'field','id' => 'img_path'])!!}
                            <p class="help-block">Dimention Home Page: 240px X 140px (image must be smaller than 150KB)<br/>Dimention Slide: 480px X 306px(image must be smaller than 150KB)</p>
                        </div>
                        <div class="form-group ">
                            {!! Form::submit('Submit', array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
        @section('script')
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

            <link href="{!! asset('css/datepicker.css') !!}" rel="stylesheet">
            <script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
            <!-- Include Bootstrap Datepicker -->
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">    </script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                $(function(){
                    $('#joining_date')
                            .datepicker({
                                format: 'yyyy/mm/dd'
                            })
                });
                $(function(){
                    $('#date_of_birth')
                            .datepicker({
                                format: 'yyyy/mm/dd'
                            })
                });
            </script>
@show

@endsection

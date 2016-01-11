@extends('master.trainee_master')
@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="box box-primary">
                        <div class="box-header" style="text-align: center;">
                            <h3 class="box-title">REGISTRATION FORM</h3>

                            <P>Foundation training course</P>

                            <P>FTFL Trainees of Bangladesh Computer Council</P>

                            <P>01 August - 29 October 2015</P>
                        </div>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                        <fieldset>
                            {!! Form::model($data, ['method'=>'PATCH','route' => ['registration.update',$data->id],'files' => true ]) !!}
                            <div class="col-md-7 col-md-offset-2">
                                <div class="box-body">
                                    <h3>Name of the participant</h3>
                                    <hr>
                                    <div class="form-group">
                                        {!! Form::label('bengali_name', 'Bangali') !!}
                                        {!! Form::text('bengali_name', $data->bengali_name, array('class' => 'form-control', 'placeholder' => 'Post Sub Title')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('english_name', 'English*')!!}
                                        <small>(In block letter)</small>
                                        {!! Form::text('english_name', $data->english_name, array('required','class' => 'form-control', 'placeholder' => 'ex: SHAMANUR')) !!}
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    <div class="form-group">
                                        {!! Form::label('father_name', 'Father Name')!!}
                                        <small>(In block letter)</small>
                                        {!! Form::text('father_name', $data->father_name, array('class' => 'form-control', 'placeholder' => 'ex: NURUZZAMAN')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mother_name', 'Mother Name')!!}
                                        <small>(In block letter)</small>
                                        {!! Form::text('mother_name', $data->mother_name, array('class' => 'form-control', 'placeholder' => 'ex: MONOWARA')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('date_of_birth', 'Date of Birth')!!}
                                        <small>(In block letter)</small>
                                        {!! Form::text('date_of_birth', $data->date_of_birth, array('class' => 'form-control', 'placeholder' => '1987/11/07')) !!}
                                    </div>

                                    <h3>Permanent Address:</h3>
                                    <hr>

                                    <div class="form-group">
                                        {!! Form::label('village', 'Village/town/home no:')!!}
                                        {!! Form::text('village', $data->village, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('post_office', 'Post Office:')!!}
                                        {!! Form::text('post_office', $data->post_office, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('upazila', 'Upazila no:')!!}
                                        {!! Form::text('upazila', $data->upazila, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('district', 'District:')!!}
                                        {!! Form::text('district', $data->district, array('class' => 'form-control')) !!}
                                    </div>

                                    <h3>present Address:</h3>
                                    <hr>

                                    <div class="form-group">
                                        {!! Form::label('id_code', 'ID Code:')!!}
                                        {!! Form::text('id_code', $data->id_code, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('organization', 'Organization:')!!}
                                        {!! Form::text('organization', $data->organization, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('telephone', 'Telephone:')!!}
                                        {!! Form::number('telephone', $data->telephone, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fax', 'Fax:')!!}
                                        {!! Form::number('fax', $data->fax, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('e-mail', 'E-mail:')!!}
                                        {!! Form::email('e-mail', $data->e_mail, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mobile', 'Mobile:')!!}
                                        {!! Form::number('mobile', $data->mobile, array('class' => 'form-control')) !!}
                                    </div>

                                    <h3>Educational Qualification</h3>
                                    <small>last one Degree</small>
                                    <hr>
                                    <div class="form-group">
                                        {!! Form::label('name_of_degree', 'Name of the Degree(s):')!!}
                                        {!! Form::text('name_of_degree', $eduData->name_of_degree, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('subject', 'Subject:')!!}
                                        {!! Form::text('subject', $eduData->subject, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Year', 'year:')!!}
                                        {!! Form::text('Year', $eduData->Year, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('board', 'Board/University:')!!}
                                        {!! Form::text('board', $eduData->board, array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    {!! Form::label('marital_status','Marital Status')!!}
                                    {!! Form::select('marital_status', ['Married' => 'Married', 'Unmarried' => 'Unmarried', 'Single' => 'Single'], $data->marital_status,['class' => 'form-control'])!!}
                                </div>
                                <hr>
                                <div class="form-group">
                                    {!! Form::label('joining_date', 'Joining Date:')!!}
                                    {!! Form::text('joining_date', $data->joining_date, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('service_code', 'Service Code:')!!}
                                    {!! Form::text('service_code', $data->service_code, array('class' => 'form-control')) !!}
                                </div>
                                <h3>Contact Person in case of Emergency</h3>
                                <hr>
                                <div class="form-group">
                                    {!! Form::label('contact_person_name', 'Name:')!!}
                                    {!! Form::text('contact_person_name', $data->contact_person_name, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('contact_person_address', 'Address:')!!}
                                    {!! Form::text('contact_person_address', $data->contact_person_address, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('contact_person_tel', 'Telephone/Mobile:')!!}
                                    {!! Form::number('contact_person_tel', $data->contact_person_tel, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('participant_rel', 'Relation with the Participant:')!!}
                                    {!! Form::text('participant_rel', $data->participant_rel, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group ">
                                    {!! Form::label('Image ')!!}<br>
                                    {!! Form::file('img_path', ['class' => 'field','id' => 'img_path'])!!}
                                    <p class="help-block">Dimention Home Page: 240px X 140px (image must be smaller than
                                        150KB)<br/>Dimention
                                        Slide: 480px X 306px(image must be smaller than 150KB)</p>
                                </div>
                                {!! Form::hidden('edu_id', $data->edu_id) !!}

                                {{--<input type="hidden" value="{!! $data->id !!}" name="id">--}}
                                <div class="form-group ">
                                    {!! Form::submit('Submit', array('class'=>'btn btn-primary btn-block')) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </fieldset>
                    </div>
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
    <link rel="stylesheet"
          href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <script type="text/javascript"
            src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $('#joining_date')
                    .datepicker({
                        format: 'yyyy/mm/dd'
                    })
        });
        $(function () {
            $('#date_of_birth')
                    .datepicker({
                        format: 'yyyy/mm/dd'
                    })
        });
    </script>
@show


@endsection
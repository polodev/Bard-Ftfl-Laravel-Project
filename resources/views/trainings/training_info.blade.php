@extends('admin.layouts.master')
@section('title', 'Training Information')
@section('content')
    <div class="container" style="background-color: white; color: black; font-size: larger;">
           <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 align="center"><b><u><i>Training Information Form</i></u></b></h3>
                    <div class="col-md-1 col-sm-10"></div>

                    <div class="col-md-10 col-sm-10">
                        <form class="form-horizontal" method="post"  role="form" enctype="multipart/form-data">
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                            @if (session('check'))
                                <div class="alert alert-danger">
                                    {{ session('check') }}
                                </div>
                            @endif
                            @if (session('checkDuration'))
                                <div class="alert alert-danger">
                                    {{ session('checkDuration') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-danger">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                        <label for="TrainingName" class="control-label">Training Name&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <input type="text" class="form-control" id="tname" placeholder="Training Name" name="training_name" value="{{ old('training_name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="TrainingType" class="control-label">Training Type</label>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="inputList" class="control-label"></label>
                                    <div class="col-md-12 col-sm-12">
                                        <select class="form-control" name="training_type" name="{{ old('training_type')}}">
                                            <option value="Sponsored">Sponsored</option>
                                            <option value="Self Initiative">Self Initiative</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="ApplyingInformation" class="control-label">Description&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" id="content" rows="5" placeholder="Description" name="description">{{ old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="Objectives" class="control-label">Objectives&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" id="content" rows="5" placeholder="Objectives" name="objectives" value="">{{ old('objectives')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="ApplyingInformation" class="control-label">Information How to Apply&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" id="content" rows="5" placeholder="Applying Information" name="applying_information" value="">{{ old('applying_information') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="Startdate" class="control-label">Start Date&nbsp;<span class="red-star" style="color:red">*</span></label>
                                            <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{ old('start_date') }}">
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label for="Enddate" class="control-label">End Date&nbsp;<span class="red-star" style="color:red">*</span></label>
                                            <input type="date" class="form-control" placeholder="End Date" name="end_date" value="{{ old('end_date')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="Resources" class="control-label">Resources Provided by BARD to a Particular Training&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" id="content" rows="5" placeholder="Resources" name="provided_resources" value="">{{ old('provided_resources')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="AccommodationInfo" class="control-label">Information about Accommodation&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="content" placeholder="Accommodation Information" name="accommodation" value="">{{ old('accommodation') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="DailySchedule" class="control-label">Daily Schedule&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="content" placeholder="Daily Schedule" name="daily_schedule" value="">{{ old('daily_schedule') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="FeesStructure" class="control-label">Fees Structure&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="content" placeholder="Fees Structure" name="fees_structure" value="">{{ old('fees_structure') }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="ResponsiblePerson" class="control-label">Responsible Person for Trainees&nbsp;<span class="red-star" style="color:red">*</span></label>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <textarea class="form-control" rows="5" id="content" placeholder="Responsible Person" name="responsible_person" value="">{{ old('responsible_person') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Upload Image</label><br>
                                        <input type="file" name="image_path" class="field" id="image_path">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" align="center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1 col-sm-1"></div>
                </div>
           </div>
    </div>
@endsection

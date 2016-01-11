@extends('master.trainee_master')
@section('title', 'Trainee')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" action = "" method="post" enctype="multipart/form-data">
                <input type="hidden" name="trainee_login_id" id="" value="{{ $user_id }}">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Submit a New Trainee Info</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-4 control-label">Name(English) Block  Letter&nbsp;<span class="red-star" style="color:red">*</span></label>
                        <div class="col-lg-8">
                            <label for="">{{ $user_name }}</label>
                            <input type="hidden"  name="name" value="{{ $user_name }}">
                            <input type="hidden"  name="trainee_login_id" value="{{ $user_id }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Gender&nbsp;<span class="red-star" style="color:red">*</span></label>
                        <div class="col-lg-8">
                            <input type="radio" class=""  name="gender" value="Male" checked>Male
                            <input type="radio" class=""  name="gender" value="Female">Female
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="trainee_id" class="col-lg-4 control-label">ID Code&nbsp;<span class="red-star" style="color:red">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" value="{!! old('trainee_id') !!}" class="form-control" id="trainee_id" placeholder="ID Code" name="trainee_id">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="institution" class="col-lg-4 control-label">Institution</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="institution" placeholder="Institution" name="institution"  value="{{ old('institution')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="educational_qualification" class="col-lg-4 control-label">Educational Qualification</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="educational_qualification" placeholder="Educational Qualification" name="educational_qualification"  value="{{ old('educational_qualification')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service_experience" class="col-lg-4 control-label">Service Experience</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="service_experience" placeholder="Service Experience" name="service_experience" value="{{ old('service_experience')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="experience_year" class="col-lg-4 control-label">Years of Experience</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="experience_year" placeholder="Years of Experience" name="experience_year" value="{{ old('experience_year')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dob" class="col-lg-4 control-label">a)Date of Birth</label>
                        <div class="col-lg-8 ">
                            <input type="date" class="form-control" id="dob" placeholder="Date of Birth" name="date_of_birth" value="{{ old('date_of_birth')}}">
                        </div>
                        <label for="birthPlace" class="col-lg-4 control-label">Birth Place</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="birthPlace" placeholder="Birth Place" name="birth_place" value="{{ old('birth_place')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="yearAtJoining" class="col-lg-4 control-label">b)Age at the time of joining the course:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="yearAtJoining" placeholder="Years at Joining" name="join_date" value="{{ old('join_date')}}">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="gurdian" class="col-lg-4 control-label">Father's/Husband's Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="gurdian" placeholder="Father's/Husband's Name" name="guardians_name" value="{{ old('guardians_name')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="village" class="col-lg-4 control-label">Permanent Address:Village/House</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="village" placeholder="Village/House" name="village" value="{{ old('village')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="po" class="col-lg-4 control-label">P.O:/Rd:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="po" placeholder="P.O:/Rd:" name="post_office" value="{{ old('post_office')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="upozilla" class="col-lg-4 control-label">Upozilla</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="upozilla" placeholder="Upozilla" name="sub_district" value="{{ old('sub_district')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="district" class="col-lg-4 control-label">District</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="district" placeholder="District" name="district" value="{{ old('district')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="serviceStationAddress" class="col-lg-4 control-label">Address of Present Service Station:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="serviceStationAddress" placeholder="Present Service Station" name="service_station" value="{{ old('service_station')}}">
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Marital Status&nbsp;<span class="red-star" style="color:red">*</span></label>
                        <div class="col-lg-8">
                            <input  type="radio" class="" id="married" name="marital" value="Married" checked> Married
                            <input type="radio" class="" id="unmarried"  name="marital" value="Unmarried">Unmarried
                            <input type="radio" class="" id="others"  name="marital" value="Others">Others

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="homePhone" class="col-lg-4 control-label">Phones: Home</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="homePhone" placeholder="Home" name="ph_home" value="{{ old('ph_home')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="officePhone" class="col-lg-4 control-label">Office</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="officePhone" placeholder="Office" name="ph_office" value="{{ old('ph_office')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-lg-4 control-label">Mobile</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="ph_mobile" value="{{ old('ph_mobile')}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="diseases" class="col-lg-4 control-label">Description of diseases/Physical problems(if any)Check it:</label>

                        <div class="col-lg-8">
                            <label  class="col-lg-4 control-label">High Pressure</label>
                            <input type="checkbox" class="col-lg-8 form-control" id="title" value="Heart Disease" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Heart Disease</label>
                            <input type="checkbox" class="form-control" id="title" value="Heart Disease" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Diabetics</label>
                            <input type="checkbox" class="form-control" id="title" value="Diabetics" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Esthma</label>
                            <input type="checkbox" class="form-control"  value="Esthma" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Hernia</label>
                            <input type="checkbox" class="form-control"  value="Hernia" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Major Surgery</label>
                            <input type="checkbox" class="form-control"  value="Major Surgery" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Experience of Accident</label>
                            <input type="checkbox" class="form-control"  value="Experience of Accident" name='diseases[]'>

                            <label  class="col-lg-4 control-label">Others</label>
                            <input type="checkbox" class="form-control"  value="Others" name='diseases[]'>

                        </div>


                    </div>



                    <div class="form-group">
                        <label for="sportExpertize" class="col-lg-4 control-label">Description of Expertise in any Sports:(put several sports names using comma)</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="sportExpertize" placeholder="Expertise in any Sports" name="soprts" value="{{ old('soprts')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hobby" class="col-lg-4 control-label">Hobby</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="hobby" placeholder="Hobby" name="hobby" value="{{ old('hobby')}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="" class="col-lg-4 control-label">Expertise</label>

                        <div class="col-lg-8">
                            <label class="col-lg-2 control-label">Song</label>
                            <input type="checkbox" class="col-lg-10 form-control" value="Song" name='expertise[]'>

                            <label class="col-lg-2 control-label">Acting</label>
                            <input type="checkbox" class="form-control" value="Acting" name='expertise[]'>

                            <label for="dance" class="col-lg-2 control-label">Dance</label>
                            <input type="checkbox" class="form-control" value="Dance" name='expertise[]'>

                            <label for="speech" class="col-lg-2 control-label">Speech</label>
                            <input type="checkbox" class="form-control" value="Speech" name='expertise[]'>

                            <label class="col-lg-2 control-label">Other</label>
                            <input type="checkbox" class="form-control" value="Other" name='expertise[]'>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gameInterest" class="col-lg-4 control-label">Mention the games you are interested to participate</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="gameInterest" placeholder="Interest in Games" name="interested_game" value="{{ old('interested_game')}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-lg-4 control-label">Measurement of Physical Condition</label>

                        <div class="col-lg-8">
                            <label for="height"  class="col-lg-2 control-label">Height</label>
                            <input type="text" class="col-lg-10 form-control" id="height" placeholder="Height" name="height" value="{{ old('height')}}"></br>

                            <label for="weight" class="col-lg-2 control-label">Weight</label>
                            <input type="text" class="col-lg-10 form-control" id="weight" placeholder="Weight" name="weight" value="{{ old('weight')}}"></br>

                            <label for="waist" class="col-lg-2 control-label">Waist/Abdomen</label>
                            <input type="text" class="col-lg-10 form-control" id="waist" placeholder="Waist/Abdomen" name="waist_abdomen" value="{{ old('waist_abdomen')}}">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Chest:</label>
                        <div class="col-lg-8">
                            <input type="radio" class="" id="normal" name="chest" value="Normal" checked>Normal
                            <input type="radio" class="" id="expand"  name="chest" value="Expand">Expand
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="endweight" class="col-lg-4 control-label">Weight at the end of course</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="endweight" placeholder="Weight at the end of course" name="weight_end_course" value="{{ old('weight_end_course')}}" >
                        </div>
                    </div>

                     <div class="form-group">   
                        <label for="endweight" class="col-lg-2 control-label">Choose an Image</label>
                        <div class="col-lg-10">
                            <input name="image" type="file" id="Image" name='image'>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection              

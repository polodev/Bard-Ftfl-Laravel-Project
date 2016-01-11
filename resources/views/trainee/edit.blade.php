@extends('master.trainee_master')
@section('title', 'Trainee')
@section('content')
 <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
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
                    <legend><strong> Trainee Information</strong></legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="name" value="{!! $info->name !!}">                       
                        </div>                        
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-10">
                           
                            <input class="form-control"  id="content" name="gender" value="{!! $info->gender!!}">
                        </div>
                        
                    </div>

                   <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Trainee Id</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="trainee_id" value="{!! $info->trainee_id !!}">
                          
                        </div>
                    </div>


                     <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Institution</label>
                        <div class="col-lg-10">
                            
                        <input class="form-control"  id="content" name="institution" value="{!! $info->institution !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Educational Qualification</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="educational_qualification" value="{!! $info->educational_qualification !!}">
                            
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Service Experience</label>
                        <div class="col-lg-10">
                            
                        <input type="text" class="form-control" id="title" name="service_experience" value="{!! $info->service_experience !!}">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Experience Year</label>
                        <div class="col-lg-10">
                           
                            <input class="form-control"  id="content" name="experience_year" value="{!! $info->experience_year !!}">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Date Of Birth</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="date_of_birth" value="{!! $info->date_of_birth !!}">
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"> Birth Place</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="birth_place" value="{!! $info->birth_place !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Joining Date</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" placeholder="dd/mm/yy" name="join_date" value="{!! $info->join_date !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Father's Name/Husband's Name</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="guardians_name" value="{!! $info->guardians_name !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Permanent Address</label>
                        
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Village:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="village" value="{!! $info->village !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Post Office:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="post_office" value="{!! $info->post_office !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Sub District:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="sub_district" value="{!! $info->sub_district !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">District:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="district" value="{!! $info->district !!}">
                                </div>
                            </div>
                        </div>
                        
                            
                    </div>

                    
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Present Service Station</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="service_station" value="{!! $info->service_station !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Marital Status</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="marital" value="{!! $info->marital !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Phone</label>

                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Home:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="ph_home" value="{!! $info->ph_home !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Office:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="ph_office" value="{!! $info->ph_office !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-lg-3 control-label">Mobile:</label>
                                <div class="col-lg-9">
                                    <input class="form-control"  id="content" name="ph_mobile" value="{!! $info->ph_mobile !!}">
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>


                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Diseases</label>
                        <div class="col-lg-10">
                            
                             <div class="form-group">                            
                                <label  class="col-lg-4 control-label">High Pressure</label>                            
                                <input type="checkbox" class="col-lg-8 form-control" id="title" value="Heart Disease" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="High Pressure"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Heart Disease</label>
                                <input type="checkbox" class="form-control" id="title" value="Heart Disease" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Heart Disease"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Diabetics</label>
                                <input type="checkbox" class="form-control" id="title" value="Diabetics" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Diabetics"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Esthma</label>
                                <input type="checkbox" class="form-control"  value="Esthma" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Esthma"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Hernia</label>
                                <input type="checkbox" class="form-control"  value="Hernia" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Hernia"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Major Surgery</label>
                                <input type="checkbox" class="form-control"  value="Major Surgery" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Major Surgery"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Experience of Accident</label>
                                <input type="checkbox" class="form-control"  value="Experience of Accident" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Experience of Accident"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>                
                            <div class="form-group">
                                <label  class="col-lg-4 control-label">Others</label>
                                <input type="checkbox" class="form-control"  value="Others" name='diseases[]' <?php foreach ($diseases as $key => $value): ?>
                                    <?php if ($value=="Others"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>>
                            </div>   
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Sports</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="soprts" value="{!! $info->soprts !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Interested in game</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="interested_game" value="{!! $info->interested_game !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Hobby</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="hobby" value="{!! $info->hobby !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Expertise</label>
                        <div class="col-lg-10">
                            
                            <div class="form-group">                            
                                <label class="col-lg-2 control-label">Song</label>                            
                                <input type="checkbox" class="col-lg-10 form-control" value="Song" name='expertise[]' <?php foreach ($expertise as $key => $value): ?>
                                    <?php if ($value=="Song"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?> >
                            </div>                
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Acting</label>                            
                                <input type="checkbox" class="form-control" value="Acting" name='expertise[]'  <?php foreach ($expertise as $key => $value): ?>
                                    <?php if ($value=="Acting"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?>   >
                            </div>
                            <div class="form-group">
                                <label for="dance" class="col-lg-2 control-label">Dance</label>                            
                                <input type="checkbox" class="form-control" value="Dance" name='expertise[]' <?php foreach ($expertise as $key => $value): ?>
                                    <?php if ($value=="Dance"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?> >
                            </div> 
                            <div class="form-group">                            
                                 <label for="speech" class="col-lg-2 control-label">Speech</label>                            
                            <input type="checkbox" class="form-control" value="Speech" name='expertise[]' <?php foreach ($expertise as $key => $value): ?>
                                    <?php if ($value=="Speech"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?> >
                            </div>                
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Other</label>                          
                                <input type="checkbox" class="form-control" value="Other" name='expertise[]' <?php foreach ($expertise as $key => $value): ?>
                                    <?php if ($value=="Other"): ?>
                                    checked
                                <?php endif ?>
                                <?php endforeach ?> >
                            </div>
                                                  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Height</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="height" value="{!! $info->height !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Weight</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="weight" value="{!! $info->weight !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Waist/Abdomen</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="waist_abdomen" value="{!! $info->waist_abdomen !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Chest</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="chest" value="{!! $info->chest !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Weight at the end of course</label>
                        <div class="col-lg-10">
                            <input class="form-control"  id="content" name="weight_end_course" value="{!! $info->weight_end_course !!}">
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
                            <button type="submit"class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
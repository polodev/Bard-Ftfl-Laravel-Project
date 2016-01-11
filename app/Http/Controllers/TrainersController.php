<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Trainer;
use App\Http\Requests\HealthFormRequest;
//use App\Course;
use App\Info;
use App\User;
use App\Training;
use App\TrainerCourse;
use App\HealthReport;
use App\HealthExam;
use App\Course;
use Auth;

class TrainersController extends Controller
{
    
    public function __construct(){

        $this->middleware('trainer');

    }
    
    public function trainerHome()
    {
       return view(('trainer'))->with('trainer', 'active');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      
        $trainers = Trainer::all();
        
        return view('trainers.index', compact('trainers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

         $trainer_id = Auth::user()->id;


         $trainer_info = Trainer::whereTrainer_id($trainer_id)->get();

        if($trainer_info->isEmpty()){
            $trainer_name = $this->trainer_name_by_user_id($trainer_id);

            $trainer_email = $this->trainer_email_by_user_id($trainer_id);
            
              return view('trainers.create')
                ->with('trainer_name', $trainer_name) 
                ->with('trainer_id', $trainer_id)
                ->with('trainer_email', $trainer_email) ;
        }else{
            $trainer_info = Trainer::whereTrainer_id($trainer_id)->firstOrFail();           
            return redirect('/trainer_show/'. $trainer_info->id .'/edit');
        }  
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function trainer_name_by_user_id($id){
        return User::whereId($id)->firstOrFail()->name;
        // return User::find($id)->name;
    }
    public function trainer_email_by_user_id($id){
        
        return User::find($id)->email;

    }

    public function store(TrainerFormRequest $request)
    {
        
        $slug = uniqid();
        $input=$request->all();

        if(isset($input['image'])) {
            $Image = $input['image'];
            //dd($Image);
            $Image = $this->imageUpload($Image);
            //dd($Image);
            $input['image']=$Image;
        }
        else{
            $Image = "reg_img/default.jpg";
        }

        
    //return $trainer_name;

      

        $trainer = new Trainer(array(
        'name' => $request->get('name'),
        'gender' => $request->get('gender'),
        'trainer_id'=> $request->get('trainer_id'),
        'educational_qualification' => $request->get('educational_qualification'),
        'previous_experience' => $request->get('previous_experience'),
        'email' => $request->get('email'),
        'date_of_birth' => $request->get('date_of_birth'),
        'country' => $request->get('country'),
        'skill_set' => $request->get('skill_set'),
       
        'cell_number' => $request->get('cell_number'),
        'filePath' => $Image,
       


 
        'slug' => $slug
    ));



    $trainer->save();
    

    return redirect('/trainers')->with('status', 'Your data has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $trainer = Trainer::whereTrainer_id($id)->first();
         return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
{

    $trainer = Trainer::whereId($id)->firstOrFail();
    return view('trainers.edit', compact('trainer'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TrainerFormRequest $request)
{

 $input=$request->all();

        if(isset($input['image'])) {
            $Image=$input['image'];
            //dd($Image);
            $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = Trainer::where('id', '=', $id)->pluck('filePath');
            //dd($imagePath);
        }


    $trainer = Trainer::whereId($id)->firstOrFail();
    $trainer->name = $request->get('name');
    $trainer->email = $request->get('email');
    $trainer->country = $request->get('country');
    $trainer->skill_set = $request->get('skill_set');
    $trainer->gender = $request->get('gender');
    $trainer->educational_qualification = $request->get('educational_qualification');
    $trainer->previous_experience = $request->get('previous_experience');
    $trainer->date_of_birth = $request->get('date_of_birth');
    $trainer->cell_number = $request->get('cell_number');
    $trainer->filePath=$imagePath;
    if($request->get('status') != null) {
        $trainer->status = 0;
    } else {
        $trainer->status = 1;
    }
    $trainer->save();
    return redirect(action('TrainersController@show', $trainer->trainer_id))->with('status', 'The trainer status has been updated!');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function imageUpload($Image)
    {

        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="trainer_img";
        if($validate)
        {
            $imageOriginalName=$Image->getClientOriginalName();//get image full name
            $basename = substr($imageOriginalName, 0, strrpos($imageOriginalName, "."));//get image name without extension
            $basename=str_replace(" ", "", $basename);
            $extension =$Image->getClientOriginalExtension();//get image extension only
            $imageName=$basename.date("YmdHis").'.'.$extension;//make new name

            $imageMoved=$Image->move($path, $imageName);
            if($imageMoved)
            {
                $imagePath=$path.'/'.$imageName;
                return $imagePath;
            }

        }
     }
        
     public function trainings()
     {
        $trainings = Training::whereStatus(1)->get();
        return view('trainers.trainingLists', compact('trainings')); 
     }
    
     public function trainingsCourse()
     {
        $id = Auth::user()->id;
       //dd($id);
         //$trainer = TrainerCourse::where('trainer_id','=', $id)->get(); 
         $trainer = DB::table('trainercourses') 
                    ->join('courses', 'courses.id', '=', 'trainercourses.course_id')
                    ->join('trainings', 'courses.training_id', '=', 'trainings.id')
                    ->where('trainercourses.trainer_id', $id)
                    ->get();
         //dd($trainer);
         foreach($trainer as $t)
         {
             $tra = DB::table('trainings') 
                    ->join('courses', 'courses.training_id', '=', 'trainings.id')
                    ->where('courses.training_id', $t->training_id)
                    ->get();    
         }
           return view('trainers.select_course', compact('trainer'));
         
         //dd($trainer);
         //         foreach($trainer as $tra)
//         {    
//             dd($tra->course_id);
//            //if(Course::where('id', '=', $tra->course_id)->get());
//         }
         //$c = $t->course_id;   
         //$name = Course::where('id', '=', $c)->get();
        
         //dd($name);
//         foreach($name as $n)
//         {
//            echo $n->training->training_name;
//         }
         
//         $trainer = DB::table('courses') 
//                    ->join('trainercourses', 'trainercourses.course_id', '=', 'course.id')
//                    ->where('courses.training_id', $training_id)
//                    ->get();
//         dd($trainer);
//       $courses = Course::whereTraining_id($training_id)->get();
//        $trainingId = Training::where('id', '=', $training_id)->firstOrFail();
//        //dd($trainingId);
      
     }
     
    public function view_trainee_report($id)
    {
        $trainee = DB::table('users')
                ->join('traineecourses','traineecourses.trainee_id','=','users.id') 
                ->join('courses', 'courses.id', '=', 'traineecourses.course_id')
                ->where('courses.id', $id)
                ->get();
        //dd($trainee);
         
        $abc = array();
        foreach ($trainee as $tra)
        {
            if (HealthReport::where('user_id', '=',$tra->trainee_id)->exists() AND HealthExam::where('user_id', '=',$tra->trainee_id)->exists())
            {               
                $abc[$tra->name]=array('id'=>$tra->trainee_id, 'name'=> $tra->name);
               
            }            
        }
       // dd($abc[$tra->name]);
        return view('trainers.healthInfos')->with('abc', $abc); 
    }


    //trainee profile
    public function trainees_info($trainer_id)

    {   
        $infos = DB::table('trainercourses')
        ->join('traineecourses', 'traineecourses.course_id', '=', 'trainercourses.course_id')
        ->join('users', 'users.id', '=', 'traineecourses.trainee_id')->get();
        
         return view('trainers.info_index', compact('infos'))->with('trainings', 'active');
    }

    public function show_info($id)
    {

         $info = Info::whereTrainee_login_id($id)->first();
         $trainer_id = Auth::user()->id;
         
         
         return view('trainers.info_show', compact('info', 'trainer_id'));
    }

     public function edit_info($id)
    {
        $info = Info::whereId($id)->firstOrFail();
        $expertise = unserialize($info->expertise);
        $diseases = unserialize($info->diseases);
        //return var_dump($expertise);
        //return dd($diseases);
        $user = Auth::User();
        $user_id = $user->id;
        return view('trainers.info_edit', compact('info','expertise','diseases'))->with('user_id', $user_id);
    }

    public function update_info($id, InfoFormRequest $request)
    {

        $input=$request->all();
        $expertisearray=$input['expertise'];
        $expertiseString =$request->get('expertise');
        $expertise = serialize($expertiseString);

        $diseasearray=$input['diseases'];
        //return dd($diseasearray);
        $diseasesString =$request->get('diseases');
        $diseases = serialize($diseasesString);
        //return dd($diseases);
        //dd($diseases);
        if(isset($input['image'])) {
        $Image=$input['image'];
        //dd($Image);
        $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = Info::where('id', '=', $id)->pluck('filepath');
            //dd($imagePath);
        }

        $info = Info::whereId($id)->firstOrFail();
        $info->name = $request->get('name');
        $info->gender = $request->get('gender');
        $info->trainee_id = $request->get('trainee_id');
        $info->trainee_login_id = $request->get('trainee_login_id');
        $info->institution = $request->get('institution');
        $info->educational_qualification = $request->get('educational_qualification');
        $info->service_experience = $request->get('service_experience');
        $info->experience_year = $request->get('experience_year');
        $info->date_of_birth = $request->get('date_of_birth');
        $info->birth_place = $request->get('birth_place');
        $info->join_date = $request->get('join_date');
        $info->guardians_name = $request->get('guardians_name');
        $info->village = $request->get('village');
        $info->post_office = $request->get('post_office');
        $info->sub_district = $request->get('sub_district');
        $info->district = $request->get('district');
        $info->service_station = $request->get('service_station');
        $info->marital = $request->get('marital');
        $info->ph_home = $request->get('ph_home');
        $info->ph_office = $request->get('ph_office');
        $info->ph_mobile = $request->get('ph_mobile');
        $info->diseases = $diseases;
        $info->soprts = $request->get('soprts');
        $info->hobby = $request->get('hobby');
        $info->expertise = $expertise;
  
        $info->interested_game = $request->get('interested_game');
        $info->height = $request->get('height');
        $info->weight = $request->get('weight');
        $info->waist_abdomen = $request->get('waist_abdomen');
        $info->chest= $request->get('chest');
        $info->weight_end_course = $request->get('weight_end_course');
        $info->filepath=$imagePath;
       
       if($request->get('status') != null) {
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->save();
        return redirect(action('TrainersController@edit_profile', $info->id))->with('status', 'The trainees information has been updated!');
        }

       

    
    public function healthView($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        if (HealthReport::where('user_id', '=',$id)->exists() AND HealthExam::where('user_id', '=',$id)->exists()) {
           return view('trainers.healthView', compact('healthInfo','healthExam'));
        }      
    } 
    
    public function editHealth($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('health.edit', compact('healthInfo', 'healthExam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateHealth($id, HealthFormRequest $request)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthInfo->present_address = $request->get('present_address');
        $healthInfo->permanent_address = $request->get('permanent_address');
        $healthInfo->birth_date = $request->get('birth_date');
        $healthInfo->age_beginning_course = $request->get('age_beginning_course');
        $healthInfo->marital_status = $request->get('marital_status');
        $healthInfo->present_disease = $request->get('present_disease');
        $healthInfo->physical_disability = $request->get('physical_disability');
        
        $healthInfo->save();
        
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        $healthExam->navel = $request->get('navel');
        $healthExam->anemia = $request->get('anemia');
        $healthExam->blood_pressure = $request->get('blood_pressure');
        $healthExam->jaundice = $request->get('jaundice');
        $healthExam->respiration = $request->get('respiration');
        $healthExam->weight = $request->get('weight');
        $healthExam->heart = $request->get('heart');
        $healthExam->kidney = $request->get('kidney');
        $healthExam->lung = $request->get('lung');
        $healthExam->hernia = $request->get('hernia');
        $healthExam->hydrocil = $request->get('hydrocil');
        $healthExam->spleen = $request->get('spleen');
        $healthExam->left_eye = $request->get('left_eye');
        $healthExam->right_eye = $request->get('right_eye');
        $healthExam->comments_mofficer = $request->get('comments_mofficer');
        
        $healthExam->save();    
        return redirect(action('TrainersController@editHealth', $healthInfo->user_id))->with('status', 'Your information has been updated!');
    }
}

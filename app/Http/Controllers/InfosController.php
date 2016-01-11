<?php

namespace App\Http\Controllers;

use App\Registration;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InfoFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Info;

use App\Course;
use App\TraineeCourse;
use App\Attendance;

//use App\Course;
//use App\Http\Middleware\Auth;
//use App\Http\Middleware\TraineeMiddleware;

class InfosController extends Controller
{
    public function __construct(){

       $this->middleware('trainee');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function course_name_by_course_id($id){
        return Course::whereId($id)->select('course_name')->first();
    }
  public function traineeHome()
  {
      $id = Auth::user()->id;
      $regId = Registration::where('user_id', '=', Auth::user()->id)->pluck('id');
      $user_id = Auth::user()->id;
      $course_ids=TraineeCourse::where('trainee_id',$user_id)->select('course_id')->get();
      //$course_ids=Info::where('trainee_login_id', $user_id)->get();
      $courseAttendance=[];
      foreach($course_ids as $course_id){
          $course_name = $this->course_name_by_course_id($course_id->course_id);
          if(!empty($course_name)){
              $absent=Attendance::where('course_id',$course_id->course_id)
                  ->where('trainee_id',$user_id)
                  ->where('trainee_attendance','=','A')
                  ->count('id');
              $courseAttendance[]=array('course_name'=>$course_name->course_name,'absent'=>$absent);
          }

      }

      $info = Info::wheretrainee_login_id($user_id)->first();
      

      return view('trainee.trainee',compact('regId','courseAttendance','info'))->with('id', $id);

      //dd($regId);
      //return view('trainee.trainee',compact('regId'))->with('id', $id);

  }

   public function index()
    {
          $infos = Info::all();
         return view('infos.index', compact('infos'))->with('trainings', 'active');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user_id = Auth::User()->id;
        $trainee_info = Info::whereTrainee_login_id($user_id)->get();
        if($trainee_info->isEmpty()){
            $user_name = $this->trainee_name_by_user_id($user_id);
            return view('trainee.create')->with('user_id', $user_id)->with('user_name', $user_name);
        }else{
            $trainee_info = Info::whereTrainee_login_id($user_id)->firstOrFail();
            return redirect('trainee_profile/'. $trainee_info->trainee_login_id .'/edit_profile');
        }


    }
    public function trainee_name_by_user_id($id){
        return User::whereId($id)->firstOrFail()->name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoFormRequest $request)
    {
       //return implode(",",$request->get('diseases'));
        $diseaseString =$request->get('diseases');
        $diseases = serialize($diseaseString);
      
        //return $a;
        //$b = unserialize($a);
       // return $b;
        $expertiseString =$request->get('expertise');
        $expertise = serialize($expertiseString);
        
       
       //$diseaseString = implode(",",$request->get('diseases[]') );
        //$expertString = implode(",",$request->get('expertise[]'));
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
            $Image = "trainer_img/default.jpg";
        }

        $info = new Info(array(
        'name' => $request->get('name'),
        'gender' => $request->get('gender'),
        'trainee_id' => $request->get('trainee_id'),
        'trainee_login_id' => $request->get('trainee_login_id'),

        'institution' => $request->get('institution'),
        'educational_qualification' => $request->get('educational_qualification'),
        'service_experience' => $request->get('service_experience'),
        'experience_year' => $request->get('experience_year'),
        'date_of_birth' => $request->get('date_of_birth'),
        'birth_place' => $request->get('birth_place'),
        'join_date' => $request->get('join_date'),
        'guardians_name' => $request->get('guardians_name'),
        'village' => $request->get('village'),
        'post_office' => $request->get('post_office'),
        'sub_district' => $request->get('sub_district'),
        'district' => $request->get('district'),
        'service_station' => $request->get('service_station'),
        'marital' => $request->get('marital'),
        'ph_home' => $request->get('ph_home'),
        'ph_office' => $request->get('ph_office'),
        'ph_mobile' => $request->get('ph_mobile'),
        'diseases' =>  $diseases,
        'soprts' => $request->get('soprts'),
        'hobby' => $request->get('hobby'),
        'expertise' => $expertise,
        'interested_game' => $request->get('interested_game'),
        'height' => $request->get('height'),
        'weight' => $request->get('weight'),
        'waist_abdomen' => $request->get('waist_abdomen'),
        'chest' => $request->get('chest'),
        'weight_end_course' => $request->get('weight_end_course'),
        'filepath' => $Image,
        'slug' => $slug,

         
        ));
        $info->save();

        return redirect('trainee');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

         $info = Info::whereId($id)->firstOrFail();

         return view('infos.show', compact('info'));
    }
    
    //trainee profile
    public function show_profile($id)
    {

         // $info = Info::whereId($id)->firstOrFail();
        $info = Info::whereTrainee_login_id($id)->firstOrFail();
         /*$info = DB::table('users')
              ->join('infos','users.id','=','infos.trainee_login_id')
              ->where('infos.trainee_login_id',$id)
              ->first();
              return $info;*/

        // dd($info);
        //return $info;
         return view('trainee.show', compact('info'));
    }

     public function edit_profile($id)
    {
        $info = Info::whereTrainee_login_id($id)->firstOrFail();

        $expertise = unserialize($info->expertise);
        if($expertise == null){
            $expertise = ['hello', 'world'];
        }
        $diseases = unserialize($info->diseases);
        if($diseases == null){
            $diseases = ['hello', 'world'];
        }
        //return var_dump($expertise);
        //return dd($diseases);
        $user = Auth::User();
        $user_id = $user->id;
        return view('trainee.edit', compact('info','expertise','diseases'))->with('user_id', $user_id);
    }

    public function update_profile($id, InfoFormRequest $request)
    {

        $input=$request->all();
//        $expertisearray=$input['expertise'];
        $expertiseString =$request->get('expertise');
        $expertise = serialize($expertiseString);

//        $diseasearray=$input['diseases'];
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

        $info = Info::whereTrainee_login_id($id)->firstOrFail();
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
        return redirect(action('InfosController@edit_profile', $info->trainee_login_id))->with('status', 'The trainees information has been updated!');
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::whereId($id)->firstOrFail();
        return view('infos.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update($id, InfoFormRequest $request)
    {
        $info = Info::whereId($id)->firstOrFail();
        $info->name = $request->get('name');
        $info->gender = $request->get('gender');
        $info->trainee_id = $request->get('trainee_id');
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
       
        $info->soprts = $request->get('soprts');
        $info->hobby = $request->get('hobby');
  
        $info->interested_game = $request->get('interested_game');
        $info->height = $request->get('height');
        $info->weight = $request->get('weight');
        $info->waist_abdomen = $request->get('waist_abdomen');
        $info->chest= $request->get('chest');
        $info->weight_end_course = $request->get('weight_end_course');
       
       if($request->get('status') != null) {
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->save();
        return redirect(action('InfosController@edit', $info->id))->with('status', 'The trainees information has been updated!');
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
        $path="Trainee_img";
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
    
}

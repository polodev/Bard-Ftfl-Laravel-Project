<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\HealthFormRequest;
use App\HealthReport;
use App\HealthExam;

use App\Trainer;
use App\Feedback;
use App\Info;
use App\TraineeCourse;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{

    public function feedbackIndex()
    {
        $feedbacks = Feedback::with('trainer')->distinct()->select('trainer_id')->get();
        $trainers = Trainer::all();
     
        return view('admin.feedbacks.index', compact('feedbacks','trainers'));
    }
    
    public function feedbackShow($id)
    {
        $feedbacks = Feedback::where('trainer_id', '=', $id)
                 ->with('trainer')
                ->join('trainers', 'trainers.id', '=', 'feedbacks.trainer_id')
                ->select('*',DB::raw('AVG(voice_range) as voice_range,
                            AVG(voice_clearity) as voice_clearity,
                            AVG(communication_skills) as communication_skills,
                            AVG(rapport_building) as rapport_building,
                            AVG(topic_usefulness) as topic_usefulness,
                            AVG(interaction) as interaction,
                            AVG(material_organization) as material_organization,
                            AVG(speakers_knowledge) as speakers_knowledge'))
                ->get();
      
        foreach($feedbacks as $f){
                $sum= $f->voice_range+$f->voice_clearity+$f->communication_skills+$f->rapport_building+$f->topic_usefulness+$f->interaction+$f->material_organization+$f->speakers_knowledge;
    }
        $avg = $sum/8;
       
        return view('admin.feedbacks.show', compact('feedbacks', 'avg'));
    
    }
    
    public function healthView()
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('health.show', compact('healthInfo','healthExam'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //$healthInfos = HealthReport::all();
        $healthReport = Info::all();
        //dd($healthReport);
        return view('admin.AdminHealth.adminHealthInfos', compact('healthReport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AdminHealth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthFormRequest $request)
    {
        $healthInfo = new HealthReport(array(
            'user_id' => $request->get('user_id'),
            'present_address' => $request->get('present_address'),
            'permanent_address' => $request->get('permanent_address'),
            'birth_date'=> $request->get('birth_date'),
            'age_beginning_course' => $request->get('age_beginning_course'),
            'marital_status' => $request->get('marital_status'),
            'present_disease' => $request->get('present_disease'),
            'physical_disability' => $request->get('physical_disability')
        ));

        $healthExam = new HealthExam(array(
            'user_id' => $request->get('user_id'),
            'navel' => $request->get('navel'),
            'blood_pressure' => $request->get('blood_pressure'),
            'respiration'=> $request->get('respiration'),
            'anemia' => $request->get('anemia'),
            'jaundice' => $request->get('jaundice'),
            'weight' => $request->get('weight'),
            'heart' => $request->get('heart'),
            'lung' => $request->get('lung'),
            'liver' => $request->get('liver'),
            'spleen' => $request->get('spleen'),
            'kidney' => $request->get('kidney'),
            'hernia' => $request->get('hernia'),
            'hydrocil' => $request->get('hydrocil'),
            'left_eye' => $request->get('left_eye'),
            'right_eye' => $request->get('right_eye'),
            'comments_mofficer' => $request->get('comments_mofficer'),

        ));
        $healthExam->save();
        $healthInfo->save();
        return redirect('/create')->with('status', 'Your information has been created!');
        //print_r($healthInfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('admin.AdminHealth.adminHealthInfoShow', compact('healthInfo','healthExam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('admin.AdminHealth.adminHealthInfoEdit', compact('healthInfo', 'healthExam'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, HealthFormRequest $request)
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
        return redirect(action('AdminController@edit', $healthInfo->user_id))->with('status', 'The User_id '.$healthInfo->user_id.' has been updated!');
    }


   
  

    //following function created by nirupam
    
    public function trainees_by_course_id($course_id){
            

        $trainees = DB::table('traineecourses')
                    ->join('users', 'users.id', '=', 'traineecourses.trainee_id')
                    ->where('course_id', '=', $course_id)->get();
                    
        return view('admin/admin_trainee/show_trainee_list', compact('trainees'));
    }
     public function trainee_by_user_id($trainee_id){
        $trainee = Info::whereTrainee_login_id($trainee_id)->first();
        return view('admin/admin_trainee/trainee_view')->with('trainee', $trainee);
        
    }




}

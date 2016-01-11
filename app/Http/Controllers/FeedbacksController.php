<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackFormRequest;
use App\Trainer;
use App\Feedback;
use App\Course;
use App\UserTraining;
use Auth;
class FeedbacksController extends Controller
{

    public function __construct(){
        $this->middleware('trainee');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        //dd($id);
        $trainingId = UserTraining::where('user_id', '=', $id)->FirstOrFail()->trainings_id;
       // dd($trainingId);
        $trainers = DB::table('users')
                ->join('trainercourses','trainercourses.trainer_id','=','users.id') 
                ->join('courses', 'courses.id', '=', 'trainercourses.course_id')
                ->where('courses.training_id', $trainingId)
                ->get();
          //dd($trainers); 
        return view('feedbacks.create',compact('trainers'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackFormRequest $request)
    {   
          $traineeId = Auth::user()->id;
          $feedback = new Feedback(array(
           'trainer_id' => $request->get('trainer_id'),
           'trainee_id' => $traineeId,
           'voice_range' => $request->get('A1'),
           'voice_clearity' => $request->get('A2'),
           'communication_skills' => $request->get('A3'),
           'rapport_building' => $request->get('A4'),
           'interaction' => $request->get('A5'),
           'topic_usefulness' => $request->get('B1'),
           'material_organization' => $request->get('B2'),
           'speakers_knowledge' => $request->get('B3'),
           'comments' => $request->get('comments'),
        ));
        //dd($feedback);
        if (Feedback::where('trainee_id', '=', $traineeId)->where('trainer_id', '=',$request->get('trainer_id'))->exists()) {
           return redirect('/trainee')->with('status', 'You have already given feedback');
        }
        else{
            $feedback->save();
            return redirect('/trainee')->with('status', 'Your feedback has been submitted!');
        }
    }

  
}

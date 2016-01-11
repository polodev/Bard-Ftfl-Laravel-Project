<?php

namespace App\Http\Controllers;

use App\Course;
use App\Training;
use App\Info;
use App\TrainerCourse;
use App\Trainer;
use App\HealthReport;
use App\HealthExam;
use App\Feedback;
use App\TraineeCourse;
use App\UserTraining;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ViewTraineeReportController extends Controller
{

    public function select_training()
    {
        $trainings = Training::whereStatus(1)->get();
        return view('view_trainee_report/select_training')->with('trainings', $trainings);
    }

    public function select_course($training_id)
    {
        $courses = Course::whereTraining_id($training_id)->get();
        $trainingId = Training::where('id', '=', $training_id)->firstOrFail();
        //dd($trainingId);
        return view('view_trainee_report/select_course')->with('courses', $courses)
                                                        ->with('trainingId', $trainingId);
    }

    public function view_trainee_report($course_id)
    {
        return view('view_trainee_report/all_report')->with('course_id', $course_id);
    }

    public function healthInfos($id)
    {

        $trainee = Info::where('course_id', '=', $id)->get();
        return view('view_trainee_report.healthInfos', compact('trainee'));
//        $trainee = TraineeCourse::where('course_id','=',$id)->get();
//        dd($trainee);
//        return view('view_trainee_report.healthInfos', compact('trainee'));
        $trainee = DB::table('users')
                ->join('traineecourses','traineecourses.trainee_id','=','users.id') 
                ->join('courses', 'courses.id', '=', 'traineecourses.course_id')
                ->where('courses.id', $id)
                ->get();
        //dd($trainee);
        
        $id = [];
        $name = [];
        $abc = array();
        foreach ($trainee as $tra)
        {
            if (HealthReport::where('user_id', '=',$tra->trainee_id)->exists() AND HealthExam::where('user_id', '=',$tra->trainee_id)->exists())
            {
                
                $abc[$tra->name]=array('id'=>$tra->trainee_id, 'name'=> $tra->name);
                //dd($abc[$tra->name]);
            }            
            
        }
        
            //return print_r($abc);
        return view('view_trainee_report.healthInfos')->with('abc', $abc); 
       

    }

    public function healthView($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();

        return view('view_trainee_report.healthView', compact('healthInfo', 'healthExam'));

        if (HealthReport::where('user_id', '=',$id)->exists() AND HealthExam::where('user_id', '=',$id)->exists()) {
           return view('view_trainee_report.healthView', compact('healthInfo','healthExam'));
        }
        
        
    } 
    
    public function trainer_by_course_id($course_id)
    {
        $trainers = Trainer::whereCourse_id($course_id)->get();
        return $trainers;

    }
    public function trainer_by_training_id($training_id)
    {
//        $t = DB::table('trainers')
//                    ->join('courses','courses.id','=','trainers.course_id')
//                    ->where('courses.training_id',$training_id)->get();   
//        
        $trainer = DB::table('users')
                ->join('trainercourses','trainercourses.trainer_id','=','users.id') 
                ->join('courses', 'courses.id', '=', 'trainercourses.course_id')
                ->where('courses.training_id', $training_id)
                ->get();
        //dd($trainer);
        return view('view_trainee_report.allTrainers')->with('trainer', $trainer);
    }
    

    public function trainersFeedback($id)
    {
        $feedbacks = Feedback::where('trainer_id', '=', $id)
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
       
        return view('view_trainee_report.trainersFeedback', compact('feedbacks', 'avg'));
    }


    /*following functions for yearly report*/
    public function course_by_training_id($training_id)
    {
        return Course::whereTraining_id($training_id)->get();
    }
    public function number_of_trainee_by_training_id($training_id)
    {
        return UserTraining::where('trainings_id', $training_id)->get()->count();
    }

    public function number_of_trainee_by_course_id($course_id)
    {
        return TraineeCourse::where('course_id', $course_id)->get()->count();
    }

    public function yearly_report()
    {
        $trainings = Training::all();
        $years = [];
        foreach ($trainings as $training) {
            $years[] = (int)(substr($training->start_date, 0, 4));
        }
        rsort($years);
        $years = array_unique($years);
        $reports = [];
        foreach ($years as $year) {
            $start_date = ($year - 1).'-12-31';
            $end_date = ($year + 1).'-1-1';
            $reports[$year] = $this->one_year_report($start_date, $end_date);
        }
        return view('view_trainee_report.yearly_report')->with('reports', $reports);
    }

    public function one_year_report($start_date, $end_date)
    {
        $year = (int)(substr($start_date, 0, 4)) + 1;
        $courses_ids = [];
        $number_of_trainee = 0;
        $trainings = Training::whereBetween('start_date', [$start_date, $end_date])->get();
        $number_of_trainings = $trainings->count();
        foreach ($trainings as $training) {
            $courses = $this->course_by_training_id($training->id);
            $number_of_trainee += $this->number_of_trainee_by_training_id($training->id);
            foreach ($courses as $course) {
                $courses_ids[] = $course->id;
            }
        }
        $number_of_courses = count($courses_ids);
        $data = [
            'year' => $year,
            'number_of_trainings' => $number_of_trainings,
            'number_of_courses' => $number_of_courses,
            'number_of_trainee' => $number_of_trainee
        ];
        return $data;

    }
}


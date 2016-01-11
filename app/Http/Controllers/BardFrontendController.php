<?php

namespace App\Http\Controllers;

use App\Course;
use App\Slider;
use App\TraineeCourse;
use App\UserTraining;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Training;
use Carbon;
use DateTime;
use App\Model\Client;
use Illuminate\Support\Facades\DB;


class BardFrontendController extends Controller
{
    public function index()
    {   $limit=2;
        $announcement = Announcement::orderBy('created_at','desc')->limit($limit)->get();
        $now = new Datetime();
        $now=$now->format('Y-m-d');
        $upcomingTrainings=Training::where('status','=',1)
            ->where('start_date','>',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->orderBy('start_date','asc')
            ->limit($limit)
            ->get();
        $ongoingTrainings=Training::where('status','=',1)
            ->where('start_date','<=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->where('end_date','>=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->limit($limit)
            ->get();
        $all_slider = Slider::orderBy('position', 'asc')->get();
        $clients = Client::orderBy('created_at','desc')->limit(5)->get();

        return view('bard_frontend.index', compact('announcement','upcomingTrainings','ongoingTrainings','all_slider','clients'));
    }
    public function trainings()
    {
        return view('bard_frontend/trainings')->with('trainings', 'active');
    }
    public function faculty()
    {
        return view('bard_frontend/faculty')->with('faculty', 'active');
    }
    public function clients()
    {
        return view('bard_frontend/clients')->with('clients', 'active');
    }
    public function about()
    {
        return view('bard_frontend/about')->with('about', 'active');
    }
    public function contact()
    {
        return view('bard_frontend/contact')->with('contact', 'active');
    }

    public function trainers()
    {
        return view('bard_frontend/trainers')->with('trainings', 'active');
    }
    public function trainees()
    {
        return view('bard_frontend/trainees')->with('trainings', 'active');
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
        return view('bard_frontend.yearly_report')->with('reports', $reports);
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

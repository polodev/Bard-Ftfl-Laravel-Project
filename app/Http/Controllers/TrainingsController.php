<?php

namespace App\Http\Controllers;
use App\Testimonial;
use App\FAQ;
use DateTime;
use Carbon;
use App\Course;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TrainingFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['training_info', 'index', 'store','show','edit','update','destroy','statusUpdate']]);//for selected multiple files
        //$this->middleware('auth',['except'=>'index']);
    }

    public function training_info()
    {
        return view('trainings.training_info');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicIndex()
    {
        $trainings = Training::where('status',1)->get();
        $now = new Datetime();
        $now=$now->format('Y-m-d');
        $ongoingTrainings=Training::where('status','=',1)
            ->where('start_date','<=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->where('end_date','>=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->get();
        $upcomingTrainings=Training::where('status','=',1)
            ->where('start_date','>',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->get();
        $pastTrainings=Training::where('status','=',1)
            ->where('end_date','<',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$now.' 00:00:00'))
            ->get();
        return view('trainings.public_training_pages.index', compact('trainings','ongoingTrainings','upcomingTrainings','pastTrainings'));
    }
    public function index()
    {
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingFormRequest $request)
    {
        $training_name = $request->get('training_name');
        $start_date=$request->get('start_date');
        $end_date=$request->get('end_date');
        $check=Training::whereTraining_name($training_name)->count('id');
        if($check){
            return redirect('/training_info')->with("check",$training_name." Training Has Already Entered.");
        }
        else {
            if($start_date>$end_date){
                return redirect('/training_info')->with("checkDuration","Start Time Should Not Be Greater Than End Date.");
            }
            $ImageExtensions = array('jpg', 'png', 'jpeg','gif','tif','tiff','bmp');
            $input = $request->all();
            if (isset($input['image_path'])) {
                $Image = $input['image_path'];
                $ImageExtension = $request->file('image_path')->getClientOriginalExtension();
                if (in_array($ImageExtension, $ImageExtensions)) {
                    $Image = $this->imageUpload($Image);
                    $input['image_path'] = $Image;
                } else
                    return redirect('/training_info')->with('warning', 'Only jpg, png, tif, tiff, bmp and jpeg Image Format Are Allowed.');
            } else {
                $input['image_path'] = "training_image/default.gif";
            }
            $training = new Training(array(
                'training_name' => $request->get('training_name'),
                'training_type' => $request->get('training_type'),
                'description' => $request->get('description'),
                'applying_information' => $request->get('applying_information'),
                'objectives' => $request->get('objectives'),
                'start_date' => Carbon\Carbon::createFromFormat('Y-m-d',$request->get('start_date')),
                'end_date' => Carbon\Carbon::createFromFormat('Y-m-d',$request->get('end_date')),
                'provided_resources' => $request->get('provided_resources'),
                'accommodation' => $request->get('accommodation'),
                'daily_schedule' => $request->get('daily_schedule'),
                'fees_structure' => $request->get('fees_structure'),
                'responsible_person' => $request->get('responsible_person'),
                'image_path' => $input['image_path']
            ));
            $training->save();
            return redirect('/training_info')->with('status', 'Your Information Is Inserted Successfully.');
        }
    }
    public function imageUpload($Image)
    {
        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="training_image";
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        $courses=Course::wheretraining_id($id)->get();
        $testimonials=Testimonial::wheretraining_id($id)->get();
        return view('trainings.show', compact('training'),compact('courses'))->with('testimonials',$testimonials);
    }
    public function publicShow($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        $courses=Course::wheretraining_id($id)->get();
        $testimonials=Testimonial::wheretraining_id($id)->get();
        $FAQs=FAQ::wheretraining_id($id)->get();
        return view('trainings.public_training_pages.show', compact('training','courses','FAQs'))->with('testimonials',$testimonials);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        return view('trainings.edit', compact('training'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TrainingFormRequest $request)
    {
        $training = Training::whereid($id)->firstOrFail();
        $ImageExtensions = array('jpg', 'png', 'jpeg','gif','tif','tiff','bmp');
        $start_date=$request->get('start_date');
        $end_date=$request->get('end_date');
        $input = $request->all();
        if (isset($input['image_path'])) {
            $Image = $input['image_path'];
            $ImageExtension = $request->file('image_path')->getClientOriginalExtension();
            if (in_array($ImageExtension, $ImageExtensions)) {
                $Image = $this->imageUpload($Image);
                $input['image_path'] = $Image;
            }
            else
                return redirect(action('TrainingsController@edit', $training->id))->with('warning', 'Only jpg, png, tif, tiff, bmp and jpeg Image Format Are Allowed.');
        }
        else{
            $input['image_path'] = Training::where('id', '=', $id)->pluck('image_path');
        }
        $training_name=$request->get('training_name');
        $check=Training::whereTraining_name($training_name)->count('id');
        if(!$check){
            $training->training_name = $training_name;
        }
        $training->training_type = $request->get('training_type');
        $training->description = $request->get('description');
        $training->applying_information = $request->get('applying_information');
        $training->objectives = $request->get('objectives');
        if($start_date<=$end_date){
            $training->start_date = $request->get('start_date');
            $training->end_date = $request->get('end_date');
        }
        $training->provided_resources = $request->get('provided_resources');
        $training->accommodation = $request->get('accommodation');
        $training->daily_schedule = $request->get('daily_schedule');
        $training->fees_structure = $request->get('fees_structure');
        $training->responsible_person = $request->get('responsible_person');
        $training->image_path = $input['image_path'];
        Training::where('id', $id)->update($training->toArray());
        return redirect(action('TrainingsController@edit', $training->id))->with('status', 'Information  Has Been Updated!');
    }

    public function statusUpdate($id){
        $training =  Training::where('id',$id)->firstOrFail();
        if($training->status){
            $training->status =0;
        }
        else
        {
            $training->status =1;
        }
        $training->save();
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        unlink($training->image_path);
        $training->delete();
        return redirect('/trainings')->with('status', 'The Training Information Has Been Deleted!');
    }
}

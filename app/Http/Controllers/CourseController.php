<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseFormRequest;
use App\Course;
use App\Training;
use Illuminate\Support\Facades\Validator;
class CourseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function index()
	{
    $courses = Course::all();
    return view('course.index', compact('courses'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $trainings=Training::all();
        return view('course.create',compact('trainings'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CourseFormRequest $request)
    {
         $input=$request->course_image;
         if(isset($input)) {
            $Image = $this->imageUpload($input);
        }
        else{
            $Image = "course_img/default.jpg";
        }



		$course = new Course(array(
        'course_name' => $request->get('course_name'),
        'introduction' => $request->get('introduction'),
		'objectives' => $request->get('objectives'),
		'course_contents' => $request->get('course_contents'),
		'training_methods' => $request->get('training_methods'),
		'participants' => $request->get('participants'),
		'duration' => $request->get('duration'),
        'academic_staff' => $request->get('academic_staff'),
        'course_fee' => $request->get('course_fee'),
        'accommodation_and_food' => $request->get('accommodation_and_food'),
        'library' => $request->get('library'),
        'award' => $request->get('award'),
        'address_for_correspondence' => $request->get('address_for_correspondence'),
        'training_id' => $request->get('training_id'),
        'course_image'=> $Image,
       
    ));
    $course->save();
    $id=$request->get('id');
    return redirect('/create_course')->with('status','Your course has been created!');
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function training_name_by_training_id($training_id){
        $training = Training::whereId($training_id)->firstOrFail();
        return $training->training_name;

    }
    public function show($id)
    {
        $courses = Course::whereId($id)->firstOrFail();
        $training_id = $courses->training_id;
        $training_name = $this->training_name_by_training_id($training_id);
        return view('course.show', compact('courses', 'training_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */ 

    public function edit($id)
    {
        $trainings=Training::all();
        $courses = Course::whereId($id)->firstOrFail();
        $training_id = $courses->training_id;
        $training_name = $this->training_name_by_training_id($training_id);
        return view('course.edit', compact('courses','training_name','trainings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
   public function update($id, CourseFormRequest $request)
    {
        $input=$request->course_image;
        if(isset($input)) {
            $Image=$this->imageUpload($input); //call public function imageUpload for small img
//            $course = Course::whereId($id)->first();
//            unlink($course->course_image);

        }
        else{
            $Image = Course::where('id', '=', $id)->pluck('course_image');
        
        }



        $courses = Course::whereId($id)->firstOrFail();
        $courses->course_name = $request->get('course_name');
        $courses->introduction = $request->get('introduction');
        $courses->objectives = $request->get('objectives');
        $courses->course_contents = $request->get('course_contents');
        $courses->training_methods = $request->get('training_methods');
        $courses->participants = $request->get('participants');
        $courses->duration = $request->get('duration');
        $courses->academic_staff = $request->get('academic_staff');
        $courses->course_fee = $request->get('course_fee');
        $courses->accommodation_and_food = $request->get('accommodation_and_food');
        $courses->library = $request->get('library');
        $courses->award = $request->get('award');
        $courses->address_for_correspondence = $request->get('address_for_correspondence');
        $courses->training_id = $request->get('training_id');
        $courses->course_image = $Image;
    
        
        $courses->save();
        return redirect(action('CourseController@edit', $courses->id))->with('status', 'The course has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $courses = Course::whereId($id)->firstOrFail();
        $courses->delete();
        return redirect('/courses')->with('The ticket '.$id.' has been deleted!');
    }


    public function imageUpload($Image)
    {
        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="course_img";
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

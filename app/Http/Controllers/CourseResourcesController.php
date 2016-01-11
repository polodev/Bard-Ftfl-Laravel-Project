<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CourseResource;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CourseResourceRequest;
use DB;

class CourseResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //following function for trainer page
    public function index()
    {
        $id = Auth::user()->id;
        $course_resources=DB::table('trainercourses')
            ->join('courses','courses.id','=','trainercourses.course_id')
            ->join('course_resources', 'course_resources.course_id', '=', 'courses.id')
            ->where('trainercourses.trainer_id', $id)
            ->orderBy('course_resources.created_at', 'desc')
            ->get();
        return view('resource.index',compact('course_resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $courses = DB::table('trainercourses')
            ->join('courses', 'courses.id', '=', 'trainercourses.course_id')
            ->where('trainercourses.trainer_id', $id)
            ->get();

        return view('resource.create',compact('course_resources','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input=$request->file_path;
         if(isset($input)) {
            $File = $this->fileUpload($input);
        }
        else{
            $File = "course_resource/default.jpg";
        }



        $course_resource = new CourseResource(array(
        'course_id' => $request->get('course_id'),
        'title' => $request->get('title'),
        'description' => $request->get('description'),        
        'file_path'=> $File,
       
    ));

    $course_resource->save();
    $id=$request->get('id');
    return redirect('/resources')->with('status','Your file has been uploaded!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
       
        $course_resources=DB::table('course_resources')
                           ->join('courses','courses.id','=','course_resources.course_id')
                            ->where('course_resources.id', $id)
                           ->first();
                           
        return view('resource.show',compact('course_resources'));         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $course_resources=CourseResource::whereId($id)->firstOrFail();
       
        return view('resource.edit',compact('course_resources','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $input=$request->file_path;
         if(isset($input)) {
            $File = $this->fileUpload($input);
        }
        else{
            $File = "course_resource/default.jpg";
        }


        $course_resources = CourseResource::whereId($id)->firstOrFail();
        $course_resources->course_id = $request->get('course_id');
        $course_resources->title = $request->get('title');
        $course_resources->description = $request->get('description');
        $course_resources->file_path = $File;


        $course_resources->save();
        return redirect(action('CourseResourcesController@edit', $course_resources->id))->with('status', 'The file has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course_resources = CourseResource::whereId($id)->firstOrFail();
        $course_resources->delete();
        return redirect('/allresources')->with('status','The file has been deleted!');
    }


    public function index_trainee()
    {
        $course_resources=DB::table('course_resources')
                           ->join('courses','courses.id','=','course_resources.course_id')
                           ->select('course_resources.*','courses.course_name')
                           ->get();
                           
        return view('resource.index_trainee',compact('course_resources'));                  
      
    }

    public function show_trainee($id)
    {
       
        $course_resources=DB::table('course_resources')
                           ->join('courses','courses.id','=','course_resources.course_id')
                           ->first();

        return view('resource.show_trainee',compact('course_resources'));
    }


   

     public function fileUpload($File)
    {
        $rules=array('file'=>'file');
        $validate=Validator::make(array("productFile"=>$File),$rules);
        $path="course_resource";
        if($validate)
        {
            $fileOriginalName=$File->getClientOriginalName();//get image full name
            $basename = substr($fileOriginalName, 0, strrpos($fileOriginalName, "."));//get image name without extension
            $basename=str_replace(" ", "", $basename);
            $extension =$File->getClientOriginalExtension();//get image extension only
            $fileName=$basename.date("YmdHis").'.'.$extension;//make new name

            $fileMoved=$File->move($path, $fileName);
            if($fileMoved)
            {
                $filePath=$path.'/'.$fileName;
                return $fileName;
               
            }

        }


    }
    //function for trainee view resource by polo dev
    public function resource_list_for_trainee()
    {
        $id = Auth::user()->id;
        $course_resources=DB::table('traineecourses')
            ->join('courses','courses.id','=','traineecourses.course_id')
            ->join('course_resources', 'course_resources.course_id', '=', 'courses.id')
            ->where('traineecourses.trainee_id', $id)
            ->orderBy('course_resources.created_at', 'desc')
            ->get();
        return view('resource.trainee.index',compact('course_resources'));

    }

    public function single_resource_for_trainee($course_resource_id)
    {
        $course_resources=DB::table('course_resources')
            ->join('courses','courses.id','=','course_resources.course_id')
            ->where('course_resources.id', $course_resource_id)
            ->first();
        return view('resource.trainee.show',compact('course_resources'));
    }







}

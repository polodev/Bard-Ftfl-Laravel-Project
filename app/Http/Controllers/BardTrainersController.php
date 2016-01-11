<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BardTrainerFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\BardTrainer;
use App\Course;

class BardTrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      
        $bardtrainers = BardTrainer::all();
        return view('bardtrainers.index', compact('bardtrainers'));
        
    }
    public function faculty()
    {   
      
        $bardtrainers = BardTrainer::all();
        return view('bardtrainers.bardtrainer', compact('bardtrainers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('bardtrainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BardTrainerFormRequest $request)
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
            $Image = "trainer_img/default.jpg";
        }

        $bardtrainer = new BardTrainer(array(
        'name' => $request->get('name'),
        'gender' => $request->get('gender'),
        
        'educational_qualification' => $request->get('educational_qualification'),
        'previous_experience' => $request->get('previous_experience'),
        'email' => $request->get('email'),
        'country' => $request->get('country'),
        'skill_set' => $request->get('skill_set'),
        'cell_number' => $request->get('cell_number'),
        'date_of_birth'=>$request->get('date'),
        'description'=>$request->get('description'),

        'filePath' => $Image,
        'slug' => $slug
    ));


    $bardtrainer->save();

    return redirect('/bardtrainers')->with('status', 'Your data has been saved! ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         $bardtrainer = BardTrainer::whereSlug($slug)->firstOrFail();
         return view('bardtrainers.show', compact('bardtrainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($slug)
{
    $bardtrainer = BardTrainer::whereSlug($slug)->firstOrFail();
    return view('bardtrainers.edit', compact('bardtrainer'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update($slug, BardTrainerFormRequest $request)
{        

        $input=$request->all();
        if(isset($input['image'])) {
            $Image=$input['image'];
            //dd($Image);
            $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = BardTrainer::where('slug', '=', $slug)->pluck('filePath');
            //dd($imagePath);
        }

    $bardtrainer = BardTrainer::whereSlug($slug)->firstOrFail();
    $bardtrainer->name = $request->get('name');
    $bardtrainer->email = $request->get('email');
    $bardtrainer->country = $request->get('country');
    $bardtrainer->skill_set = $request->get('skill_set');
    $bardtrainer->gender = $request->get('gender');
    $bardtrainer->educational_qualification = $request->get('educational_qualification');
    $bardtrainer->previous_experience = $request->get('previous_experience');
    $bardtrainer->date_of_birth = $request->get('date');
    $bardtrainer->cell_number = $request->get('cell_number');
    $bardtrainer->description = $request->get('description');
    $bardtrainer->filePath=$imagePath;
    if($request->get('status') != null) {
        $bardtrainer->status = 0;
    } else {
        $bardtrainer->status = 1;
    }
    $bardtrainer->save();
    return redirect(action('BardTrainersController@index', $bardtrainer->slug))->with('status', 'The BARD trainer status has been updated!');

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
    $bardtrainer = BardTrainer::whereSlug($slug)->firstOrFail();


     $bardtrainer->delete();
    return redirect('/bardtrainers')->with('status', 'Trainer  '.$slug.' has been deleted!');
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
    
}

<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\AdminTrainer;
//use App\Course;
use App\User;
use Auth;

class AdminTrainersController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {   
      
        
        $trainers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->where('role_user.role_id', 2)->get();
        return view('admin.AdminTrainer.index', compact('trainers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
    {
        
         $trainer_id = Auth::user()->id;
         $trainer_info = AdminTrainer::whereTrainer_id($trainer_id)->get();
        if($trainer_info->isEmpty()){
            $trainer_name = $this->trainer_name_by_user_id($trainer_id);
            $trainer_email = $this->trainer_email_by_user_id($trainer_id);
            
              return view('admin.AdminTrainer.create')
                ->with('trainer_name', $trainer_name) 
                ->with('trainer_id', $trainer_id)
                ->with('trainer_email', $trainer_email) ;
        }else{
            $trainer_info = AdminTrainer::whereTrainer_id($trainer_id)->firstOrFail();           
            return redirect('/adminTrainer_show/'. $trainer_info->id .'/edit');
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

    public function adminStore(TrainerFormRequest $request)
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

      

        $trainer = new AdminTrainer(array(
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
    

    return redirect('/adminTrainers')->with('status', 'Your data has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_trainer_show($id)
    {
        
         $trainer = Trainer::whereTrainer_id($id)->first();
         return $trainer;
         return view('admin.AdminTrainer.show', compact('trainer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function adminEdit($id)
{
    $trainer = AdminTrainer::whereId($id)->firstOrFail();
    return view('admin.AdminTrainer.edit', compact('trainer'))->with('trainings', 'active');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminUpdate($id, TrainerFormRequest $request)
{

 $input=$request->all();

        if(isset($input['image'])) {
            $Image=$input['image'];
            //dd($Image);
            $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = AdminTrainer::where('id', '=', $id)->pluck('filePath');
            //dd($imagePath);
        }


    $trainer = AdminTrainer::whereId($id)->firstOrFail();
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
    return redirect(action('AdminTrainersController@admin_trainer_show', $trainer->trainer_id))->with('status', 'The trainer status has been updated!');

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

    
}

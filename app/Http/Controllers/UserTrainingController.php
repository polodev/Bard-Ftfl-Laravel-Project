<?php

namespace App\Http\Controllers;

use App\Role_user;
use App\Training;
use App\User;
use App\UserTraining;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserTrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainees = User::lists('id', 'name');
        $userTraining = UserTraining::all();
        $training = Training::lists('training_name', 'id');

        return view('user_traininginfo/index',compact('trainees','userTraining','training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training = Training::lists('training_name', 'id');

        $trainees = User::lists('id', 'name');
        $role = Role::where('slug','LIKE','trainee')->first();
        //dd($trainees);
        $newTrainees = array();
        $test = "";
        foreach ($trainees as $traineesName => $traineeId) {
            $listOfTraineesInRoleTable=Role_user::whereuser_id($traineeId)->firstOrFail();
            if($listOfTraineesInRoleTable->role_id==$role->id) {
                $traineeHas = UserTraining::whereuser_id($traineeId)->first();
                if ($traineeHas == true) {
                    $test++;
                } else {
                    array_push($newTrainees, $traineeId);
                }
            }
            else{
                continue;
            }
        }
        //print_r($newTrainees);

        return view('user_traininginfo/create',compact('training','trainees','newTrainees','listOfTraineeInRoleTable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=Input::all();
        //dd($input);

        foreach($input as $key=>$traineeId){
            if($key=="_token" or $key=="training_id"){continue;}
            $userTrainingTable= new UserTraining();
            $userTrainingTable->user_id=$traineeId;
            $userTrainingTable->trainings_id=$input['training_id'];
            $userTrainingTable->save();
        }

        return redirect('user_traininginfo')->with('status','Training & Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::lists('training_name', 'id');
        //dd($training);
        $data=UserTraining::whereid($id)->firstOrFail();
        //dd($data);
        $trainees = User::lists('name', 'id');

        return view('user_traininginfo/edit',compact('data','training','trainees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $traineingSubject=UserTraining::whereid($id)->firstOrFail();;
            //dd($traineingSubject);
        $traineingSubject->trainings_id=$request->get('trainings_id');
        $traineingSubject->user_id=$request->get('user_id');
        $traineingSubject->save();
        return redirect('/user_traininginfo')->with('status','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $traineingSubject=UserTraining::whereid($id);
        $traineingSubject->delete();
        return redirect('/user_traininginfo')->with('status','Delete successfully');
    }
}

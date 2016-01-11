<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\HealthFormRequest;
use App\HealthReport;
use App\HealthExam;
use Auth;
class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $healthInfos = HealthReport::where('user_id','=',$id)->get();
        return view('health.index', compact('healthInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $trainee = Auth::user();
        //echo $trainee->id;
        return view('health.create', compact('$trainee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(HealthFormRequest $request)
    {
        $id = Auth::user()->id;
        $healthInfo = new HealthReport(array(
            'user_id' => Auth::user()->id,
            'present_address' => $request->get('present_address'),
            'permanent_address' => $request->get('permanent_address'),
            'birth_date'=> $request->get('birth_date'),
            'age_beginning_course' => $request->get('age_beginning_course'),
            'marital_status' => $request->get('marital_status'),
            'present_disease' => $request->get('present_disease'),
            'physical_disability' => $request->get('physical_disability')
        ));
        
        $healthExam = new HealthExam(array(
           'user_id' => Auth::user()->id,
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
     //dd($healthExam);
        if (HealthReport::where('user_id', '=',$id)->exists() AND HealthExam::where('user_id', '=',$id)->exists()) {
           return redirect('/UserHealthInfos')->with('status', 'You have already given your health information');
        }
        else{
               $healthExam->save();
               $healthInfo->save();
            return redirect('/UserHealthInfos')->with('status', 'Your health information has been submitted!');
        }
        
       
        //return redirect('/UserHealthInfos')->with('status', 'Your health information has been created!');
        //print_r($healthInfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->first();
        $healthExam = HealthExam::whereUserId($id)->first();
        return view('health.show', compact('healthInfo','healthExam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('health.edit', compact('healthInfo', 'healthExam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
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
        return redirect(action('HealthController@edit', $healthInfo->user_id))->with('status', 'Your information has been updated!');
    }
}

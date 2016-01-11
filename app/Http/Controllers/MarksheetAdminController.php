<?php

namespace App\Http\Controllers;

use App\Marksheet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MarksheetAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($courseId)
    {
        $marksheets = DB::table('marksheets')
            ->join('users','marksheets.trainee_id','=','users.id')
            ->join('role_user','marksheets.trainee_id','=','role_user.user_id')
            ->select('marksheets.id','marksheets.course_id','marksheets.exam_id','marksheets.trainee_id','marksheets.mark','users.name')
            ->where('role_user.role_id',3)
            ->where('marksheets.course_id',$courseId)
            ->get();
//        dd($marksheets);
        return view('marksheetAdmin/index',compact('marksheets'));
    }

    /**
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        //dd($marksheet->trainee_id);
        $traineeName = User::where('id', '=', $marksheet->trainee_id)->pluck('name');

        return view('marksheetAdmin/edit',compact('marksheet','traineeName'));
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
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        //$marksheet->trainee=$request->get('trainee');
        $marksheet->mark=$request->get('mark');
        $marksheet->save();
        return redirect('MarksheetAdmin/'.$marksheet->course_id.'/listTraineesForMarks')->with('status','updated successfully');
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
}

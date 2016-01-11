<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Marksheet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MarkSheetController extends Controller
{
    public function __construct()
    {
        $this->middleware('trainer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exams=Exam::whereadmin_id(Auth::user()->id)->get();
        return view('marksheet/index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams=Exam::lists('title','id');
        return view('marksheet/create',compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $input=Input::all();
        $examId=$request->examId;
        $courseId = exam::where('id', '=', $examId)->pluck('course_id');
        //dd($courseId);
        foreach($input as $traineeId=>$mark){
            if($traineeId==0 or $mark==0) {
                continue;
            }else{
                $this->insertMarks($mark, $traineeId, $examId,$courseId);
            }
        }
        return redirect('/marksheet')->with('status','Mark Insert successfully');


    }
    private function insertMarks($mark,$traineeId,$examId,$courseId)
    {
        $markIn=new Marksheet();
        $markIn->trainee_id=$traineeId;
        $markIn->mark=$mark;
        $markIn->exam_id=$examId;
        $markIn->course_id=$courseId;
        $markIn->save();

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
        $traineeName = User::where('id', '=', $marksheet->trainee_id)->pluck('name');
        return view('marksheet/edit',compact('marksheet','traineeName'));
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
        return redirect('listOfstudentsAndMarks/'.$marksheet->course_id)->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        $marksheet->delete();
        return redirect('listOfstudentsAndMarks/'.$marksheet->course_id)->with('status','Deleted successfully');
    }

    public function getTrainee($examId,$course_id)
    {
        //dd($examId);
        $trainees = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('traineecourses','role_user.user_id','=','traineecourses.trainee_id')
            ->where('role_user.role_id',3)
            ->where('traineecourses.course_id',$course_id)->get();
        //$trainees=User::all();
        //dd($trainees);
        return view('marksheet/create',compact('trainees','examId'));
    }

    public function listOfstudentsAndMarks($courseId)
    {
//        dd($courseId);
        $marksheets = DB::table('marksheets')
            ->join('users','marksheets.trainee_id','=','users.id')
            ->join('role_user','marksheets.trainee_id','=','role_user.user_id')
            ->select('marksheets.id','marksheets.course_id','marksheets.exam_id','marksheets.trainee_id','marksheets.mark','users.name')
            ->where('role_user.role_id',3)
            ->where('marksheets.course_id',$courseId)
            ->get();
        //dd($marksheets);
        //$marksheets=Marksheet::all();
        $exams=Exam::all();
        return view('marksheet/listOfstudentsAndMarks',compact('marksheets','exams'));
    }
}

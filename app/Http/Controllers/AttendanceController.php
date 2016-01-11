<?php

namespace App\Http\Controllers;

use App\TraineeCourse;
use App\TrainerCourse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceFormRequest;
use App\Http\Requests\AttendanceDateFormReauest;
use App\Attendance;
use App\Course;
use App\Info;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
class AttendanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('trainer', ['only' => ['preform_fill', 'updateAttendance', 'editAttendance','store_attendance','show_attendance_form_function']]);//for selected multiple files
        //$this->middleware('auth',['except'=>'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //for admin part
    public function AdminAllAttendance($course_id)
    {
        $attendance=array();
        $sessions=array();
         $all_sessions=Attendance::whereCourse_id($course_id)->select('session_name')->get();
        $k=0;
        foreach($all_sessions as $session_name){
            $sessions[$k++]=$session_name->session_name;
        }
        $j=1;
        for($i=0;$i<5;$i++) {
            $j--;
            $date=date('Y-m-d',strtotime("$j days"));
            foreach ($sessions as $session_name) {
                $present = Attendance::whereCourse_id($course_id)
                    ->where('session_name', '=', $session_name)
                    ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 00:00:00'))
                    ->where('trainee_attendance', '=', 'P')
                    ->count('id');
                $absent = Attendance::whereCourse_id($course_id)
                    ->where('session_name', '=', $session_name)
                    ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 00:00:00'))
                    ->where('trainee_attendance', '=', 'A')
                    ->count('id');
                $attendance[$date][$session_name]=array('session_name'=>$session_name,'present' => $present, 'absent' => $absent);
            }

        }

        return view('attendances.admin.all_attendance_show')->with('attendance',$attendance)->with('course_id',$course_id);
    }

    public function showDateAdminAttendance(AttendanceDateFormReauest $request){
        $course_id=$request->get('course_id');
        $date=$request->get('date');
        $date_attendance=array();
        $sessions=array();
        $all_sessions=Attendance::whereCourse_id($course_id)->select('session_name')->get();
        $k=0;
        foreach($all_sessions as $session_name){
            $sessions[$k++]=$session_name->session_name;
        }
        foreach ($sessions as $session_name) {
            $present = Attendance::whereCourse_id($course_id)
                ->where('session_name', '=', $session_name)
                ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 00:00:00'))
                ->where('trainee_attendance', '=', 'P')
                ->count('id');
            $absent = Attendance::whereCourse_id($course_id)
                ->where('session_name', '=', $session_name)
                ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . ' 00:00:00'))
                ->where('trainee_attendance', '=', 'A')
                ->count('id');
            $date_attendance[$session_name]=array('session_name'=>$session_name,'present' => $present, 'absent' => $absent);
        }
        $course_name = $this->course_name_by_course_id($course_id);
        $attendance=array();
        $j=1;
        for($i=0;$i<5;$i++) {
            $j--;
            $day=date('Y-m-d',strtotime("$j days"));
            foreach ($sessions as $session_name) {
                $present = Attendance::whereCourse_id($course_id)
                    ->where('session_name', '=', $session_name)
                    ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $day . ' 00:00:00'))
                    ->where('trainee_attendance', '=', 'P')
                    ->count('id');
                $absent = Attendance::whereCourse_id($course_id)
                    ->where('session_name', '=', $session_name)
                    ->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $day . ' 00:00:00'))
                    ->where('trainee_attendance', '=', 'A')
                    ->count('id');
                $attendance[$day][$session_name]=array('session_name'=>$session_name,'present' => $present, 'absent' => $absent);
            }
        }
        return view('attendances.admin.all_attendance_show')->with('attendance',$attendance)->with('date_attendance',$date_attendance)->with('course_id',$course_id)->with('date',$date)->with('course_name',$course_name);
    }

    public function DateWiseAttendance($course_id,$session_name,$date){

        $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->where("trainee_attendance","P")->select('trainee_id')->get();
        $present_att=array();
        $i=0;
        foreach($presents as $present){
            $present=User::whereId($present->trainee_id)->select('name')->firstorFail();
            $present_att[$i++]=$present->name;
        }

        $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->where("trainee_attendance","A")->select('trainee_id')->get();
        $absent_att=array();
        $j=0;
        foreach($absents as $absent){
            $absent=User::whereId($absent->trainee_id)->select('name')->firstorFail();
            $absent_att[$j++]=$absent->name;
        }
        $course_name = $this->course_name_by_course_id($course_id);
        return view('attendances.admin.date_session_attendance',compact('present_att','absent_att','attendance'))
            ->with('date', $date)
            ->with('session_name', $session_name)
            ->with('course_id', $course_id)
            ->with('course_name', $course_name);
    }

    public function AdminAttendanceShowTrainee($course_id,$session_name,$date){

        $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->where("trainee_attendance","P")->select('trainee_id')->get();
        $present_att=array();
        $i=0;
        foreach($presents as $present){
            $present=User::whereId($present->trainee_id)->select('name')->firstorFail();
            $present_att[$i++]=$present->name;
        }

        $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->where("trainee_attendance","A")->select('trainee_id')->get();
        $absent_att=array();
        $j=0;
        foreach($absents as $absent){
            $absent=User::whereId($absent->trainee_id)->select('name')->firstorFail();
            $absent_att[$j++]=$absent->name;
        }
        $course_name = $this->course_name_by_course_id($course_id);
        return view('attendances.admin.show_attendance_trainee',compact('present_att','absent_att'))
            ->with('date', $date)
            ->with('session_name', $session_name)
            ->with('course_name', $course_name);
    }
  /*
//no need of this function
    public  function traineeAttendance(){
        $user_id = Auth::user()->id;
        $course_ids=TraineeCourse::where('trainee_id',$user_id)->select('course_id')->get();
        //$course_ids=Info::where('trainee_login_id', $user_id)->get();
        $courseAttendance=[];
        foreach($course_ids as $course_id){
            $course_name = $this->course_name_by_course_id($course_id->course_id);
            $absent=Attendance::where('course_id',$course_id->course_id)
                ->where('trainee_id',$user_id)
                ->where('trainee_attendance','=','P')
                ->count('id');
            $courseAttendance[]=array('course_name'=>$course_name,'absent'=>$absent);
        }

        //return print_r($courseAttendance);
        return view('attendances.trainee.trainee_info' )->with('courseAttendance',$courseAttendance);
    }

*/
    //for trainer part
    public function preform_fill()
    {
        $user_id = Auth::user()->id;
        $courses = Trainercourse::wheretrainer_id($user_id)->get();
        $all_course = [];
        foreach ($courses as $course) {
            $all_course[] = Course::whereId($course->course_id)->firstOrFail();
        }

        return view('attendances.preform_fill' )->with('courses', $all_course);
    }

    public function show_attendance_form_function(AttendanceFormRequest $request)
    {
        $course_id = $request->get('course_id');
        $date = $request->get('date');
        $session = $request->get('session');
        $check=Attendance::whereCourse_id($course_id)->whereSession_name($session)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->count('id');
        if($check){
            $course_id = $request->get('course_id');
            $session = $request->get('session');
            $day = $request->get('date');
            $trainees = DB::table('traineecourses')
                ->join('users','traineecourses.trainee_id','=','users.id')
                ->where('traineecourses.course_id',$course_id)
                ->select('name','users.id')
                ->get();
            $course_name = $this->course_name_by_course_id($course_id);
            $current_attendance = Attendance::whereCourse_id($course_id)->whereSession_name($session)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->get();
            return view('attendances.editAttendance',compact('current_attendance'))
                ->with('trainee_list', $trainees)
                ->with('date', $day)
                ->with('session', $session)
                ->with('course_name', $course_name)
                ->with('course_id', $course_id) ;
        }
        else{
            $trainees = DB::table('traineecourses')
                ->join('users','traineecourses.trainee_id','=','users.id')
                ->where('traineecourses.course_id',$course_id)
                ->select('name','users.id')
                ->get();
            $course_name = $this->course_name_by_course_id($course_id);
            return view('attendances.attendance_create')
                ->with('trainee_list', $trainees)
                ->with('date', $date)
                ->with('session', $session)
                ->with('course_name', $course_name)
                ->with('course_id', $course_id) ;
        }
    }

    public function store_attendance(AttendanceFormRequest $request)
    {
        $course_id = $request->get('course_id');
        $session_name = $request->get('session');
        $day = $request->get('date');
        $check=Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->count('id');
        if($check){
            $trainees = DB::table('traineecourses')
                ->join('users','traineecourses.trainee_id','=','users.id')
                ->where('traineecourses.course_id',$course_id)
                ->select('name','users.id')
                ->get();
            $course_name = $this->course_name_by_course_id($course_id);
            return view('attendances.attendance_create')
                ->with('trainee_list', $trainees)
                ->with('date', $request->get('date'))
                ->with('session', $request->get('session'))
                ->with('course_name', $course_name)
                ->with('course_id', $course_id)
                ->with('warning',"This attendance is already entered.");
        }
        else {
            $trainee_ids = TraineeCourse::whereCourse_id($course_id)->lists('trainee_id');

            foreach ($trainee_ids as $trainee_id) {
                $attendance = new Attendance();
                $attendance->day = Carbon\Carbon::createFromFormat('Y-m-d', $day);
                $attendance->trainee_id = $trainee_id;
                $attendance->session_name = $session_name;
                $attendance->course_id = $course_id;
                $attendance->trainee_attendance = $request->get('ta__' . $trainee_id);
                $attendance->save();
            }
            $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $day . ' 00:00:00'))->where("trainee_attendance", "P")->select('trainee_id')->get();
            $present_att = array();
            $i = 0;
            foreach ($presents as $present) {
                $present = User::whereId($present->trainee_id)->select('name')->firstorFail();
                $present_att[$i++] = $present->name;
            }

            $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day', '=', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $day . ' 00:00:00'))->where("trainee_attendance", "A")->select('trainee_id')->get();
            $absent_att = array();
            $j = 0;
            foreach ($absents as $absent) {
                $absent = User::whereId($absent->trainee_id)->select('name')->firstorFail();
                $absent_att[$j++] = $absent->name;
            }

            $course_name = $this->course_name_by_course_id($course_id);
            $session = $request->get('session');
            $date = $request->get('date');
            return view('attendances.attendance_show', compact('present_att', 'absent_att'))->with('date', $date)
                ->with('session', $session)
                ->with('course_name', $course_name)
                ->with('course_id', $course_id);
        }
   }
    public function course_name_by_course_id($id){
        return Course::findOrFail($id)->course_name;
    }

    public function editAttendance(Request $request){
        $course_id = $request->get('course_id');
        $session = $request->get('session');
        $day = $request->get('date');
        /*
        $trainee_list = Info::whereCourse_id($course_id)->get();
        $course_name = $this->course_name_by_course_id($course_id);
        */
        $trainees = DB::table('traineecourses')
            ->join('users','traineecourses.trainee_id','=','users.id')
            ->where('traineecourses.course_id',$course_id)
            ->select('name','users.id')
            ->get();
        $course_name = $this->course_name_by_course_id($course_id);
        $current_attendance = Attendance::whereCourse_id($course_id)->whereSession_name($session)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->get();
        return view('attendances.editAttendance',compact('current_attendance'))
            ->with('trainee_list', $trainees)
            ->with('date', $day)
            ->with('session', $session)
            ->with('course_name', $course_name)
            ->with('course_id', $course_id) ;
    }
    public function updateAttendance(Request $request){

        $course_id = $request->get('course_id');
        $session_name = $request->get('session');
        $day = $request->get('date');
        $trainee_ids=TraineeCourse::whereCourse_id($course_id)->lists('trainee_id');
        //$trainee_ids=Info::whereCourse_id($course_id)->lists('trainee_login_id');
        foreach ($trainee_ids as $trainee_id) {
            $attendance = Attendance::wheretrainee_id($trainee_id)->whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->firstorFail();
            $attendance->trainee_attendance = $request->get('ta__'.$trainee_id);
            $attendance->update();
        }

        $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","P")->select('trainee_id')->get();
        $present_att=array();
        $i=0;
        foreach($presents as $present){
            $present=User::whereId($present->trainee_id)->select('name')->firstorFail();
            $present_att[$i++]=$present->name;
        }

        $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","A")->select('trainee_id')->get();
        $absent_att=array();
        $j=0;
        foreach($absents as $absent){
            $absent=User::whereId($absent->trainee_id)->select('name')->firstorFail();
            $absent_att[$j++]=$absent->name;
        }

        $course_name = $this->course_name_by_course_id($course_id);
        $session = $request->get('session');
        $date = $request->get('date');
        return view('attendances.attendance_show',compact('present_att','absent_att'))->with('date', $date)
            ->with('session', $session)
            ->with('course_name', $course_name)
            ->with('course_id', $course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show_attendance(){

        return 'show_attendance';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

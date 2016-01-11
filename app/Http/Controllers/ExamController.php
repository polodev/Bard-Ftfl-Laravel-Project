<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
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
        $exams=Exam::whereadmin_id(auth()->user()->id)->get()->sortByDesc('id');
        return view('exam.index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::lists('course_name','id');
        return view('exam.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ExamFormRequest $request)
    {
        //dd($request);
        $input=$request->all();
        $trainerId=auth()->user()->id;
        //dd($trainerId);
        $exam=new Exam();

        $exam->title=$input['title'];
        $exam->exam_description=$input['exam_description'];
        $exam->exam_date=$input['exam_date'];
        $exam->course_id=$input['course_id'];
        $exam->exam_mark=$input['exam_mark'];
        $exam->admin_id=$trainerId;
        //$exam->admin_id=$input['admin_id'];//user id
        $exam->save();

        return redirect('/exam')->with('status','Exam inserted successfully');

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
        $courses=Course::lists('course_name','id');
        $data=Exam::findOrNew($id);
        return view('exam.edit', compact('data','courses'));
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
        $examData=Exam::whereid($id)->firstOrFail();

        //dd($input,$id);
        $examData->title=$request->get('title');
        $examData->exam_description=$request->get('exam_description');
        $examData->exam_date=$request->get('exam_date');
        $examData->course_id=$request->get('course_id');
        $examData->exam_mark=$request->get('exam_mark');
        $examData->save();


        /*$examUpdate = new Exam(array(

            'title' => $request->get('title'),
            'exam_description' => $request->get('exam_description'),
            'exam_date' => $request->get('exam_date'),
            'course_id' => $request->get('course_id'),
            'exam_mark' => $request->get('exam_mark')

        ));
        $examUpdate->save();*/
        return redirect('/exam')->with('status','Exam Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $ticket = Exam::whereid($id)->firstOrFail();
        $ticket->delete();
        return redirect('/exam')->with('status', 'The ticket '.$id.' has been deleted!');
    }
}

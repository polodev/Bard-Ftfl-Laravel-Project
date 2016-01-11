<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingForumRequest;
use App\TrainingForum;
use App\UserTraining;
use App\Course;
use App\TraineeCourse;
use Auth;
use DB;

class ForumController extends Controller
{
        public function __construct(){
        $this->middleware('trainee');

    }
    
    public function forums()
    {
        $id = Auth::user()->id;
       //dd($id);
         //$trainer = TrainerCourse::where('trainer_id','=', $id)->get(); 
         $trainer = DB::table('traineecourses') 
                    ->join('courses', 'courses.id', '=', 'traineecourses.course_id')
                    ->join('trainings', 'courses.training_id', '=', 'trainings.id')
                    ->where('traineecourses.trainee_id', $id)
                    ->get();
        
         //dd($trainer);
         foreach($trainer as $t)
         {
             $id = $t->training_id;  
             $tra = DB::table('trainings') 
                    ->where('id', $id)
                    ->get(); 
             
         }
        return view('training_forum.trainings', compact('tra'));
        //dd($tra);
        //return view('');
       // dd($tra);
           //return view('trainers.select_course', compact('trainer'));
//        $id = Auth::User()->id;
//        $trainingName = DB::table('trainings')
//            ->join('courses', 'courses.id', '=', 'courses.training_id')
//            ->join('traineecourses', 'traineecourses.course_id','=','courses.id') 
//            ->join('users','users.id', '=', 'traineecourses.trainee_id')
//            ->where('users.id', '=', $id)
//            ->get();
       
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$userId = Auth::User()->id;
       // $contents = TrainingForum::all();
        $t_id = $id;
        $contens = DB::table('users')
            ->join('training_forums','training_forums.user_id', '=', 'users.id')
            ->where('training_forums.training_id', $id)
            ->select('training_forums.id as id','users.name as name','training_forums.title as title')
            ->get();
       //return contens;
        return view('training_forum.forum_index')->with('contents',$contens)->with('t_id', $t_id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = TrainingForum::all();
        return view('training_forum.forum_create');
    }

    public function store(TrainingForumRequest $request, $id)
    {
       //return $request->all();

        $content = new TrainingForum(array(
            'training_id'=>$id,
            'user_id'=> Auth::user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),

        ));

            $content->save();
            return redirect('/forumIndex/'.$id)->with('status', 'Your query has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = TrainingForum::whereid($id)->firstOrFail();
       // return view('training_forum.forum_show', compact('ticket'));
        //for comment
        $comments = DB::table('training_forums')
                ->join('comments', 'comments.post_id', '=', 'training_forums.id')
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->where('training_forums.id', $id)
                ->get();
        return view('training_forum.forum_show', compact('ticket', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = TrainingForum::whereid($id)->firstOrFail();
        return view('training_forum.forum_edit', compact('ticket'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingForumRequest $request, $id)
    {
        $ticket = TrainingForum::whereid($id)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('');

        $ticket->save();
        return redirect('/forumIndex/'.$id)->with( 'The post has been updated!');
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

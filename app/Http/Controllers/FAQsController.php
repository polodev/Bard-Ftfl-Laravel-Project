<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Training;
use App\Http\Controllers\Controller;

class FAQsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create','store','edit','update','destroy','adminList']]);//for selected multiple files
        //$this->middleware('auth',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training_names=Training::all();
        return view('frequently_asked_questions/create_frequently_asked_question',compact('training_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FAQsRequestForm $request)
    {
        $FAQs = new FAQ(array(
            'training_id' => $request->get('training_id'),
            'author_name'=>$request->get('author_name'),
            'question'=>$request->get('question'),
            'answer'=>$request->get('answer')

        ));

        $FAQs->save();
        return redirect('/create_frequently_asked_question')->with('status', 'Your Answer is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    public function adminList()
    {
        $FAQs=FAQ::orderBy('created_at','desc')->get();
        $trainings=Training::select('id','training_name')->get();
        return view('frequently_asked_questions.show',compact('FAQs','trainings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqs=FAQ::whereid($id)->firstOrFail();
        $trainings=Training::all();
        return view('frequently_asked_questions.edit',compact('faqs'))->with('trainings',$trainings);
        return $faqs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\FAQsRequestForm $request, $id)
    {
        $FAQs =  FAQ::whereid($id)->firstOrFail();
        $FAQs->training_id = $request->get('training_id');
        $FAQs->author_name    = $request->get('author_name');
        $FAQs->question=$request->get('question');
        $FAQs->answer=$request->get('answer');
        $FAQs->save();
        //Training::where('training_slug',$training_slug)->update($training->toArray());
        return redirect(action('FAQsController@edit', $FAQs->id))->with('status', 'Information  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FAQ = FAQ::whereid($id)->firstOrFail();
        $FAQ->delete();
        return redirect('/frequently_asked_questions')->with('status', 'The FAQs information has been deleted!');
    }
}

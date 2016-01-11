<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Volume;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IssueController extends Controller
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
        $issues=Issue::all();
        return view('issue.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $volume=Volume::lists('title','id');
        return view('issue.create',compact('volume'));
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
        $issue=new Issue(
            array(
                'title'=>$request->get('title'),
                'description'=>$request->get('description'),
                'language'=>$request->get('language'),
                'volume_id'=>$request->get('volume_id')
            )
        );
        $issue->save();
        return redirect('/issue')->with('status','Issue created successfully');
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
        $volume=Volume::lists('title','id');

        $issue=Issue::whereid($id)->firstOrfail();
        return view('issue.edit',compact('issue','volume'));
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
        $issue=Issue::whereid($id)->firstOrfail();
        $issue->title=$request->get('title');
        $issue->description=$request->get('description');
        $issue->language=$request->get('language');
        $issue->save();
        return redirect('/issue')->with('status','Issue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue=Issue::whereid($id)->firstOrfail();
        $issue->delete();
        return redirect('/issue')->with('status','issue deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Volume;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolController extends Controller
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
        $volumes=Volume::all()->sortByDesc('id');
        return view('volume.index',compact('volumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $journals=Journal::lists('title','id');
        return view('volume.create',compact('journals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $input=$request->all();
        $volume=new Volume();

        $volume->title=$input['title'];
        $volume->description=$input['description'];
        $volume->language=$input['language'];
        $volume->journals_id=$input['journals_id'];
        $volume->save();

        return redirect('/volume')->with('status','volume inserted successfully');
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
        $journals=Journal::lists('title','id');
        $volume = Volume::whereid($id)->firstOrFail();
        return view('volume.edit', compact('volume','journals'));
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
        $volume = Volume::whereid($id)->firstOrFail();

        //dd($input,$id);
        $volume->title = $request->get('title');
        $volume->description = $request->get('description');
        $volume->language = $request->get('language');
        $volume->journals_id = $request->get('journals_id');

        $volume->save();

        return redirect('/volume')->with('status','volume updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volume = Volume::whereid($id)->firstOrFail();
        $volume->delete();
        return redirect('/volume')->with('status', 'The ticket '.$id.' has been deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Book;
use App\Calender;
use App\Category;
use App\File;
use App\Issue;
use App\Journal;
use App\Modules;
use App\Projects;
use App\Volume;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class publicJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals=Journal::all();
        return view('public_journal.index',compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Volumes($id)
    {
        $journal = Journal::where('id', '=', $id)->pluck('title');
        $volumes=Volume::wherejournals_id($id)->get();
        return view('public_journal.volumes',compact('volumes','journal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function issues($id)
    {
        $volumes = Volume::where('id', '=', $id)->pluck('title');
        $issues=Issue::wherevolume_id($id)->get();
        return view('public_journal.issues',compact('issues','volumes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function file($id)
    {
        $issue = Issue::where('id', '=', $id)->pluck('title');
        //dd($issue);
        $files=File::whereissue_id($id)->get();
        return view('public_journal.file',compact('files','issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function public_project()
    {
        $projects=Projects::all();
        return view('public_journal.public_project',compact('projects'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function public_modules($id)
    {
        $projectName = Projects::where('id', '=', $id)->pluck('title');
        $moduleDara=Modules::whereproject_id($id)->get();
        return view('public_journal.public_modules',compact('projectName','moduleDara'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function public_category()
    {
        $projects=Category::all();
        return view('public_journal.public_category',compact('projects'));

    }

    public function public_book($id)
    {
        $projectName = Category::where('id', '=', $id)->pluck('title');
        $moduleDara=Book::wherecategory_id($id)->get();
        return view('public_journal.public_book',compact('projectName','moduleDara'));

    }

    public function calendar_public()
    {
        $calenders=Calender::all();
        return view('calendar.calendar_public',compact('calenders'));


    }
}

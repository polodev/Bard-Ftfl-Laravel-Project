<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementFormRequest;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['index', 'store','show','edit','update','destroy','announcement']]);//for selected multiple files
        //$this->middleware('auth',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::orderBy('created_at','desc')->get();
        return view('announcements.index', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicIndex(){
        $announcement = Announcement::orderBy('created_at','desc')->get();
        return view('announcements.public_announcement_pages.index', compact('announcement'));
    }
    public function announcement()
    {
        return view('announcements/announcement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementFormRequest $request)
    {
        $announcement = new Announcement(array(
            'heading' => $request->get('heading'),
            'content'=>$request->get('content'),
        ));

        $announcement->save();
        return redirect('/announcement_create')->with('status', 'Your information is inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::whereid($id)->firstOrFail();
        return view('announcements.show', compact('announcement'));
    }
    public function publicShow($id)
    {
        $announcement = Announcement::whereid($id)->firstOrFail();
        return view('announcements.public_announcement_pages.show', compact('announcement'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::whereid($id)->firstOrFail();
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementFormRequest $request, $id)
    {
        $announcement =  Announcement::whereid($id)->firstOrFail();
        $announcement->heading = $request->get('heading');
        $announcement->content    = $request->get('content');
        $announcement->save();
        //Training::where('training_slug',$training_slug)->update($training->toArray());
        return redirect(action('AnnouncementController@edit', $announcement->id))->with('status', 'Information  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::whereid($id)->firstOrFail();
        $announcement->delete();
        return redirect('/announcements')->with('status', 'The announcement information has been deleted!');
    }
}

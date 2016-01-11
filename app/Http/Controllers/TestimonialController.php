<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TestimonialRequestForm;
use App\Testimonial;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create','store','show','destroy']]);//for selected multiple files
        //$this->middleware('auth',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training_names=Training::all();
        return view('testimonials/create_testimonial',compact('training_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequestForm $request)
    {
        $testimonial = new Testimonial(array(
            'training_id' => $request->get('training_id'),
            'author_name'=>$request->get('author_name'),
            'testimonial'=>$request->get('testimonial'),

        ));

        $testimonial->save();
        return redirect('/create_testimonial')->with('status', 'Your Testimonial is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $testimonials=Testimonial::orderBy('created_at','desc')->get();
        $trainings=Training::select('id','training_name')->get();
        return view('testimonials.show',compact('testimonials','trainings'));
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
        $testimonial=Testimonial::whereid($id)->firstOrFail();
        $testimonial->delete();
        return redirect('/testimonials')->with('status', 'The Testimonial information has been deleted!');
    }
}

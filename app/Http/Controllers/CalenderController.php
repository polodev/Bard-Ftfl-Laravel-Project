<?php

namespace App\Http\Controllers;

use App\Calender;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CalenderController extends Controller
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
        $calenders=Calender::all();
        return view('calendar.index',compact('calenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("calendar.calender");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CalenderFormRequest $request)
    {

        $input=$request->all();
        if(isset($input['img'])) {
            $Image = $input['img'];
            //dd($Image);
            $Image = $this->imageUpload($Image);
            //dd($Image);
            $input['img'] = $Image;
        }
        else{
            $Image = "reg_img/default.gif";
        }

        $calender = new Calender(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'img' => $Image

        ));
        $calender->save();


        return redirect('/calendar')->with('status','calendar inserted successfully');

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
        $calender=Calender::whereid($id)->firstOrfail();
        return view('calendar.edit',compact('calender'));
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
        $input=$request->all();
        if(isset($input['img'])) {
            $Image = $input['img'];
            $Image = $this->imageUpload($Image);
        }
        else{
            $Image = Calender::where('id', '=', $id)->pluck('img');
            //dd($Image);

        }
        $calender=Calender::whereid($id)->firstOrfail();
        $calender->title=$request->get('title');
        $calender->description=$request->get('description');
        $calender->img=$Image;
        $calender->save();
        return redirect('/calendar')->with('status','calendar updated successfully');
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

    public function imageUpload($Image)
    {

        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="reg_img";
        if($validate)
        {
            $imageOriginalName=$Image->getClientOriginalName();//get image full name
            $basename = substr($imageOriginalName, 0, strrpos($imageOriginalName, "."));//get image name without extension
            $basename=str_replace(" ", "", $basename);
            $extension =$Image->getClientOriginalExtension();//get image extension only
            $imageName=$basename.date("YmdHis").'.'.$extension;//make new name

            $imageMoved=$Image->move($path, $imageName);
            if($imageMoved)
            {
                $imagePath=$path.'/'.$imageName;
                return $imagePath;
            }

        }
    }

}

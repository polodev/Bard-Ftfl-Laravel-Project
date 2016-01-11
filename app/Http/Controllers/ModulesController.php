<?php

namespace App\Http\Controllers;

use App\Modules;
use App\Projects;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ModulesController extends Controller
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
        $alldata=Modules::all();
        return view('modules/index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Projects::lists('title','id');
        return view('modules.create',compact('projects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        if(!isEmpty($input['filepath'])) {
            $imgPath = $this->imageUpload($input['filepath']);
            $input['filepath'] = $imgPath;
        }
        else{
            $input['filepath'] = "modules/image.jpeg";
        }
        Modules::create($input);
        return redirect('BARD_modules')->with('status','Create successfully');
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
        $issues=Projects::lists('title','id');
        $file=Modules::findOrFail($id);
        return view('modules.edit',compact('file','issues'));

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
        if(isset($input['filepath'])) {
            $imgPath = $this->imageUpload($input['filepath']);
            $input['filepath'] = $imgPath;
        }
        else{
            $input['filepath'] = Modules::where('id', '=', $id)->pluck('filepath');

        }
        $data=Modules::findOrFail($id);
        $data->update($input);
        return redirect('BARD_modules')->with('status','Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Modules::findOrFail($id);
        $data->delete();
        return redirect('BARD_modules')->with('status','Delete Complete');

    }

    public function imageUpload($Image)
    {

        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="modules";
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

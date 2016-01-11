<?php

namespace App\Http\Controllers;

use App\Journal;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JournalController extends Controller
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
        $journals=Journal::all();
        return view('journal.index',compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('journal.create');
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
        /*$journal->Logo=$input['logo'];*/
        if(isset($input['img'])) {
            $Image = $input['img'];
            //dd($Image);
            $Image = $this->imageUpload($Image);
            //dd($Image);
            $input['img'] = $Image;
        }
        else{
            $input['img'] = "reg_img/default.gif";
        }

        $journal=new Journal();
        $journal->title=$input['title'];
        $journal->description=$input['description'];
        $journal->frequency=$input['frequency'];
        $journal->logo=$input['img'];
        $journal->language=$input['language'];
        $journal->save();
        return redirect('/BARD_journal');
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
        $journals=Journal::whereid($id)->firstOrfail();
        return view('journal.edit',compact('journals'));
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
        $journals=Journal::whereid($id)->firstOrfail();

        if(isset($request->img)) {
            $Image=$request->img;
            //dd($Image);
            $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = Journal::where('id', '=', $id)->pluck('logo');
            //dd($imagePath);
        }

        $journals->title=$request->get('title');
        $journals->description=$request->get('description');
        $journals->frequency=$request->get('frequency');
        $journals->logo=$imagePath;

        $journals->language=$request->get('language');
        $journals->save();
        return redirect('/BARD_journal');
    }

    public function imageUpload($Image)
    {
        //$LastContentID = DB::table('com_monthlyimagefoldername')->max('FolderID');
        //$imgPath = monthlyFolderModel::where('FolderID', '=', $LastContentID)->pluck('FolderName');

        $rules=array('image'=>'image');
        //$validate=Validator::make(array("productImage"=>$Image),$rules);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journals=Journal::whereid($id)->firstOrfail();
        $journals->delete();
        return redirect('/journal');
    }
}

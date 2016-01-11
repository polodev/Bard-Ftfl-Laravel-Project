<?php

namespace App\Http\Controllers;

use App\Registration;
use App\Educations;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['only' => ['index','show']]);
        $this->middleware('trainee', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Registration::where('deletable','=',1)->orderBy('id','desc')->paginate(10);
        //dd($datas);
        return view('registration/index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RegFormRequest $request)
    {

        $input=$request->all();


        $eduData=new Educations();

        $eduData->name_of_degree=$input['name_of_degree'];
        $eduData->subject=$input['subject'];
        $eduData->Year=$input['Year'];
        $eduData->board=$input['board'];

        $eduData->save();
        $lastEduId= $eduData->id;
        //dd($lastInsertedId);


        if(isset($input['img_path'])) {
            $Image = $input['img_path'];
            $Image = $this->imageUpload($Image);
            //dd($Image);
            $input['img_path'] = $Image;
        }
        else{
            $input['img_path'] = "reg_img/default.gif";
        }
        $regData = new Registration();
        $regData->bengali_name=$input['bengali_name'];
        $regData->english_name=$input['english_name'];
        $regData->father_name=$input['father_name'];
        $regData->mother_name=$input['mother_name'];
        $regData->date_of_birth=$input['date_of_birth'];
        $regData->village=$input['village'];
        $regData->post_office=$input['post_office'];
        $regData->upazila=$input['upazila'];
        $regData->district=$input['district'];
        $regData->id_code=$input['id_code'];
        $regData->organization=$input['organization'];
        $regData->telephone=$input['telephone'];
        $regData->fax=$input['fax'];
        $regData->e_mail=$input['e-mail'];
        $regData->mobile=$input['mobile'];
        $regData->joining_date=$input['joining_date'];
        $regData->service_code=$input['service_code'];
        $regData->marital_status=$input['marital_status'];
        $regData->contact_person_name=$input['contact_person_name'];
        $regData->contact_person_address=$input['contact_person_address'];
        $regData->contact_person_tel=$input['contact_person_tel'];
        $regData->participant_rel=$input['participant_rel'];
        $regData->img_path=$input['img_path'];
        $regData->edu_id=$lastEduId;
        $regData->user_id=Auth::user()->id;
        $regData->save();





        return redirect()->intended('trainee')->with('status', 'Create Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Registration::whereid($id)->firstOrFail();
        return view('registration/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Registration::whereid($id)->firstOrFail();
        $eduData=Educations::whereid($data->edu_id)->firstOrFail();
        return view('registration.edit', compact('data','eduData'));
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

        if(isset($input['img_path'])) {
            $Image=$input['img_path'];
            //dd($Image);
            $imagePath=$this->imageUpload($Image); //call public function imageUpload for small img
        }
        else{
            $imagePath = Registration::where('id', '=', $id)->pluck('img_path');
            //dd($imagePath);
        }

        $regData=Registration::whereid($id)->firstOrFail();

        //dd($input,$id);
        $regData->bengali_name=$request->get('bengali_name');
        $regData->english_name=$request->get('english_name');
        $regData->father_name=$request->get('father_name');
        $regData->mother_name=$request->get('mother_name');
        $regData->date_of_birth=$request->get('date_of_birth');
        $regData->village=$request->get('village');
        $regData->post_office=$request->get('post_office');
        $regData->upazila=$request->get('upazila');
        $regData->district=$request->get('district');
        $regData->id_code=$request->get('id_code');
        $regData->organization=$request->get('organization');
        $regData->telephone=$request->get('telephone');
        $regData->fax=$request->get('fax');
        $regData->e_mail=$request->get('e-mail');
        $regData->mobile=$request->get('mobile');
        $regData->joining_date=$request->get('joining_date');
        $regData->service_code=$request->get('service_code');
        $regData->marital_status=$request->get('marital_status');
        $regData->contact_person_name=$request->get('contact_person_name');
        $regData->contact_person_address=$request->get('contact_person_address');
        $regData->contact_person_tel=$request->get('contact_person_tel');
        $regData->participant_rel=$request->get('participant_rel');
        $regData->img_path=$imagePath;
        //$regData->edu_id=$lastEduId;
        //$regData->user_id=1;
        $regData->save();


        DB::table('educations')
            ->where('id', $regData->edu_id)
            ->update(['name_of_degree' => $request->name_of_degree,'subject' => $request->subject,'Year' => $request->Year,'board' => $request->board]);
        return redirect()->intended('trainee')->with('status', 'Update Success!');
        //return redirect()->intended('registration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Registration::find($id);
        $department->delete();
    }

    public function imageUpload($Image)
    {

        $rules=array('image'=>'image');
        $validate=Validator::make(array("productImage"=>$Image),$rules);
        $path="reg_img";
        if($validate)
        {
            $ImageExtensions = array('jpg', 'png', 'jpeg','gif','tif','tiff','bmp');

            $imageOriginalName=$Image->getClientOriginalName();//get image full name
            $basename = substr($imageOriginalName, 0, strrpos($imageOriginalName, "."));//get image name without extension
            $basename=str_replace(" ", "", $basename);
            $extension =$Image->getClientOriginalExtension();//get image extension only

            if (in_array($extension, $ImageExtensions)) {

                $imageName = $basename . date("YmdHis") . '.' . $extension;//make new name

                $imageMoved = $Image->move($path, $imageName);
            }
            else{
                return redirect()->intended('trainee')->with('status', 'Data not Inserted. Please give a image !');
            }
            if($imageMoved)
            {
                $imagePath=$path.'/'.$imageName;
                return $imagePath;
            }

        }
    }

}

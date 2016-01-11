<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use \Input as Input;


class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function slider_index()
    {
        $all_slider = Slider::orderBy('position', 'asc')->get();
        return view('slider_admin/index')->with('all_slider', $all_slider);
    }

    public function upload_slider_image()
    {
        return view('slider_admin/upload_slider_image');
    }


    public function slider_image_store(SliderRequest $request)
    {
        $all_slider = Slider::all();
        if($all_slider->isEmpty()){
            $position = 1;            
        }else {
            $position = Slider::all()->max('position') + 1;
        }
        $slug = uniqid();
        $file = $request->file('slider_image');
        $file->move('uploads/', $slug . '__' .$file->getClientOriginalName());
        $file_text = $slug . '__' .$file->getClientOriginalName();
        $data = [
            'heading_text' => $request->get('heading_text'),
            'paragraph_text' => $request->get('paragraph_text'),
            'button_text' => $request->get('button_text'),
            'button_url' => $request->get('button_url'),
            'slider_image' => $file_text,
            'position' => $position
        ];
        $slider = new Slider($data);
        $slider->save();
        return redirect('/slider/all');
    }

    public function destroy($id)
    {
        $slider = Slider::whereId($id)->first();
        Slider::where('position', '>', $slider->position)->decrement('position');
        unlink('uploads/'.$slider->slider_image);
        $slider->delete();
        return redirect('/slider/all');
    }

    public function increase_slider_position($position)
    {
        if($position > 1){
            $current_id = Slider::wherePosition($position)->first()->id;
            $previous_id = Slider::wherePosition($position - 1)->first()->id;

            $current_slider = Slider::whereId($current_id)->first();
            $current_slider->position = $position - 1;
            $current_slider->save();

            $previous_slider = Slider::whereId($previous_id)->first();
            $previous_slider->position = $position;
            $previous_slider->save();
        }
        return redirect('slider/all');
    }

    public function decrease_slider_position($position)
    {
        $number_of_slider = Slider::all()->count();
        if($position < $number_of_slider){
            $current_id = Slider::wherePosition($position)->first()->id;
            $next_id = Slider::wherePosition($position + 1)->first()->id;

            $current_slider = Slider::whereId($current_id)->first();
            $current_slider->position = $position + 1;
            $current_slider->save();

            $next_slider = Slider::whereId($next_id)->first();
            $next_slider->position = $position;
            $next_slider->save();
        }
        return redirect('slider/all');

    }

}

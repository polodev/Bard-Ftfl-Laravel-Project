<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{	
public function gallery()
    {
	
        return view('gallery.gallery');
    }
	
    public function img()
    {
	
        return view('gallery.img');
    }
    
	 public function cafeteria()
    {
	
        return view('gallery.cafeteria');
    }
    
	 public function tour()
    {
	
        return view('gallery.tour');
    }
	 public function site()
    {
	
        return view('gallery.site');
    }

	public function program()
    {
    return view('gallery.program');
	}

	public function traininging()
	{
    return view('gallery.traininging');
	}
}

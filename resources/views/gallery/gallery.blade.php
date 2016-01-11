@extends('master.master')
@section('title', 'Gallery')
@section('script')


<link rel="stylesheet" type="text/css" href="{!!asset('/css/gallery.css')!!}">


@section('content')


    <div class="container">

        
		
            <div class="row">
				<center><h2><u>Albums</u></h2></center>
                     <div class="col-sm-12 col-md-12">
                        <div class="col-sm-3 col-md-3 gallery_gellary">
                            <div class="  gallery_image">
                                <a href="{!! URL::to('/gallery/img') !!}">
								<img src="https://lh3.googleusercontent.com/-92GXbanSCQ4/ViTxfa5p4kI/AAAAAAAAACg/iihpN41AM-0/s144-Ic42/bard1.jpg"  />
								</a>
								
                            </div>
                            <div class="gallery_title">
                                <a href="">BARD Pictures </a>
                            </div>
                        </div>
						
						<div class="col-sm-1 col-lg-1">
						</div>
						<div class="col-sm-3 col-lg-3 gallery_gellary">
                            <div class="  gallery_image">
                                
								<a  href="{!! URL::to('/gallery/cafeteria') !!}"><img src="https://lh3.googleusercontent.com/-uuCyHUlIyaU/ViTrBHQzR1E/AAAAAAAAAB8/dj0j1cU9gWI/s160-c-Ic42/Cafeteria.jpg" /></a>
                            </div>
                            <div class="gallery_title">
                                <a href="">Cafeteria</a>
                            </div>
                        </div>
						
						<div class="col-sm-1 col-lg-1">
						</div>
						
						<div class="col-sm-3 col-lg-3 gallery_gellary">
                            <div class=" gallery_image">
                                <a   href="{!! URL::to('/gallery/site') !!}">
								<img src="https://lh3.googleusercontent.com/-CYfBkMJ-n3M/ViTxiVZVIlI/AAAAAAAAADo/LV9Btaqku-M/s144-Ic42/site2.jpg"  />
								</a>
								
                            </div>
                            <div class="gallery_title">
                                <a href="">Site Seeing</a>
                            </div>
                        </div>
						
						<div class="col-sm-1 col-lg-1">
						</div>
						
						<div class="col-sm-3 col-lg-3 gallery_gellary">
                            <div class="  gallery_image">
                                <a  href="{!! URL::to('/gallery/tour') !!}">
									<img src="https://lh3.googleusercontent.com/-_PLMkO_J3xA/ViTxjXNoYvI/AAAAAAAAAD8/lZjUDbrJo7I/s800-Ic42/studytour.jpg" />
								</a>
								
                            </div>
                            <div class="gallery_title">
                                <a href="">Study Tour</a>
                            </div>
                        </div>
						<div class="col-sm-1 col-lg-1">
						</div>
						
						
						<div class="col-sm-3 col-lg-3 gallery_gellary">
                            <div class="  gallery_image">
                                <a  href="{!! URL::to('/gallery/traininging') !!}">
									<img src="https://lh3.googleusercontent.com/-fLNLch93o-8/ViTxlPG0idI/AAAAAAAAAEo/Phf_Yoo1pDI/s144-Ic42/training.gif"  />
								</a>
								
                            </div>
                            <div class="gallery_title">
                                <a href="">Training</a>
                            </div>
                        </div>
						
						<div class="col-sm-1 col-lg-1">
						</div>
						
						<div class="col-sm-3 col-lg-3 gallery_gellary">
                            <div class="  gallery_image">
                                <a  href="{!! URL::to('/gallery/program') !!}">
									<img src="https://lh3.googleusercontent.com/-gzC4HTyXC-s/ViTxhcWGxVI/AAAAAAAAADQ/_LA6WVNCojc/s144-Ic42/p3.jpg"  />
								</a>
								
                            </div>
                            <div class="gallery_title">
                                <a href="">Cultural Program</a>
                            </div>
                        </div>
					</div>					

            </div>


    </div>


@endsection
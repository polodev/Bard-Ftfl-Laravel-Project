@extends('master/master')
@section('title', 'Gallery')
@section('script')
	
	<link rel="stylesheet"  type='text/css' media="all" href="{!!asset('css/skel.css' )!!}"/>
	<link rel="stylesheet"  type='text/css' media="all" href="{!!asset('css/style.css' )!!}"/>
	<link rel="stylesheet"  type='text/css' media="all" href="{!!asset('css/style-desktop.css' )!!}"/>
	<link rel="stylesheet"  type='text/css' media="all" href="{!!asset('css/style-noscript.css' )!!}"/>
	
@section('content')
	
    
	<center><h1>Album</h1></center>
		<div id="wrapper">

			<div id="main">
				<div id="reel">
						
						<div id="header" class="item" data-width="1210" data-height="1000">
							<div class="inner">
								<h1>Gallery</h1>
								<p>Bard Trainings Management <br />
								 Official Photo Gallery</p>
							</div>
						</div>
					
			
						<article class="item thumb" data-width="1220">
							
							<a href="images/thumbs/01.jpg"><img src="images/thumbs/01.jpg"  alt=""></a>
				         </article>
				         	
				         	<article class="item thumb" data-width="1220">

							<a href="https://lh3.googleusercontent.com/-83lF3mdVaWw/ViTxkdSKDtI/AAAAAAAAAEY/E_p46chYxsE/s800-Ic42/studytour3.jpg"><img src="https://lh3.googleusercontent.com/-83lF3mdVaWw/ViTxkdSKDtI/AAAAAAAAAEY/E_p46chYxsE/s800-Ic42/studytour3.jpg"/></a>
							 </article>
    
						<article class="item thumb" data-width="1220">
							 <a href="images/thumbs/02.jpg"><img src="images/thumbs/02.jpg"  alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/03.jpg"><img src="images/thumbs/03.jpg" alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/04.jpg"><img src="images/thumbs/04.jpg" alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/05.jpg"><img src="images/thumbs/05.jpg" alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/06.jpg"><img src="images/thumbs/06.jpg" alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/07.jpg"><img src="images/thumbs/07.jpg" alt=""></a>
						</article>
						
						<article class="item thumb" data-width="1220">
							<a href="images/thumbs/08.jpg"><img src="images/thumbs/08.jpg" alt=""></a>
						</article>

					
				</div>
			</div>
		
			<div id="footer">
				<div class="left">
				
				</div>
				<div class="right">
					
					<ul class="copyright">
						<li>&copy; Xonic</li><li>Design:</li>
					</ul>
				</div>
			</div>

		</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.poptrox.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
		
@endsection
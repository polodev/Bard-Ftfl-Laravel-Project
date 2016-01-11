@extends('master/master')
@section('title', 'BARD Functions')
@section('content')
  <section class="" style="background-color: rgb(255, 255, 255)">
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="well col-md-4 col-md-offset-1">
  <h2>Functions :</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Read More</button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Functions of the Academy</h4>
        </div>
        <div class="modal-body">
          <p>
							
										 ->Conduct research in rural development and allied fields.<br> 
										 ->Conduct training of Government officials and others concerned with rural development. <br>
										 ->Test and experiment concepts and theories of development. <br>
										 ->Evaluate the programmes and activities relating to rural development. <br>
										 ->Provide advisory and consultative service to the government and other agencies. <br>
										 ->Guide and supervise national and foreign students in their dissertation works. <br>
										 ->Conduct national and international seminars, conferences and workshops. <br>
										 ->Help policy planners in the field of Rural Development.  .</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
		<div class="well col-md-4 col-md-offset-1">
		  <h2>Training:</h2>
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Read More</button>
		 </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
		<div class="well">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Training:</h4>
			</div>
		</div>
		<div class="well">
			<div class="modal-body">
			
				<p>
					The Academy is a designated national training institute. 
					Its training clientele includes both officials and non-officials. 
					Officials comprise civil servants, officers of nation building departments and
					international participants of development sector organisations while the non-officials
					are local councilors, local leaders, members of co-operatives. students of educational 
					institutions and members of voluntary organizations. Besides, a large number of imitational
					clientele including students, scholars, consultants, government officials, members of diplomatic
					corps and imitational agencies visit the Academy.
					<br>
					A unified approach of research, training and experimentation to solve the problems of rural 
					development has given special significance to the role of the Academy as a training institution.
					Because of this specialty BARD continues to attract trainees from different government agencies,
					local level organizations and non-government organizations (NGOs) as well as trainees, observers and
					visitors from abroad. During the period from 1959 to December 2013 a total of 2,34,498 trainees and 
					visitors attended various programmes conducted by the Academy.
					
					<br> BARD has accumulated vast experience in the field of training. 
					Every year BARD organizes 150 training courses on an average.
					It has also developed 30 training modules under the broad category of rural development. 
					Various groups of national and international clientele have already participated in training courses on these modules.
					These courses are offered on request with a reasonable budget.
					Requests for organizing training courses are to be made to Director General/Director(Training),
					BARD, Kotbari, Comilla-3503, Bangladesh.</p>
			
			</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>












</section>

@endsection

@extends('master/master')
@section('title', 'BARD Functions')
@section('script')
		<style>

			.gray {
				background-color: #80CBC4 !important;
			}
			.red {
				background-color: #CCFF90 !important;
			}
			.gra {
				background-color: #E1BEE7 !important;
			}
			.gr {
				background-color: #F8BBD0 !important;
			}
			.lg{
				background-color: #29B6F6 !important;
			}
			.cyan{
				background-color: #00E5FF !important;
			}
			.about-bard{
				text-align: center;
				margin-top: 30px;
				margin-bottom: 30px;
				padding: 30px;
			}
			h4>b{
				font-size: 18px;
			}
			.modal-body p{
				text-align: justify;
			}
			.about_img{
				margin-top: 20px;
				margin-bottom: 20px;
				cursor: pointer;
			}
			.about_modal_img{
				margin-bottom: 20px;
				border: 6px solid #fff;
			}
			
			.about_img img{
				width: 100%;
			}
			.about_modal_img img
			{
				width: 100%;
			}
		</style>

@section('content')
			<div class="container">
				<h2 class="about-bard bg-success">Bangladesh Academy for Rural Development</h2>
						
		<!----------------------------------------------------edited------------------------>
					<div class="col-md-12">
						<div class="row">
						
							<div class="col-md-4 col-lg-4">
								<div class="well cyan">
									<h4><b><i>Founder of BARD:</i></b></h4>
									<div class="about_img" data-toggle="modal" data-target="#myModal2">
										<img src="{!! asset('/aboutus_img/imgg.jpg') !!}" alt="about image">
									</div>
									<p>
										Dr. Akhter Hameed Khan is well known in Asia and a large part of the wider world for his distinguished leadership of the Rural Development Academy and the Rural Development Experiments at Comilla Bangladesh. His attainments as a scholar, educator, administrator and experimentor-demonstrator of innovative rural development
									</p>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Read More</button>

									  <!-- Modal -->
									 <div class="modal fade" id="myModal2" role="dialog">
										<div class="modal-dialog modal-lg">
										  <div class="modal-content cyan">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title"><b><i>Dr. Akhter Hameed Khan</i></b></h4>
											</div>
											<div class="modal-body">
												<div class="about_modal_img">
													<img src="{!! asset('/aboutus_img/imgg.jpg') !!}" alt="about image">
												</div>
											  <p>
												Dr. Akhter Hameed Khan is well known in Asia and a large part of the wider world for his distinguished leadership of the Rural Development Academy and the Rural Development Experiments at Comilla Bangladesh. His attainments as a scholar, educator, administrator and experimentor-demonstrator of innovative rural development activities, his contributions to the improvement of the conditions of the characteristically low income densely populated agrarian society of Bangladesh have earned international recognition.<br><br>
												He was born in Agra on 15th July 1914. He passed his MA from Agra University, India, in 1934 and joined the Indian Civil Service (ICS), the most prestigious and cherished service of British India. He attended the Magdelene College, Cambridge from 1936 to 1938 as an ICS probationer. In 1944 he resigned from the Civil Service due to his disagreement with the colonial rulers on their attitude towards the deplorable Bengal Famine of 1943 (which was the cause of death of about 3 million people) and began to work in a village near Aligarh as a labourer and locksmith. He gave up the work after two years.<br>
												In 1947 he took up a teaching position at the Jamia Millia, Delhi where he stayed for three years. In 1950 he migrated to Pakistan and became the Principal of Victoria College, Comilla (Bangladesh). He remained at the Victoria College uptil 1958 with a break in 1954-55 when he was placed on deputation as Director, Village Agricultural and Industrial Development (V-AID) Programme, a national community development programme launched by the Government of the then East Pakistan.
												In 1958 he went to the Michigan State University (MSU) for special orientation in rural development. On his return in 1959 he became the first Director of the Pakistan (presently Bangladesh) Academy for Rural Development (BARD) at Comilla where he worked unitl 1971. He also served as Vice-Chairman of the Academy Board of Governors for several years.<br><br>
												From 1971 to 1972, Dr. Khan served as a Research Fellow first at the Agricultural University, Lyallpur, Pakistan and then from 1972 to 1973 at the Economics Department, Karachi University. In 1973, he returned to the Michigan State University as a Visiting Professor where he remained until 1979. During this period he also served as Adviser, PARD at Peshawar (1973-1975) and for seven months as Adviser, Rural Development Academy, Bogra, Bangladesh (1978-79). In April 1980, the Orangi Pilot Project at Karachi was established (with the aim of improving the sanitation, drainage, sewerage, education, etc., of a vast squatters colony inhabited by about 0.6 million people) and since then he has been its Director and its most dynamic and innovative leader.<br>
												For his pioneering work in the development of rural and low income areas, Dr. Khan has been awarded the Sitara-e-Pakistan (1961), the Magsaysay Award, Republic of Philippines (1963) and honorary Doctor of Laws Degree, Michigan State University (1964). In addition to the MSU, he has been a Visiting Professor at the Lund University, Sweden, at the Woodrow Wilson School, Princeton University, at the Harvard University and Oxford University.<br><br>
												Dr. Khan has been a voracious reader since his early student life. He is well versed in several languages: Arabic, Persian, Urdu, Hindi and Bengali. Though he wrote only casually, his writings are quite voluminous. The variety of his interests in language and literature; in history, geography and philosophy; in scriptures and theology; in economics, welfare and development; in organisations and institutions for productive activities would fill ones mind with awe and admiration. He has written almost in every subject of his interest. His writings provide deep insight into the social, economic, political and administrative issues; the moral, religious and cultural milieu; and the natural, climatic and demographic factors surrounding the prospects of rural development in the third world countries.<br>
												As a life long practising social scientist, all his academic, administrative and organisational pursuits centred around practical development works that aimed at the upliftment of the poor and the depressed. A deep concern for these helpless people-their plight of poverty, ignorance and backwardness-has tormented his life and shaped the course of his thoughts and action.
											  </p>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										</div>
									 </div>
								</div>
							</div> <!-- COL-MD-6 -->
						
							<div class="col-md-4 col-lg-4">
								<div class="well lg">
									<h4> <b><i>Message from DG:</i></b></h4>
									<div class="about_img" data-toggle="modal" data-target="#myModal1">
										<img src="{!! asset('/aboutus_img/img.jpg') !!}" alt="about image">
									</div>
									<p>
									Bangladesh Academy for Rural Development (BARD), Comilla is internationally acclaimed for its many innovative works in the field of rural development in Bangladesh. 
									The Comilla Approach to Rural Development, which is, in fact, a package of mutually supportive development models produced lasting impacts on changing the lives and living environment of the rural poor.
									</p>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Read More</button>

									  <!-- Modal -->
									 <div class="modal fade" id="myModal1" role="dialog">
										<div class="modal-dialog modal-lg">
										  <div class="modal-content gray">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title"><b><i>Message from DG:</i></b></h4>
											</div>
											<div class="modal-body">
												<div class="about_modal_img">
													<img src="{!! asset('/aboutus_img/img.jpg') !!}" alt="about image">
												</div>
											  <p>
												Bangladesh Academy for Rural Development (BARD), Comilla is internationally acclaimed for its many innovative works in the field of rural development in Bangladesh. 
												The Comilla Approach to Rural Development, which is, in fact, a package of mutually supportive development models produced lasting impacts on changing the lives and living environment of the rural poor.
												BARD celebrated its Golden Jubilee on 27 May 2009. The 54 years of experiences in the arenas of training, research and action research could be shared by all countries and people engaged in rural development.
												We are delighted to launch this website since this will facilitate instant sharing of our experiences by the world community. We gladly welcome you to our website and promise to make it richer and keep it updated always.
												For more details on any issues please contact us.
											  </p>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										</div>
									 </div>
								</div>
							</div>


							
							
							<div class="col-md-4 col-lg-4">
								<div class="well red">
									<h4> <b><i>Functions of the Academy:</i></b></h4>
									<div class="about_img" data-toggle="modal" data-target="#myModal3">
										<img src="{!! asset('/aboutus_img/img1.jpg') !!}" alt="about image">
									</div>
									<p>
										 ->Conduct research in rural development and allied fields.<br>
										 ->Conduct training of Government officials and others concerned with rural development. <br>
										 ->Test and experiment concepts and theories of development. <br>
										 ->Evaluate the programmes and activities relating to rural development.<br>
									</p>
									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal3">Read More</button>

									  <!-- Modal -->
									 <div class="modal fade" id="myModal3" role="dialog">
										<div class="modal-dialog modal-lg">
										  <div class="modal-content red">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title"><b><i>Functions of the Academy:</i></b></h4>
											</div>
											<div class="modal-body">
												<div class="about_modal_img">
													<img src="{!! asset('/aboutus_img/img1.jpg') !!}" alt="about">
												</div>
											  <p>
												 ->Conduct research in rural development and allied fields.<br>
												 ->Conduct training of Government officials and others concerned with rural development. <br>
												 ->Test and experiment concepts and theories of development. <br>
												 ->Evaluate the programmes and activities relating to rural development. <br>
												 ->Provide advisory and consultative service to the government and other agencies. <br>
												 ->Guide and supervise national and foreign students in their dissertation works. <br>
												 ->Conduct national and international seminars, conferences and workshops. <br>
												 ->Help policy planners in the field of Rural Development.
											  </p>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										</div>
									 </div>
								</div>
							</div> <!-- COL-MD-6 -->
						</div> <!-- ROW-6-6 -->
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<div class="well gray">
									<h4><b><i>Training:</i></b></h4>
									<div class="about_img" data-toggle="modal" data-target="#myModal7">
										<img src="{!! asset('/aboutus_img/img2.jpg') !!}" alt="about image">
									</div>
								<p>
									The Academy is a designated national training institute.
									Its training clientele includes both officials and non-officials.
									Officials comprise civil servants, officers of nation building departments and
									international participants of development sector organisations while the non-officials are local councilors,local leaders,
									<br>
								</p>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal7">Read More</button>

								  <!-- Modal -->
								 <div class="modal fade" id="myModal7" role="dialog">
									<div class="modal-dialog modal-lg">
									  <div class="modal-content gray">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title"><b><i>Training:</i></b></h4>
										</div>
										<div class="modal-body">
											<div class="about_modal_img">
												<img src="{!! asset('/aboutus_img/img2.jpg') !!}" alt="about image">
											</div>
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
											  BARD, Kotbari, Comilla-3503, Bangladesh.
										  </p>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									  </div>
									</div>
								 </div>
								</div>
							</div> <!-- COL-MD-6 -->
							
							<div class="col-md-4 col-lg-4">
							<div class="well gr">
								<h4><b><i>Research:</i></b></h4>
								<div class="about_img" data-toggle="modal" data-target="#myModal8">
									<img src="{!! asset('/aboutus_img/img3.jpg') !!}" alt="about image">
								</div>
								<p>
								The Academy has been conducting socio-economic research since its inception.
								Research findings are used as both training materials by the Academy itself and
								information materials by the Ministries, Planning Commission and policy makers for
								drawing up development programs. In<br>
							</p>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal8">Read More</button>

							  <!-- Modal -->
							 <div class="modal fade" id="myModal8" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content gr">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									  <h4 class="modal-title"><b><i>Research:</i></b></h4>
									</div>
									<div class="modal-body">
									<div class="about_modal_img">
										<img src="{!! asset('/aboutus_img/img3.jpg') !!}" alt="about">
									</div>
									  <p>
										  The Academy has been conducting socio-economic research since its inception. Research
										  findings are used as both training materials by the Academy itself and information materials
										  by the Ministries, Planning Commission and policy makers for
										  drawing up development programs. In some particular cases, these are also circulated among the international agencies and institutions. The total number of completed researches till June 2009 is 700.
										  <br>
										  Over time the Academy has also expanded international contact and undertaken collaborative research with various development organizations. During last 54 years Michigan State University, Harvard University, Gottingen University, Bath University, Upsala University, Kyoto University, Population Council, ICOMP, APDC, FAO, UNDP, UNESCO,IDRC, JICA and CIRDAP have become the major international research collaborators. BARD is very closely linked with the Center for Integrated Rural Development for Asia and the Pacific (CIRDAP) and acts as its National IRD Centre for Bangladesh. It is also working as the National Liaison Center for SAARC in the field of rural development.
										  <br>
										  The BARD faculty have a wide range of experience in the field of research, training and action research. In addition to self-sponsored studies, every year BARD conducts a commendable number of researches sponsored by GOs, NGOs and international agencies. The Academy with a multi-disciplinary faculty has gained the capacity to conduct multi-dimensional studies on rural development and welcomes requests to conduct studies from any agency - national or international. Requests for conducting studies are to be made to Director General, BARD/Director (Research), Kotbari, Comilla-3503, Bangladesh. Research Publications are available at the Publication Section of BARD

									  </p>
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								  </div>
								</div>
							 </div>
							 </div>
							</div> <!-- COL-MD-6 -->

							<div class="col-md-4 col-lg-4">
								<div class="well gra">
									<h4><b><i>Action Research:</i></b></h4>
									<div class="about_img" data-toggle="modal" data-target="#myModal4">
										<img src="{!! asset('/aboutus_img/img4.jpg') !!}" alt="about image">
									</div>
									<p>
									BARD conducts experimental projects to evolve models of improved institutions,
									administrative structures, coordination and methods of production.
									The project activities usually involve the villagers, development institutions,
									local councils and government officials.So far the Academy has<br>
								</p>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal4">Read More</button>

								  <!-- Modal -->
								 <div class="modal fade" id="myModal4" role="dialog">
									<div class="modal-dialog modal-lg">
									  <div class="modal-content gra">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title"><b><i>Action Research:</i></b></h4>
										</div>
										<div class="modal-body">
											<div class="about_modal_img">
												<img src="{!! asset('/aboutus_img/img4.jpg') !!}" alt="about">
											</div>
										  <p>
											  BARD conducts experimental projects to evolve models of improved institutions,
											  administrative structures, coordination and methods of production.
											  The project activities usually involve the villagers, development institutions,
											  local councils and government officials. So far the Academy has conducted about 50 experimental
											  projects on various aspects of rural development. Through these pilot experimentations,
											  it has been able to evolve the following rural development models that have already been
											  replicated throughout country as components of the Comilla Model:
											  <br>

											  1. Two-tier Cooperatives;<br>

											  2. Thana (Presently Upazila) Training and Development Centre (TTDC);<br>

											  3. Rural Works Programme (RWP); and<br>

											  4. Thana (Presently) Upazila) irrigation Programme (TIP).<br>
											  Besides, government has been replicating two recent models of BARD which are:
											  Comprehensive Village Development Programme (CVDP) and Ecological Sanitation while
											  another recent model has been replicated as Small Farmers Development Foundation (SFDF).
										  </p>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									  </div>
									</div>
								 </div>
								</div>
							</div> <!-- COL-MD-6 -->
						</div> <!-- ROW-6-6 -->
					</div> <!-- COL-MD-9 -->
				</div> <!-- row -->
			</div> <!-- container -->
@endsection
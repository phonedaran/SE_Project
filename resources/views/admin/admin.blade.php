<!DOCTYPE html>
<html lang="en">
<head>
<!--

Template 2082 Pure Mix

http://www.tooplate.com/view/2082-pure-mix

-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- Site title
   ================================================== -->
	<title>IDcard</title>

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">

	<!-- Font Icons CSS
   ================================================== -->
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">

	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

	<!-- Google web font
   ================================================== -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>


<!-- Preloader section
================================================== -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">
      <div class="navbar">
         <div class="container">
            <div class="row">
              <div class="brand">
                <a href="{{url('/')}}">Shared Tutoring</a>
              </div>
              <div class="navicon">
                <div class="menu-container">
					@if (Auth:: check())
                           {{ Auth::user()->name }}
                    @endif
                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>
                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                     	<ul id="nav-menu">

						   @if (Auth::check())

                           <!-- check status -->
                              <!-- student -->
                              @if ( Auth:: user()->status == 'student')
                                 <li><a href="#">edit profile</a></li>
                                 <li><a href="{{url('/enroll')}}">enrollment</a></li>
                                 <li><a href="#">review</a></li>
                              <!-- tutor -->
                              @elseif ( Auth:: user()->status == 'tutor')
                                 <li><a href="#">tutor area</a></li>
                              <!-- admin -->
                              @else
							  	<li><a href="{{URL::to('/admin')}}">Admin</a></li>
						   		<li><a href="{{URL::to('/admin/tutorList')}}">Tutor List</a></li>
                              @endif

                           <li><a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                          Logout</a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                       </form>
                              </li>
                        <!-- ================= แสดงเมื่อยังไม่ได้ login ================= -->
                        @else
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="{{url('/login')}}">Log-in</a></li>
                           @if (Route::has('register'))
                              <li><a href="{{url('/register')}}">Register</a></li>
                           @endif
                        </ul>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>

   </nav>
</div>


<!-- Header section
================================================== -->
<section id="header" class="header-five">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">Admin</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">nice to see you</h3>
          </div>
			</div>

		</div>
	</div>
</section>


<!-- request section
================================================== -->
	<section id="contact">
		<div class="container">
			<div class="row" >
				<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="1.2s">
					<h1>All Request ({{sizeof($tutors)}})</h1><br />
					@if(sizeof($tutors)>0)
						@foreach ($tutors as $tutor)
						<div class="card">
							<div class="contentCard">
							<h4 class="col-md-12" align="left"><b>{{$tutor->Fname}}&nbsp;&nbsp;{{$tutor->Lname}}</b></h4>

								@foreach($idCards as $idCard)
									@if($tutor->idTutor == $idCard->idTutor)
										<div class="col-md-3" align="center">
											<br>
											<img src="images/{{$idCard->img_path}}" onerror="this.src='images/user.png'" style="width:100%;max-width:100px"></p>
											<br>
											<form method="get" action="{{URL::to('/admin/image')}}">
												<input type="hidden" name="image" id="image" value="{{$idCard->img_IDcard}}">
												<p align="center"><b>IDcard :</b>
												<input type="button" class="button button0" value="IDcard" onClick="this.form.action='{{ URL::to('/admin/image') }}'; submit()">
											</form>
										</div>
									@endif
								@endforeach

								<div class="col-md-9">
									<p class="col-md-6" align="left"><b>Sex :</b> {{$tutor->sex}}</p>
									<p class="col-md-6" align="left"><b>DOB :</b> {{$tutor->DOB}}</p>
									<p class="col-md-6" align="left"><b>Email :</b> {{$tutor->email}}</p>
									<p class="col-md-6" align="left"><b>Phone :</b> {{$tutor->phone}}</p>
									<p class="col-md-6" align="left"><b>Address :</b> {{$tutor->address}}</p>
									<p class="col-md-6" align="left"><b>Partner :</b> {{$tutor->partner}}</p>
									<p class="col-md-6" align="left"><b>Education :</b> {{$tutor->education}}</p>
									<p class="col-md-6" align="left"><b>Experient :</b> {{$tutor->work_experient}}</p>
								</div>

								<div class="contact-form">
									<form id="contact-form" method="get">
										<div id="outer">
											<input type="button" class="inner button button1" value="Accept" onClick="fncAction1({{$tutor->idTutor}})">
											<input type="button" class="inner button button2" value="Reject" onClick="fncAction2({{$tutor->idTutor}})">
										</div>
									</form>
								</div>

							</div>
						</div>
						<br>
						@endforeach
					@else
						<br /><h3 style="color: silver;">No Request</h3><br /><br /><br />
					@endif
				</div>
			</div>
		</div><br /><br /><br />
	</section>

<!-- Javascript section
================================================== -->

<script type="text/javascript">

	function fncAction1(idTutor){
		swal({
			title: "Are you sure?",
			text: "Once accepted, you will get the tutor in to our company!",
			icon: "warning",
			buttons: true,
			successMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Poof! The tutor has been accepted!", {icon: "success"});
				setTimeout(function(){
					window.location.replace("/SE_Project/public/admin/accepted?idTutor="+idTutor);
				},2000);
			} else {
				swal("The request is safe!");
			}
		});
	}

	function fncAction2(idTutor){
		swal({
			title: "Are you sure?",
			text: "Once rejected, you will not be able to recover the request!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Poof! The tutor has been rejected!", {icon: "success"});
				setTimeout(function(){
					window.location.replace("/SE_Project/public/admin/rejected?idTutor="+idTutor);
				},2000);
			} else {
				swal("The request is safe!");
			}
		});
	}

</script>


<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp"  data-wow-delay="0.3s">Shared Tutoring by Teletubbies - Software Engineering 2020</p>
				<ul class="social-icon wow fadeInUp"  data-wow-delay="0.6s">
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-dribbble"></a></li>
					<li><a href="#" class="fa fa-behance"></a></li>
					<li><a href="#" class="fa fa-google-plus"></a></li>
				</ul>
			</div>

		</div>
	</div>
</footer>

<!-- Javascript
================================================== -->
<script src="{{ URL::asset('js/jquery.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/wow.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>

</body>
</html>

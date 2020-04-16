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
	<title>Tutor List</title>

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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">



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
					@if (Auth:: check())
                     	<h3 style="text-align:right;">{{ Auth::user()->name }}</h3>
                  	@endif  
                  	<div class="menu-container">
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
									<li><a href="#">enrollment</a></li>
									<li><a href="#">review</a></li>
								<!-- tutor -->
								@elseif ( Auth:: user()->status == 'tutor')
									<li><a href="{{url('/Profile')}}">Tutor Profile</a></li>
                                 	<li><a href="{{url('/course')}}">Tutor course</a></li>
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
              <h1 class="wow fadeIn" data-wow-delay="0.6s">Tutor List</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">all our tutors</h3>
          </div>
			</div>
		</div>
	</div>		
</section>


<!-- List section
================================================== -->

<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">Name</th>
								<th class="column3">Sex</th>
								<th class="column4">Email</th>
								<th class="column5">Phone</th>
								<th class="column6">IDcard</th>
								<th class="column7"></th>
							</tr>
						</thead>

						<tbody>
							@foreach($tutors as $tutor)
								<tr>
									<td class="column1">{{$tutor->idTutor}}</td>
									<td class="column2 click"><a onClick="fncAction1({{$tutor->idTutor}})">{{$tutor->Fname}}&nbsp;&nbsp;&nbsp;{{$tutor->Lname}}</a></td>
									<td class="column3">{{$tutor->sex}}</td>
									<td class="column4">{{$tutor->email}}</td>
									<td class="column5">{{$tutor->phone}}</td>
									<td class="column6 click"><a onClick="fncAction0({{$tutor->idTutor}})">IDcard</a></td>
									<td class="column7 click" onClick="fncAction2({{$tutor->idTutor}})">
										<i class="fa fa-trash fa-2x"></i>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">

	function fncAction0(idTutor){
		window.location.assign("/SE_Project/public/admin/image?idTutor="+idTutor);
	}

	function fncAction1(idTutor){
		window.location.assign("/SE_Project/public/Profile?idTutor="+idTutor);
	}
	
	function fncAction2(idTutor){
		swal({
			title: "Are you sure?",
			text: "Once accepted, you will fire the tutor out!",
			icon: "warning",
			buttons: true,
			successMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Success! The tutor has been fired!", {icon: "success"});
				setTimeout(function(){
					window.location.assign("/SE_Project/public/admin/tutorList/fired?idTutor="+idTutor);
				},2000);
			} else {
				swal("The tutor is safe!");
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
<script src="{{ URL::asset('js/popper.js') }}"></script>
<script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>

</body>
</html>
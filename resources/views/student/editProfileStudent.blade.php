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
	<title>Edit Profile</title>

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


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<style>
		.field-icon {
			size: 10px;
			float: right;
			padding-right: 20px;
			/* margin-left: -25px; */
			margin-top: -52px;
			position: relative;
			z-index: 2;
		}

		.above {
			margin-top: 5px;
			font-size: 14px;
		}

		.btn {
			font-family: 'Source Sans Pro', sans-serif;
			background: #f9f9fc;
			/* rgb(156, 150, 140) */
			border-color: #111112;
			/* transparent */
			color: #111112;
			height: 47px;
			font-size: 16px;
			font-weight: 525;
			letter-spacing: 1px;
			transition: all 0.4s ease-in-out;
			margin-top: 11px;
			border-radius: 0px;
			width: 100%;
		}

		.btn {
			padding: 13px 32px;
			margin-bottom: 5px;
		}

		.btn:hover {
			background: rgb(214, 213, 210);
			/* color:#ffffff ; */
			/* font-weight: 400; */
		}

		#contact .form-control {
			background: transparent;
			border: 1px solid #eee;
			border-radius: 0px;
			box-shadow: none;
			font-size: 16px;
			margin-bottom: 16px;
			transition: all 0.4s ease-in-out;
		}

		#contact .form-control:hover {
			border-color: #f0f0f0;
		}
	</style>


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

											<!-- ================= แสดงเมื่อมีการ login แล้ว ================= -->
											@if (Auth::check())
											<li><a href="{{url('/')}}">Home</a></li>

											<!-- check status -->
											<!-- student -->
											@if ( Auth:: user()->status == 'student')
											<li><a href="{{url('/studentEdit')}}">edit profile</a></li>
											<li><a href="{{url('/enroll')}}">enrollment</a></li>
											<li><a href="{{url('/review')}}">review</a></li>
											<!-- tutor -->
											@elseif ( Auth:: user()->status == 'tutor')
											<li><a href="{{url('/Profile')}}">Tutor Profile</a></li>
											<li><a href="{{url('/course')}}">Tutor course</a></li>
											<!-- admin -->
											@else
											<!-- <li><a href="#">admin area</a></li> -->
											@endif
											<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
											<li><a href="{{url('/contact')}}">Contact</a></li>
										</ul>
										@endif
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>

		</nav>
	</div>




	<!-- register section
================================================== -->
	<section id="contact">
		<div class="container">
			<div class="row" style="background-color : ">
				<div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.4s">

					@if (Session('null'))
					<script type="text/javascript">
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Input all requied field!'
						})
					</script>
					@endif

					@if (Session('pass'))
					<script type="text/javascript">
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Password is min lenght of 8'
						})
					</script>
					@endif

					@if (Session('mail'))
					<script type="text/javascript">
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'This Email is duplicate'
						})
					</script>
					@endif

					@if (Session('success'))
					<script type="text/javascript">
						Swal.fire({
							icon: 'success',
							title: 'OK!',
							text: 'Update complete!!'
						})
					</script>
					@endif

					<h1>My Profile</h1>
					<div class="contact-form">
						@foreach($students as $student)

						<form id="contact-form" name="frmhot" method="POST" action="{{ URL::to('/studentEdit/check') }}">
							@csrf
							<label for="firstName">
								<font size="3">First name*</font>
							</label>
							<input name="Fname" type="text" class="form-control" value="{{$student->Fname}}" placeholder="Your Frist Name" required>

							<label for="lastName">
								<font size="3">Last name*</font>
							</label>
							<input name="Lname" type="text" class="form-control" value="{{$student->Lname}}" placeholder="Your Last Name" required>

							<label for="email">
								<font size="3">Email*</font>
							</label>
							<input name="email" type="email" class="form-control" value="{{$student->email}}" placeholder="Your Email" required readonly>

							<label for="address">
								<font size="3">Address</font>
							</label>
							<textarea name="address" class="form-control" cols="10" rows="4">{{$student->address}}</textarea>
							<!-- <input name="address" type="text" class="form-control" value="{{$student->address}}" placeholder="Your Address" required> -->

							<label for="phone">
								<font size="3">Phone*</font>
							</label>
							<input name="phone" type="text" class="form-control" value="{{$student->phone}}" placeholder="Your Phon number" required>

							<!-- <div class="contact-submit"> -->
							<div class="col-md-6 col-sm-4">
								<input type="submit" class="form-control submit" value="Update Profile">
							</div>

							<div class="col-md-6 col-sm-4">
								<a href="{{url('/')}}" class="btn">Cancle</a>
							</div>
						</form>
						@endforeach
					</div>
				</div>

				<div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.4s">
					<section id="header" class="header-five">
						<div class="container">
							<!-- <div class="row"> -->
							<!--   -->
							<div class="col-md-offset-0.8 col-md-5  col-sm-offset-0.5 col-sm-2">
								<div class="header-thumb">
									<h1 class="wow fadeIn" data-wow-delay="0.6s">Edit Profile</h1>
								</div>
							</div>

							<!-- </div> -->
						</div>
					</section>
				</div>

			</div>
		</div>
	</section>

	<!-- Footer section
================================================== -->
	<footer>
		<div class="container">
			<div class="row">

				<div class="col-md-12 col-sm-12">
					<p class="wow fadeInUp" data-wow-delay="0.3s">Shared Tutoring by Teletubbies - Software Engineering 2020</p>
					<ul class="social-icon wow fadeInUp" data-wow-delay="0.6s">
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
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	</script>

	@include('sweet::alert')
</body>

</html>
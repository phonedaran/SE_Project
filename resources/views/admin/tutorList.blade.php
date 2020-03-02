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
                <a href="index.html">Shared Tutoring</a>
              </div>
              <div class="navicon">
                <div class="menu-container">
                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>
                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                     	<ul id="nav-menu">
						   <li><a href="{{URL::to('/admin')}}">Admin</a></li>
						   <li><a href="{{URL::to('/admin/tutorList')}}">Tutor List</a></li>
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
								<th class="column1">Tutor ID</th>
								<th class="column2">Name</th>
								<th class="column3">Sex</th>
								<th class="column4">Address</th>
								<th class="column5">Email</th>
								<th class="column6">Phone</th>
							</tr>
						</thead>

						<tbody>
							@foreach($tutors as $tutor)
								<tr>
									<td class="column1">{{$tutor->idTutor}}</td>
									<td class="column2">{{$tutor->Fname}}&nbsp;&nbsp;&nbsp;{{$tutor->Lname}}</td>
									<td class="column3">{{$tutor->sex}}</td>
									<td class="column4">{{$tutor->address}}</td>
									<td class="column5">{{$tutor->email}}</td>
									<td class="column6">{{$tutor->phone}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

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
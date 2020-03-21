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
	<title>Add Course</title>

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
                                 <li><a href="#">edit profile</a></li>
                                 <li><a href="{{url('/enroll')}}">enrollment</a></li>
                                 <li><a href="#">review</a></li>
                              <!-- tutor -->
                              @elseif ( Auth:: user()->status == 'tutor')
                                 <li><a href="{{url('/Profile')}}">Tutor Profile</a></li>
                                 <li><a href="{{url('/course')}}">Tutor course</a></li>
                              <!-- admin -->
                              @else
                                 <!-- <li><a href="#">admin area</a></li> -->
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

<!-- Header section
================================================== -->
<section id="header" class="header-five">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">add course</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">Let's create a course for learning.</h3>
          </div>
			</div>

		</div>
	</div>
</section>


<!-- Add course section
================================================== -->
<section id="contact">
	<div class="container">
		<div class="row">
		  <div class="wow fadeInUp col-md-6" data-wow-delay="1.6s">
			  <h1>add your course</h1>
			  <div class="contact-form">
				  <form id="contact-form" method="get" action="{{ URL::to('/course/add/check') }} ">
              {{-- <input name="idTutor" type="number" class="form-control" placeholder="Your ID" required> --}}
                    {{-- <input name="idcourse" type="number" class="form-control" placeholder="Course ID" required> --}}
                    <input name="Ncourse" type="name" class="form-control" maxlength="45" placeholder="Course Name" required >
					<input name="subject" type="name" class="form-control" placeholder="Subject" required>
					<input name="maxStudent" type="number" class="form-control" placeholder="Number of students accepted" required>
					<input name="day" type="text" class="form-control" placeholder="Day" required>
					<h3>Start Time</h3><input name="stime" type="time" class="form-control col-md-6" placeholder="Start Time" required>
					<h3>End Time</h3><input name="etime" type="time" class="form-control col-md-6" placeholder="End Time" required>
                    <h3>Start Date</h3><input name="startDate" type="Date" class="form-control col-md-6" placeholder="Start Date" required>
					<h3>End Date</h3><input name="endDate" type="Date" class="form-control col-md-6"  placeholder="End Date" required>
                    <input name="location" type="text" class="form-control" maxlength="45" placeholder="Location" required>
                    <input name="price" type="number" class="form-control" placeholder="Price per course (Bath)" required>
					<textarea name="message" class="form-control" placeholder="Course Description" rows="4" required></textarea>
				    <div class="contact-submit">
						<input type="submit" class="form-control submit" value="SAVE">
					</div>
				  </form>
			  </div>
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

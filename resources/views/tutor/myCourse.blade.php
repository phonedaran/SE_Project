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
	<title>Edit</title>

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
	<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

	<!-- Google web font 
   ================================================== -->	
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<style>



.field-icon {
						size:10px;
            float: right;
            padding-right: 20px;
            /* margin-left: -25px; */
            margin-top: -52px;
            position: relative;
						z-index: 2;
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
                <div class="menu-container">
                  <h3 class="wow fadeIn" data-wow-delay="1.6s">
                     @if (Auth:: check())
                           {{ Auth::user()->name }}
                     @endif
                     <div class="circle dark inline">
                     <i class="icon ion-navicon"></i>
                     </div></h3>

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
                                 <li><a href="{{url('/tutorEdit')}}">edit profile</a></li>
                                 <li><a href="{{url('/addCourse')}}">add course</a></li>
                                 <li><a href="{{url('/myCourse')}}">My course</a></li>
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





<!-- register section
================================================== -->

<section id="blog">
   <div class="container">
      <div class="row">

         <div class="col-md-12 col-sm-12">

               <!-- iso section -->
               <div class="iso-section wow fadeInUp" data-wow-delay="1s">
                            <div class="container">
                           <div class="row">

                            @foreach ( $courses as $c )
                                <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                                    <div class="blog-thumb">
                                        <form method="Get">
                                        <a href="#"><img src="images/imageCourse/{{$c->img}}"style="width:100%;max-width:300px" onerror="this.src='images/blog-img3.jpg'" class="img-responsive" alt="Blog"></a>
                                        <a href="#"><h1>{{$c->Ncourse}}</h1></a>
                                        <p class="col-md-12" align="left"><i class="fa fa-pencil"></i> : {{$c->subject}} </p>
                                        <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/{{$c->max_student}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : {{$c->start_date}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : {{$c->day}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-user"></i> : tutor</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : {{$c->location}}</p>
                                        <p class="col-md-6" align="left">ราคา {{$c->price}} บาท</p>
                                        <!-- <a href="#" class="btn btn-default">MORE INFO</a> -->
                                        <input type="hidden"  name="cId" value="{{$c->idcourse}}" ><button class="btn btn-default" onClick="this.form.action='{{ URL::to('/courseEdit') }}'; submit()" > Edit </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                           </div>
                        </div>

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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@include('sweet::alert')
</body>
</html>


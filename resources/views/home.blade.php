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
	<title>Shared Tutoring</title>

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
   
  <!-- sweet 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 

</head>
<body>


<!-- Preloader section
================================================== -->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Navigation section
================================================== -->
<!-- alert success login -->
<div class="nav-container">
   @if (Route::has('login'))
      @auth
      <script type="text/javascript">
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Log in in successfully'
            })
      </script>
      @else
      <script type="text/javascript">
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Log out successfully'
            })
      </script>
      @endauth
   @endif
</div>
<!-- ต้องสร้างหน้า home 2 ไฟล์ => homepublic ,  home -->
<!-- ================================================= -->
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
                                 <li><a href="#">tutor area</a></li>
                              <!-- admin -->
                              @else
                                 <li><a href="#">admin area</a></li>
                              @endif
                              
                           <li><a href="{{url('/contact')}}">Contact</a></li>
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
<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="1.6s">Coures</h1>
              <h3 class="wow fadeInUp" data-wow-delay="1.9s">LEARN WITH THE BEST TUTORS</h3>
          </div>
			</div>

		</div>
	</div>		
</section>


<!-- list section
================================================== -->
<section id="blog">
   <div class="container">
      <div class="row">

         <div class="col-md-12 col-sm-12">
            
               <!-- iso section -->
               <div class="iso-section wow fadeInUp" data-wow-delay="1s">

                  <ul class="filter-wrapper clearfix">
                           <li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>
                           <li><a href="#" class="opc-main-bg" data-filter=".graphic">Graphic</a></li>
                           <li><a href="#" class="opc-main-bg" data-filter=".template">Web template</a></li>
                           <li><a href="#" class="opc-main-bg" data-filter=".photoshop">Photoshop</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".branding">Branding</a></li>
                        </ul>

                        <!-- iso box section -->
                        <div class="container">
                           <div class="row">
                              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                                 <div class="blog-thumb">
                                    <a href="single-post.html"><img src="../public/images/blog-img3.jpg" class="img-responsive" alt="Blog"></a>
                                    <a href="single-post.html"><h1>Course Name</h1></a>
                                    <p class="col-md-6" align="left"><i class="fa fa-pencil"></i> : subject </p>
                                    <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/15</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : date</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : time</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-user"></i> : tutor</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : location</p>
                                    <a href="single-post.html" class="btn btn-default">MORE INFO</a>
                                 </div>
                              </div>
                              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="2.0s">
                                 <div class="blog-thumb">
                                    <a href="single-post.html"><img src="../public/images/blog-img3.jpg" class="img-responsive" alt="Blog"></a>
                                    <a href="single-post.html"><h1>Course Name</h1></a>
                                    <p class="col-md-6" align="left"><i class="fa fa-pencil"></i> : subject </p>
                                    <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/15</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : date</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : time</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-user"></i> : tutor</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : location</p>
                                    <a href="single-post.html" class="btn btn-default">MORE INFO</a>
                                 </div>
                              </div>
                              <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.7s">
                                 <div class="blog-thumb">
                                    <a href="single-post.html"><img src="../public/images/blog-img3.jpg" class="img-responsive" alt="Blog"></a>
                                    <a href="single-post.html"><h1>Course Name</h1></a>
                                    <p class="col-md-6" align="left"><i class="fa fa-pencil"></i> : subject </p>
                                    <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/15</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : date</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : time</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-user"></i> : tutor</p>
                                    <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : location</p>
                                    <a href="single-post.html" class="btn btn-default">MORE INFO</a>
                                 </div>
                              </div>
                              </div>

                           
                             
                     
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
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
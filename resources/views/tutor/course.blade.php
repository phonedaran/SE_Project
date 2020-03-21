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
	<title>Tutor Course</title>

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

<!-- Add button section
================================================== -->
<button onclick="fncAction2()" id="myBtn" ><i class="fa fa-plus"></i></button>

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
               <h1 class="wow fadeIn" data-wow-delay="0.6s">Tutor Course</h1>
               <h3 class="wow fadeInUp" data-wow-delay="0.9s">all courses which you place</h3>
            </div>
			</div>
		</div>
	</div>
</section>

<!-- course section
================================================== -->
<section id="contact">
   <div class="container">
      <div class="row" >
         <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="1.2s">
            <h1>All Courses ({{sizeof($courses)}})</h1><br /> 
            @if(sizeof($courses)>0)
               @foreach ($courses as $index => $course)
                  <div class="card col-md-12">
							<div class="contentCard">
                        <div class="col-md-3" align="center">
                           <img src="images/{{$course->img}}" onerror="this.src='images/blog-img3.jpg'" ></a>
                        </div> 
                        <div class="col-md-9">
                           <!-- เพิ่ม link ไปหน้า course information ด้วย -->
                           <h4 class="col-md-9" align="left"><a class="click" onClick="fncAction4({{$course->idcourse}})"><b>{{$course->Ncourse}}</b></a></h4> 
                           <h4 class="col-md-3">
                              <div id="outer">
                                 <div class="inner" onClick="fncAction0({{$course->idcourse}})">
                                    <i class="fa fa-edit click"></i>
                                 </div>
                                 <div class="inner" onClick="fncAction1({{$course->idcourse}})">
                                    <i class="fa fa-trash click"></i>
                                 </div>
                              </div>
                           </h4> 
                           <p class="col-md-6" align="left"><b>Subject : </b>{{$course->subject}}</p>
                           <p class="col-md-6" align="left"><a class="click" onClick="fncAction3({{$course->idcourse}})"><b>Student : </b>{{$n[$index]}}/{{$course->max_student}}</a></p>
                           <p class="col-md-6" align="left"><b>Schedule : </b>{{$course->day}} {{$course->start_time}}-{{$course->end_time}}</p>
                           <p class="col-md-6" align="left"><b>Period : </b>{{$course->start_date}} ~ {{$course->end_date}}</p>
                           <p class="col-md-6" align="left"><b>Location : </b>{{$course->location}}</p>
                           <p class="col-md-6" align="left"><b>Price : </b>{{$course->price}}</p>
                        </div>
                     </div>
                  </div>
                  <br>
               @endforeach
            @else
               <br /><h3 style="color: silver;">No Course</h3><br /><br /><br />
            @endif
         </div>
      </div>
   </div><br /><br /><br />
</section>

<script type="text/javascript">

	function fncAction0(idcourse){
		window.location.assign("/SE_Project/public/courseEdit?idcourse="+idcourse);
	}
   
   function fncAction1(idcourse){
      swal({
			title: "Are you sure?",
			text: "Once accepted, you will delete this course!",
			icon: "warning",
			buttons: true,
			successMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Poof! The course has been deleted!", {icon: "success"});
				setTimeout(function(){
					window.location.assign("/SE_Project/public/course/deleted?idcourse="+idcourse);
				},2000);
			} else {
				swal("The course is safe!");
			}
		});
	}

   function fncAction2(){
      window.location.assign("/SE_Project/public/addCourse");
   }

   function fncAction3(idcourse){
		window.location.assign("/SE_Project/public/course/studentList?idcourse="+idcourse); //เติม path ไปหา edit course
	}

   function fncAction4(idcourse){
		window.location.assign("/SE_Project/public/courseInformation?idcourse="+idcourse);
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

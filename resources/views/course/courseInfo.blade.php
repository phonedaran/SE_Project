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
	<title>Course Information</title>

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
                                 <li><a href="{{url('/enroll')}}">enrollment</a></li>
                                 <li><a href="{{url('/review')}}">review</a></li>
                                 <li><a href="{{url('/studentEdit')}}">edit profile</a></li>
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
              <h1 class="wow fadeIn" data-wow-delay="0.6s">Course Information</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">have fun with our course</h3>
          </div>
		</div>
	</div>
</section>

<!-- course section
================================================== -->
<section id="blog">
    <div class="container">
        <div class="row" >
            <div class="wow fadeInUp wrapper col-md-12 col-sm-12" data-wow-delay="1.2s">           
               <div class="blog-thumb main col-md-8">
                  <div class="card col-md-12" >
                     <br>
                     <div class="col-md-7">
                        <img src="images/{{$course[0]->img}}" onerror="this.src='images/blog-img3.jpg'" class="img-responsive" alt="Blog"></a>
                     </div> 
                     <div class="col-md-5">
                        <div class="center">
                           <h1>{{$course[0]->Ncourse}}</h1>
                        </div> 
                     </div>
                  </div>

                  <div class="card col-md-12" >
                     <br>
                     <h3><b>Description</b></h3>
                     @if ($course[0]->description == null)
                        <p>&nbsp;&nbsp;-</p>
                     @else
                        <p>{{$course[0]->description}}</p>
                     @endif
                     <hr>
                     <h3><b>Subject</b></h3>
                     <p>{{$course[0]->subject}}</p>
                     <hr>
                     <h3><b>Student</b></h3>
                     @if ($course[0]->max_student > 1)
                        <p>Group of {{$course[0]->max_student}} students</p>
                     @else
                        <p>One to one</p>
                     @endif
                     <hr>
                     <h3><b>Period</b></h3>
                     <p>{{$course[0]->start_date}} ~ {{$course[0]->end_date}}</p>
                     <hr>
                     <h3><b>Schedue</b></h3>
                     <p>{{$course[0]->day}}<br>{{$startTime}} - {{$endTime}}</p> 
                     <hr>
                     <h3><b>Price</b></h3>
                     <p>{{$course[0]->price}} Bath</p>
                  </div>
               </div> 
               
               <div class="sidebar col-md-12">
                  <div class="card col-md-12">
                     <br>
                     <div class="col-md-5">
                        <img src="images/imageProfile/{{$imageTutor}}" onerror="this.src='images/user.png'" style="border-radius: 50%; width:100%;max-width:100px">
                     </div> 
                     <div class="col-md-7">
                        <a class="click" onClick="fncAction1({{$tutor[0]->idTutor}})"><p><b>{{$tutor[0]->Fname}}<br>{{$tutor[0]->Lname}}</b></p></a> <!-- link ไป profile tutor -->                
                        <?php
                           if ($avgReview>=0 and $avgReview<0.5){
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=0.5 and $avgReview<1){
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=1 and $avgReview<1.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=1.5 and $avgReview<2){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=2 and $avgReview<2.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=2.5 and $avgReview<3){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=3 and $avgReview<3.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=3.5 and $avgReview<4){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=4 and $avgReview<4.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($avgReview>=4.5 and $avgReview<5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>  ';
                           }
                           elseif($avgReview>=5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>  ';
                           }
                           echo '<span style="color: #777;font-size: 14px;letter-spacing:1px">(', $nReview, ')</span>';
                        ?>
                     </div>
                     
                     <div class="col-md-7">
                        <br>
                        <p><b>Sex : </b>{{$tutor[0]->sex}}</p>
                     </div> 
                     <div class="col-md-5">
                        <br>
                        <p><b>Age : </b>{{$age}}</p>
                     </div> 
                     <div class="col-md-12">
                        <p><b>Partner : </b>{{$tutor[0]->partner}}</p>
                        <p><b>Education : </b>{{$tutor[0]->education}}</p>
                        <p><b>Experient : </b>{{$tutor[0]->work_experient}}</p>
                        <p><b>E-mail : </b>{{$tutor[0]->email}}</p>
                        <p><b>Phone : </b>{{$tutor[0]->phone}}</p>
                     </div>
                  </div>
                  <div class="col-md-12">
                     @if (Auth::check())
                        @if ( Auth:: user()->status == 'student')
                           @if ($enrolled == 0)
                              <button style="width:100%"class="btn button button1" onClick="fncAction0({{$course[0]->idcourse}})">Enroll</button>
                           @endif
                        @endif
                     @endif 
                     <button style="width:100%"class="btn button button2" onClick="javascript:history.go(-1)">Back</button>  
                  </div>
               </div>
               
            </div>
        </div>
    </div><br /><br /><br />
</section>

<!-- javascript section
================================================== -->
<script type="text/javascript">

   function fncAction0(idcourse){
      swal({
			title: "Are you sure?",
			text: "Once accepted, you will enroll this course!",
			icon: "warning",
			buttons: true,
			successMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Poof! You have just enrolled this course!", {icon: "success"});
				setTimeout(function(){
					window.location.assign("/SE_Project/public/courseInformation/enrolled?idcourse="+idcourse);
				},2000);
			} else {
				swal("Cancel !");
			}
		});
	}
   
   function fncAction1(idTutor){
		window.location.assign("/SE_Project/public/Profile?idTutor="+idTutor);
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

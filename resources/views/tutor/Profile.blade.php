<!DOCTYPE html>
<html lang="en">
<!-- Raview Part -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
   <!-- Review Part -->
   <meta name="author" content="">
   <link rel="icon" href="favicon.ico">

   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/navbar-fixed-top.css" rel="stylesheet">

   <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <script src="js/ie-emulation-modes-warning.js"></script>

   <!-- Site title
   ================================================== -->
   <title>Your Profile</title>

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
       body {
         background: #efefef;
      }

      .cont {
         max-width: 1250px;
         margin: 30px auto 30px;
         padding: 0 !important;
         width: 90%;
         background-color: #fff;
         box-shadow: 0 3px 6px rgba(0, 0, 0, 0.10), 0 3px 6px rgba(0, 0, 0, 0.10);
      }

      header {
         background: #eee;
         background-image: url("https://image.freepik.com/free-photo/university-students-college-students-studying-reading-together-library_18497-1184.jpg");
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
         background-color: red;
         height: 250px;
      }

      header i {
         position: relative;
         cursor: pointer;
         right: -96%;
         top: 25px;
         font-size: 18px !important;
         color: #fff;
      }

      @media (max-width:800px) {
         header {
            height: 150px;
         }

         header i {
            right: -90%;
         }
      }

      main {
         padding: 20px 20px 0px 20px;
      }

      .left {
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: column;
      }

      .photo {
         width: 200px;
         height: 200px;
         margin-top: -120px;
         border-radius: 100px;
         border: 4px solid #fff;
      }

      .name {
         margin-top: 20px;
         font-family: "Open Sans";
         font-weight: 600;
         font-size: 18pt;
         color: #777;
      }

      .info {
         margin-top: -5px;
         margin-bottom: 5px;
         font-family: 'Montserrat', sans-serif;
         font-size: 11pt;
         color: #aaa;
      }

      .desc {

         padding-bottom: 25px;
         border-bottom: 1px solid #ededed;
      }

      .right {
         padding: 0 25px 0 25px !important;
      }

      .navi {
         display: inline-flex;
      }

      .navi lii {
         margin: 40px 30px 0 10px;
         font-size: 13pt;
         text-transform: uppercase;
         font-family: 'Montserrat', sans-serif;
         font-weight: 500;
         color: #888;
      }

      .navi lii:hover,
      .navi lii:nth-child(1) {
         color: #000000;
         border-bottom: 2px solid #000000;
      }

      .follow {
         position: absolute;
         right: 8%;
         top: 35px;
         font-size: 11pt;
         background-color: #42b1fa;
         color: #fff;
         padding: 8px 15px;
         cursor: pointer;
         transition: all .4s;
         font-family: 'Montserrat', sans-serif;
         font-weight: 400;
      }

      .follow:hover {
         box-shadow: 0 0 15px rgba(0, 0, 0, 0.2), 0 0 15px rgba(0, 0, 0, 0.2);
      }

      @media (max-width:990px) {
         .navi {
            display: none;
         }

         .follow {
            width: 50%;
            margin-left: 25%;
            display: block;
            position: unset;
            text-align: center;
         }
      }

      .rating-block {
         background-color: #FAFAFA;
         border: 1px solid #EFEFEF;
         padding: 15px 15px 20px 15px;
         border-radius: 3px;
      }

      .bold {
         font-weight: 700;
      }

      .padding-bottom-7 {
         padding-bottom: 7px;
      }

      .review-block {
         background-color: #FAFAFA;
         border: 1px solid #EFEFEF;
         padding-top: 0px;
         padding-right: 20px;
         padding-left: 20px;
         padding-bottom: 10px;
         border-radius: 3px;
         margin-bottom: 15px;
      }

      .review-block-name {
         font-size: 12px;
         margin: 10px 0;
      }

      .review-block-date {
         font-size: 12px;
      }

      .review-block-rate {
         font-size: 13px;
         margin-bottom: 15px;
      }

      .review-block-title {
         font-size: 15px;
         font-weight: 700;
         margin-bottom: 10px;
      }

      .review-block-description {
         font-size: 13px;
      }

      .half {
         position: relative;
      }

      p.pagelink:hover {
         color: #000000;
         text-decoration: none;
      }

   </style>

</head>
<body>

@if (Session('success'))
   <script type="text/javascript">
      Swal.fire({
         icon: 'success',
         title: 'OK',
         text: 'Success!!'
      })
   </script>
@endif

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
                                 <li><a href="{{url('/Profile')}}">Profile</a></li>
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




<!-- detail section
================================================== -->
<section id="header" style="padding-top:0px;">
   <div class="cont">
      <header>
         <i aria-hidden="true"></i>
      </header>
      <main>
         <div class="row">
            <div class="left col-lg-7">
               <div class="photo-left">
                  <img class="photo" src="images/imageProfile/{{$image}}" onerror="this.src='images/user.png'" />
               </div>
               @foreach ($tutors as $tutor)
               <div class="col-md-12">
                  <h1 class="col-md-12">{{$tutor->Fname}} {{$tutor->Lname}}</h1>
                  @if (Auth::check())
                     @if ( Auth:: user()->status == 'tutor' and Auth:: user()->id == $tutor->idTutor)
                        <span class="follow"align="right"><a href="/SE_Project/public/tutorEdit">Edit</a></span>
                     @endif
                  @endif
                  <h3>{{$tutor->email}}</h3>
               </div>
               <div class="col-md-12">
                  <br>
                  <p class="col-md-12" align="left" ><b>About Me</b> : {{$tutor->about_me}}</p>
                  <p class="col-md-12" align="left" ><b>Education</b> : {{$tutor->education}}</p>
                  <p class="col-md-12" align="left" ><b>Work Experient</b> :{{$tutor->work_experient}}</p>
                  <p class="col-md-12" align="left" ><b>Address</b> : {{$tutor->address}}</p>
                  <p class="col-md-12" align="left" ><b>E-mail</b> : {{$tutor->email}}</p>
                  <p class="col-md-12 desc" align="left" ><b>Phone</b> : {{$tutor->phone}}</p>
               </div>
               @endforeach
               <br>
               <div class="col-md-12">
                  <h4><b>Review</b></h4>
                  <br>
                  <div class="row desc">
                     <div class="col-md-12">
                        <div class="rating-block" align="center">
                           <h4 style="font-size: 15px;">Average user rating</h4>
                           <h4 class="bold padding-bottom-7"><?php echo round($avgReview, 1) ?> <small>/ 5</small></h4>
                           <?php
                           if ($avgReview >= 0 and $avgReview < 0.5) {
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 0.5 and $avgReview < 1) {
                              echo ' <span class="fa fa-star-half-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 1 and $avgReview < 1.5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 1.5 and $avgReview < 2) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-half-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 2 and $avgReview < 2.5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 2.5 and $avgReview < 3) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-half-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 3 and $avgReview < 3.5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 3.5 and $avgReview < 4) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-half-o fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 4 and $avgReview < 4.5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 4.5 and $avgReview < 5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star-half-o fa-2x"></span>  ';
                           } elseif ($avgReview >= 5) {
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>';
                              echo ' <span class="fa fa-star fa-2x"></span>  ';
                           } ?>
                           </button>
                        </div>
                     </div>


                     <?php
                        //cal % star
                        $P1 = @($star1/($star1+$star2+$star3+$star4+$star5)*100);
                        $P2 = @($star2/($star1+$star2+$star3+$star4+$star5)*100);
                        $P3 = @($star3/($star1+$star2+$star3+$star4+$star5)*100);
                        $P4 = @($star4/($star1+$star2+$star3+$star4+$star5)*100);
                        $P5 = @($star5/($star1+$star2+$star3+$star4+$star5)*100);
                     ?>
                     <div class="col-md-12" align="center">
                        <br>
                        <h4 style="font-size: 15px;">Rating breakdown</h4>
                        <div class="pull-left">
                           <div class="pull-left" style="width:100px; line-height:1;">
                              <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
                           </div>
                           <div class="pull-left" style="width:425px;">
                              <div class="progress" style="height:9px; margin:8px 0;">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{$P5}}%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                 </div>
                              </div>
                           </div>
                           <div class="pull-right" style="margin-left:10px;">{{$star5}}</div>
                        </div>
                        <div class="pull-left">
                           <div class="pull-left" style="width:100px; line-height:1;">
                              <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
                           </div>
                           <div class="pull-left" style="width:425px;">
                              <div class="progress" style="height:9px; margin:8px 0;">
                                 <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{$P4}}%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                 </div>
                              </div>
                           </div>
                           <div class="pull-right" style="margin-left:10px;">{{$star4}}</div>
                        </div>
                        <div class="pull-left">
                           <div class="pull-left" style="width:100px; line-height:1;">
                              <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
                           </div>
                           <div class="pull-left" style="width:425px;">
                              <div class="progress" style="height:9px; margin:8px 0;">
                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: {{$P3}}%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                 </div>
                              </div>
                           </div>
                           <div class="pull-right" style="margin-left:10px;">{{$star3}}</div>
                        </div>
                        <div class="pull-left">
                           <div class="pull-left" style="width:100px; line-height:1;">
                              <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
                           </div>
                           <div class="pull-left" style="width:425px;">
                              <div class="progress" style="height:9px; margin:8px 0;">
                                 <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: {{$P2}}%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                 </div>
                              </div>
                           </div>
                           <div class="pull-right" style="margin-left:10px;">{{$star2}}</div>
                        </div>
                        <div class="pull-left">
                           <div class="pull-left" style="width:100px; line-height:1;">
                              <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
                           </div>
                           <div class="pull-left" style="width:425px;">
                              <div class="progress" style="height:9px; margin:8px 0;">
                                 <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: {{$P1}}%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                 </div>
                              </div>
                           </div>
                           <div class="pull-right" style="margin-left:10px;">{{$star1}}</div>
                        </div>
                     </div>
                  </div>
               </div>
               <br><br>


               <div class="col-md-12">
                     @foreach ($reviewList as $com)
                     <div class="row">
                        <div class="review-block col-md-12" align="left">
                           <div class="review-block-rate" style="padding-top:18px">
                              <span style="color: #777;font-size: 16px;letter-spacing:1px"><b>{{$com->idcourse}} - {{$com->Ncourse}}&nbsp;&nbsp;</b></span>
                              @if ($com->review == 1)
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              @endif
                              @if ($com->review == 2)
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              @endif
                              @if ($com->review == 3)
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              <span class="fa fa-star-o"></span>
                              @endif
                              @if ($com->review == 4)
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                              @endif
                              @if ($com->review == 5)
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              @endif
                           </div>
                           <div class="review-block-description">
                              <p>{{$com->comment}}</p>
                           </div>
                           <div class="review-block-description" align="right">
                              <p style="font-size: 10pt;">{{$com->Fname}} {{$com->Lname}} - {{$com->date}}</p>
                           </div>
                        </div>
                     </div>
                     @endforeach
               </div>
            </div>

            <div class="right col-lg-5">
               <ul class="navi">
                  <lii>Course</lii>
               </ul>
               

               @foreach ($courses as $course)
               <div class="cont" >
                  <div class="row"style="padding-top:10px;padding-bottom:10px;">
                     <div class="col-md-12">
                        <div class="blog-thumb">
                           <div class="col-md-6" align="center">
                              <img src="images/{{$course->img}}" style="width:100%;max-width:300px high='100%'" onerror="this.src='images/blog-img3.jpg'" class="img-responsive alt=" Blog"></a>
                           </div>
                           <div class="col-md-6" align="center" style="margin-top: 35px;">
                              <p class="pagelink click" onclick="fncAction0({{$course->idcourse}})">{{$course -> Ncourse}}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               <button style="width:90%"class="btn button button2" onClick="javascript:history.go(-1)">Back</button>
            </div>
         </div>
      </main>
   </div>
</section>

<script type="text/javascript">
      function fncAction0(idcourse) {
         window.location.assign("/SE_Project/public/courseInformation?idcourse=" + idcourse);
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
@include('sweet::alert')
</body>
</html>

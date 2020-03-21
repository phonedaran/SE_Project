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
      .colum1 {
         float: left;
         width: 25%;
      }

      .colum2 {
         float: left;
         width: 75%;
      }

      .leftcolumn {
         float: left;
         width: 70%;
      }

      .rightcolumn {
         float: left;
         width: 30%;
         padding-left: 20px;
      }

      .row:after {
         content: "";
         display: table;
         clear: both;
      }

      .card {
         background-color: white;
         padding: 20px;
         margin-top: 20px;
         width: 100%;
      }

      a.pagelink:hover {
         color: #008B8B;
         text-decoration: none;
      }

      /* review part  */

      .btn-grey {
         background-color: #D8D8D8;
         color: #FFF;

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
         padding: 15px;
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
        position:relative;
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
                     <div class="menu-container">
                        <h3 class="wow fadeIn" data-wow-delay="1.6s">
                           @if (Auth:: check())
                           {{ Auth::user()->name }}
                           @endif
                           <div class="circle dark inline">
                              <i class="icon ion-navicon"></i>
                           </div>
                        </h3>

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
                                 <li><a href="{{url('/Profile')}}">profile</a></li>
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

   <!-- Header section
================================================== -->

   <section id="header" class="header-five">
      <div class="container">
         <div class="row">
            <div class="column1">
               <div class="col-md-3">
                  <div class="header-thumb">
                     <img src="images/imageProfile/{{$image}}" onerror="this.src='images/user.png'" style="width:100%;max-width:100px"></p>
                  </div>
               </div>
            </div>

            <div class="column2">
               <div class="col-md-3">
                  <div style="margin-top:100px">
                     @foreach ($tutors as $tutor)
                     <h1>{{$tutor->Fname}} {{$tutor->Lname}}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Detail Profile section
================================================== -->

   <div class=container>
      <div class="row">
         <div class="leftcolumn">
            <div class="card">
               <h1 style="text-align: center">about me</h1>
               <div align="right" onClick="fncAction1({{$tutor->idTutor}})">
                  <i class="fa fa-edit click fa-2x"></i>
               </div>
               <hr>
               <h4 style="text-align:left">Education : {{$tutor->education}}</h4>
               <h4 style="text-align:left">Work Experient :{{$tutor->work_experient}}</h4>
               <h4 style="text-align:left">Email: {{$tutor->email}}</h4>
               <h4 style="text-align:left">Phone : {{$tutor->phone}}</h4>
               <h4 style="text-align:left">Address : {{$tutor->address}}</h4>
            </div>
         </div>
      @endforeach


      <div class="rightcolumn">
         <div class="card">
            <h1 style=" text-align: center">Courses</h1>
            <hr>
            @foreach ($courses as $course)
            <h5>
               <li><a class="pagelink click" onclick="fncAction0({{$course->idcourse}})">{{$course -> Ncourse}}</a></li>
            </h5>
            @endforeach
         </div>
      </div>



      <div class="leftcolumn">
         <div class="card">
            <h1>Review</h1>
            <hr>
            <div class="container">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="rating-block">
                        <h4>Average user rating</h4>
                        <h4 class="bold padding-bottom-7"><?php echo round($rate,1) ?> <small>/ 5</small></h4>

                            @if ($rate <= 0.5)
                                <span class="fa fa-star-half-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 0.5 && $rate <= 1)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-0 fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 1 && $rate <= 1.5)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-half-0"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 1.5 && $rate <= 2)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 2 && $rate <= 2.5)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-half-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 2.5 && $rate <= 3)
                                <span class="fa fa-star v"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 3 && $rate <= 3.5)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-half-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 3.5 && $rate <= 4)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x" ></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif
                            @if ($rate > 4 && $rate <= 4.5)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-half-o fa-2x"></span>
                            @endif
                            @if ($rate > 4.5 && $rate <= 5)
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                                <span class="fa fa-star-o fa-2x"></span>
                            @endif

                        </button>
                     </div>
                  </div>

                  <?php
                        //cal % star
                        $P1 = $star1/($star1+$star2+$star3+$star4+$star5)*100;
                        $P2 = $star2/($star1+$star2+$star3+$star4+$star5)*100;
                        $P3 = $star3/($star1+$star2+$star3+$star4+$star5)*100;
                        $P4 = $star4/($star1+$star2+$star3+$star4+$star5)*100;
                        $P5 = $star5/($star1+$star2+$star3+$star4+$star5)*100;
                  ?>
                  <div class="col-sm-5">
                     <h4>Rating breakdown</h4>
                     <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                           <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
                        </div>
                        <div class="pull-left" style="width:400px;">
                           <div class="progress" style="height:9px; margin:8px 0;">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{$P5}}%">
                                 <span class="sr-only">80% Complete (danger)</span>
                              </div>
                           </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">{{$star5}}</div>
                     </div>
                     <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                           <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
                        </div>
                        <div class="pull-left" style="width:400px;">
                           <div class="progress" style="height:9px; margin:8px 0;">
                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{$P4}}%">
                                 <span class="sr-only">80% Complete (danger)</span>
                              </div>
                           </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">{{$star4}}</div>
                     </div>
                     <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                           <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
                        </div>
                        <div class="pull-left" style="width:400px;">
                           <div class="progress" style="height:9px; margin:8px 0;">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: {{$P3}}%">
                                 <span class="sr-only">80% Complete (danger)</span>
                              </div>
                           </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">{{$star3}}</div>
                     </div>
                     <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                           <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
                        </div>
                        <div class="pull-left" style="width:400px;">
                           <div class="progress" style="height:9px; margin:8px 0;">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: {{$P2}}%">
                                 <span class="sr-only">80% Complete (danger)</span>
                              </div>
                           </div>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">{{$star2}}</div>
                     </div>
                     <div class="pull-left">
                        <div class="pull-left" style="width:35px; line-height:1;">
                           <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
                        </div>
                        <div class="pull-left" style="width:400px;">
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

               <div class="row">
                  <div class="col-sm-8">
                     <hr />
                     <div class="review-block">
                        @foreach ($reviewList as $com)

                            <div class="row">
                            <div class="col-sm-3">
                                <div class="review-block-name"><a href="#">{{$com->Fname}} {{$com->Lname}}</a></div>
                                <div class="review-block-date">{{$com->date}}<br /></div>
                            </div>
                            <div class="col-sm-9">
                                <div class="review-block-rate">
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

                            <div class="review-block-title">{{$com->idcourse}} - {{$com->Ncourse}}</div>
                            <div class="review-block-description">{{$com->comment}}</div><br>
                            </div>
                            </div>

                        @endforeach
                     </div>
                  </div>
               </div>
            </div> <!-- /container -->
         </div>
      </div> <!-- //leftcolumn review  -->
   </div>
   <!--/row -->
   </div><!-- /container -->

   <script type="text/javascript">
      function fncAction0(idcourse) {
         window.location.assign("/SE_Project/public/courseInformation?idcourse=" + idcourse); 
      }
   </script>
   <script type="text/javascript">
      function fncAction1(idTutor) {
         window.location.assign("/SE_Project/public/tutorEdit?idTutor=" + idtutor); 
      }
   </script>

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

   <!-- Bootstrap core JavaScript Review Part
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script>
      window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
   </script>
   <script src="js/bootstrap.min.js"></script>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="js/ie10-viewport-bug-workaround.js"></script>
   @include('sweet::alert')
</body>

</html>

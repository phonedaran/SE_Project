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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet"/>
    

    <style>
   
       .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
        }
        
.swiper_wrap{padding:0px 5px;height:100%;width: 100%;position: relative;display: block;text-align: left;}
.swiper-button-next{
margin-top: 0px;
position: absolute;
top: 50%;
right: -40px;
width: 45px;
height: 45px;
transform: translateY(-50%);
}
.swiper-button-prev{
  position: absolute;
  top: 50%;
  left: -40px;
  width: 45px;
  height: 45px;
  transform: translateY(-50%);
  margin-top: 0px;
}

.btn {
	font-family: 'Source Sans Pro', sans-serif;
	background: #e44c65;
	border-color: #111112;
	/* transparent */
  color:#111112 ;
	height: 47px;
	font-size: 100px;
  font-weight: 700;
  letter-spacing: 1px;
  transition: all 0.4s ease-in-out;
	margin-right: 65px;
	border-radius: 0px;
	width:10%;
    float: right;
}

.btn:hover {
	background: rgb(214, 213, 210);
	/* color:#ffffff ; */
	/* font-weight: 400; */
}
     </style>

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
   <link rel="stylesheet" href="{{ URL::asset('css/ms.css') }}">
   <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.css') }}">
   <!-- <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}"> -->
   <!-- Google web font
   ================================================== -->
   <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>

   <!-- UI Slider CSS
   ================================================== -->


   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">


   <!-- sweet 2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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
                                 <li><a href="#">edit profile</a></li>
                                 <li><a href="{{url('/enroll')}}">enrollment</a></li>
                                 <li><a href="#">review</a></li>
                              <!-- tutor -->
                              @elseif ( Auth:: user()->status == 'tutor')
                                 <li><a href="{{url('/Profile')}}">Profile</a></li>
                                 <li><a href="{{url('/course')}}">Tutor Course</a></li>

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
   <section id="header" class="header-one">
      <div class="container">
         <div class="row">

            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
               <div class="header-thumb">
                  <h1 class="wow fadeIn" data-wow-delay="1.6s">WELCOME TO SHARED TUTORING</h1>
                  <h3 class="wow fadeInUp" data-wow-delay="1.9s">LEARN WITH THE BEST TUTORS</h3>
               </div>
            </div>

         </div>
      </div>
   </section>


   <!-- list section
================================================== -->
   <section id="blog" >
   
   <div class="container">
   <div class="row"><a href="/SE_Project/public/allcourse" class="btn"><b>All course</b></a></div> 
   <div class="swiper_wrap">
<div class="slider-wrapper">
       <div class="swiper-button-prev"></div>
        <div class="swiper-container">
			<div class="swiper-wrapper ">
            @foreach ( $courses as $c )
            <div class="swiper-slide ">
                        <div class="wow fadeInUp col-md-11 col-sm-10 " data-wow-delay="0.8s" style="padding-top: 25px">
                           <div class="blog-thumb">
                              <a href="#"><img src="images/{{$c->img}}" onerror="this.src='images/blog-img3.jpg'" class="img-responsive" alt="Blog"></a>
                              <h1 class="text">{{$c->Ncourse}}</h1>
                              
                              <p class="col-md-12" align="left"><i class="fa fa-pencil"></i> : {{$c->subject}} </p>
                              <!-- <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/{{$c->max_student}}</p> -->
                              <!-- <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : {{$c->start_date}}</p> -->
                              <!-- <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : {{$c->day}}</p> -->
                              <p class="col-md-12" align="left"><i class="fa fa-user"></i> : {{$c->Fname}} {{$c->Lname}}</p>
                              <!-- <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : {{$c->location}}</p> -->
                              <p class="col-md-12" align="left">ราคา {{$c->price}} บาท</p>
                              <button onclick="fncAction0({{$c->idcourse}})" class="col-md-12 btn btn-default">MORE INFO</button>
                           </div>
                        </div>
                        </div>
                        @endforeach
			</div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        </div>
       <div class="swiper-button-next"></div>
</div>   
</div>
</div>
   </section>

  <section id="about">
  <div class="container">
    <div class="row">

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title text-center">
          <h1>Snapshot Team</h1>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        </div>
      </div>

      <!-- team carousel ??-->
      <div id=" team-carousel" class="owl-carousel">
      @foreach ( $tutors as $t )
      <div class="item col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.4s">
        <div class="team-thumb">
        @foreach($idCards as $idCard)
		@if($t->idTutor == $idCard->idTutor)
          <div class="image-holder">
            <img src="images/imageProfile/{{$idCard->img_path}}" class="img-responsive img-circle" alt="Mary" style="width:100%;max-width:200px">
          </div>
          @endif
        @endforeach
        <a class="click" onClick="fncAction1({{$t->idTutor}})"><h2 class="heading">{{$t->Fname}}</h2></a> <!-- link ไป profile tutor -->                
          <p class="description">Aliquam ac justo est. Praesent feugiat cursus est.</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



   

   <!-- javascript section
================================================== -->
<script type="text/javascript">

   function fncAction0(idcourse){
      window.location.assign("/SE_Project/public/courseInformation?idcourse="+idcourse); //ไปหน้า courseinfo 
   }

   function fncAction1(idTutor){
		window.location.assign("/SE_Project/public/Profile?idTutor="+idTutor);
	} //ไปหน้า profile tutor
   
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
   <script src="js/isotope.js"></script>
   <script src="js/imagesloaded.min.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/custom.js"></script>

   <!-- UI Slider -->
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



   <script>
      $("input:checkbox").on('click', function() {
         // in the handler, 'this' refers to the box clicked on
         var $box = $(this);
         if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
         } else {
            $box.prop("checked", false);
         }
      });
   </script>

   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
      }
   </script>

<script>
    function resetOption(){
        $('#person').prop('selectedIndex',0);
        $('#subject').prop('selectedIndex',0);
        $('#province').prop('selectedIndex',0);
    }
</script>

<script>
var swiper = new Swiper('.swiper-container', {
		    nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 3,
        spaceBetween: 10,
        // autoplay: 3500,
        autoplayDisableOnInteraction: false,
		loop: true,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
</script>

<script src="http://www.jakse.si/test/jakse/taxi/js/swiper.min.js"></script>

</body>

</html>
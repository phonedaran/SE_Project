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

        .text2 {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; /* number of lines to show */
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
	background: #18b6f5;
	border-color: #111112;
    /* transparent */
    text-align: center;
    padding:0.5em;
  color:#111112 ;
	height: 3em;
  font-weight: 700;
  letter-spacing: 1.5px;
  transition: all 0.4s ease-in-out;
    border-radius: 0px;
}
.yel{
    background:#e6ce4b;
}
.btn:hover{
    border-width: 5px;
    border-style: double;
    border-color: #a9e4fc;
    color:#111112 ;

}
.yel:hover{
	border-width: 5px;
    border-style: double;
    border-color: #fdfc9f;
    color:#111112 ;
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
   <link rel="stylesheet" href="{{ URL::asset('css/ag.css') }}">
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
                              <!-- <li><a href="{{url('/contact')}}">Contact</a></li> -->
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
   <section id="header" class="head">
      <div class="container">
         <div class="row">

            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
               <div class="header-thumb">
                  <h1 class="wow fadeIn" style="padding-top:0px;" data-wow-delay="0.4s">WELCOME TO</h1>
                  <h1 class="wow fadeIn" style="padding-top:0px;" data-wow-delay="0.4s">SHARED TUTORING</h1>
                  <h3 class="wow fadeInUp" style="padding-top:10px;" data-wow-delay="0.4s">LEARN WITH THE BEST TUTORS</h3>
               </div>
            </div>

         </div>
      </div>
   </section>
   <!-- list section
================================================== -->
<section id="feature">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="2s">
						<h1 style="float:center;margin-left:100px;" class="text-uppercase">learner</h1>
                        <p style="float:center;margin-left:100px;"><i class="fa fa-circle"></i>ค้นหาติวเตอร์ที่ต้องการ</p>
                        <p style="float:center;margin-left:100px;"><i class="fa fa-circle"></i>ลงทะเบียนคอร์สเรียนผ่านระบบ</p>
                        <p style="float:center;margin-left:100px;"><i class="fa fa-circle"></i>ลงประกาศหาติวเตอร์ที่ตรงกับความต้องการ</p>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="2.5s">
                        <img src="images/reading.png" class="img-responsive" alt="feature img"
                         style="width:100%;max-width:250px;float:left;">
					</div>
				</div>
			</div>
		</section>
		<!-- end feature -->

		<!-- start feature1 -->
		<section id="feature1">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInUp" data-wow-delay="2.3s">
                        <img src="images/tt.png" class="img-responsive" alt="feature img"
                        style="width:100%;max-width:250px;float:center;margin-left:100px;">
					</div>
					<div class="col-md-6 wow fadeInUp" data-wow-delay="2s">
						<h1 class="text-uppercase">Tutor</h1>
                        <p><i class="fa fa-circle" ></i>เพิ่มคอร์สเรียนที่น่าสนใจ</p>
                        <p><i class="fa fa-circle"></i>รับงานสอนได้โดยตรง ไม่ต้องเสียค่าใช้จ่าย</p>
					</div>
				</div>
			</div>
		</section>

<section id="contact">
  <div class="container">
      <div class="row">
         <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="1.8s">
            <h1>Find your tutor</h1>
            <h1 style="padding-top:0px;padding-bottom:20px;font-size:20px;">by announcement</h1>
         </div>
      </div>

      @if (Auth::check())
         @if ( Auth:: user()->status == 'student')
         <div class="wow fadeInUp" data-wow-delay="2s">
         <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12">
                  <p style="font-size:25px">Click to <b>Add</b> announcement</p>
            </div>
         </div>
         <div class="row">
            <a href="/SE_Project/public/student/announce" class="btn yel" style="float: center;width:20%;font-size: 15px;">
         <b>ADD ANNOUNCEMENT</b></a></div>
         <br>
         </div>

         <div class="row wow fadeInUp" data-wow-delay="2.3s" style="margin-bottom:10px;">
            <i style='font-size:15px'class='fa fa-circle'></i>
            <i style='font-size:15px'class='fa fa-circle'></i>
            <i style='font-size:15px'class='fa fa-circle'></i>
            <i style='font-size:15px'class='fa fa-circle'></i>
         </div>

         @endif
      @endif
      <div class="wow fadeInUp" data-wow-delay="2.5s">
         <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12">
               <p style="font-size:25px">Click to <b>See</b> all announcement</p>
            </div>
         </div>
         <div class="row">
            <a href="/SE_Project/public/showAnn" class="btn" style="float: center;width:20%;font-size: 15px;"><b>ANNOUNCEMENT</b></a>
         </div>
      </div>
   </div>
</section>


   <section id="blog" >
   <div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
        <div class="section-title text-center">
          <h1>Courses</h1>
          <h3>An Interesting Courses</h3>
        </div>
      </div>
   <div class="row">
       <a href="/SE_Project/public/allcourse" class="btn" style="float: right;margin-right: 65px;width:10%;">
       <b>All course</b></a>
    </div>
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
                              <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/{{$c->max_student}}</p>
                              <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : {{$c->start_date}}</p>
                              <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : {{$c->day}}</p>
                              <p class="col-md-12" align="left"><i class="fa fa-user"></i> : {{$c->Fname}} {{$c->Lname}}</p>
                              <p class="col-md-12" align="left"><i class="fa fa-map-marker"></i> : {{$c->location}}</p>
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
<!-- // show top 3 tutor -->
  <section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
        <div class="section-title text-center">
          <h1>Top 3 Tutors</h1>
          <h3>The tutor that received the best reviews.</h3>
        </div>
      </div>

      <!-- team carousel -->
      <div id=" team-carousel" class="owl-carousel">
      @foreach ( $tutors as $t )
      <div class="item col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.2s">
        <div class="team-thumb">
        @foreach($idCards as $idCard)
		@if($t->idTutor == $idCard->idTutor)
          <div class="image-holder">
            <img src="images/imageProfile/{{$idCard->img_path}}" class="img-responsive img-circle" alt="Mary" style="width:100%;max-width:200px">
          </div>
          @endif
        @endforeach
        <a class="click" onClick="fncAction1({{$t->idTutor}})">
            <h2 class="heading">{{$t->Fname}}</h2>
            <h2 class="heading">{{$t->Lname}}</h2>
        </a> <!-- link ไป profile tutor -->
        <div class="heading">
        <?php
                           if ($t->rating>=0 and $t->rating<0.5){
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=0.5 and $t->rating<1){
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=1 and $t->rating<1.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=1.5 and $t->rating<2){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=2 and $t->rating<2.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=2.5 and $t->rating<3){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=3 and $t->rating<3.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=3.5 and $t->rating<4){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=4 and $t->rating<4.5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-o"></span>  ';
                           }
                           elseif($t->rating>=4.5 and $t->rating<5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star-half-o"></span>  ';
                           }
                           elseif($t->rating>=5){
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>';
                              echo ' <span class="fa fa-star"></span>  ';
                           }
                          ?>
                     </div>
          <p class="description text2">{{$t->about_me}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="contact" style="background:#cecece;">
   <div class="row wow fadeInUp" data-wow-delay="0.2s">
      <div class="col-md-offset-1 col-md-5 col-sm-12">
         <h1 style="float:right;padding-top:0px;">Register to be our tutor</h1>
      </div>
      <div class="col-md-offset-1 col-md-5 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
         <a href="/SE_Project/public/tutorReg" class="btn" style="float: left;width:10em;font-size: 20px; line-height:38px;"><b>REGISTER</b></a>
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
               <ul class="social-icon wow fadeInUp" data-wow-delay="0.3s">
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

<!-- Back top -->
<!-- <a href="#" class="go-top"><i class="fa fa-plus"></i></a> -->
<a href="#" class="go-top" ><i class="fa fa-angle-up"></i></a>

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


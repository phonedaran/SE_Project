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
    <script>
        $( function() {
        $( "#slider-range" ).slider({
            orientation: "horizontal",
            range: true,
            min: 0,
            max: 3500,
            step:100,
            values: [ 500, 2500 ],

            slide: function( event, ui ) {
                $("#min").val(ui.values[ 0 ]);
                $("#max").val(ui.values[ 1 ]);
                $( "#amount" ).val(ui.values[ 0 ] + " THB - " + ui.values[ 1 ] + " THB" );
            }
        });
        $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
            " THB - " + $( "#slider-range" ).slider( "values", 1 ) + " THB" );
        } );
    </script>

    <style>
        /* side nav */

        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #ffffff;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #636363;
          display: block;
          transition: 0.3s;
        }

        .sidenav a:hover {
          color: #f22;
        }

        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }


        select#soflow, select#soflow-color {
            -webkit-appearance: button;
            -webkit-border-radius: 2px;
            -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            -webkit-padding-end: 20px;
            -webkit-padding-start: 2px;
            -webkit-user-select: none;
            text-align-last: center;
            border: 1px solid #AAA;
            color: #555;
            font-size: inherit;
            overflow: hidden;
            padding: 5px 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 200px;
        }

        select#soflow-color {
            color: #131313;
            background-color: #ffffff;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            padding-left: 15px;
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
text: 'Succecc!!'
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
<!-- alert success login -->

{{-- <div class="nav-container">
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
</div> --}}

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
                                 <li><a href="{{url('/review')}}">review</a></li>
                              <!-- tutor -->
                              @elseif ( Auth:: user()->status == 'tutor')
                                 <li><a href="{{url('/course')}}">Tutor Course</a></li>
                                 <li><a href="#">edit profile</a></li>

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

                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <form action="{{ URL::to('/course') }} " method="get">
                        <p>
                            <label for="amount">Price range:</label>
                            <input id="min" type="hidden" value='500' name="min">
                            <input id="max" type="hidden" value='2500' name="max">
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>

                            <br>
                            <p>
                                <label>Subject</label>


                            </p>
                                <select name="subject"  id="soflow-color">
                                    <option value="">วิชา</option>
                                    <option value="ภาษาไทย">ภาษาไทย</option>
                                    <option value="สังคมศึกษา">สังคมศึกษา</option>
                                    <option value="ภาษาอังกฤษ">ภาษาอังกฤษ</option>
                                    <option value="คณิตศาสตร์">คณิตศาสตร์</option>
                                    <option value="วิทยาศาสตร์">วิทยาศาสตร์</option>
                                </select>

                            <br>
                            <br>
                            <p>
                                <label>Location</label>

                            </p>
                            <select name="province"  id="soflow-color">
                                <option value="" selected>จังหวัด</option>
                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                <option value="กระบี่">กระบี่ </option>
                                <option value="กาญจนบุรี">กาญจนบุรี </option>
                                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                <option value="กำแพงเพชร">กำแพงเพชร </option>
                                <option value="ขอนแก่น">ขอนแก่น</option>
                                <option value="จันทบุรี">จันทบุรี</option>
                                <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                <option value="ชัยนาท">ชัยนาท </option>
                                <option value="ชัยภูมิ">ชัยภูมิ </option>
                                <option value="ชุมพร">ชุมพร </option>
                                <option value="ชลบุรี">ชลบุรี </option>
                                <option value="เชียงใหม่">เชียงใหม่ </option>
                                <option value="เชียงราย">เชียงราย </option>
                                <option value="ตรัง">ตรัง </option>
                                <option value="ตราด">ตราด </option>
                                <option value="ตาก">ตาก </option>
                                <option value="นครนายก">นครนายก </option>
                                <option value="นครปฐม">นครปฐม </option>
                                <option value="นครพนม">นครพนม </option>
                                <option value="นครราชสีมา">นครราชสีมา </option>
                                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                <option value="นครสวรรค์">นครสวรรค์ </option>
                                <option value="นราธิวาส">นราธิวาส </option>
                                <option value="น่าน">น่าน </option>
                                <option value="นนทบุรี">นนทบุรี </option>
                                <option value="บึงกาฬ">บึงกาฬ</option>
                                <option value="บุรีรัมย์">บุรีรัมย์</option>
                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                <option value="ปทุมธานี">ปทุมธานี </option>
                                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                <option value="ปัตตานี">ปัตตานี </option>
                                <option value="พะเยา">พะเยา </option>
                                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                <option value="พังงา">พังงา </option>
                                <option value="พิจิตร">พิจิตร </option>
                                <option value="พิษณุโลก">พิษณุโลก </option>
                                <option value="เพชรบุรี">เพชรบุรี </option>
                                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                <option value="แพร่">แพร่ </option>
                                <option value="พัทลุง">พัทลุง </option>
                                <option value="ภูเก็ต">ภูเก็ต </option>
                                <option value="มหาสารคาม">มหาสารคาม </option>
                                <option value="มุกดาหาร">มุกดาหาร </option>
                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                <option value="ยโสธร">ยโสธร </option>
                                <option value="ยะลา">ยะลา </option>
                                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                <option value="ระนอง">ระนอง </option>
                                <option value="ระยอง">ระยอง </option>
                                <option value="ราชบุรี">ราชบุรี</option>
                                <option value="ลพบุรี">ลพบุรี </option>
                                <option value="ลำปาง">ลำปาง </option>
                                <option value="ลำพูน">ลำพูน </option>
                                <option value="เลย">เลย </option>
                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                <option value="สกลนคร">สกลนคร</option>
                                <option value="สงขลา">สงขลา </option>
                                <option value="สมุทรสาคร">สมุทรสาคร </option>
                                <option value="สมุทรปราการ">สมุทรปราการ </option>
                                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                <option value="สระแก้ว">สระแก้ว </option>
                                <option value="สระบุรี">สระบุรี </option>
                                <option value="สิงห์บุรี">สิงห์บุรี </option>
                                <option value="สุโขทัย">สุโขทัย </option>
                                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                <option value="สุรินทร์">สุรินทร์ </option>
                                <option value="สตูล">สตูล </option>
                                <option value="หนองคาย">หนองคาย </option>
                                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                <option value="อุดรธานี">อุดรธานี </option>
                                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                <option value="อุทัยธานี">อุทัยธานี </option>
                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                <option value="อ่างทอง">อ่างทอง </option>
                            </select>
                        <br>
                        <br>
                            <br>

                            <input type="submit" class="btn btn-secondary" name="view" value="Filter" >

                    </form>
                </div>
              <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Filter</span>

                        <!-- iso box section -->
                        <div class="container">
                           <div class="row">


                            @foreach ( $courses as $c )
                                <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s" style="padding-top: 25px">
                                    <div class="blog-thumb">
                                        <a href="#"><img src="images/{{$c->img}}" onerror="this.src='images/blog-img3.jpg'" class="img-responsive" alt="Blog"></a>
                                        <a href="#"><h1>{{$c->Ncourse}}</h1></a>
                                        <p class="col-md-12" align="left"><i class="fa fa-pencil"></i> : {{$c->subject}} </p>
                                        <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/{{$c->max_student}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : {{$c->start_date}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : {{$c->day}}</p>
                                        <p class="col-md-12" align="left"><i class="fa fa-user"></i> : {{$c->Fname}} {{$c->Lname}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : {{$c->location}}</p>
                                        <p class="col-md-6" align="left">ราคา {{$c->price}} บาท</p>
                                        <button onclick="fncAction0({{$c->idcourse}})" class="col-md-12 btn btn-default">MORE INFO</button>
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

<!-- javascript section
================================================== -->
<script type="text/javascript">

   function fncAction0(idcourse){
      window.location.replace("/SE_Project/public/courseInformation?idcourse="+idcourse); //เติม path ไปหา edit course
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

</body>
</html>

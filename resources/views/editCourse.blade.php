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

.above{
	margin-top: 5px;
	font-size:14px;
}
.btn {
	font-family: 'Source Sans Pro', sans-serif;
	background: #f9f9fc;
	/* rgb(156, 150, 140) */
	border-color: #111112;
	/* transparent */
  color:#111112 ;
	height: 50px;
	font-size: 16px;
  font-weight: 525;
  letter-spacing: 1px;
  transition: all 0.4s ease-in-out;
	margin-top: -0.2px;
	border-radius: 0px;
	width:30%;

}
.btn{
	padding: 13px 32px;
	margin-bottom: 5px;
}
.btn:hover {
	background: rgb(214, 213, 210);
	/* color:#ffffff ; */
	/* font-weight: 400; */
}
#contact .form-control {
  background: transparent;
  border: 1px solid #eee;
  border-radius: 0px;
  box-shadow: none;
  font-size: 16px;
  margin-bottom: 16px;
  transition: all 0.4s ease-in-out;
}
#contact .form-control:hover {
  border-color: #f0f0f0;
}
.avartar-picker {
    padding-left: 15px;
    margin-top: 20px; }
    .avartar-picker .inputfile {
      display: none;
    }
    .avartar-picker label {
      display: block;
      cursor: pointer;
      display: inline-block;
      color: #333;
      font-size: 20px;
      text-transform: uppercase;
      font-weight: 800; }
      .avartar-picker label:hover {
        color: #666666;
       }
      .avartar-picker label i {
        margin-right: 3px; }
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
                                 <li><a href="#">edit course</a></li>
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
<?php
            $cId = $_GET['cId'];
        ?>

				@if (Session('null'))
				<script type="text/javascript">
				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Input all requied field!'
})
				</script>

			@endif
			@if (Session('haveName'))
      <script type="text/javascript">
				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'The course name has already in use.'
})
				</script>
			@endif

			@if (Session('mail'))
      <script type="text/javascript">
				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'This Email is duplicate'
})
				</script>
      @endif

@if (Session('success'))
      <script type="text/javascript">
				Swal.fire({
  icon: 'success',
  title: 'OK',
  text: 'Succecc!!'
})
				</script>
      @endif

@foreach($courses as $c)
@if($c->idcourse == $cId )
			<section id="contact">
			<form action="{{ URL::to('/courseEdit/check') }}" method ="post" enctype="multipart/form-data">
				{{csrf_field()}}
		<div class="container">
				<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="1.2s">
					<h1>Edit Your Course</h1>
						<div class="card" style="background :">
							<div class="contentCard">
                            <p class="col-md-12" align="left">
							<input name="cId" type="hidden" value="{{$cId}}" ></p>

								<div class="col-md-12">
									<br>
                  <!-- style="background-image: url(images/imageProfile/{{$c->img}}) ;" -->
									<div class="avartar-picker col-md-12" align="center" >
										<br>
										<p><img id="blah" src="images/imageCourse/{{$c->img}}" onerror="this.src='images/blog-img3.jpg'" style="width:100%;max-width:200px"></p>
									<input type="file" onchange="readURL(this);" name="image" id="file-1" class="inputfile" accept="image/jpg,image/jpeg,image/png,application/pdf" data-multiple-caption="{count} files selected" multiple />
									<label for="file-1">
										<i class="zmdi zmdi-camera"></i>
										<span>Choose Picture</span>
									</label>
								</div>
									<br>

									<p class="col-md-6" align="left"><label><font size="3">Name Course*</font></label>
									<input name="Ncourse" type="text" class="form-control"  value="{{$c->Ncourse}}" required></p>

									<p class="col-md-6" align="left"><label ><font size="3">Subject*</font></label>
                                    <input name="subject" type="text" class="form-control"  value="{{$c->subject}}" required></p>

                                    <p class="col-md-6" align="left"><label for="">Number of students accepted*</label>
                                    <input name="maxStudent" type="number" class="form-control" value="{{$c->max_student}}" required>
					                </p>

									<p class="col-md-6" align="left">
									<label for="">Day*</label>
	                    	<input type="text" name="day" class="form-control" required  value="{{$c->day}}" >
									</p>

									<p class="col-md-6" align="left"><label ><font size="3">Start time*</font></label>
									<input name="stime" type="time" class="form-control"  value="{{$c->start_time}}" required></p>

									<p class="col-md-6" align="left"><label ><font size="3">End time*</font></label>
									<input name="etime" type="time" class="form-control"  value="{{$c->end_time}}" required></p>

									<p class="col-md-6" align="left"><label >Start date *</label>
	                    		<input type="date" name="startDate" class="form-control" value="{{$c->start_date}}" required></p>

									<p class="col-md-6" align="left"><label>End date*</label>
									<input type="date" name="endDate" class="form-control" value="{{$c->end_date}}" required ></p>

									<p class="col-md-6" align="left"><label>Location*</label>
												<input type="text" name="location"  class="form-control" value="{{$c->location}}" style="height: 70px" required></input>

									<p class="col-md-6" align="left"><label>Price*</label>
												<input type="number" name="price"  class="form-control" value="{{$c->price}}"  style="height: 70px" required></input>

                                                <p class="col-md-12" align="left"><label>Description*</label>
								            <input type="text" name="description" class="form-control" value="{{$c->description}}" style="height: 70px" required></p>

								</div>
								<br>
										<div id="outer" >
											<input type="submit" class="inner button " value="Save" >
											<a href="/SE_Project/public/home" class="inner button btn">Cancle</a>
										</div>

							</div>
						</div>
				</div>


		</div><br /><br /><br />
</form>
    </section>
    @endif
   @endforeach



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


<script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
						;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>



@include('sweet::alert')
</body>
</html>

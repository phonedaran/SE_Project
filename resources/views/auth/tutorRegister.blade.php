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

	<meta name="author" content="colorlib.com">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="{{ URL::asset('fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">

	<!-- Site title
   ================================================== -->
	<title>Register</title>

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
	<link rel="stylesheet" href="{{ URL::asset('css/style1.css') }}">

	<!-- Google web font
   ================================================== -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>

  <!-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> -->
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<style>
	.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
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

                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                     	<ul id="nav-menu">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('/login')}}">Log-in</a></li>
							<li><a href="{{url('/register')}}">Register</a></li>
							<li><a href="{{url('/contact')}}">Contact</a></li>
                      </ul>
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
<div class="wrapper">
@if (Session('null'))
				<script type="text/javascript">
				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Input all requied field!'
})
				</script>

			@endif
			@if (Session('pass'))
      <script type="text/javascript">
				Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Password is min lenght of 8'
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
			<div class="image-holder">
				<img src="images/form-wizard2.png" alt="">


			</div>
			<!-- -->
			<form  action="{{ URL::to('/tutorReg/check') }}" method ="post" enctype="multipart/form-data">
				{{csrf_field()}}
            	<div id="wizard">
            		<!-- SECTION 1 -->
					<form class="needs-validation" >
					<h4></h4>
	                <section>
					<div class="form-header">
	                		<div class="avartar">
									<a href="#">
								<!-- <div id="circle"></div> -->
									<img id="blah"src="images/avartar.png" alt="" class="center">

								</a>

								<div class="avartar-picker">
									<input type="file" onchange="readURL(this);" name="image" id="file-1" class="inputfile" accept="image/jpeg,image/png,application/pdf" data-multiple-caption="{count} files selected" multiple />
									<label for="file-1">
										<i class="zmdi zmdi-camera"></i>
										<span>Choose Picture</span>
									</label>
								</div>
							</div>
					</div>
	                    <div class="form-row form-group">
							<div class="form-holder">
	                    		<label for="">First Name *</label>
	                    		<input type="text" name="Fname" required class="form-control3">
	                    	</div>
	                    	<div class="form-holder">
	                    		<label for="">Last Name *</label>
	                    		<input type="text" name="Lname" required class="form-control3">
	                    	</div>
						</div>
						<div class="form-row ">

							<label for="">
	                    		Gender *
	                    	</label>
	                    	<div class="form-holder">
								<i class="zmdi zmdi-caret-down"></i>
	                    		<select name="gender" id="" class="form-control3" required>
									<option value="Female" class="option">Female</option>
									<option value="Male" class="option">Male</option>
									<option value="Lgbt" class="option">Lgbt</option>
								</select>
	                    	</div>
							</div>

							<div class="form-row ">

							<label for="">
	                    		Birthday *
	                    	</label>
	                    	<input type="date" name="DOB" class="form-control3" required placeholder="" style="margin-bottom: 20px">
	                    	</div>

							<div class="form-row">
	                    	<label for="">
	                    		Address *
	                    	</label>
	                    	<input type="text" name="addr" class="form-control3" required placeholder="Street address" style="margin-bottom: 20px">
	                    	 </div>

					</section>


					<!-- SECTION 2 -->
	                <h4></h4>
	                <section>
	                	<div class="form-row">

						<label for="">
	                    		Evidence*
		                    </label>
									<input type="file"style=" margin-bottom: 20px;" class="form-control3 custom-file-upload  " 
									name="evidence"  accept="image/jpeg,image/png,application/pdf" data-multiple-caption="{count} files selected" multiple required/>
									
								
						</div>

						<div class="form-row">
	                    	<label for="">
	                    		Education*
							</label>
							<p>ระดับชั้นการศึกษา ที่กำลังศึกษาหรือจบการศึกษามา</p>
							<p>ตัวอย่าง ชั้นปีที่ 3 คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเชียงใหม่</p>
	                    	<input type="text" name="education" required class="form-control3" placeholder="..">
						</div>

						<div class="form-row">
	                    	<label for="">
	                    		Partner
	                    	</label>
	                    	<input type="text" name="partner" class="form-control3" placeholder="">
	                    </div>

	                    <div class="form-row" style="margin-bottom: 18px">
	                    	<label for="">
	                    		Work experient
							</label>
							<p> </p>
	                    	<textarea name="work" id="" class="form-control3" placeholder="ประสบการณ์สอน เช่น 1.ทำกลุ่มติว Onet สอนนักเรียนม.6" style="height: 149px"></textarea>
											</div>
						<!-- <div class="checkbox">
							<label>
								<input type="checkbox"> Create an account?
								<span class="checkmark"></span>
							</label>
						</div> -->
	                </section>

	                <!-- SECTION 4 -->
	                <h4></h4>
	                <section>

						 <div class="form-row ">
	                    	<div class="form-holder ">
	                    		<label for="">
	                    		Phone *
		                    	</label>
	                    		<input type="tel" name="phone" class="form-control3" required>
	                    	</div>
	                    </div>

	                    <div class="form-row">
	                    	<label for="">
	                    		Email*
	                    	</label>
	                    	<input type="email" name="email" class="form-control3" required>
	                    </div>

						<div class="form-row">
	                    	<label for="">
	                    		Password*
							</label>
							<!-- <input id="password-field" type="password" name="password" required class="form-control"> -->
							<input id="password-field" type="password" class="form-control" name="password" required>
							<span toggle="#password-field"  class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
						
						<!-- <div class="col-md-6 col-sm-20" style="margin-right:50px;"> onClick="this.form.action='{{ URL::to('/tutorReg/check') }}'; submit()"-->
							<!-- form-control submit -->
							<input type="submit" id="" class="actions li a" value="Create account" >
						<!-- </div> -->
						<br>
					</section>
					
					
            	</div>
            </form>
		</div>


<!-- Footer section
================================================== -->
<br>
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
<script src="js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
<script src="js1/jquery.steps.js"></script>

<script src="js1/main.js"></script>
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

<!-- <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script> -->



</body>
</html>

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
	height: 47px;
	font-size: 16px;
  font-weight: 525;
  letter-spacing: 1px;
  transition: all 0.4s ease-in-out;
	margin-top: 11px;
	border-radius: 0px;
	width:100%;
	
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
                <a href="index.html">Shared Tutoring</a>
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
                           <li><a href="index.html">Home</a></li>
                           <li><a href="login.html">Log-in</a></li>
                           <li><a href="register.html">Register</a></li>
                           <li><a href="contact.html">Contact</a></li>
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
<section id="contact">
	<div class="container">
		<div class="row" style="background-color : ">
		  <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.6s">

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

			  <h1>Let's be a member!</h1>
			<div class="contact-form">
			  <!-- method="post"  action="#"newhotpartgenerate.php onsubmit="checkform(event)"  action="{{ URL::to('/studentReg/check') }} "-->
				<form id="contact-form"   name="frmhot" >
				  	<label for="firstName"><font size="3">First name*</font></label>
					<input name="Fname" type="text" class="form-control" placeholder="Your Frist Name" required>

					<label for="lastName"><font size="3">Last name*</font></label>
					<input name="Lname" type="text" class="form-control" placeholder="Your Last Name" required>

					<label for="email"><font size="3">Email*</font></label>
					<input name="email" type="email" class="form-control" placeholder="Your Email" required>

					<label for="phone" ><font size="3">Phone*</font></label>
					<input name="phone" type="text" class="form-control" placeholder="Your Phon number" required>

 					<!-- <label for="psw">Password</label>
 					<input type="password" name="psw" class="form-control" minlength="8" title="Must contain at least one number,and at least 8 or more characters" required>
					 <div id="message">
  						<h3>Password must contain the following:</h3>
  						<p id="length" class="invalid">Minimum <b>8 characters</b></p>
					</div> -->
					
						<label for="">
						<font size="3">Password*</font>
							</label>
							<p class="above">Password must contain at least 8 or more characters</p>
							<!-- <input id="password-field" type="password" name="password" required class="form-control"> -->
							<!-- minlength="8" title="Must contain at least one number,and at least 8 or more characters" -->
							
							<input id="password-field" type="password" class="form-control" name="password"  required minlength=8>
							<span style="font-size: 22px;" toggle=" #password-field"  class="fa fa-fw fa-eye field-icon toggle-password"></span>
							
	            
  						

					
					<!-- <div class="contact-submit"> -->
						<div class="col-md-6 col-sm-4">
							<input type="submit" class="form-control submit" value="Create account" onClick="this.form.action='{{ URL::to('/studentReg/check') }}'; submit()">
						</div>
						<!--  -->
						<div class="col-md-6 col-sm-4">
						<a href="/SE_Project/public/home" class="btn">Cancle</a>
						<!-- <input type="submit" stlye="background-color:pink;" class="form-control submit" value="Cancle" onClick="this.form.action='{{ URL::to('/main/employee') }}'; submit()">  -->
						</div>
					
				
				</form>
			</div>
		  </div>
		
			<div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="1.6s">
			<section id="header" class="header-five">
	<div class="container">
		<!-- <div class="row"> -->
<!--   -->
			<div class="col-md-offset-0.8 col-md-5  col-sm-offset-0.5 col-sm-2">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">Register</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">TO BE OUR MEMBER</h3>
          </div>
			</div>

		<!-- </div> -->
	</div>		
</section>
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
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
	input.attr("type", "text");
} else {
	input.attr("type", "password");
}
});
</script>



       

@include('sweet::alert')
</body>
</html>


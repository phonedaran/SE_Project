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



                        <?php
                            // $min = $_GET['min'];
                            // $max = $_GET['max'];
                            // $subject = $_GET['subject'];
                            // $province = $_GET['province'];

                            // echo "Min :".$min;
                            // echo "<br>";
                            // echo "Max :".$max;
                            // echo "<br>";

                            // if($subject != ''){
                            //     echo "Subject : ".$subject;
                            // }else{
                            //     echo "Subject : None";
                            // }
                            // echo "<br>";

                            // if($province != ''){
                            //     echo "location : ".$province;
                            // }else{
                            //     echo "location : None";
                            // }

                        ?>

                        <!-- iso box section -->
                        <div class="container">
                           <div class="row">

                            @foreach ( $courses as $c )
                                <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                                    <div class="blog-thumb">
                                        <a href="single-post.html"><img src="../public/images/blog-img3.jpg" class="img-responsive" alt="Blog"></a>
                                        <a href="single-post.html"><h1>{{$c->Ncourse}}</h1></a>
                                        <p class="col-md-6" align="left"><i class="fa fa-pencil"></i> : {{$c->subject}} </p>
                                        <p class="col-md-6" align="left"><i class="fa fa-users"></i> : 0/{{$c->max_student}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-calendar "></i> : {{$c->start_date}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-clock-o"></i> : {{$c->day}}</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-user"></i> : tutor</p>
                                        <p class="col-md-6" align="left"><i class="fa fa-map-marker"></i> : {{$c->location}}</p>
                                        <a href="#" class="btn btn-default">MORE INFO</a>
                                    </div>
                                </div>
                            @endforeach



                              </div>




                           </div>
                        </div>

               </div>

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
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- UI Slider -->
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
          $( "#amount" ).val(ui.values[ 0 ] + " THB - " + ui.values[ 1 ] + " THB" );
        }
      });
      $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
        " THB - " + $( "#slider-range" ).slider( "values", 1 ) + " THB" );
    } );
</script>

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

</body>
</html>

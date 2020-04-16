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
                values: [ 0, 3500 ],

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

        select.soflow, select.soflow-color {
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

        select.soflow-color {
            color: #131313;
            background-color: #ffffff;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            padding-left: 15px;
        }

        .scrollbar {
            margin-left: 0px;
            float: left;
            height: 656px;
            width: 433px;
            background: #fff;
            overflow-y: scroll;
            margin-bottom: 0px;
        }
        .force-overflow {
            min-height: 200px;
        }

        .scrollbar-gray::-webkit-scrollbar {
            width: 5px;
            background-color: #F5F5F5;
        }

        .scrollbar-gray::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.1);
            background-color: #A9A9A9;
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
                                 <li><a href="{{url('/studentEdit')}}">edit profile</a></li>
                                 <li><a href="{{url('/enroll')}}">enrollment</a></li>
                                 <li><a href="{{url('/review')}}">review</a></li>
                              <!-- tutor -->
                              @elseif ( Auth:: user()->status == 'tutor')
                                 <li><a href="{{url('/Profile')}}">Profile</a></li>
                                 <li><a href="{{url('/course')}}">Tutor Course</a></li>

         
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
   <section id="header2" style="background-color: #f9f9f9;">
      <div class="container">
         <div class ="row">
            <h1 class="wow fadeIn" align="center" data-wow-delay="1s">Announce</h1><br>
            <div class="pull-left" style="width:700px;">
                <div class ="card col-md-12 ">
                    <div id="contact" >
                        <form id="contact-form" name="frmhot" method="POST" action="{{ URL::to('/announce/add') }}" >
                            @csrf
                                <label for="firstName"><font size="3">Announce* </font></label>
                                <textarea name="Ann"  class="form-control"  cols="8" rows="4" placeholder="เขียนประกาศ" required></textarea>

                                <label for="level" ><font size="3">Level*</font></label>
                                <input name="level" type="text" class="form-control" placeholder="ระดับชั้นไหน" required>

                                <label for="location" ><font size="3">Location*</font></label>
                                <input name="loca" type="text" class="form-control" placeholder="สถานที่เรียน" required>

                                 <div class="form-group">
                                    <label for="sex"><font size="3">Sex*</font></label>
                                    <select class="form-control" id="sex" name="sex">
                                       <option>เพศใดก็ได้</option>
                                       <option>ชาย</option>
                                       <option>หญิง</option>
                                    </select>
                                 </div>
                                
                                <label for="phone" ><font size="3">Phone*</font></label>
                                <input name="phone" type="text" class="form-control" maxlength="10" placeholder="เบอร์ติดต่อ" required>

                                <!-- <div class="contact-submit"> -->
                                
                                <div class="col-md-6 col-sm-4">
                                    <input type="submit" class="form-control submit" value="Submit" >
                                </div>

                                <div class="col-md-6 col-sm-4">
                                    <button href="{{url('/')}}" class="button btn2">Cancle</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        
            <div class="pull-right" style="width:450px;">
            
                <div class ="card col-md-12 shadow-sm">
                    <div class="scrollbar  scrollbar-gray">
                    <div class="force-overflow">
                    <br>
                        <div class="blog-thumb">
                        <h2 style="color:black;" align="center"><b>All of your Announces ({{sizeof($Anns)}})</b></h2>
                        <hr color="black" width = "90%">
                        @if(sizeof($Anns)>0)
                            @foreach($Anns as $Ann)
                            <div class="col-md-12">
                            <p class="col-md-10" style="word-wrap: break-word;" align="left"><b>{{$Ann->announce}}</b></p>
                            <p class="col-md-2" align="right" style="top:-7px;" onClick="fncAction({{$Ann->idAnnounce}})"><a href="#" class="btn" ><i class="fa fa-trash fa-lg"></i></a></p>
                            </div>
                            <div class="col-md-12">
                            <p class="col-md-12" style="top:-7px;" align="left">sex : {{$Ann->sex}}</p>
                            <p class="col-md-12" align="left">Level : {{$Ann->level}}</p>
                            <p class="col-md-12" align="left">Location : {{$Ann->location}}</p>
                            <p class="col-md-12" align="left">Contact : {{$Ann->contact}}</p>
                            <p class="col-md-12" align="right">{{$Ann->date}}</p>
                            <hr color="black" width = "90%">      
                            </div>                                                                    
                            @endforeach
                        @else
                            <br><br>
                            <h3 style="color: silver;" align="center">No Announce</h3>
                        @endif
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
  

   <!-- javascript section
================================================== -->
<script type="text/javascript">

   function fncAction0(idcourse){
      window.location.assign("/SE_Project/public/courseInformation?idcourse="+idcourse); //เติม path ไปหา edit course
   }

   function fncAction (idAnnounce){
            Swal.fire({
            title: 'Are you sure?',
            text: "You will delete this Announce!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
               setTimeout(function(){
                     window.location.assign("/SE_Project/public/announce/delete?idAnnounce="+idAnnounce);
                  },2000);
            }
            });
         }
   </script>
   <script src="{{URL::asset('js/jquery.js')}}"></script>
   <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
   <script src="{{URL::asset('js/isotope.js')}}"></script>
   <script src="{{URL::asset('js/imagesloaded.min.js')}}"></script>
   <script src="{{URL::asset('js/wow.min.js')}}"></script>
   <script src="{{URL::asset('js/custom.js')}}"></script>

   <!-- UI Slider -->
   <script src="{{URL::asset('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
   <script src="{{URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>

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

</body>

</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Homepage</title>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">
	
  <title>Bus Enquiry System</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/magnific-popup/dist/magnific-popup.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="Assets/Templates/Main/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="Assets/Templates/Main/css/style.css">
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

//session_start();
?>

<body>
<form name="form1">
<div class="main-wrapper ">
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					
					<h1 class="animated fadeInUp mb-5">Welcome ..  <br><?php echo $_SESSION["lgname"] ?></h1>
					<a href="Search.php" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" >Search buses<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro Start -->

<section class="section counter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">125</span> M</h3>
					<p class="text-muted">Users Worldwide</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">25</span>+</h3>
					<p class="text-muted">States in India</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">10</span></h3>
					<p class="text-muted">Available Country</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
					<p class="text-muted">Award Winner </p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section Intro END -->
<!-- Section About Start -->

<section class="section about position-relative">
	<div class="bg-about"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6 offset-md-0">
				<div class="about-item ">
					<span class="h6 text-color">What we are</span>
					<h2 class="mt-3 mb-4 position-relative content-title">We are dynamic team of creative people</h2>
					<div class="about-content">
						
						<p class="mb-5">Provide us with feedbacks so that we can enhance the features and user experience</p>

						<a href="Feedback.php" class="btn btn-main btn-round-full">Submit Feedback</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br /><br /><br />
<!-- Section About End -->
<!-- section Counter Start -->

<!-- section Counter End  -->
<!--  Section Services Start -->
<section class="section service border-top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Our Services</span>
					<h2 class="mt-3 content-title ">We provide most accurate bus details </h2>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<span class="material-symbols-outlined">
schedule
</span>
					<h4 class="mb-3">Bus Times</h4>
					<p>Users can enquire about bus timings without standing on bus stops for long time</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5">
					<span class="material-symbols-outlined">
currency_rupee
</span>
					<h4 class="mb-3">Standard Bus Charges</h4>
					<p>Users get to know about current bus charges</p>
				</div>
			</div>

			

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-5 mb-lg-0">
					<span class="material-symbols-outlined">
route
</span>
					<h4 class="mb-3">Routes</h4>
					<p>Detailed information about routes to prevent user entering wrong buses</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  Section Services End -->
 <!-- Section Cta Start --> 
<section class="section cta">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="cta-item  bg-white p-5 rounded">
					<span class="h6 text-color"></span>
					<h2 class="mt-2 mb-4"></h2>
					<p class="lead mb-4">Any problem with buses? Submit a complaint </p>
					<h3><a href="Complaint.php" class="btn btn-main btn-round-full">Submit Complaint</a></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Testimonial End -->



<!-- footer Start -->

    </div>

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="Assets/Templates/Main/plugins/jquery/jquery.js"></script>
    <script src="Assets/Templates/Main/js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="Assets/Templates/Main/plugins/bootstrap/js/popper.js"></script>
    <script src="Assets/Templates/Main/plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="Assets/Templates/Main/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="Assets/Templates/Main/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="Assets/Templates/Main/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="Assets/Templates/Main/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="Assets/Templates/Main/plugins/google-map/map.js"></script>
    <script src="Assets/Templates/Main/https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="Assets/Templates/Main/js/script.js"></script>
</form>
  
   
</body><?php include("foot.php");?>
</html>
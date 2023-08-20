<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">

  <title>Bus Enquiry System</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../Assets/Templates/Main/css/style.css">
  <link rel="stylesheet" href="../Assets/Templates/form.css">

</head>
<style>
.container2 {
 	background-color: #f1f1f1;
	
  	padding: 20px;
	}
 input[type=submit] {
  	background-color: #F75757;
  	color: white;
	}
    a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 19px;
}
	.round {
  border-radius: 50%;
  background-color: #F15757;
  color: white;
}</style>
<body>


<!-- Header Start --> 

<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-2 col-md-4">
					<div class="header-top-socials text-center text-lg-left text-md-left">
						<a href="https://www.facebook.com/sanjay.benoy" target="_blank"><i class="ti-facebook"></i></a>
					</div>
				</div>
				<div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
					<div class="header-top-info">
						<a href="tel:+23-345-67890">Call Us : <span>+918281855976</span></a>
						<a href="mailto:busenquiry456@gmail.com" ><i class="fa fa-envelope mr-2"></i><span>busenquiry456@gmail.com</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="index.html">
		  	Bus<span>Enquiry.</span>
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="Newhome.php">Home <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item"><a class="nav-link" href="Showprofile.php">Profile</a></li>
					
			  </li>
			   <li class="nav-item"><a class="nav-link" href="ViewNotification.php">View Notifications</a></li>
			   <li class="nav-item"><a class="nav-link" href="Resetpass.php">Reset Password</a></li>
              <li class="nav-item"><a class="nav-link" href="Editprofile.php">Edit Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="../Guest/logout.php">Log Out</a></li>
					</ul>
			  </li>
			  
			</ul>

			<form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
            <?php
			$selQry="select * from tbl_user where user_id='".$_SESSION["lgid"]."'";
			$result=$con->query($selQry);
			$row=$result->fetch_assoc();
			?>
			  <a href="ChangePhoto.php"><img src="../Assets/Files/UserPhoto/<?php echo $row["user_photo"];?>" width=60 height=60></a>
			</form>
		  </div>
		</div>
	</nav>
</header>
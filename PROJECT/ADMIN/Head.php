<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

 <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">ADMIN</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="AdHomePage.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Location</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="District.php" class="dropdown-item">District</a>
                            <a href="Place.php" class="dropdown-item">Place</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Route</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Route.php" class="dropdown-item">Route</a>
                            <a href="Routestop.php" class="dropdown-item">Routestop</a>
                           
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Busowner</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        	<a href="Acceptbusowner.php" class="dropdown-item">Accept owner</a>
                            <a href="Acceptedlist.php" class="dropdown-item">Accepted owner</a>
                            <a href="rejectedlist.php" class="dropdown-item">Rejected owner</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Bus</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        	<a href="Acceptbus.php" class="dropdown-item">Accept Buses</a>
                            <a href="BusAccepted.php" class="dropdown-item">Accepted Buses</a>
                            <a href="BusRejected.php" class="dropdown-item">Rejected Buses</a>
                            <a href="BusTime.php" class="dropdown-item">Bus Times</a>
                            <a href="Bustype.php" class="dropdown-item">Bus Type</a>
                             <a href="Busrate.php" class="dropdown-item">Bus Rates</a>
                            <a href="Buscancel.php" class="dropdown-item">Cancellation requests</a>
                            <a href="ExpenseType.php" class="dropdown-item">Expense Type</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Complaints & <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFeedbacks</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="ComplaintType.php" class="dropdown-item">Complaint Type</a>
                            <a href="ViewComplaint.php" class="dropdown-item">View Complaints</a>
                            <a href="ViewFeedback.php" class="dropdown-item">View Feedbacks</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="pie1.php" class="dropdown-item">No Of Buses</a>
                             <a href="report2.php" class="dropdown-item">Collection</a>
                             <a href="UserReport.php" class="dropdown-item">Users Report</a>
                           
                           
                        </div>
                    </div>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
<!--                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>-->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                       
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
<!--                            <a href="#" class="dropdown-item">
-->                                <div class="d-flex align-items-center">
<!--                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
-->                                    <div class="ms-2">
                                        <!--<h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>-->
                                    </div>
                                </div>
                            </a>
                           <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">-->
                                <div class="d-flex align-items-center">
<!--                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
-->                                    <div class="ms-2">
<!--                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
<!--                                        <small>15 minutes ago</small>
-->                                   </div>
                                </div>
                            </a>
<!--                            <hr class="dropdown-divider">
--><!--                            <a href="#" class="dropdown-item">
-->                                <div class="d-flex align-items-center">
<!--                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
-->                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            
                            <a href="..\Guest\logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
           

          
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4" style="z-index:1">
</body>
</html>
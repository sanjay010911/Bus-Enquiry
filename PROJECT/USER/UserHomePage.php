<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Homepage</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

//session_start();
?>




<body >
<div id="tab" align="center">
<div class="container2">
<br /><br />
<H3 align="center"><i><b>Welcome ..<?php echo $_SESSION["lgname"] ?></i></b>
</h3>
<table align="center" width="218" border="1" cellpadding="10">
 
  <tr>
    <td><a href="Search.php" >Search Buses</a></td>
  </tr>
  	<tr>
    	<td><a href="Editprofile.php">Edit Profile</a></td>
    </tr>
   	<tr>
    	<td><a href="Complaint.php">Complaint</a></td>
    </tr>
    <tr>
    	<td><a href="Feedback.php">Feedback</a></td>
    </tr>
  
</table></center>

</div></div>
<?php
ob_flush();
include("Foot.php");
?>
</body>
</html>
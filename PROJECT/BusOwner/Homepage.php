
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Homepage</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

//session_start();
?>
<body>
<div align="center" id="tab">
<div class="container2"><br /><br />
<H3 align="center"><i><b>Welcome ..<?php echo $_SESSION["lgname"] ?></i></b>
</h3>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    
    <tr>
      <td><a href="Editprofile.php">Edit Profile</a></td>
    </tr>
    <tr>
     <td><a href="Busdetails.php">Add Bus</a></td>
    </tr>
    <tr>
     <td><a href="Notification.php">Add Bus Notification</a></td>
    </tr>
     <tr>
     <td><a href="Requestcancel.php">Request for cancel buses</a></td>
    </tr>
     <tr>
     <td><a href=" DailyCollection.php">Daily Collection</a></td>
    </tr>
    <tr>
     <td><a href=" DailyExpense.php">Daily Expense</a></td>
    </tr>
    <tr>
     <td><a href=" IncomeExpense.php">Income and Expense Statement</a></td>
    </tr>
   
    
  </table>
</form>
</div></div>

</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
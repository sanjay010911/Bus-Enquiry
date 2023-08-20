<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Show Profile</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

$sql="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_SESSION["lgid"]."'";
//$d=$con->query($district);
$row=$con->query($sql);
$data=$row->fetch_assoc();
?>


<body>
<div id="tab" align="center">
<div class="container2">
<h1>Profile</h1>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table border="1" cellpadding="10">
  	<tr>
    	<td align="center" colspan="2"><img src="../Assets/Files/UserPhoto/<?php echo $data["user_photo"];?>" width="150" height="150"  style="border-radius: 75px;"></td>
    <tr>
      <td width="103">Name :</td>
      <td width="131"><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td><?php echo $data["user_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["district_name"] ?>
	  </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"] ?></td>
    </tr>
  </table></center>
</form>
 </div>
 </div>
 <a href="Newhome.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
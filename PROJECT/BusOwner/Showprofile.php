<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Profile</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

$sql="select * from tbl_busowner u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where owner_id='".$_SESSION["lgid"]."'";
//$d=$con->query($district);
$row=$con->query($sql);
$data=$row->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Show Profile</title>
</head>

<body>
<div align="center" id="tab">
<div class="container2">
<h1>Profile</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
    <td align="center" colspan="2"><img src="../Assets/Files/BusOwnerPhoto/<?php echo $data["owner_photo"];?>" width="150" height="150"  style="border-radius: 75px;"></td>
      </tr>
    <tr>
      <td width="103">Name :</td>
      <td width="131"><?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td><?php echo $data["owner_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["owner_mail"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["owner_contact"]; ?></td>
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
      </table>
     
</form>
</div></div>
<a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
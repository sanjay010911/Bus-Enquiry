<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Rejectedlist</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");

$selQry="select * from tbl_busowner u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where owner_status='2'";
$row=$con->query($selQry);
$i=0;


if(isset($_GET["did"]))
{
		$did=$_GET["did"];
		$sql="update tbl_busowner set owner_status='1' where owner_id='".$did."'";
		if($con->query($sql))
		{
			?>
            <script>
			alert("Accepted");
			location.href="rejectedlist.php";
            </script>
            <?php	
   		}
		else
		{
			?>
			<script>
			alert("failed..");
			location.href="rejectedlist.php";
			</script>		  	
		<?php 
		}
}
		?>

<body>
<form id="form1" name="form1" method="post" action="Rejectedlist.php">
  <table width="397" border="1" cellpadding="10">
    <tr>
      <td>Si no</td>
      <td>Name</td>
      <td>Gender</td>
      <td>Email</td>
      <td>Licenseno</td>
      <td>Contact</td>
      <td>Place</td>
      <td>Aadharno</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
	 <?php
    while($data=$row->fetch_assoc())
    { 
	?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["owner_name"] ?></td>
      <td><?php echo $data["owner_gender"] ?></td>
      <td><?php echo $data["owner_mail"] ?></td>
      <td><?php echo $data["owner_licenseno"] ?></td>
      <td><?php echo $data["owner_contact"] ?></td>
      <td><?php echo $data["place_name"]?></td>
      <td><?php echo $data["owner_aadharno"] ?></td>
      <td><img src="../Assets/Files/BusOwnerphoto/<?php echo $data["owner_photo"] ?>" /></td>
      <td><a href="Rejectedlist.php?did=<?php echo $data["owner_id"];?>">Accept</a><br/>
    </tr>
    <?php
	$i++;
	}?>
  </table>
    
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>

</html>
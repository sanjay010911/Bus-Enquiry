<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Bus Cancel</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_GET["did1"]))
{
		$did1=$_GET["did1"];
		$upQry1="update tbl_busdetails set bus_status='2' where bus_id='".$did1."'";
		if($con->query($upQry1))
		{
			?>
            <script>
			alert("Rejected");
			location.href="Buscancel.php";
            </script>
            <?php	
   		}
		else
		{
			?>
			<script>
			alert("failed..");
			location.href="Buscancel.php";
			</script>		  	
		<?php 
		}
}
		?>
<body>
</body>
<?php
$selQry="select * from tbl_cnclbus a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_bustype c on c.bustype_id=b.bustype_id inner join tbl_route d on d.route_id=b.route_id inner join tbl_busowner e on e.owner_id=b.owner_id where bus_status='0'";
$result=$con->query($selQry);

?>

<table border="1" cellpadding="10">
  <tr>
    <td width="20">SI No</td>
    <td width="37">Bus Name</td>
    <td width="36">Route</td>
    <td width="46">Owner Name</td>
    <td width="40">Photo</td>
    <td width="45">Reason</td>
    <td width="41">Action</td>
  </tr>
  <?php
 $i=1;
   while($row=$result->fetch_assoc())
	{
		?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row["bus_name"];?></td>
      <td><?php echo $row["route_name"];?></td>
      <td><?php echo $row["owner_name"];?></td>
      <td><img src="../Assets/Files/Busphoto/<?php echo $row["bus_photo"];?>"></td>
      <td><?php echo $row["cncl_reason"];?></td>
     <td><a href="Buscancel.php?did1=<?php echo $row["bus_id"];?>">Reject</a></td>
      <?php
	$i++;
	}	
?>
</table>
<form id="form1" name="form1" method="post" action="">
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
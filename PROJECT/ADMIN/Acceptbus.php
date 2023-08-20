<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Accept Buses</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_GET["did"]))
{
		$did=$_GET["did"];
		$upQry="update tbl_busdetails set bus_status='1' where bus_id='".$did."'";
		
		if($con->query($upQry))
		{
			?>
            <script>
			alert("Accepted");
			location.href="Acceptbus.php";
            </script>
            <?php	
   		}
		else
		{
			?>
			<script>
			alert("failed..");
			location.href="Acceptbus.php";
			</script>
            <?php
		}
}
if(isset($_GET["did1"]))
{
		$did1=$_GET["did1"];
		$upQry1="update tbl_busdetails set bus_status='2' where bus_id='".$did1."'";
		if($con->query($upQry1))
		{
			?>
            <script>
			alert("Rejected");
			location.href="Acceptbus.php";
            </script>
            <?php	
   		}
		else
		{
			?>
			<script>
			alert("failed..");
			location.href="Acceptbus.php";
			</script>		  	
		<?php 
		}
}
		?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="736" border="1" cellpadding="10">
    <tr>
      <td>SI no</td>
      <td>Bus Name</td>
      <td>Bus Type</td>
      <td>Route</td>
      <td>Reg No</td>
      <td>Capacity</td>
      <td>Insurance No</td>
      <td>Owner Name</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
	<?php
$selQry="select * from tbl_busdetails b inner join tbl_bustype t on b.bustype_id=t.bustype_id inner join tbl_route r on 
	         b.route_id=r.route_id inner join tbl_busowner o on b.owner_id=o.owner_id where bus_status='0'";
			 
$i=1;
$row=$con->query($selQry);
   while($result=$row->fetch_assoc())
	{
		?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $result["bus_name"];?></td>
      <td><?php echo $result["bustype_name"];?></td>
      <td><?php echo $result["route_name"];?></td>
      <td><?php echo $result["bus_regno"];?></td>
      <td><?php echo $result["bus_capacity"];?></td>
      <td><?php echo $result["bus_insno"];?></td>
      <td><?php echo $result["owner_name"];?></td>
      <td><img src="../Assets/Files/Busphoto/<?php echo $result["bus_photo"];?>"></td>
      <td><a href="Acceptbus.php?did=<?php echo $result["bus_id"];?>">Accept</a><br/>
      <a href="Acceptbus.php?did1=<?php echo $result["bus_id"];?>">Reject</a><br/></td>
      <?php
	$i++;
	}
	
?>
  </table>
  
  </table>
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
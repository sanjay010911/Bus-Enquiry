<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :View Time</title>
</head>
<?php
ob_start();
include("Head.php");?>

<style>
	a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 19px;
}
	.round {
  border-radius: 50%;
  background-color: #F15757;
  color: white;
}
</style>
<?php
include("../Assets/Connection/Connection.php");

//session_start();

$selQry="select * from tbl_bustiming a inner join tbl_routestop b on a.routestop_id=b.routestop_id where a.bus_id=
'".$_SESSION["bid"]."'";
$selQry2="select * from tbl_bustype a inner join tbl_busrate b on a.bustype_id=b.bustype_id inner join tbl_busdetails c on a.bustype_id=c.bustype_id where c.bus_id='".$_SESSION["bid"]."'";
$selqry3="select bus_name from tbl_busdetails where bus_id='".$_SESSION["bid"]."'";
$result=$con->query($selQry);
$result2=$con->query($selQry2);
$rslt=$con->query($selqry3);
?>
<body>
<div id="tab" align="center">
<div class="container2">
<h1>Bus Timings of <?php $rw=$rslt->fetch_assoc();
	  echo $rw["bus_name"];?></h1>
<form id="form1" name="form1" method="post" action="">
<table border="1" cellpadding="10">
<tr>
	<td width="138">Min charge</td>
    <td width="138">Min km</td>
      <td width="138">Add Charge for
       <?php 
	  $row1=$result2->fetch_assoc();
	  echo $row1["busrate_addkm"];
	  ?> km</td>
</tr>
<tr>
<td><?php echo $row1["busrate_minrate"];?></td>
<td><?php echo $row1["busrate_minkm"];?></td>
<td><?php echo $row1["busrate_addrate"];?></td>
</tr>
</table><br /><br />
<table border="1" cellpadding="10">
    <tr>
      <td width="120">SI No</td>
      <td width="138">Stop</td>
      <td width="138">Time</td>
    </tr>
	 <?php
		$i=0;
		while($row=$result->fetch_assoc())
		{
				$i++;
				?> 
         	<tr>
     			<td><?php echo $i;?></td>
      			<td><?php echo $row["routestop_name"];?></td>
            	<td><?php echo $row["bus_time"];?></td>    
        	</tr>  
        		<?php 		
		}
		?>
      </table>

 
</form>
</div>
</div><br /><br />
<a href="Search.php" class="round">&#8249;</a>
</body>
	
<?php
ob_flush();
include("Foot.php");
?>
</html>
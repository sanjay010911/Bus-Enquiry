<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Cancel Bus</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

if(isset($_POST["btn_submit"]))
{
	$insQry="insert into tbl_cnclbus (bus_id,cncl_reason) values('".$_POST["sel_bus"]."','".$_POST["txt_reason"]."')";
	$upsQry="update tbl_busdetails set bus_status='0' where bus_id='".$_POST["sel_bus"]."'";
	//echo $upsQry;
	if($con->query($insQry))
	{
		?>
		<script>
				alert("Request submitted");
				window.location("Requestcancel.php");
		</script>
	<?php
	}else
	{
		?>
        <script>
				alert("Request submition failed");
				window.location("Requestcancel.php");
		</script>
     <?php
	}
	
	$con->query($upsQry);
}
?>

<body>
<div align="center" id="tab">
<div class="container2">
<h1>Request Bus Cancel</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="116">Bus Name</td>
      <td width="121"><select name="sel_bus" id="sel_bus">
      <option>--select--</option>
    <?php
	 $selQry="select * from tbl_busdetails where tbl_busdetails.owner_id='".$_SESSION["lgid"]."'";
	
	   $rslt=$con->query($selQry);
	   while($row=$rslt->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row["bus_id"]; ?>"><?php echo $row["bus_name"]; ?></option>
      <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>Cancel Reason</td>
      <td><textarea name="txt_reason" id="txt_reason" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="button" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="1004" border="1" cellpadding="10">
    <tr>
      <td>SI No</td>
      <td>Bus Name</td>
      <td>Bus Type</td>
      <td>Route</td>
      <td>Reg No</td>
      <td>Capacity</td>
      <td>Insurance No</td>
      
      <td>Reason</td>
      <td>Status</td>
    </tr>
     <?php
	
	$selQry="select * from tbl_busdetails b inner join tbl_bustype t on b.bustype_id=t.bustype_id inner join tbl_route r on 
	         b.route_id=r.route_id inner join tbl_cnclbus d on b.bus_id=d.bus_id where owner_id='".$_SESSION["lgid"]."' 
			 and bus_status='0' or bus_status='2'";
		//echo $selQry;	 
	$row=$con->query($selQry);
	$i=1;
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
      
      <td><?php echo $result["cncl_reason"];?></td>
      <td><?php if($result["bus_status"]=='0')
	  			echo "Pending";
				else if($result["bus_status"]=='2')
				echo "Rejected";
				?>
				</td>
      </tr>
      <?php
	  $i++;
	}
	  ?>
  </table>
  <p>&nbsp;</p>
</form>
</div></div>
<a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
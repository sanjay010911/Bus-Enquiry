<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Bus Time</title>
</head>

<body>
  <?php
 ob_start();
include("head.php");
     include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	
	$selQry4="select * from tbl_bustiming where routestop_id='".$_POST["sel_stop"]."' and bus_time='".$_POST["txt_arrtime"]."'";
	
	$rslt=$con->query($selQry4);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Another Bus Reaches the Stop at this time!!");
			 window.location("BusTime.php");
		</script>
     <?php
	}
	else
	{
		$insQry="insert into tbl_bustiming(bus_id,routestop_id,bus_time) values('".$_POST["sel_bus"]."','".$_POST["sel_stop"]."',
					'".$_POST["txt_arrtime"]."')";
		if($con->query($insQry))
		{
				?>
				<script>
					alert("inserted successfully");
					window.location="BusTime.php";
				</script>
				<?php
		}
		else
		{
			?>
			<script>
				alert("insertion failed");
				window.location="BusTime.php";
			</script>
       		<?php
		}
	}
}
if(isset($_GET["did"]))
{
		$did=$_GET["did"];
		$delQry="delete from tbl_bustiming where bustime_id='".$did."'";
		if($con->query($delQry))
		{
			?>
            <script>
			alert("deleted..");
			window.location="BusTime.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
				alert("failed");
				window.location="BusTime.php";
			</script>
       	  <?php
		}
}
	?>
	<form id="form1" name="form1" method="post" action="">
	<table width="477" border="1" cellpadding="10">
	<tr>
		<td width="229">Select Route:</td>
		<td width="196"><select name="sel_route" id="sel_route" onchange="getRoute(this.value),getStop(this.value)">
		<option>--select--</option>
		<?php    
		 $selQry="select * from tbl_route";
	   		$result=$con->query($selQry);
	   		while($row=$result->fetch_assoc())
	 		{
		    	?>
     			<option value="<?php echo $row["route_id"]; ?>"><?php echo $row["route_name"]; ?></option>
      			<?php
	   		}
	   ?>
    </select></td>
  </tr>
  <tr>
    <td>Select Bus:</td>
    <td><select name="sel_bus" id="sel_bus">
    <option>--select--</option>
    <?php
	 $selQry2="select * from tbl_busdetails";
	   $result2=$con->query($selQry2);
	   while($row2=$result2->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row2["bus_id"]; ?>"><?php echo $row2["bus_name"]; ?></option>
      <?php
	   }
	   ?>
    </select></td>
  </tr>
  
  <tr>
    <td>Select Stop:</td>
    <td><select name="sel_stop" id="sel_stop">
    <option>--select--</option>
    <?php
	 $selQry3="select * from tbl_routestop";
	   $result3=$con->query($selQry3);
	   while($row3=$result3->fetch_assoc())
	   {
		    ?>
      		<option value="<?php echo $row3["routestop_id"]; ?>"><?php echo $row3["routestop_name"]; ?></option>
      		<?php
	   }
	   ?>
    </select></td>
  </tr>
  <tr>
    <td>Arrival Time</td>
    <td>
      <input type="time" name="txt_arrtime" id="txt_arrtime">
   </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit">
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset">
    </td>
  </tr>
</table>
<table width="477" border="1" cellpadding="10">
<tr>
<td>SI No</td>
<td>Route</td>
<td>Bus</td>
<td>Stop</td>
<td>Arrival Time</td>
<td>Action</td>
</tr>
<?php
  $selqry1="select * from tbl_bustiming a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_routestop d on a.routestop_id=d.routestop_id inner join tbl_route e on d.route_id=e.route_id";
     $row=$con->query($selqry1);
  $i=0;
  while($result=$row->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["route_name"];?></td>
   <td><?php echo $result["bus_name"]?></td>
   <td><?php echo $result["routestop_name"];?></td>
   <td><?php echo $result["bus_time"];?></td>
   <td><a href="BusTime.php?did=<?php echo $result["bustime_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
</form>
<script src="../Assets/jquery/jQuery.js"></script>
<script>
     function getRoute(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxBus.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_bus").html(result);
                                }
                            });
                        }
	function getBus(did)
                        {
							//alert("hi");

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxStop.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_stop").html(result);
                                }
                            });
                        }
	function getStop(did)
	
                        {
							
                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxStop.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_stop").html(result);
                                }
                            });
                        }
    </script>
   
    </body>
    <?php
ob_flush();
include("Foot.php");
?>
</html>
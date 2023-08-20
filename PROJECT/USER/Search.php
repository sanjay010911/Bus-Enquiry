<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Search Buses</title>
</head>

<?php
 ob_start();
include("Head.php");
?>

<body>
<center>
<div id="tab" align="center">
<div class="container2">
<h1>Search Bus</h1>
<form id="form1" name="form1" method="post" action="">
  <p>Select Route
    <select name="sel_route" id="sel_route">
      <option>--select--</option>
      <?php
	  ob_start();
include("Head.php");
	  include("../Assets/Connection/Connection.php");
		session_start();
	   $selQry="select * from tbl_route order by route_name asc";
	   $result=$con->query($selQry);
	   while($row=$result->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row["route_id"]; ?>"><?php echo $row["route_name"]; ?></option>
      <?php
	   }
	   ?>
    </select>
              
              <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
              <input type="reset" name="btn_reset" id="btn_reset" value="Reset" />
            </p>
  </p>
  <table width="296" height="118" border="1" cellpadding="10" >
    <tr>
      <td>SI No</td>
      <td>Route Stops</td>
    </tr>
	<?php
	
	if(isset($_POST["btn_check"]))
	{
		?>
		header("location:../USER/Viewtime.php");
     <?php
	}
	
	if(isset($_POST["btn_submit"]))
	{
		$rid=$_POST["sel_route"];
		$selQry1="select * from tbl_routestop where route_id='".$rid."'";
		$selQry2="select * from tbl_busdetails a inner join tbl_bustype b on a.bustype_id=b.bustype_id inner join tbl_route c 
		   on a.route_id=c.route_id inner join tbl_busowner d on a.owner_id=d.owner_id where a.route_id='".$rid."'";
		 
		$result1=$con->query($selQry1);
		$result2=$con->query($selQry2);
		$i=1;
		while($row1=$result1->fetch_assoc())
		{
			?>   
    	<tr>
     		 <td><?php echo $i;?></td>
      		<td><?php echo $row1["routestop_name"];?></td>
    	</tr>
   		<?php
			$i++;
		}
	?>
  </table>
  <p>&nbsp;</p>
  <table width="559" border="1" cellpadding="10">
    <tr>
      <td>SI No</td>
      <td>Bus Name</td>
      <td>Bus type</td>
      <td>Route</td>
      <td>Reg No</td>
      <td>Capacity</td>
      <td>Insurance No</td>
      <td>Owner Name</td>
      <td>Photo</td>
      <td>Timings</td>
    </tr>
    <?php
		$i2=0;
		while($row2=$result2->fetch_assoc())
		{
			$i2++;
			$_SESSION["bid"]=$row2["bus_id"];
			?> 
         <tr>
     		<td><?php echo $i2;?></td>
      		<td><?php echo $row2["bus_name"];?></td>
            <td><?php echo $row2["bustype_name"];?></td>
            <td><?php echo $row2["route_name"];?></td>
            <td><?php echo $row2["bus_regno"];?></td>
            <td><?php echo $row2["bus_capacity"];?></td>
            <td><?php echo $row2["bus_insno"];?></td>
            <td><?php echo $row2["owner_name"];?></td>
            <td><img src="../Assets/Files/Busphoto/<?php echo $row2["bus_photo"];?>"></td>
            <td><a href="../USER/Viewtime.php">View Time & Charges </a></td>
    	 </tr>  
         <?php 
		 $i++;
		}
	}?>
  </table></center>
  <p>&nbsp;</p>
  
   </div></div>
  </form>
  <a href="Newhome.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
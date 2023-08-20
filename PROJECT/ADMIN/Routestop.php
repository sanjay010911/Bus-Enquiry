
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Routestop</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$route=$_POST["sel_route"];
	$stop=$_POST["txt_stop"];
	$sql1="select * from tbl_routestop where route_id='".$route."' and routestop_name='".$stop."'";
	
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Stop already exist!!");
			 window.location("Routestop.php");
		</script>
     <?php
	}else
	{
	$selQry="insert into tbl_routestop(route_id,routestop_name) values('".$route."','".$stop."')";
	if($con->query($selQry))
	{
		?>
		<script>
		alert("inserted Successfully");
		window.location="Routestop.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("inserted failed");
		window.location="Routestop.php";
		</script>
        <?php
	}
	}
}
 if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_routestop where route_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Routestop.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Routestop.php";
			</script>
            <?php
			}
		}
		    ?>

<body>

<form id="form1" name="form1" method="post" action="">
  <table width="239" height="178" border="1" cellpadding="10">
    <tr>
      <td>Route </td>
      <td><select name="sel_route" id="sel_route" required>
     <option value="">---select---</option>
		<?php
		 $selQry="select * from tbl_route";
		 $rows=$con->query($selQry);
		  $i=0;
		  
  while($result=$rows->fetch_assoc())
  {
	  ?>
      <option value="<?php echo $result["route_id"] ?>"><?php echo $result["route_name"] ?></option>
        <?php
  }
  ?>
      </select></td>
    </tr>
    <tr>
      <td>Stop</td>
      <td><input type="text" name="txt_stop" id="txt_stop" required/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
  <table width="284" border="1" cellpadding="10">
    <tr>
      <td>SI no</td>
      <td>Route</td>
      <td>Stop</td>
      <td>Action</td>
    </tr>
    <?php
  $selqry1="select * from tbl_routestop c inner join tbl_route d on c.route_id=d.route_id";
     $row2=$con->query($selqry1);
  $i=0;
  while($result2=$row2->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result2["route_name"];?></td>
   <td><?php echo $result2["routestop_name"];?></td>
   <td><a href="Routestop.php?did=<?php echo $result2["route_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
     
    </tr>
  </table>
  <p>&nbsp;</p>
</form>

</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
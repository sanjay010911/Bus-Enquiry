<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Notification</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

if(isset($_POST["btn_submit"]))
{
	$insQry="insert into tbl_notification(bus_id,not_msg)values('".$_POST["sel_bus"]."','".$_POST["txt_msg"]."')";
	if($con->query($insQry))
	{
			?>
			<script>
			alert("Message Sent");
			window.location="Notification.php";
			</script>
			<?php
	}
	else
	{
		?>
		<script>
		alert("Failed!!!");
		window.location="Notification.php";
		</script>
        <?php
	}
}
if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_notification where not_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
				alert("deleted..");
				location.href="Notification.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Notification.php";
			</script>
            <?php
			}
		}
		    ?>

<body>
<div align="center" id="tab">
<div class="container2">
<h1>Notifications</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="94">Bus Name</td>
      <td width="90"><select name="sel_bus" id="sel_bus">
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
      <td>Notification Message</td>
      <td><textarea name="txt_msg" id="txt_msg" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="button" value="Reset" /></td>
    </tr>
  </table>
  <table width="323" border="1" cellpadding="10">
    <tr>
      <td width="1">SI No</td>
      <td width="1">Bus Name</td>
      <td width="1"><p>Notification</p>
      <p>Message</p></td>
      <td width="3">Action</td>
    </tr>
    <tr>
    <?php
  $selqry2="select * from tbl_notification c inner join tbl_busdetails d on c.bus_id=d.bus_id where d.owner_id=
  '".$_SESSION["lgid"]."'"; 
     $row=$con->query($selqry2);
  $i=0;
  while($result=$row->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["bus_name"];?></td>
   <td><?php echo $result["not_msg"];?></td>
   <td><a href="Notification.php?did=<?php echo $result["not_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
     
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
</form>

 </div>
 </div>
 <a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
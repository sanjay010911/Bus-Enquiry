<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Change Photo</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<body>
<div id="tab" align="center">
<div class="container2">
<h1>Change Photo</h1>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
 <?php
 	if(isset($_POST["btn_submit"]))
	{
		$photo = $_FILES["file_photo"]["name"];
		$temp = $_FILES["file_photo"]["tmp_name"];
		move_uploaded_file($temp,"../Assets/Files/BusOwnerPhoto/".$photo);
		$upqry="update tbl_busowner set owner_photo='".$photo."' where owner_id='".$_SESSION["lgid"]."'";
		if($con->query($upqry))
		{
			?>
        	<script>
		        	 alert("Photo Updated");
			</script>
       	 	<?php
		
		}
		else
		{
			?>
        	<script>
		         alert("Photo Updation failed");	 
			</script>
        	<?php
		}
	}

			$selQry="select * from tbl_busowner where owner_id='".$_SESSION["lgid"]."'";
			$result=$con->query($selQry);
			$row=$result->fetch_assoc();
			?>
			  <img src="../Assets/Files/BusOwnerPhoto/<?php echo $row["owner_photo"];?>" />
              <br /><br />
              <table>
              <tr>
              	<td align="center"><input type="file" name="file_photo" id="file_photo"/></td>
              </tr>
              <tr>
                <td align="center"><input type="submit" name="btn_submit" id="btn_submit" /></td>
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
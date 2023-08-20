<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry::District</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$dist=$_POST["txt_dist"];
	$sql1="select * from tbl_district where district_name='".$dist."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("District already exist!!");
			 window.location("District.php");
		</script>
     <?php
	}else
	{
	$insQry="insert into tbl_district(district_name) VALUES('".$dist."')";
	if($con->query($insQry))
	{
	  ?>
     <script>
	   alert("Data inserted");
	   window.location("District.php");
	 </script>
   <?php
	}
    else
	{
    ?>
      <script>
	    alert("Data Insertion Failed");
		window.location("District.php");
	  </script>
      <?php
    }
	}
}
  if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_district where district_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="District.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="District.php";
			</script>
            <?php
			}
		}
		    ?>
<body>
<div >

<form id="form1" name="form1" method="post" action="District.php">
  <table width="429" height="104" border="1" cellpadding="10">
    <tr>
      <td>District Name</td>
      <td><input type="text" name="txt_dist" id="txt_dist" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  </form>
  <table border="black">
  <tr>
  <th>SI no</th>
  <th>District Name</th>
  <th>Action</th>
  </tr>
  
  <?php
  $selqry="select * from tbl_district order by district_name ASC";
  $rows=$con->query($selqry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["district_name"];?></td>
   <td><a href="District.php?did=<?php echo $result["district_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table> 
</div>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>


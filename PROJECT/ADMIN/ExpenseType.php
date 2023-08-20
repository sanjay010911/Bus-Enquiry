<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Expense Type</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$sql1="select * from tbl_expensetype where exptype_name='".$_POST["txt_exp"]."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Expense Type already exist!!");
			 window.location("ExpenseType.php");
		</script>
     <?php
	}else
	{
	$insQry="insert into tbl_expensetype(exptype_name)VALUES('".$_POST["txt_exp"]."')";
	if($con->query($insQry))
		{
	  		?>
   			<script>
	   			alert("Data inserted");
	   			window.location("ExpenseType.php");
	 		</script>
   			<?php
		}
   		 else
		{
    	?>
      		<script>
	    		alert("Data Insertion Failed");
				window.location("ExpenseType.php");
	 		</script>
     	<?php
    	}
	}
}
  if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_expensetype where exptype_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="ExpenseType.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="ExpenseType.php";
			</script>
            <?php
			}
		}
		    ?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="305" border="1" cellpadding="10">
    <tr>
      <td>Expense Name</td>
      <td><input type="text" name="txt_exp" id="txt_exp" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="button" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table border="black">
  <tr>
  <th>SI no</th>
  <th>Expense Name</th>
  <th>Action</th>
  </tr>
  
  <?php
  $selqry="select * from tbl_expensetype";
  $rows=$con->query($selqry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["exptype_name"];?></td>
   <td><a href="ExpenseType.php?did=<?php echo $result["exptype_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table> 
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
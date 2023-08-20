<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Bus Type</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$type=$_POST["txt_bustype"];
	$sql1="select * from tbl_bustype where bustype_name='".$type."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Bus Type already exist!!");
			 window.location("Bustype.php");
		</script>
     <?php
	}else
	{
	$selQry="insert into tbl_bustype(bustype_name) values('".$type."')";
	if($con->query($selQry))
	{
		?>
		<script>
		alert("inserted Successfully");
		window.location="Bustype.php";
		</script>
        <?php
	}
	else
	{
		?>
		<script>
		alert("inserted Successfully");
		window.location="Route.php";
		</script>
        <?php
	}
	}
	
}


      if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_bustype where bustype_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Bustype.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Bustype.php";
			</script>
            <?php
			}
		}
		    ?>
    

    
<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="156">Bus Type</td>
      <td width="163"><input type="text" name="txt_bustype" id="txt_bustype" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="1" cellpadding="10">
    <tr>
      <td width="63">SI no</td>
      <td width="78">Bus Type</td>
       <td width="78">Action</td>
    </tr>
     <?php
  $selqry1="select * from tbl_bustype";
  $row1=$con->query($selqry1);
  $i=0;
  while($result1=$row1->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result1["bustype_name"];?></td>
   <td><a href="Bustype.php?did=<?php echo $result1["bustype_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
  <p>&nbsp;</p>
</form>


</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
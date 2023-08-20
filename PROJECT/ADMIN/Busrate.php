<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Bus Rate</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$btype=$_POST["sel_type"];
	$minrate=$_POST["txt_minrate"];
	$minkm=$_POST["txt_minkm"];
	$addrate=$_POST["txt_addrate"];
	$addkm=$_POST["txt_addkm"];
	$insQry="insert into tbl_busrate(bustype_id,busrate_minrate,busrate_minkm,busrate_addrate,busrate_addkm) values ('".$btype."',
				'".$minrate."','".$minkm."','".$addrate."','".$addkm."')";
	
	if($con->query($insQry))
	{
		?>
		<script>
			alert("inserted Successfully");
			location.href="Busrate.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
			alert("insertion failed");
			location.href="Busrate.php";
		</script>
     <?php
	}
}

   if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_busrate where busrate_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Busrate.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Busrate.php";
			</script>
            <?php
			}
		}
		    ?>


<body>
<form id="form1" name="form1" method="post" action="">
  <table width="524" height="378" border="1" cellpadding="10">
    <tr>
      <td>Bus Type</td>
       <td><select name="sel_type" id="sel_type">
     <option value="">---select---</option>
		<?php
		 $selQry="select * from tbl_bustype";
		 $rows=$con->query($selQry);
		  $i=0;
		  
  while($result=$rows->fetch_assoc())
  {
	  ?>
      <option value="<?php echo $result["bustype_id"] ?> "><?php echo $result["bustype_name"] ?></option>
        <?php
  }
  ?>
      </select></td>
    </tr>
    <tr>
      <td>Minimum rate</td>
      <td><input type="text" name="txt_minrate" id="txt_minrate" /></td>
    </tr>
    <tr>
      <td>Minimum Km</td>
      <td><input type="text" name="txt_minkm" id="txt_minkm" /></td>
    </tr>
    <tr>
      <td>Add Rate</td>
      <td><input type="text" name="txt_addrate" id="txt_addrate" /></td>
    </tr>
    <tr>
      <td>Add Km</td>
      <td><input type="text" name="txt_addkm" id="txt_addkm" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /> <input type="reset" name="btn_reset"
       id="button" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="480" border="1" cellpadding="10">
    <tr>
      <td>SI No</td>
      <td>Bus Type</td>
      <td>Minimum rate</td>
      <td>Minimum Km</td>
      <td>Add Rate</td>
      <td>Add Km</td>
      <td>Action</td>
    </tr>
     <?php
  $selqry="select * from tbl_busrate b inner join tbl_bustype c on b.bustype_id=c.bustype_id";
  $row=$con->query($selqry);
  $i=0;
  while($result=$row->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["bustype_name"];?></td>
   <td><?php echo $result["busrate_minrate"];?></td>
   <td><?php echo $result["busrate_minkm"];?></td>
   <td><?php echo $result["busrate_addrate"];?></td>
   <td><?php echo $result["busrate_addkm"];?></td>
   <td><a href="Busrate.php?did=<?php echo $result["busrate_id"]?>">delete</a></td>
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
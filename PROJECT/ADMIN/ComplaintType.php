<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:ComplaintType</title>
</head>

<body>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$ComplaintType=$_POST["txt_district"];
	$hid=$_POST["txt_id"];
	if($hid!="")
	{
		$upQry="update tbl_complaintype set ctype_name='".$ComplaintType."' where ctype_id='".$hid."'";
		if($Conn->query($upQry))
		{
			header("Location:ComplaintType.php");
		}
	}
	else
	{
	$insQry="insert into tbl_complaintype(ctype_name)values('".$ComplaintType."')";
	if($con->query($insQry))
	{
		?>
		<script>
		alert("Data Inserted");
		window.location="ComplaintType.php";
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert("Data Insertion Failed");
		window.location="ComplaintType.php";
        </script>
		<?php
	}
	}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_complaintype where ctype_id='".$_GET["did"]."'";
	if($con->query($delQry))
	{
		header("Location:ComplaintType.php");
	}
	else
	{
		?>
		<script>
		alert("Data Deletion Failed");
		window.location="ComplaintType.php";
        </script>
		<?php
	}
}
$did="";
$dname="";
if(isset($_GET["eid"]))
{
	$selQry1="select * from tbl_complaintype where ctype_id='".$_GET["eid"]."'";
	$row1=$con->query($selQry1);
	$data1=$row1->fetch_assoc();
	$did=$data1["ctype_id"];
	$dname=$data1["ctype_name"];	
}
?>

<?php
//include("header.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellspacing="1" cellpadding="10" align="center">
    <tr>
      <td>ComplaintType</td>
      <td><label for="txt_district"></label>
      <input type="hidden" name="txt_id" value="<?php echo $did?>" />
      <input type="text" name="txt_district" id="txt_district" value="<?php echo $dname?>" autocomplete="off" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <table border="1" cellspacing="1" cellpadding="10" align="center">
    <tr>
      <td>SI NO.</td>
      <td>ComplaintType</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_complaintype";
	$row=$con->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["ctype_name"]?></td>
      <td><a href="ComplaintType.php?did=<?php echo $data["ctype_id"]?>">Delete</a>/<a href="ComplaintType.php?eid=<?php echo $data["ctype_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>

<?php
include("foot.php");
?>
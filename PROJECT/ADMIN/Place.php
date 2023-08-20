<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Places</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{    
    $district=$_POST["sel_district"];
	$pname=$_POST["txt_placename"];
	$ppin=$_POST["txt_placepin"];
	$insQry="insert into tbl_place(district_id,place_name,place_pin) VALUES('".$district."','".$pname."','".$ppin."')";
	$sql1="select * from tbl_place where place_name='".$pname."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Place already exist!!");
			 window.location("Place.php");
		</script>
     <?php
	}else
	{
	if($con->query($insQry))
	{
	  ?>
     <script>
	   alert("Data inserted");
	   window.location("Place.php");
	 </script>
   <?php
	}
    else
	{
    ?>
      <script>
	    alert("Data Insertion Failed");
		window.location("Place.php");
	  </script>
      <?php
    }
	}
}
    
      if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_place where place_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Place.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Place.php";
			</script>
            <?php
			}
		}
		    ?>

<form id="form1" name="form1" method="post" action="Place.php">
  <table width="309" height="104" border="1" cellpadding="10">
  <tr>
    <td>District Name</td>
    <td><select name="sel_district" id="sel_district">
     <option value="">---select---</option>
		<?php
		 $sql="select * from tbl_district";
		 $rows=$con->query($sql);
		  $i=0;
		  
  while($result=$rows->fetch_assoc())
  {
	  ?>
       
        <option value="<?php echo $result["district_id"] ?>"><?php echo $result["district_name"] ?></option>
        <?php
  }
  ?>
      </select></td>
    <tr>
      <td>Place Name</td>
      <td><input type="text" name="txt_placename" id="txt_placename" /></td>
    </tr>
    <tr>
      <td>Pin</td>
      <td><input type="text" name="txt_placepin" id="txt_placepin" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    
     <table border="black">
  <tr>
  <th>SI no</th>
  <th>District Name</th>
  <th>Place Name</th>
  <th>Pin</th>
  <th>Action</th>
  </tr>
     <?php
  $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id order by district_name ASC";
  $rows=$con->query($selqry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["district_name"];?></td>
   <td><?php echo $result["place_name"];?></td>
   <td><?php echo $result["place_pin"];?></td>
   <td><a href="Place.php?did=<?php echo $result["place_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
 
</form>


<body>
</body>
<?php
ob_flush();
include("foot.php");
?>
</html>
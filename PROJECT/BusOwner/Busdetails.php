<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Bus Details</title>
</head>

<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$regno=$_POST["txt_regno"];
	$cap=$_POST["txt_cap"];
	$ins=$_POST["txt_insno"];
	$photo=$_FILES["bphoto"]["name"];
	$temp = $_FILES["bphoto"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/Busphoto/".$photo);
	$rid=$_POST["sel_route"];
	$btypeid=$_POST["sel_type"];
	
	$insQry="insert into tbl_busdetails (bus_name,bus_regno,bus_photo,bus_insno,bus_capacity,owner_id,route_id,bustype_id)
	values('".$name."','".$regno."','".$photo."','".$ins."','".$cap."','".$_SESSION["lgid"]."','".$rid."','".$btypeid."')";
	
	if($con->query($insQry))
	{
		?>
		<script>
			alert("inserted Successfully");
		</script>
        <?php
	}
	else
	{
		?>
        <script>
			alert("insertion failed");
		</script>
     <?php
	}
}


        
?>

<body>
<div align="center" id="tab">
<div class="container2">
<h1>Add Buses</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="324" border="1" cellpadding="10">
    <tr>
      <td width="135">Bus Name</td>
      <td width="137"><input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
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
      <td>Route</td>
      <td><select name="sel_route" id="sel_route">
     <option value="">---select---</option>
		<?php
		 $selQry1="select * from tbl_route";
		 $rows1=$con->query($selQry1);
		  $i=0;
		  
  while($result1=$rows1->fetch_assoc())
  {
	  ?>
      <option value="<?php echo $result1["route_id"] ?> "><?php echo $result1["route_name"] ?></option>
        <?php
  }
  ?>
      </select></td>
    </tr>
    <tr>
      <td>Reg No</td>
      <td><input type="text" name="txt_regno" id="txt_regno" /></td>
    </tr>
    <tr>
      <td>Capacity</td>
      <td><input type="text" name="txt_cap" id="txt_cap" /></td>
    </tr>
    <tr>
      <td>Insurance No</td>
      <td><input type="text" name="txt_insno" id="txt_insno" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="bphoto" id="bphoto"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="952" border="1" cellpadding="10">
    <tr>
      <td>SI no</td>
      <td>Bus Name</td>
      <td>Bus Type</td>
      <td>Route</td>
      <td>Reg No</td>
      <td>Capacity</td>
      <td>Insurance No</td>
      <td>Photo</td>
      <td>Status</td>
    </tr>
    <?php
	
	$selQry="select * from tbl_busdetails b inner join tbl_bustype t on b.bustype_id=t.bustype_id inner join tbl_route r on 
	         b.route_id=r.route_id where owner_id='".$_SESSION["lgid"]."'";
			 
	$row=$con->query($selQry);
	$i=1;
	while($result=$row->fetch_assoc())
	{
		?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $result["bus_name"];?></td>
      <td><?php echo $result["bustype_name"];?></td>
      <td><?php echo $result["route_name"];?></td>
      <td><?php echo $result["bus_regno"];?></td>
      <td><?php echo $result["bus_capacity"];?></td>
      <td><?php echo $result["bus_insno"];?></td>
      <td><img src="../Assets/Files/Busphoto/<?php echo $result["bus_photo"];?>"></td>
      <td><?php if($result["bus_status"]=='0')
	  			echo "Pending";
				else if($result["bus_status"]=='1')
				echo "Accepted";
				else if($result["bus_status"]=='2')
				echo "Rejected";
				?>
				</td>
      </tr>
      <?php
	  $i++;
	}
	  ?>
  </table>
  <p>&nbsp;</p>
</form>
 </div></div>
 <a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
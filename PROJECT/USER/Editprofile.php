<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Edit Profile</title>
</head>
<?php
ob_start();
include("Head.php");
//session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["update"]))
{
	
	$photo = $_FILES["file_photo"]["name"];
	$temp = $_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/UserPhoto/".$photo);
	
	$proof = $_FILES["file_proof"]["name"];
	$temp1 = $_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp1,"../Assets/Files/UserProof/".$proof);
	$sql2='update tbl_user set user_name="'.$_POST["txt_name"].'",user_proof="'.$proof.'", user_photo="'.$photo.'", user_gender="'.$_POST["btngender"].'", user_contact="'.$_POST["txt_contact"].'", user_email="'.$_POST["txt_mail"].'",user_address="'.$_POST["txt_address"].'" where user_id="'.$_SESSION["lgid"].'"';
	
if($con->query($sql2))
	{
		?>
        <script>
		         alert("Data Updated");
		</script>
        <?php
		
	}
	else
	{
		?>
        <script>
		         alert("Data Updation failed");
				 
		</script>
        <?php
	}
}

?>
<body>
<div align="center" id="tab">
<div class="container2">
<h1>Edit Profile</h1>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<center>
  <table width="549" height="402" border="1" cellpadding="10">
    <tr>
      <td width="1">Name</td>
      <td width="3"><input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="btngender" value="MALE" id="btngender_0" />
          Male</label>
        <br />
        <label>
          <input type="radio" name="btngender" value="FEMALE" id="btngender_1" />
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="txt_mail" id="txt_mail" /></td>
    </tr>
    <tr>
      <td>District Name</td>
      <td><select name="sel_district" id="sel_district" onchange="getPlace(this.value)" id="sel_district">
       <option>--select--</option>
      <?php
	   $sql1="select * from tbl_district";
	   $results1=$con->query($sql1);
	   while($rows1=$results1->fetch_assoc())
	   {
		    ?>
            <option value="<?php echo $rows1["district_id"]; ?>"><?php echo $rows1["district_name"]; ?></option>
            <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>Place Name</td>
      <td><select name="sel_place" id="sel_place">
      <option>--select--</option>
      <?php
	   $sql2="select * from tbl_place";
	   $results2=$con->query($sql2);
	   while($rows=$results2->fetch_assoc())
	   {
		    ?>
            <option value="<?php echo $rows["place_id"]; ?>"><?php echo $rows["place_name"]; ?></option>
            <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
    <td>Photo</td>
    <td><input type="file" name="file_photo" id="file_photo"/> </td>
    </tr>
      <tr>
        <td>Proof</td>
        <td colspan="2"><input type="file" name="file_proof" id="file_proof"/> </td>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="update" id="Update" value="Update" />
      <input type="reset" name="Cancel" id="Cancel" value="Reset" /></td>
    </tr>
  </table></center>
  </div>
  </div>
 
</form>
<a href="Newhome.php" class="round">&#8249;</a>
</body>
<script src="../Assets/jquery/jQuery.js"></script>
<script>
     function getPlace(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_place").html(result);
                                }
                            });
                        }
    </script>
    <?php
	ob_flush();
include("Foot.php");
?>

</body>
</html>
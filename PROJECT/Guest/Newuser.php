<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><hr />

<title>Bus Enquiry :NewUser</title>
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["submit"]))
{
	require '../Assets/phpMail/src/Exception.php';
	require '../Assets/phpMail/src/PHPMailer.php';
	require '../Assets/phpMail/src/SMTP.php';
	
	$name=$_POST["txt_name"];
	$gender=$_POST["btngender"];
	$contact=$_POST["txt_contact"];
	$mail=$_POST["txt_mail"];
	$pass=$_POST["txt_password"];
	$address=$_POST["txt_address"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	
	$photo = $_FILES["file_photo"]["name"];
	$temp = $_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/UserPhoto/".$photo);
	
	$proof = $_FILES["file_proof"]["name"];
	$temp1 = $_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp1,"../Assets/Files/UserProof/".$proof);
	
	$sql1="select * from tbl_user where user_name='".$name."' and user_email='".$mail."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("User already exist with same name and mail!!");
			 window.location("Newuser.php");
		</script>
     <?php
	}else
	{
		$sql="insert into tbl_user(user_name,user_gender,user_contact,user_email,place_id,user_pass,user_address,user_proof,user_photo) values('".$name."','".$gender."','".$contact.	"','".$mail."','".$place."','".$pass."','".$address."','".$proof."','".$photo."')";
	
		if($con->query($sql))
		{
			$mail = new PHPMailer(true);

   			$mail->isSMTP();
    		$mail->Host = 'ssl://smtp.gmail.com:465';
    		$mail->SMTPAuth = true;
    		$mail->Username = 'busenquiry456@gmail.com'; // Your gmail
    		$mail->Password = 'jbkqzmnolzugehsn'; // Your gmail app password
    		$mail->SMTPSecure = 'ssl';
    		$mail->Port = 465;
  			$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
			);
    		$mail->setFrom('busenquiry456@gmail.com'); // Your gmail
    		$mail->addAddress($_POST["txt_mail"]);
    		$mail->isHTML(true);
    		$mail->Subject = "Your Account Creation is Completed";
    		$mail->Body = "Hello"." ".$name." "."Your Account Creation is Completed ";
 		 	if($mail->send())
 	 		{
				?>
                <script>
					alert("Confirmation Mail Sended");
	   				window.location("Login.php");
				</script>
                <?php	
  			}
  			else
  			{
				?>
    			 <script>
					alert("Mail Not Sended!!");
	   				window.location("Newuser.php");
				</script>
                <?php
  			}
			?>
     		<script>
	   			alert("Registered Successfully");
	   			window.location("Login.php");
	 		</script>
   			<?php
		}
    	else
		{
    		?>
      			<script>
	    			alert("Data Insertion Failed");
					window.location("Newuser.php");
	  			</script>
      		<?php
		}
   	}
 }
	 if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_user where user_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Newuser.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Newuser.php";
			</script>
            <?php
			}
		}
		    ?>
<body>
<div id="tab" align="center">
<h3 align="center">User Registration</h3>
<form id="form1" name="form1" method="post" action=""enctype="multipart/form-data">
  <table width="549" height="402" border="1" cellpadding="10">
    <tr>
      <td width="1">Name</td>
      <td width="3"><input type="text" name="txt_name" id="txt_name" / required></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="btngender" value="MALE" id="btngender_0" required/>
          Male</label>
        <br />
        <label>
          <input type="radio" name="btngender" value="FEMALE" id="btngender_1" required/>
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="number" name="txt_contact" id="txt_contact" required pattern="([0-9]{10})"/></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="email" name="txt_mail" id="txt_mail" required/></td>
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
        <td><input type="file" name="file_proof" id="file_proof"required/> </td>
       
      </tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="Cancel" id="Cancel" value="Reset" /></td>
    </tr>
  </table>
  
   <--<a href="..">Go back to Homepage</a>
  
</form>
</div>
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
	function myFunction() 
						{
  							var x = document.getElementById("txt_password");
  							if (x.type === "password") {
    							x.type = "text";
  							} else {
   								x.type = "password";
  							}
						}
    </script>
   <?php
ob_flush();
include("Foot.php");
?> 
</html>
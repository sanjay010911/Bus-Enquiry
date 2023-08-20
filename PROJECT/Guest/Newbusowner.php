<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :New Busowner</title>
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
	$name=$_POST["txt_oname"];
	$gender=$_POST["btngender"];
	$contact=$_POST["txt_contact"];
	$mail=$_POST["txt_omail"];
	$pass=$_POST["txt_opass"];
	$license=$_POST["txt_licenseno"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	$aadhar=$_POST["txt_aadhar"];
	
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/BusOwnerphoto/".$photo);
	
	$sql1="select * from tbl_busowner where owner_name='".$name."' and owner_mail='".$mail."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Bus Owner already exist with same name and mail!!");
			 window.location("Newuser.php");
		</script>
     <?php
	}else
	{
		$sqlQry="insert into tbl_busowner(owner_name,owner_gender,owner_contact,owner_mail,place_id,owner_pass,owner_licenseno,owner_photo,owner_aadharno,owner_status) values('".$name."','".$gender."','".$contact."','".$mail."','".$place."','".$pass."','".$license."','".$photo."','".$aadhar."','0')";
		if($con->query($sqlQry))
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
    			$mail->addAddress($_POST["txt_omail"]);
    			$mail->isHTML(true);
    			$mail->Subject = "Your Account Creation is Completed";
    			$mail->Body = "Hello"." ".$name." "."Your Account Creation is Completed ";
 		 		if($mail->send())
 	 			{
					?>
                	<script>
						alert("Mail Sended");
	   					window.location("Newbusowner.php");
					</script>
                	<?php	
  				}
  				else
  				{
					?>
    			 	<script>
						alert("Mail Not Sended!!");
	   					window.location("Newbusowner.php");
					</script>
                	<?php
  				}
				?>
     		<script>
	  			alert("Request Sended to Admin");
	   			window.location("Newbusowner.php");
	 		</script>
   			<?php
		}
    	else
		{
    		?>
      		<script>
	    		alert("Request not sended to Admin");
				window.location("Newbusowner.php");
	  		</script>
      		<?php
		}
  }
}
?>
<body>
<div id="tab" align="center">
<h3 align="center">BusOwner Registration</h3>
<blockquote>
  <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  onsubmit="return validateemail()">
    <table width="429" border="1" cellpadding="10">
      <tr>
        <td width="165">Name :</td>
        <td width="212"><input type="text" name="txt_oname" id="txt_oname" required /></td>
      </tr>
      <tr>
        <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="btngender" value="MALE" id="btngender_0" required/>
          Male</label>
           <br />
        <label>
          <input type="radio" name="btngender" value="FEMALE" id="btngender_1" />
          Female</label>
        <br/>
      </p></td>
      </tr>
      <tr>
        <td>Mail:</td>
        <td><input type="email" name="txt_omail" id="txt_omail" required/></td>
      </tr>
      <tr>
        <td> Password :</td>
        <td><input type="text" name="txt_opass" id="txt_opass" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
       </td>
      </tr>
      <tr>
        <td>License no :</td>
        <td><input type="text" name="txt_licenseno" id="txt_licenseno" required/></td>
      </tr>
      <tr>
        <td>Contact:</td>
        <td><input type="number" name="txt_contact" id="txt_contact" required pattern="([0-9]{10})"/></td>
      </tr>
      <tr>
        <td>Aadhar no :</td>
        <td><input type="number" name="txt_aadhar" id="txt_aadhar" required/></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><input type="file" name="file_photo" id="file_photo" required/></td>
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
        <td>Place</td>
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
        <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" />
        <input type="reset" name="Reset" id="Reset" value="Reset" /></td>
      </tr>
    </table>
    <--<a href="..">Go back to Homepage</a>
  </form>
</blockquote>
</div>
</body>
<script src="../Assets/jquery/jQuery.js"></script>
<script>
     function getPlace(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                                success: function(result) {
									//alert(did)
                                    $("#sel_place").html(result);
                                }
                            });
                        }
	function myFunction() 
						{
  							var x = document.getElementById("txt_opass");
  							if (x.type === "password") {
    							x.type = "text";
  							} else {
   								x.type = "password";
  							}
						}
	function validateemail()  
{  
var x=document.form1.txt_omail.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }  
}  
    </script>
    <?php
ob_flush();
include("Foot.php");
?>
</html>
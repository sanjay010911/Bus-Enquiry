<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Reset Password</title>
</head>
<style>
	input {
  	width: 100%;
 	 padding: 12px;
  	border: 1px solid #ccc;
  	border-radius: 4px;
  	box-sizing: border-box;
  	margin-top: 6px;
 	 margin-bottom: 16px;
	}

/* Style the submit button */
	input[type=submit] {
  	background-color: #F75757;
  	color: white;
	}

/* Style the container for inputs */
	.container2 {
 	 background-color: #f1f1f1;
  	padding: 20px;
	}

/* The message box is shown when the user clicks on the password field */
	#message {
 	 display:none;
	  background: #f1f1f1;
  	color: #000;
 	position: relative;
  	padding: 20px;
  	margin-top: 10px;
	}

#message p {
  	padding: 10px 35px;
  	font-size: 18px;
	}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
 	 color: green;
}

.valid:before {
 	 position: relative;
 	 left: -35px;
  	 content: &#10004;
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
 	 color: red;
}

.invalid:before {
  		position: relative;
  		left: -35px;
  		content: &#10006;
}
</style>
<?php
ob_start();
include("Head.php");
	//session_start();
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
	{
		
		$selq="select * from tbl_user where user_pass='".$_POST["txt_cur"]."' and user_id='".$_SESSION["lgid"]."'";
		if($row=$con->query($selq))
		{
				if($_POST["txt_new"]==$_POST["txt_con"])
				{
					$up="update tbl_user set user_pass='".$_POST["txt_new"]."' where user_id='".$_SESSION["lgid"]."'";
					if($con->query($up))
					{
						?>
                    
						<script>
						alert("Password Updated");
						</script>
                   		<?php
					}
				}
				else
				{?>
					<script>
					alert("password mismatch");
					</script>
               	<?php
				}
			}
			else
			{
				?>
            		<script>
					alert("Incorrect Password");
					</script>
            	<?php
			}
		}
   ?>         
			
		

<body><br /><br />
<div id="tab" align="center">
<div class="container2">
<h1>Reset Password</h1>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_cur"></label>
      <input type="text" name="txt_cur" id="txt_cur" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_con"></label>
      <input type="text" name="txt_con" id="txt_con" required="required" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Change" />
      <input type="reset" name="btnc" id="btnc" value="Cancel" /></td>
    </tr>
  </table>
  </div>
  <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
   
</form>
<a href="Newhome.php" class="round">&#8249;</a>
</body>

<script>
		var myInput = document.getElementById("txt_new");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");

		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
 		document.getElementById("message").style.display = "block";
		}

		// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
  		document.getElementById("message").style.display = "none";
		}

		// When the user starts to type something inside the password field
		myInput.onkeyup = function() {
  		// Validate lowercase letters
  		var lowerCaseLetters = /[a-z]/g;
  		if(myInput.value.match(lowerCaseLetters)) {
    	letter.classList.remove("invalid");
    	letter.classList.add("valid");
  		} else {
    	letter.classList.remove("valid");
    	letter.classList.add("invalid");
		}

  		// Validate capital letters
  		var upperCaseLetters = /[A-Z]/g;
  		if(myInput.value.match(upperCaseLetters)) {
   	 	capital.classList.remove("invalid");
    	capital.classList.add("valid");
  		} else {
    	capital.classList.remove("valid");
    	capital.classList.add("invalid");
  		}

  		// Validate numbers
  		var numbers = /[0-9]/g;
  		if(myInput.value.match(numbers)) {
    	number.classList.remove("invalid");
    	number.classList.add("valid");
  		} else {
    	number.classList.remove("valid");
    	number.classList.add("invalid");
  		}

  		// Validate length
  		if(myInput.value.length >= 8) {
    	length.classList.remove("invalid");
    	length.classList.add("valid");
  		} else {
    	length.classList.remove("valid");
    	length.classList.add("invalid");
  		}
	}
</script>
<?php
ob_flush();
include("Foot.php");
?>
</html>
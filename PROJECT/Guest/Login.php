<?php
 ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btnLogin"]))
{
	
		$umail=$_POST["txtusermail"];
		$password = $_POST["txtpassword"];
		
		
		 $selQry1 = "select * from tbl_user where user_email='".$umail."' and user_pass='".$password."'";
  		 $rowUser=$con->query($selQry1);
		 
		 $selQry2 = "select * from tbl_busowner where owner_mail='".$umail."' and owner_pass='".$password."' and owner_status='1'";
  		 $rowOwner=$con->query($selQry2);
		 
		 
		 $selQry3 = "select * from tbl_admin where admin_mail='".$umail."' and admin_pass='".$password."'";
  		 $rowAdmin=$con->query($selQry3);
		 
		 
		 
  		 if($resultUser=$rowUser->fetch_assoc())
  			{
				$_SESSION["lgid"]=$resultUser["user_id"];
				$_SESSION["lgname"]=$resultUser["user_name"];
				header("location:../USER/Newhome.php");
			}
			
		else if($resultOwner=$rowOwner->fetch_assoc())
  			{
				$_SESSION["lgid"]=$resultOwner["owner_id"];
				$_SESSION["lgname"]=$resultOwner["owner_name"];
				header("location:../BusOwner/HomePage.php");
			}
			
				
		else if($resultAdmin=$rowAdmin->fetch_assoc())
  			{
				$_SESSION["lgid"]=$resultAdmin["admin_id"];
				header("location:../ADMIN/AdHomePage.php");
			}
		
	    else
		{
          ?>
              <script>
			 				 alert("Invalid Usermail or password");
							 window.location("Login.php");
			  </script>
              
              <?php
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Login</title>
</head>

<body>
<div id="tab" align="center">
<h1>Login</h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>User Mail</td>
      <td><label for="txtusermail"></label>
      <input type="email" name="txtusermail" id="txtusermail" required  autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnLogin" id="btnLogin" value="Login" /></td>
    </tr>
  </table>
</form>
<a href="..">Go Back To Homepage</a>
<a href="RecoveryPassword.php">Forgot Password?</a>
</div>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Complaint Reply</title>
</head>
<?php
ob_start();
include("head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$upsqry="update tbl_complaint set complaint_reply='".$_POST["txt_reply"]."' where complaint_id='".$_SESSION["cid"]."'";
	if($con->query($upsqry))
	{	
				?>
				<script>
						alert("Reply Submitted..");
						header("Location:ComplaintReply.php");
				</script>
            <?php
			}
			else
			{
				?>
                <script>
						alert("Failed..");
						header("Location:ComplaintReply.php");
				</script>
				<?php
			}
	
	}	
	
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Complaint Reply</td>
      <td><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
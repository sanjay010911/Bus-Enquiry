<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry : Feedback</title>
</head>
<?php
ob_start();
include("Head.php");
?>
<body>
<div id="tab" align="center">
<div class="container2">
<h1>Feedback</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="520" height="302" border="1">
    <tr>
      <td width="251">Route Name</td>
      <td width="253"><label for="sel_route"></label>
        <select name="sel_route" id="sel_route" onchange="getBus(this.value)">
         <option>--Select--</option>
      <?php
	  session_start();
	  include("../Assets/Connection/Connection.php");
	  if(isset($_POST["btn_submit"]))
		{	
			
				$insqry="insert into tbl_feedback(bus_id,f_msg,user_id) value('".$_POST["sel_bus"]."','".$_POST["txt_msg"]."',
				'".$_SESSION["lgid"]."')";
				if($con->query($insqry))
				{
					?>
     				<script>
	   					alert("Feedback Submitted");
	   					window.location("Feedback.php");
	 				</script>
   					<?php
				}
    			else
				{
    				?>
      					<script>
	    					alert("Failed..");
							window.location("Feedback.php");
	  					</script>
      				<?php
				}
			
		}
	   $selqry="select * from tbl_route";
	   $result=$con->query($selqry);
	   while($row=$result->fetch_assoc())
	   {
		    ?>
            <option value="<?php echo $row["route_id"]; ?>"><?php echo $row["route_name"]; ?></option>
            <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>Bus Name</td>
      <td><label for="sel_bus"></label>
        <select name="sel_bus" id="sel_bus">
          <option>--Select--</option>
          <?php
	   $selqry2="select * from tbl_busdetails";
	   $result2=$con->query($selqry2);
	   while($row2=$result2->fetch_assoc())
	   {
		    ?>
          <option value="<?php echo $row2["bus_id"]; ?>"><?php echo $row2["bus_name"]; ?></option>
          <?php
	   }
	   ?>
          </select></td>
    </tr>
    <tr>
      <td>Feedback</td>
      <td><label for="txt_msg"></label>
        <textarea name="txt_msg" id="txt_msg" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
</form></div></div>
<a href="Newhome.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
<script src="../Assets/jquery/jQuery.js"></script>
<script>
 function getBus(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxBus.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_bus").html(result);
                                }
                            });
                        }
function checkrate()
						{
							if((document.form1.txt_rating.value<1)||(document.form1.txt_rating.value>5))
							{
								alert("Rating should be between 0 and 5..");
								window.location("Feedback.php");
							}
						}
</script>			
</html>
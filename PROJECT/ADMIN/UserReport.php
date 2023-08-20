<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Reports</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>


<body>
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="336" border="1">
   <table width="337" border="1">
    <tr>
      <td width="143">From Date</td>
      <td> <input type="date" name="fromdate" /></td>
    </tr>
    <tr>
      <td>To Date</td>
      <td><input type="date" name="todate" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
	  
	   
	   
        
     
  <p>&nbsp;</p>
  <div id="pri">
  <table width="1042" border="1">
    <tr>
      <td width="53">Si No</td>
      <td width="98">Name</td>
      <td width="103">Gender</td>
      <td width="106">Contact</td>
      <td width="89">Email</td>
      <td width="145">Place</td>
      <td width="174">Photo</td>
      <td width="123">Address</td>
      <td width="100">Reg Date</td>
    </tr>
    <?php
	if(isset($_POST["btn_submit"]))
	   {
		   $selqry="select * from tbl_user a inner join tbl_place b on a.place_id=b.place_id where reg_date between '".$_POST["fromdate"]."' and '".$_POST["todate"]."'";
		   
		   $result=$con->query($selqry);
		   $i=0;
		   while($row=$result->fetch_assoc())
		   {  
		   		$i++;
				?>
           		<tr>
                
                <td><?php echo $i?></td>
                <td><?php echo $row["user_name"];?></td>
                <td><?php echo $row["user_gender"];?></td>
                <td><?php echo $row["user_contact"];?></td>
                <td><?php echo $row["user_email"];?></td>
                <td><?php echo $row["place_name"];?></td>
                <td><img src="../Assets/Files/UserPhoto/<?php echo $row["user_photo"];?>" width="100" height="100" /></td>
                
                 <td><?php echo $row["user_address"];?></td>
                 <td><?php echo $row["reg_date"];?></td>
             	</tr>
              <?php
		   }?>
		   
           <?php
	   }
	   ?>
                
  </table>
  </div>
  <center><input type="button" onclick="printDiv('pri')" id="invoice-print" value="Print" /></center>
  <p>&nbsp;</p></center>
</form>
</body>
</form>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

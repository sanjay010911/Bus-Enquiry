<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:View Complaints</title>
</head>
<body>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$sql="update tbl_complaint set complaint_status='1' where complaint_id='".$did."'";
			if($con->query($sql))
			{
				?>
           		<script>
				alert("Solved");
				location.href="ViewComplaint.php";
            	</script>
            	<?php	
   			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="ViewComplaint.php";
				</script>
           		 <?php
			}
		}
		?>
<form id="form1" name="form1" method="post" action="">
  <table width="706" height="178" border="1">
    <tr>
      <td width="29" height="103">SI No</td>
      <td width="56">User Name</td>
      <td width="56">Bus Name</td>
      <td width="86">Date</td>
      <td width="87">Complaint type</td>
      <td width="136">Message</td>
	  <td width="77">Reply</td>
      <td width="127">Action</td>
    </tr>
    <tr>
       <?php
	   

		
	  $i=0;
	  $sel = "select * from tbl_complaint a inner join tbl_complaintype b on a.ctype_id=b.ctype_id inner join tbl_busdetails c on a.bus_id=c.bus_id inner join tbl_user d on a.user_id=d.user_id where complaint_status='0'";
	  $row = $con->query($sel);
	  while($data = $row->fetch_assoc())
	  {
		  $i++;
	  
		  ?>
          <tr>
            <td><?php echo $i; 	?></td>
             <td><?php echo $data['user_name']; ?></td>
            <td><?php echo $data['bus_name']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><?php echo $data['ctype_name']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><a href="ComplaintReply.php">Reply</a><?php $_SESSION["uid"]=$data['user_id'];$_SESSION["cid"]=$data['complaint_id'];?></td>
            <td><a href="ViewComplaint.php?did=<?php echo $data["complaint_id"];?>">Mark As Solved</a><br/>
				</td>
      </tr>
      <?php
	  }
	  
	  ?>
    </tr>
  </table>
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>


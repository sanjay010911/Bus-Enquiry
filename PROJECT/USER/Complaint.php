<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Complaint</title>
</head><?php
ob_start();
include("Head.php");
//session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_submit']))
	{
		$complaint = $_POST['txt_complaint'];
		$complainttype = $_POST['sel_complainttype_name'];
	
			$ins = "insert into tbl_complaint (complaint_content,ctype_id,user_id,bus_id) values('".$complaint."','".$complainttype."','".$_SESSION["lgid"]."','".$_POST["sel_bus"]."')";
			if($con->query($ins))
			{
				header("Location:Complaint.php");
			}
			else
			{
				?>
                <script>
						alert("Failed..");
						header("Location:Complaint.php");
				</script>
				<?php
			}
	
	}	
	
?>


<body>

<div align="center" id="tab">
<div class="container2">
<h1>Complaint</h1>

<form id="form1" name="form1" method="post" action="">
  <table border='1' >
    <tr>
      <td>Type</td>
      <td><label for="sel_complainttype_name"></label>
        <select name="sel_complainttype_name" id="sel_complainttype_name">
        <option value="">-----Select-----</option>
		<?php
         	  $sel ="select * from tbl_complaintype";
	  $row = $con->query($sel);
	  while($data = $row->fetch_assoc())
	  {
     ?>
		 <option value="<?php echo $data['ctype_id'];?>" 
		
        
         ><?php echo $data['ctype_name']; ?></option >
           <?php
	  }
	?>
		 </td>
     


   </tr>
   <tr>
   		<td>Bus</td>
        <td><select name="sel_bus" id="sel_bus">
        <option value="">-----Select-----</option>
		<?php
         	  $sel2 ="select * from tbl_busdetails";
	  $row = $con->query($sel2);
	  while($data = $row->fetch_assoc())
	  {
     ?>
		 <option value="<?php echo $data['bus_id'];?>" 
		
        
         ><?php echo $data['bus_name']; ?></option >
           <?php
	  }
	?>
    </select>
    </td>
    <tr>
      <td>Complaint</td>
      <td><label for="txt_complaint"></label>
      <textarea name="txt_complaint" id="txt_complaint" cols="45" rows="5" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table border='1'>
      <tr>
        <td>Sl.No</td>
        <td>Bus Name</td>
        <td>Type</td> 
        <td>Content</td>
        <td>Date</td>
        <td>Reply</td>
        <td>Status</td>
        </tr>
         <?php
	  $i=0;
	  $sel = "select * from tbl_complaint a inner join tbl_complaintype b on a.ctype_id=b.ctype_id inner join tbl_busdetails c on a.bus_id=c.bus_id where a.user_id='".$_SESSION["lgid"]."'";
	  $row = $con->query($sel);
	  while($data = $row->fetch_assoc())
	  {
		  $i++;
	  
		  ?>
          <tr>
            <td><?php echo $i; 	?></td>
             <td><?php echo $data['bus_name']; ?></td>
            <td><?php echo $data['ctype_name']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><?php echo $data['complaint_reply']; ?></td>
            <td><?php if($data["complaint_status"]=='0')
	  			echo "Pending";
				else if($data["complaint_status"]=='1')
				echo "Solved";
				?>
				</td>
      </tr>
      <?php
	  }
	  ?>
     </table>
</form>
</div>
</div>
<a href="Newhome.php" class="round">&#8249;</a>
</body>
</html><?php
include("foot.php");
?>
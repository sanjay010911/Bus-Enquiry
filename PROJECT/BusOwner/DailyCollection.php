<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Daily Collection</title>
</head>

<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php"); 
//session_start();
if(isset($_POST["btn_submit"]))
{
	$sql1="select * from tbl_dailycollection where collec_date='".$_POST["txt_date"]."' and bus_id='".$_POST["sel_bus"]."'";
	$rslt1=$con->query($sql1);
	if(mysqli_num_rows($rslt1)>0)
	{
		?>
		<script>
			alert("Collection already exist!!");
			 window.location("DailyCollection.php");
		</script>
     <?php
	}else
	{
		$insQry="insert into tbl_dailycollection(collec_date,bus_id,collec_amt)values('".$_POST["txt_date"]."','".$_POST["sel_bus"]."',
		'".$_POST["txt_amt"]."')";
		echo $insQry;
		if($con->query($insQry))
			{
				?>
            	<script>
				alert("Inserted");
				location.href="DailyCollection.php";
            	</script>
            	<?php	
   			}
			else
			{
				?>
				<script>
				alert("Insertion failed..");
				location.href="DailyCollection.php";
				</script>		  	
				<?php 
			}
	}
}

 if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_dailycollection where collec_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="DailyCollection.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="DailyCollection.php";
			</script>
            <?php
			}
		}
		?>


<body>
<div align="center" id="tab">
<div class="container2">
<h1>Daily Collection</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="391" border="1" cellpadding="10">
    <tr>
      <td width="165">Date</td>
      <td width="174"><input type="date" name="txt_date"</td>
    </tr>
    <tr>
      <td>Bus</td>
      <td><select name="sel_bus" id="sel_bus">
       <option>--select--</option>
    <?php
	 $selQry="select * from tbl_busdetails where tbl_busdetails.owner_id='".$_SESSION["lgid"]."'";
	
	   $rslt=$con->query($selQry);
	   while($row=$rslt->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row["bus_id"]; ?>"><?php echo $row["bus_name"]; ?></option>
      <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><input type="text" name="txt_amt" id="txt_amt" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /> <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="353" border="1" cellpadding="10">
    <tr>
      <td>SI No</td>
      <td>Bus Name</td>
      <td>Amount</td>
      <td>Date</td>
      <td>Action</td>
    </tr>
    <?php
  $selQry="select * from tbl_dailycollection a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_busowner c on b.owner_id=c.owner_id where c.owner_id='".$_SESSION["lgid"]."' order by collec_date";
  
  $rows=$con->query($selQry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["bus_name"];?></td>
   <td><?php echo $result["collec_amt"];?></td>
   <td><?php echo $result["collec_date"];?></td>
   <td><a href="DailyCollection.php?did=<?php echo $result["collec_id"]?>">Delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
  <p>&nbsp;</p>
</form>
</div></div>
<a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :Daily Expense</title>
</head>

<body>

<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
//session_start();

	if(isset($_POST["btn_submit"]))
	{
		$sql1="select * from tbl_expense where exp_date='".$_POST["sel_date"]."' and bus_id='".$_POST["sel_bus"]."' and exptype_id='".$_POST["sel_exptype"]."'";
		$rslt1=$con->query($sql1);
		if(mysqli_num_rows($rslt1)>0)
		{
			?>
			<script>
				alert("Expense already exist!!");
			 	window.location("Dailyexpense.php");
			</script>
     		<?php
		}else
		{
			$insqry="insert into tbl_expense(exp_date,exp_amt,exptype_id,bus_id)values
			('".$_POST["sel_date"]."','".$_POST["txt_amt"]."','".$_POST["sel_exptype"]."','".$_POST["sel_bus"]."')";
			if($con->query($insqry))
			{
				?>
            	<script>
				alert("Inserted");
				location.href="DailyExpense.php";
            	</script>
           		 <?php	
   			}
			else
			{
				?>
				<script>
				alert("Insertion failed..");
				location.href="DailyExpense.php";
				</script>		  	
				<?php 
			}
		}
	}
	
	 if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_expense where exp_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="DailyExpense.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="DailyExpense.php";
			</script>
            <?php
			}
		}
		?>
<div align="center" id="tab">
<div class="container2">
<h1>Daily Expense</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="59">Date</td>
      <td width="69"><input type="date" name="sel_date"</td>
    </tr>
    <tr>
      <td>Expense</td>
      <td><select name="sel_exptype" id="sel_exptype">
      <option>--select--</option>
       <?php
	 $selQry1="select * from tbl_expensetype ";
		
	   $rslt1=$con->query($selQry1);
	   while($row1=$rslt1->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row1["exptype_id"]; ?>"><?php echo $row1["exptype_name"]; ?></option>
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
      <td>Bus Name</td>
      <td><select name="sel_bus" id="sel_bus">
      <option>--select--</option>
      <?php
	$selQry2="select * from tbl_busdetails where owner_id='".$_SESSION["lgid"]."'";
	
	   $rslt2=$con->query($selQry2);
	   while($row2=$rslt2->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row2["bus_id"]; ?>"><?php echo $row2["bus_name"]; ?></option>
      <?php
	   }
	   
	   ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table><br />
   <table border="1" cellpadding="10">
    <tr>
  		<td>SI No</td>
        <td>Date</td>
        <td>Expense</td>
        <td>Amount</td>
        <td>Bus Name</td>
        <td>Action</td>
    </tr>
    <?php
	$selqry3="select * from tbl_expense a inner join tbl_expensetype b on a.exptype_id=b.exptype_id inner join tbl_busdetails c on a.bus_id=c.bus_id where 
	c.owner_id='".$_SESSION["lgid"]."' order by a.exp_date asc";
	$result3=$con->query($selqry3);
  $i=0;
  while($row3=$result3->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $row3["exp_date"];?></td>
   <td><?php echo $row3["exptype_name"];?></td>
   <td><?php echo $row3["exp_amt"];?></td>
   <td><?php echo $row3["bus_name"];?></td>
	 <td><a href="DailyExpense.php?did=<?php echo $row3["exp_id"];?>">Delete</a></td>
  </tr>
	<?php
 }
  ?>
  </table>
    
</form>
</div></div>
<a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Income Expense</title>
</head>
<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php"); 
//session_start();


?>
<body>
<div align="center" id="tab">
<div class="container2">
<h1>Income Expense Statement</h1>
<form id="form1" name="form1" method="post" action="">
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
      <td>Bus</td>
      <td><label for="sel_bus"></label>
        <select name="sel_bus" id="sel_bus">
         <option>--select--</option>
      <?php
	$selQry="select * from tbl_busdetails where owner_id='".$_SESSION["lgid"]."'";
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
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="button" value="Reset" /></td>
    </tr>
  </table>
  <?php
  if(isset($_POST["btn_submit"]))
	{
		$selqry1="select * from tbl_dailycollection a inner join tbl_busdetails b on a.bus_id=b.bus_id where (collec_date between '".$_POST["fromdate"]."' and '".$_POST["todate"]."'                  )and b.bus_id='".$_POST["sel_bus"]."' order by a.collec_date asc";
	 			$result1=$con->query($selqry1);
				
		$selqry2="select * from tbl_expense a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_expensetype c on a.exptype_id=c.exptype_id where (exp_date between '".$_POST["fromdate"]."' and '".$_POST["todate"]."' ) and
					b.bus_id='".$_POST["sel_bus"]."' order by a.exp_date asc"; 
				$result2=$con->query($selqry2);
	 		?>
	 	<table width="200" border="1">
     		<tr>
     			<td>SI No</td>
      			<td>Date</td>
       			<td>Amount</td>
   			</tr>
    		<?php
   	 			$i=0;
	 			$collection=0;
  				while($row1=$result1->fetch_assoc())
 				{
	 	 			$i++;
		 			$collection=$collection+$row1["collec_amt"];
	 	 			?>
  					<tr>
   						<td><?php echo $i;?></td>
   						<td><?php echo $row1["collec_date"];?></td>
                        <td><?php echo $row1["collec_amt"];?></td>
    				</tr>
					<?php
 				}
  			?>
   		</table><br /><br />
        Total collection: <?php echo $collection;?><br />
		<table width="200" border="1">
     		<tr>
     			<td>SI No</td>
      			<td>Date</td>
        		<td>Type</td>
        		<td> Exp Amount</td>
     		</tr>
      		<?php
   	 			$i=0;
	 			$exp=0;
  				while($row2=$result2->fetch_assoc())
 				{
	 	 			$i++;
		 			$exp=$exp+$row2["exp_amt"];
	 	 			?>
  					<tr>
   						<td><?php echo $i;?></td>
   						<td><?php echo $row2["exp_date"];?></td>
                        <td><?php echo $row2["exptype_name"];?></td>
   						<td><?php echo $row2["exp_amt"];?></td>
   					</tr>
					<?php
 				}
		?>
			
    	</table><br /><br />
   		 Total expense:<?php  echo $exp;?><br /><br />
   		 <?php
	
		$pro=$collection-$exp;
		if($pro>0)
			echo "Profit Percent :".(($pro/$exp)*100)."%";
		else
			echo "Loss Percent :".(($pro/$exp)*100)."%";
						
	}
	?>
    </center>
     
    
     
  <p>&nbsp;</p>
  
    
        
  <p>&nbsp;</p>
</form>
</div>
</div>
<a href="Homepage.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
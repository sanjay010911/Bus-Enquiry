<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry :View Notification</title>
</head>
<style>
	a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 19px;
}
	.round {
  border-radius: 50%;
  background-color: #F15757;
  color: white;
}
</style>

<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

?>
<body>
<div id="tab" align="center">
<div class="container2">
<h1>Notifications</h1>
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="310" border="1" cellpadding="10">
    <tr>
      <td width="129">Route Name</td>
      <td width="129"><select name="sel_route" id="sel_route">
       <option value="">---select---</option>
	  <?php
	  $selQry2="select * from tbl_route";
	   $result=$con->query($selQry2);
	   while($row=$result->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row["route_id"]; ?>"><?php echo $row["route_name"]; ?></option>
      <?php
	   }
	   ?>
    </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="button" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="406" border="1" cellpadding="10">
    <tr>
      <td>SI No</td>
      <td>Bus Name</td>
      <td>Notification</td>
      <td>Notification Date</td>
    </tr>
    <?php
	if(isset($_POST["btn_submit"]))
	{
		$route=$_POST["sel_route"];
		$selqry="select * from tbl_notification c inner join tbl_busdetails d on c.bus_id=d.bus_id where d.route_id='".$route."'";
		$rslt=$con->query($selqry);
	
	$i=0;
		while($row2=$rslt->fetch_assoc())
		{
				$i++;
		?>
  		<tr>
        	<td><?php echo $i;?></td>
            <td><?php echo $row2['bus_name'];?></td>
            <td><?php echo $row2['not_msg'];?></td>
             <td><?php echo $row2['not_date'];?></td>
         </tr>
        <?php
		}}
		?>
            
			
	
  </table>
 
</form>
</center>
</div></div>
<a href="Newhome.php" class="round">&#8249;</a>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");
$selqry="select * from tbl_feedback a inner join tbl_user b on a.user_id=b.user_id inner join tbl_busdetails c on a.bus_id=c.bus_id";
$result=$con->query($selqry);
$i=0;
?>
 <table width="396" height="162" border="1">
    <tr>
      <td width="60">SI No</td>
      <td width="74">Bus Name</td>
      <td width="148">Feedback Description</td>
      <td width="190">User Name</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>
        <tr>
		<td><?php echo $i;?></td>
        <td><?php echo $row["bus_name"];?></td>
        <td><?php echo $row["f_msg"];?></td>
        <td><?php echo $row["user_name"];?></td>
        </tr>
  	<?php
	}?>
        
  </table>
</form>
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
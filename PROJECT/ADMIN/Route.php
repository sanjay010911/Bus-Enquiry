<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bus Enquiry:Route</title>
</head>
<?php
ob_start();
include("head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$rname=$_POST["txt_rname"];
	$from=$_POST["sel_from"];
	$to=$_POST["sel_to"];
	$sql1="select * from tbl_route where route_name='".$rname."'";
	$rslt=$con->query($sql1);
	if(mysqli_num_rows($rslt)>0)
	{
		?>
		<script>
			alert("Route already exist!!");
			 window.location("Route.php");
		</script>
     <?php
	}else
	{
	$insQry="insert into tbl_route(route_name,route_frmplace,route_toplace) values('".$rname."','".$from."','".$to."')";
	if($con->query($insQry))
	{
		?>
		<script>
		alert("inserted Successfully");
		window.location="Route.php";
		</script>
        <?php
	}
	else
	{
		?>
		<script>
		alert("inserted Successfully");
		window.location="Route.php";
		</script>
        <?php
	}
	}
}

?>






<body>


<form id="form1" name="form1" method="post" action="">

  <table width="601" height="244" border="1" cellpadding="10">
    
    <tr>
      <td width="71">Enter Routename:</td>
      <td width="72"><input type="text" name="txt_rname" id="txt_rname" required/></td>
    </tr>
    
    <tr>
      <td>From:</td>
      <td>
      <select name="sel_from" id="sel_from"  required>
     <option value="">---select---</option>
		<?php
		 $selQry2="select * from tbl_place";
		 $rows2=$con->query($selQry2);
		  $i=0;
		  
  while($result2=$rows2->fetch_assoc())
  {
	  ?>
      <option value="<?php echo $result2["place_id"] ?>"><?php echo $result2["place_name"] ?></option>
        <?php
  }
  ?>
      </select>
      </td>
    </tr>
    
    
    
        <tr>
      <td>To:</td>
      <td>
      <select name="sel_to" id="sel_to"  required>
     <option value="">---select---</option>
		<?php
		 $selQry3="select * from tbl_place";
		 $rows3=$con->query($selQry3);
		  $i=0;
		  
  while($result3=$rows3->fetch_assoc())
  {
	  ?>
      <option value="<?php echo $result3["place_id"] ?>"><?php echo $result3["place_name"] ?></option>
        <?php
  }
  ?>
      </select>
      </td>
    </tr>
    
    <?php


      if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_route where route_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="Route.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="Route.php";
			</script>
            <?php
			}
		}
		    ?>
    
    
    

    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="txt_reset" id="txt_reset" value="Reset" /></td>
    </tr>
  </table>
  
  

  
  
  <p>&nbsp;</p>
  
  





<table border="1" cellpadding="10">
    <tr>
      <td width="31">SI no</td>
      <td width="22">Route</td>
      <td width="41">From</td>
      <td width="65">To</td>
      <td width="65">Action</td>
    </tr>
     <?php
  $selqry4="select u.*,p1.place_name as fromPlace,p2.place_name as toPlace from tbl_route u inner join tbl_place p1 on u.route_frmplace=p1.place_id inner join tbl_place p2 on u.route_toplace=p2.place_id";

  $row4=$con->query($selqry4);
  $i=0;
  while($result4=$row4->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result4["route_name"];?></td>
   <td><?php echo $result4["fromPlace"];?></td>
   <td><?php echo $result4["toPlace"];?></td>
   <td><a href="Route.php?did=<?php echo $result4["route_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
  </form>
 
</body>
<?php
ob_flush();
include("Foot.php");
?>
</html>
<!DOCTYPE html>
<html>
<title>Bus Enquiry:Reports</title>
<?php

include("../Assets/Connection/Connection.php");

include("Head.php");


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<form name="form1" action="" method="post">
<table width="336" border="1">
   <table width="337" border="1">
<tr>
<td>Select Bus Owner:</td>
<td>
<select name="sel_owner" id="sel_owner">
      <option>--Select--</option>
      <?php
	   $selQry="select * from tbl_busowner where owner_status='1' order by owner_name asc";
	   $result=$con->query($selQry);
	   while($row=$result->fetch_assoc())
	   {
		    ?>
      <option value="<?php echo $row["owner_id"]; ?>"><?php echo $row["owner_name"]; ?></option>
      <?php
	   }
	   ?>
    </select></td></tr>
    <tr>
    	<td colspan='2' align="center"><input type="submit" name="btn_submit" /></td>
    </tr>
    </table>
  
<?php
if(isset($_POST["btn_submit"]))
{
	
	?>
     <div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<script>


var xValues = [
<?php 

  $sel2="select * from tbl_busdetails where owner_id='".$_POST["sel_owner"]."'";
  $result2=$con->query($sel2);
  while($row2=$result2->fetch_assoc())
  {
        echo "'".$row2["bus_name"]."'",',';
      
  }

?>
];

var yValues = [
<?php   
	$sel3="select * from tbl_busdetails where owner_id='".$_POST["sel_owner"]."'";
  $result3=$con->query($sel3);
  while($row3=$result3->fetch_assoc())
  {
	 $sel4="select COALESCE(sum(collec_amt),0) as id from tbl_dailycollection a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_busowner c on b.owner_id=c.owner_id where b.bus_id='".$row3["bus_id"]."'";
	  
	  $result4=$con->query($sel4);
  while($row4=$result4->fetch_assoc())
	  {
			echo $row4["id"].",";
	  }
  }
?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Total Collection"
    }
  }
});
</script>
<?php
}
include("Foot.php");
?>
</div>

</form>

</body>

</html>

<!DOCTYPE html>
<html>
<title>Bus Enquiry:Reports</title>
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<form id="form1" name="form1" method="post" action="">
 
</form>

<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_route";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["route_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_route";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(bus_id) as id from tbl_busdetails WHERE route_id='".$data["route_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }
?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
		label:"No Of Buses",
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
	  title: {
      display: true,
      text: "No Of Buses"
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
</script>
<?php

include("foot.php");
?>
</div>
 <center><input type="button" onclick="printDiv('tab')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
</body>
</html>
s

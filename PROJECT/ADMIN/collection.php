<!DOCTYPE html>
<html>
<title>Bus Enquiry:Reports</title>
<?php

include("../Assets/Connection/Connection.php");

include("Head.php");


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_busowner";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["owner_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_busowner";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select COALESCE(sum(collec_amt),0) as id from tbl_dailycollection a inner join tbl_busdetails b on a.bus_id=b.bus_id inner join tbl_busowner c on b.owner_id=c.owner_id where c.owner_id='".$data["owner_id"]."'";
	  
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
  "#1e7145"
];

new Chart("myChart", {
  type: "bar",
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
include("Foot.php");
?>
</div>
<center><input type="button" onclick="printDiv('tab')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
</body>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

</html>

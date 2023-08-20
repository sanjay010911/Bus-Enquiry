<?php

include("../Connection/Connection.php");
?>

 <option value="">---Select---</option> 
        <?php	
		$sel = "select * from tbl_busdetails where route_id='".$_GET["did"]."'";
		$row =$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
       <option value="<?php echo $data["bus_id"]; ?>"><?php echo $data["bus_name"]; ?></option>
            <?php
		}		
		?>
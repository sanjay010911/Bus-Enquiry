<?php

include("../Connection/Connection.php");
?>

 
 <option value="">---Select---</option> 
        <?php	
		$sel = "select * from tbl_route where route_id='".$_GET["did"]."'";
		$row =$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
       <option value="<?php echo $data["route_id"]; ?>"><?php echo $data["route_name"]; ?></option>
            <?php
		}		
		?>
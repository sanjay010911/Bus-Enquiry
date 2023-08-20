<?php

include("../Connection/Connection.php");
?>

 
 <option value="">---Select---</option> 
        <?php	
		$sel = "select * from tbl_routestop where route_id='".$_GET["did"]."'";
		echo $sel;
		$row =$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
       <option value="<?php echo $data["routestop_id"]; ?>"><?php echo $data["routestop_name"]; ?></option>
            <?php
		}		
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["submit"]))
{
	$pname=$_POST["txt_pname"];
	$prate=$_POST["txt_prate"];
	$pdesc=$_POST["txt_pdesc"];
	$insQry="insert into tbl_product(product_name,product_rate,product_desc) VALUES('$pname','$prate','$pdesc')";
	if($con->query($insQry))
	{
	  ?>
     <script>
	   alert("Data inserted");
	   window.location("product.php");
	 </script>
   <?php
	}
    else
	{
    ?>
      <script>
	    alert("Data Insertion Failed");
		window.location("product.php");
	  </script>
      <?php
    }
}
    
      if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_product where product_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="product.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="product.php";
			</script>
            <?php
			}
		}
		    ?>
<body>
<form id="form1" name="form1" method="post" action="Product.php">
  <table width="297" height="155" border="1" cellpadding="10">
    <tr>
      <td>Product Name</td>
      <td><input type="text" name="txt_pname" id="txt_pname" /></td>
    </tr>
    <tr>
      <td>Product Rate</td>
      <td><input type="text" name="txt_prate" id="txt_prate" /></td>
    </tr>
    <tr>
      <td>Product Description</td>
      <td><textarea name="txt_pdesc" id="txt_pdesc" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="Cancel" id="Cancel" value="Cancel" /></td>
    </tr>
  </table>
     <table border="black">
  <tr>
  <th>SI no</th>
  <th>Product Name</th>
  <th>Product Rate</th>
  <th>Product Description</th>
  <th>Action</th>
  </tr>
     <?php
  $selqry="select * from tbl_product";
  $rows=$con->query($selqry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["product_name"];?></td>
   <td><?php echo $result["product_rate"];?></td>
   <td><?php echo $result["product_desc"];?></td> 
   <td><a href="Product.php?did=<?php echo $result["product_id"]?>">delete</a></td>
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
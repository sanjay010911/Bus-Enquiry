<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["submit"]))
{
	$catname=$_POST["txt_catname"];
$sql="insert into tbl_category(category_name) values('$catname')";
	if($con->query($sql))
	{
		  ?>
     <script>
	   alert("Data inserted");
	   window.location("category.php");
	 </script>
   <?php
	}
    else
	{
    ?>
      <script>
	    alert("Data Insertion Failed");
		window.location("category.php");
	  </script>
      <?php
	}
    }

if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_category where category_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="category.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="category.php";
			</script>
            <?php
			}
		}
		    ?>	
<body>
<form id="form1" name="form1" method="post" action="Category.php">
  <table width="396" height="109" border="1" cellpadding="10">
    <tr>
      <td>Category Name</td>
      <td><input type="text" name="txt_catname" id="txt_catname" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="Cancel" id="Cancel" value="Cancel" /></td>
    </tr>
  </table>
   
     <table border="black">
  <tr>
  <th>SI no</th>
  <th>Category Name</th>
  <th>Action</th>
  </tr>
     <?php
  $selqry="select * from tbl_category";
  $rows=$con->query($selqry);
  $i=0;
  while($result=$rows->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $result["category_name"];?></td>
   <td><a href="Category.php?did=<?php echo $result["category_id"]?>">delete</a></td>
  </tr>
  <?php
 }
  ?>
  </table>
  
</form>
</body>
</html>
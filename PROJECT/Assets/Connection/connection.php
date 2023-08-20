<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$servername='localhost';
$user='root';
$password="";
$database="db_busenquiry";
$con=mysqli_connect($servername,$user,$password,$database);
if(!$con)
{
	 echo "connection failed";
}

?>

<body>
</body>
</html>
<?php
$num1="";
$num2="";
$num3="";
$large="";
$small="";

if(isset($_POST["btnfind"]))
{
		$no1=$_POST["no1"];
		$no2=$_POST["no2"];
		$no3=$_POST["no3"];
		if($no1>$no2)
		 {
		 	if($no1>$no3)
				$large=$no1;
			else
				$large=$no3;
		 }
		else
		 $large=$no2;
		 
		 if($no1<$no2)
		 {
		 	if($no1<$no3)
				$small=$no1;
			else
				$small=$no3;
		 }
		else
		 $small=$no2;
}

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td width="99">Number 1</td>
      <td width="192"><input type="text" name="no1" id="no1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><input type="text" name="no2" id="no2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><input type="text" name="no3" id="no3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnfind" id="btnfind" value="Submit" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><input type="text" name="large" id="large" value="<?php echo $large; ?>" /></td>
    </tr>
    <tr>
      <td>Smallest:</td>
      <td><input type="text" name="small" id="small" value="<?php echo $small; ?>" /></td>
    </tr>
  </table>
</form>
</body>
</html>
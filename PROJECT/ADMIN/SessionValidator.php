<?php
session_start();
if($_SESSION["lgid"]==null)
{
	header("location:../Guest/Login.php");
}
?>
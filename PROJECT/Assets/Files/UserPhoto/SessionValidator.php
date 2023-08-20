<?php
session_start();
if($_SESSION["mid"]==null)
{
	header("location:../Guest/Login.php");
}
?>
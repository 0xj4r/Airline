<?php
	session_start();
	include_once("dbconnect.php");	//Connects to database
?>
	
<!DOCTYPE HTML>
<html>
<head>
<link type="text/css"  rel="stylesheet" href="adminControl.css"  />
</head>
<table>
<tr>
<?PHP
require_once("menu.html");
?>
</tr>
</table>
<section class = "mainBody">
<?php
require_once("adminSections.html");
?>
</section>
</body>
</html>

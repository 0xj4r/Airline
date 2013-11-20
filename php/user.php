<?php
session_start();
if(isset($_SESSION['id'])){
	//Put stored session variables into local PHP variable
	$usid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = "Welcome back ".$usname. "!<br /> Your ID is: ".$usid;
	}
	else {
	$result = "<br /><br /><br /><br /><h2>Please log in to view your account.</h2>";
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>
<?PHP
echo $_SESSION['firstName'] . "'s Profile";
?>
</title>
<link style="text/css" rel="stylesheet" href="user.css"/>
</head>
<body>
<?php
	require_once("menu.html");
	echo $result;
	?>
   
</body>
</html>

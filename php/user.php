<?php
session_start();
if(isset($_SESSION['id'])){
	//Put stored session variables into local PHP variable
	$usid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = "Test variables: <br /> Username: ".$usname. "<br /> ID: ".$usid;
	}
	else {
	$result = "You are not logged in yet";
	}
?>

<!DOCTYPE html>
<html>
<head>
    
<title>

</title>
<link style="text/css" rel="stylesheet" href="menu.css"/>
</head>
<?php echo $usname;
     ?>
<body>
<?php
	require_once("menu.html");
	?>
<?php
    echo "<br /><br /><br /><br />" .$result;
    ?>
    
</body>
</html>

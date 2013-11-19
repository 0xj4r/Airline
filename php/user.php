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
</head>
<?php echo $usname;
     ?>
<body>
<<<<<<< HEAD

=======
<?php
	require_once("menu.html");
	?>
>>>>>>> 9cf242b60b5b5d7c72070d4083b23022e097c01e
<?php
	require_once("menu.html");
    echo "<br /><br /><br /><br />" .$result;
    ?>
    
</body>
</html>

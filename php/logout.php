
<?php
session_start();
session_destroy();
if(isset($_SESSION['username'])){
	$msg = "You are now logged out";
	} else {
	$msg = "<h2>Could not log you out</h2>";
	}
	?>
	<html>
	<body>
	<?php echo"$msg"; ?> <br />
	<p> <a href = "index.php">Click here to return to our home page</a></p>
	</body>
	</html>
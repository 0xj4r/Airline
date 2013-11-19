
<?php
session_start();
session_destroy();
if(isset($_SESSION['username'])){
	$msg = "You are now logged out";
	} else {
	$msg = "Could not log you out";
	}
	echo'<script type="text/javascript"> 
			window.onload=function(){alert('.$msg.');} 
				</script>' ;
	header('Location: index.php');
	?> 
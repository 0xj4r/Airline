<?php
if(isset($_POST('Submit'))) {
	$username = $_POST('username');
	$password = $_POST('password');
	
	if($username == "admin@yes.com" && password == "mypassword")
	{
		echo "Well done, you have logged in successfully";
	}
	else{
		echo "Sorry";
	}
}

?>
<?php
session_start();
 if(isset($_POST['Submit'])){
 	// echo "Submitted";
// 	RegisterUser();
// 	$db_host = $_ENV['OPENSHIFT_MYSQL_DB_HOST'];
// $db_user = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
// $db_pass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
// $db_name = $_ENV['OPENSHIFT_APP_NAME'];
// function RegisterUser()
// {
	// $dbCon = mysqli_connect($_ENV['OPENSHIFT_MYSQL_DB_HOST'], $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'],  $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'], $_ENV['OPENSHIFT_APP_NAME'], $_ENV['OPENSHIFT_MYSQL_DB_PORT']);
	include("dbconnect.php");
	// $con1 = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");
	$email = strip_tags($_POST['email']);
	$email = mysqli_real_escape_string($dbCon, $email);
	$pword = strip_tags($_POST['password']);
	$pword = mysqli_real_escape_string($dbCon, $pword);
	$pword = md5($pword);
	$fname = strip_tags($_POST['name']);
	$fname = mysqli_real_escape_string($dbCon, $fname);
	$lname = strip_tags($_POST['lastname']);
	$lname = mysqli_real_escape_string($dbCon, $lname);
	// $prequery = mysqli_query($dbCon, "SELECT user_id FROM members WHERE username = '$email' LIMIT 1")or die(mysqli_error());
 	 
	
	if(mysqli_num_rows($prequery)>0) {
		die("That email is already registered.");		
	}
	else {
			
		mysqli_query($dbCon, "INSERT INTO members (username, password, firstname, lastname, admin_rights) VALUES ('".$email."','".$pword."','".$fname."','".$lname."', '0')")or die("cannot connect"); 
			header('Location: index.php'); 
			exit();
		}
	
		
	mysqli_close($dbCon);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link style="text/css" rel="stylesheet" href="registerForm.css"/>
<link style="text/css" rel="stylesheet" href="createAccount.css"/>
</head>
<body>
<section class = "menuBar">
<?php
	require_once("menu.html");
	?>
	</section>

<section class = "container">
<div class = "register">
<form id='regForm' action='createAccount.php' method='post'
    accept-charset='UTF-8'>
<fieldset >
<h1>Register Now!</h1>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' >Your First Name*: </label>
<input type='text' name='name' id='name' maxlength="30" />
<label for='lastname'>Your Last Name*: </label>
<input type = 'text' name = 'lastname' id='lastname' maxlength ='30' />
<label for='email' >Email Address*:</label>
<input type='email' name='email' id='email' maxlength="50" />
  
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="255" />

<input type="Submit" name='Submit' class="Submit" value="Submit">
  				
 </div>
</fieldset>
</form>
</section>
<section class = "description">
<p class ="message">Welcome aboard and thank you for choosing SnagaFlight! 
Before you discover the adventures waiting for you, 
please tell us about yourself so we can better assist you. <br />
With a SnagaFlight account, you can not only search from 
hundreds of flights for one that matches your life, but 
take advantage of our easy booking, new deals, and much more!
</p>

</body>
</html>

<?php
if(isset($_POST['Submit'])){
	RegisterUser();
	}
function RegisterUser()
{
	include_once("dbconnect.php");
	$email = strip_tags($_POST['email']);
	$email = mysqli_real_escape_string($dbCon, $email);
	$pword = strip_tags($_POST['password']);
	$pword = mysqli_real_escape_string($dbCon, $pword);
	$pword = md5($pword);
	$fname = strip_tags($_POST['name']);
	$fname = mysqli_real_escape_string($dbCon, $fname);
	$lname = strip_tags($_POST['lastname']);
	$lname = mysqli_real_escape_string($dbCon, $lname);
	echo $email. ", " .$pword. ", " .$fname. ", " .$lname;
	$query = "INSERT INTO `members`(`username`, `password`, `firstname`, `lastname`, `adminRights`) VALUES ('".$email."','".$pword."','".$fname."','".$lname."','0')";
	$result = mysqli_query($dbCon, $query);
	if($result) {
	header('Location: index.php');
	}
	else {
	echo "failure";
	die(mysqli_error($dbCon));
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form id='register' action='createAccount.php' method='post'
    accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' >Your First Name*: </label>
<input type='text' name='name' id='name' maxlength="30" />
<label for='lastname'>Your Last Name*: </label>
<input type = 'text' name = 'lastname' id='lastname' maxlength ='30' />
<label for='email' >Email Address*:</label>
<input type='email' name='email' id='email' maxlength="50" />
  
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="255" />
<input type='submit' name='Submit' value='Register' />
 
</fieldset>
</form>
</body>
</html>

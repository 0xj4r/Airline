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
<link style="text/css" rel="stylesheet" href="menu.css"/>
<link style="text/css" rel="stylesheet" href="registerForm.css"/>
<link style="text/css" rel="stylesheet" href="createAccount.css"/>
</head>
<body>
<div id = "menu">
<ul id="sdt_menu" class="sdt_menu">
    <li>
        <a href="index.php">
            <img src="./images/1.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Home</span>
                <span class="sdt_descr"></span>
            </span>
        </a>
    </li>
	<li>
        <a href="searchFlights.php">
            <img src="./images/2.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Get Away</span>
                <span class="sdt_descr">Search for Flights</span>
            </span>
        </a>
    </li>
	<li>
        <a href="#">
            <img src="./images/3.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Deals</span>
                <span class="sdt_descr">Featured Flights</span>
            </span>
        </a>
    </li>
	<li>
        <a href="#">
            <img src="./images/4.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Contact Us</span>
                <span class="sdt_descr">We want to hear from you</span>
            </span>
        </a>
    </li>
	<li>
        <?php  
		echo "<a href = \"createAccount.php\">";
		?>
            <img src="./images/5.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">My Account</span>
                <span class="sdt_descr">Manage your Account</span>
            </span>
        </a>
    </li>
</ul>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="Javascript/menu.js"></script>
<section class = "container">
<div class = "register">
<form id='register' action='createAccount.php' method='post'
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

<p class = "submit">
<input type='submit' name='Submit' value='Register' />
 </p>
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

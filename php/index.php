<?php
session_start(); 
//Credit to PeterEntwitle for login tutorial and scripts
//http://www.youtube.com/watch?v=hlumBk7FZzY
	$menuLink = "createAccount.php";

if(isset($_POST['username'])) {
	include_once("dbconnect.php");	//Connects to database

	//Set the posted data from teh form into local variables
	$usname = strip_tags($_POST["username"]);
	$paswd = strip_tags($_POST["password"]);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	$paswd = md5($paswd); //hashing algorithm
	
	$sql = "SELECT username, password, adminRights, user_id FROM members WHERE username = '$usname' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$dbUsname = $row[0];
	$dbPassword = $row[1];
	$dbIsAdmin = $row[2];
    $usid = $row[4]; 

	if($usname == $dbUsname && $paswd == $dbPassword) {
		//Set session
		$_SESSION['username'] = $usname;
        $_SESSION['id'] = $usid;

		//Now direct to users feed
		if($dbIsAdmin == 1) {//If the user is an admin, redirect to admin controls
		$menuLink = "adminControl.php";		
		header("Location: adminControl.php");
		}
		else{
		$menuLink = "user.php";
		header("Location: user.php");
		}
		}
	else {
		//Login error message
		$menuLink = "createAccount.php";
		echo "<h2>Oops the username or password are incorrect. <br /> Please try again.</h2>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>SnagaFlight</title>
	<link style="text/css" rel="stylesheet" href="Home.css"/>
	<link style="text/css" rel="stylesheet" href="menu.css"/>
	<link style="text/css" rel="stylesheet" href="loginBox.css"/>
	<link type="text/css"  rel="stylesheet" href="RSSstyles.css"  />
</head>
<body>
<!-------------------------------------
			MENU FIELDS 
			--------------------------------------------->
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
        <a href="#">
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
		echo "<a href = \"" .$menuLink. "\">";
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
<!-- END MENU FIELDS -->
<!-------------------------------------
			LOGIN FORM 
		--------------------------------------------->
<section class="container">
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="index.php">
        <p><input type="email" name="username" value="" placeholder="Email" required></p>
        <p><input type="password" name="password" value="" placeholder="Password" required></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="Submit" value="Login"></p>
      </form>
    </div>
    <div class="login-help">
      <p>New to SnagaFlight? <a href="index.php">Click here to create an account!</a>.</p>
    </div>
  </section>
  <!--END LOGIN FORM -->
<!-------------------------------------
		RSS FEED ON TRAVEL NEWS. 
		Source: http://www.script-tutorials.com/import-rss-feeds-using-jfeed-jquery/ 
						--------------------------------------------->
<script language="javascript" type="text/javascript" src="Javascript/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript" src="Javascript/jquery.jfeed.js"></script>
<script language="javascript" type="text/javascript" src="Javascript/jquery.aRSSFeed.js"></script>

<div class="RSSAggrCont" rssnum="5" rss_url="http://travelchannel-cms.feeds.theplatform.com/ps/getRSS?client=Standard&PID=3RJi3f44L8ChyBdEYLqZeB2WxyB43X2a&startIndex=1&endIndex=500&sortField=lastModified&sortDescending=true">
	<h1>Travel News</h1>
    <div class="loading_rss">
        <img alt="Loading..." src="./images/loading.gif" />
    </div>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready( function() {
		$('div.RSSAggrCont').aRSSFeed();
	} );
</script>
<!-- END RSS FEED PORTION -->
</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
	<title>SnagaFlight</title>
	<link style="text/css" rel="stylesheet" href="Home.css"/>
	<link style="text/css" rel="stylesheet" href="loginBox.css"/>
	<link type="text/css"  rel="stylesheet" href="RSSstyles.css"  />
</head>
<body>
<?php
	session_start();
	require_once("menu.html");
	?>
<!-------------------------------------
			LOGIN FORM 
		--------------------------------------------->
<section class="container">
    <div class="login">
      <h1>Login</h1>
	  	<form method="post" action="login.php">
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
      <p>New to SnagaFlight? <a href="createAccount.php">Click here to create an account!</a>.</p>
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

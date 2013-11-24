<!DOCTYPE HTML>
<html>
<head>
	<title>SnagaFlight</title>
	<link style="text/css" rel="stylesheet" href="Home.css"/>
	<link type="text/css"  rel="stylesheet" href="RSSstyles.css"  />
</head>
<body>
<?php
	session_start();
	require_once("menu.html");
	if(!isset($_SESSION['id'])) {
		require_once("loginBox.html");
		}
	?>

<script language="javascript" type="text/javascript" src="Javascript/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript" src="Javascript/jquery.jfeed.js"></script>
<script language="javascript" type="text/javascript" src="Javascript/jquery.aRSSFeed.js"></script>

<div class="RSSAggrCont" rssnum="5" rss_url="http://rssfeeds.usatoday.com/UsatodaycomTravel-TopStories">
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
</body>
</html>

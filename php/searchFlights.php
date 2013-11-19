

<?php
session_start(); 
	include_once("dbconnect.php");	//Connects to database
	require_once("menu.html");
	
	


if(isset($_POST['flightNum'])) {
	include_once("dbconnect.php");
	
	//Set the posted flight number into local variable 
	$flightNum = strip_tags($_POST["flightNum"]);
	$flightNum = mysqli_real_escape_string($dbCon, $flightNum);
	echo $flightNum;
	$_SESSION['flight_num']=$flightNum;
	
	$userid=$_SESSION['id'];
	
	//set flight_booked in members database to flight number booked
	mysqli_query($dbCon,"UPDATE members SET flight_booked='$flightNum' WHERE user_id='$userid'")
	or die(mysql_error());
	
	//redirect to bookFlight 
	header("Location: bookFlight.php");
	}
	?>
	
		<!DOCTYPE HTML>
<html>
<body>


	<form method="post" action="searchFlights.php">
Enter Flight Number:<br />
<input type="text" name="flightNum" size="10" /><br />
<input type="submit" Value="Book Flight"> 
</form>

</body>
</html>

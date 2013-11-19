<?php
session_start();
if(isset($_POST['Update'])){
	Update();
	}
	
function Update()
{
	include_once("dbconnect.php");	//Connects to database
	$DepartCity=$_POST['DepartCity'];
	$DepartState=$_POST['DepartState'];
	$DepartAirport=$_POST['DepartAirport'];
	$DepartTime=$_POST['DepartTime'];
	$DepartTimeZone=$_POST['DepartTimeZone'];
	$ArrivalCity=$_POST['ArrivalCity'];
	$ArrivalState=$_POST['ArrivalState'];
	$ArrivalAirport=$_POST['ArrivalAirport'];
	$ArrivalTime=$_POST['ArrivalTime'];
	$ArrivalTimeZone=$_POST['ArrivalTimeZone'];
	$FlightDuration=$_POST['FlightDuration'];
	$SeatsAvailable=$_POST['SeatsAvailable'];

	$mysql="INSERT INTO flights (depart_city, depart_st, depart_airport, depart_time, 
		depart_tzone, arrival_city, arrival_st, arrival_airport, arrival_time, arrival_tzone, flight_duration, flight_seats_available )
		VALUES ('".$DepartCity."', '".$DepartState."', '".$DepartAirport."', '".$DepartTime."', '".$DepartTimeZone."', '".$ArrivalCity."', '".$ArrivalState."',
		'".$ArrivalAirport."', '".$ArrivalTime."', '".$ArrivalTimeZone."', '".$FlightDuration."', '".$SeatsAvailable."')";
		$insert = mysqli_query($dbCon, $mysql);
	
	if($insert) {
		echo "Flight added successfully";
	}
	else {
		echo "Error: Flight unable to be added";
		die(mysqli_error($dbCon));
	}
}
	
		?>
	
	<!DOCTYPE HTML>
<html>
<head>
<link style="text/css" rel="stylesheet" href="updateFlights.css"/>
</head>
<body>

<?php
	require_once("menu.html");
	?>

<section class = "addFlight">
<div class = "flightInfo">
	<form id='newFlight' method='post' accept-charset='UTF-8'>
	<fieldset>
		<label for='DepartCity'>Departure City:</label>
		<input type="text" name="DepartCity" size="30" /><br />
		<label for='DepartState'>Departure State:</label>
		<input type="text" name="DepartState" size="30" /><br />
		<label for='DepartAirport'>Departure Airport:</label>
		<input type="text" name="DepartAirport" size="30" /><br />
		<label for='DepartTime'>Departure Time:</label>
		<input type="text" name="DepartTime" size="30" /><br />
		<label for='DepartTimeZone'>Departure Time Zone:</label>
		<input type="text" name="DepartTimeZone" size="30" /><br />
		<label for='ArrivalCity'>Arrival City:</label>
		<input type="text" name="ArrivalCity" size="30" /><br />
		<label for='ArrivalState'>Arrival State:</label>
		<input type="text" name="ArrivalState" size="30" /><br />
		<label for='ArrivalAirport'>Arrival Airport:</label>
		<input type="text" name="ArrivalAirport" size="30" /><br />
		<label for='ArrivalTime'>Arrival Time:</label>
		<input type="text" name="ArrivalTime" size="30" /><br />
		<label for='ArrivalTimeZone'>Arrival Time Zone:</label>
		<input type="text" name="ArrivalTimeZone" size="30" /><br />
		<label for='FlightDuration'>Flight Duration:</label>
		<input type="text" name="FlightDuration" size="30" /><br />
		<label for='SeatsAvailable'>Seats Available:</label>
		<input type="text" name="SeatsAvailable" size="30" /><br />
		<p><input type="submit" value="Update" name="Update"/></p>
</fieldset>
</form>
</div>
</section>
</body>
</html>

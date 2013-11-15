<?php
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
</head>
<body>

<form id='register' method='post'
    accept-charset='UTF-8'>


Departure City:<br />
<input type="text" name="DepartCity" size="30" /><br />

Departure State:<br />
<input type="text" name="DepartState" size="30" /><br />

Departure Airport:<br />
<input type="text" name="DepartAirport" size="30" /><br />

Departure Time:<br />
<input type="text" name="DepartTime" size="30" /><br />

Departure Time Zone:<br />
<input type="text" name="DepartTimeZone" size="30" /><br />

Arrival City:<br />
<input type="text" name="ArrivalCity" size="30" /><br />

Arrival State:<br />
<input type="text" name="ArrivalState" size="30" /><br />

Arrival Airport:<br />
<input type="text" name="ArrivalAirport" size="30" /><br />

Arrival Time:<br />
<input type="text" name="ArrivalTime" size="30" /><br />

Arrival Time Zone:<br />
<input type="text" name="ArrivalTimeZone" size="30" /><br />

Flight Duration:<br />
<input type="text" name="FlightDuration" size="30" /><br />

Seats Available:<br />
<input type="text" name="SeatsAvailable" size="30" /><br />

<input type="submit" value="Update" name="Update"/>

</form>
	
</body>
</html>

<?php
session_start();
	include_once("dbconnect.php");	//Connects to database
	
$flight=mysqli_query($dbCon, "SELECT * FROM flights");
	
	echo "<table border='1'>
	<tr>
	
	<th>Flight Number</th>
	<th>Departure City</th>
	<th>Departure State</th>
	<th>Departure Airport</th>
	<th>Departure Time</th>
	<th>Departure Time Zone</th>
	<th>Arrival City</th>
	<th>Arrival State</th>
	<th>Arrival Airport</th>
	<th>Arrival Time</th>
	<th>Arrival Time Zone</th>
	<th>Flight Duration</th>
	<th>Seats Available</th>

	</tr>";

while($row = mysqli_fetch_array($flight))
  {
  echo "<tr>";
  echo "<td>" . $row['flight_num'] . "</td>";
  echo "<td>" . $row['depart_city'] . "</td>";
  echo "<td>" . $row['depart_st'] . "</td>";
  echo "<td>" . $row['depart_airport'] . "</td>";
  echo "<td>" . $row['depart_time'] . "</td>";
  echo "<td>" . $row['depart_tzone'] . "</td>";
  echo "<td>" . $row['arrival_city'] . "</td>";
  echo "<td>" . $row['arrival_st'] . "</td>";
  echo "<td>" . $row['arrival_airport'] . "</td>";
  echo "<td>" . $row['arrival_time'] . "</td>";
  echo "<td>" . $row['arrival_tzone'] . "</td>";
  echo "<td>" . $row['flight_duration'] . "</td>";
   echo "<td>" . $row['flight_seats_available'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
	?>
	
		<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<<<<<<< HEAD
<?PHP
require_once("menu.html");
?>
=======
<?php
	require_once("menu.html");
	?>
>>>>>>> 9cf242b60b5b5d7c72070d4083b23022e097c01e
<form id='bookFlight' method='post'>
	
Enter Flight Number:<br />
<input type="text" name="SeatsAvailable" size="10" /><br />

<input type="submit" value="Book Flight" name="Update"/>

</form>
</body>
</html>

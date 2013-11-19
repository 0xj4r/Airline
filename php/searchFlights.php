

<?php
session_start(); 
	include_once("dbconnect.php");	//Connects to database
	require_once("menu.html");
	
	
$flight=mysqli_query($dbCon, "SELECT * FROM flights");
	echo 	$_SESSION['username'];
       echo $_SESSION['id'];
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

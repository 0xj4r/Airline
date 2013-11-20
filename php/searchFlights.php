
<?php
//error_reporting(E_ALL); ini_set('display_errors', 'On');  
// (TOOL FOR TESTING/DEBUGGING)// 
session_start(); 

	 // include_once("dbconnect.php");	//Connects to database
	// require_once("menu.html");

	

	if(isset($_POST['flightNum'])) {
	
	include_once("dbconnect.php");
	//Set the posted flight number into local variable 
	$flightNum = strip_tags($_POST['flightNum']);
	$flightNum = mysqli_real_escape_string($dbCon, $flightNum);
	// echo $flightNum;
	$_SESSION['flight_num']=$flightNum;
	
	$userid=$_SESSION['id'];
	
	
	$mysql = "SELECT depart_city, depart_st, depart_time, arrival_city, arrival_st, flight_duration FROM flights WHERE flight_num = '$flightNum' LIMIT 1";
	$result = mysqli_query($dbCon, $mysql);
	$row = mysqli_fetch_row($result);
	$dbDepartCity = $row[0];
	$dbDepartSt = $row[1];
	$dbDepartTime = $row[2];
    $dbArrivalCity = $row[3]; 
	$dbArrivalSt= $row[4]; 
	$dbFlightDuration=$row[5];
	
	$_SESSION['depart_city']=$dbDepartCity;
	$_SESSION['depart_st']=$dbDepartSt;
	$_SESSION['depart_time']=$dbDepartTime;
	$_SESSION['arrival_city']=$dbArrivalCity;
	$_SESSION['arrival_st']=$dbArrivalSt;
	$_SESSION['flight_duration']=$dbFlightDuration;
	
	//set flight_booked in members database to flight number booked
	mysqli_query($dbCon,"UPDATE members SET flight_booked='$flightNum' WHERE user_id='$userid'")
	or die(mysql_error());

	header("Location: bookFlight.php");
	//redirect to bookFlight 
	// header("Location: bookFlight.php");
	// $flightNum->close(); 
}

		
	

if(isset($_POST['Submit'])) {
	SearchFlights(); 
}


function SearchFlights() {	
	include_once("dbconnect.php"); 

	$depart_city = strip_tags($_POST['depart_city']);
	$depart_city = mysqli_real_escape_string($dbCon, $depart_city);
	$depart_st = strip_tags($_POST['depart_st']);
	$depart_st = mysqli_real_escape_string($dbCon, $depart_st);
	$arrival_city = strip_tags($_POST['arrival_city']);
	$arrival_city = mysqli_real_escape_string($dbCon, $arrival_city);
	$arrival_st = strip_tags($_POST['arrival_st']);
	$arrival_st = mysqli_real_escape_string($dbCon, $arrival_st);

	$query = "SELECT * FROM flights WHERE depart_city='$depart_city'
		  and depart_st = '$depart_st' and arrival_city = '$arrival_city' and arrival_st='$arrival_st'";
	$flights = mysqli_query($dbCon, $query) or die (mysqli_error());  
		
	// if($flights) {
	// header('Location: index.php');
	// }
	// else {
	// echo "failure";
	// die(mysqli_error($dbCon));
	// }
		echo "<table id='flightstable' styleborder='1'>
	<tr>
	<th>Flight Number</th>
	<th>Departing City</th>
	<th>Departing State</th>
	<th>Arriving City</th>
	<th>Arriving State</th>
	<th></th>
	</tr>";

	while($row = mysqli_fetch_array($flights))
	  {
	  echo "<tr>";
	  echo "<td>" . $row['flight_num'] . "</td>";
	  echo "<td>" . $row['depart_city'] . "</td>";
	  echo "<td>" . $row['depart_st'] . "</td>";
	  echo "<td>" . $row['arrival_city'] . "</td>";
	  echo "<td>" . $row['arrival_st'] . "</td>";
	  echo "<td><form method='post' action='test.php'><input type='hidden' name ='flightNum' value='" . $row['flight_num'] . "'>
	  			<input type='submit'  value='Get Ticket'></form></td>";

	  echo "</tr>";
	  }
	echo "</table>";

	$flights->close(); 
}

	?>

		<!DOCTYPE HTML>
<html>
<body>
	<link style="text/css" rel="stylesheet" href="Home.css"/>
	<link style="text/css" rel="stylesheet" href="menu.css"/>

	

<!-- <div>
	<form method="post" action="searchFlights.php">
Enter Flight Number:<br />
<input type="text" name="flightNum" size="10" /><br />
<input type="submit" Value="Search Flights"> 
</form>
</div> -->

<div id='searchflights' >

			<form id='searchflights1' action='test.php' method='post' 
			    accept-charset='UTF-8'>
			<fieldset>
			<h1>Search Flights</h1>
			<!-- <input type='hidden' name='submitted' id='submitted' value='1'/> -->
			<label for='dSt' >Departing State: </label>
			<!-- <input type='text' name='depart_st' id='depart_st' maxlength="30" /> -->
				<?php
					$con = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");
					// include_once("dbconnect.php"); 

					$result = mysqli_query($con, "SELECT depart_st FROM flights");

					echo '<SELECT name=depart_st>';
					while($row1 = $result->fetch_assoc()) {
					echo '<OPTION VALUE='.$row1['depart_st'].'>'.$row1['depart_st'].'</option>';	
					}
					echo '</select>';
					$result->close(); 
				?>

	
				<label for=dCity>Departing City: </label>
				<?
					$con1 = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");
					$queryCity = "SELECT depart_city FROM flights";
					
					$result2 = mysqli_query($con1, $queryCity);
					echo '<SELECT name=depart_city>';
						while($row2 = $result2->fetch_assoc()) {
						echo '<OPTION VALUE='.$row2['depart_city'].'>'.$row2['depart_city'].'</option>';	
						}
						echo '</select>';

					 	$result2->close();

				?>


			<!-- <input type = 'text' name = 'depart_city' id='depart_city' maxlength ='30' /> -->
			<label for='aSt' >Arriving State:</label>
			<!-- <input type='text' name='arrival_st' id='arrival_st' maxlength="50" /> -->
				<?php
				$con2 = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");

				$result1 = mysqli_query($con2, "SELECT arrival_st FROM flights");

				echo '<SELECT name=arrival_st>';
				while($row1 = $result1->fetch_assoc()) {
				echo '<OPTION VALUE='.$row1['arrival_st'].'>'.$row1['arrival_st'].'</option>';	
				}
				echo '</select>';

				$result1->close();

				?>
			  
			<label for='aCity' >Arriving City:</label>
			<!-- <input type='text' name='arrival_city' id='arrival_city' maxlength="255" /> -->
			<?
					$con3 = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");
					$queryCity1 = "SELECT arrival_city FROM flights";
					
					$result3 = mysqli_query($con3, $queryCity1);
					echo '<SELECT name=arrival_city>';
						while($row2 = $result3->fetch_assoc()) {
						echo '<OPTION VALUE='.$row2['arrival_city'].'>'.$row2['arrival_city'].'</option>';	
						}
						echo '</select>';

					 	$result3->close();

					
				
				?>

			<p class = "submit">
			<input type='submit' name='Submit' value='Find Me Flights!' />
			 </p>
			 </div>
			</fieldset>

			</form>

		
</div>
			<div>

		</div>
</body>
</html>

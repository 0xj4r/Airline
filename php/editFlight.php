<?php
if(isset($_POST['Change'])){
	Change();
	}

function Change()
{
	$FlightNumber=intval($_POST['FlightNum']);
	if($FlightNumber >= 1 && gettype($FlightNumber) == 'integer') {
		include("dbconnect.php");	//Connects to database
		$mysql="UPDATE flights SET   ";
		$newDCity = $_POST['DepartCity'];
		$newDState = $_POST['DepartState'];
		$newDAirport = $_POST['DepartAirport'];
		$newDTime = $_POST['DepartTime'];
		$newACity = $_POST['ArrivalCity'];
		$newAState = $_POST['ArrivalState'];
		$newAAirport = $_POST['ArrivalAirport'];
		$newATime = $_POST['ArrivalTime'];
		$newDuration = $_POST['FlightDuration'];
		$newSeats = $_POST['SeatsAvailable'];
		$newPrice = $_POST['price'];
		$newLogo = $_POST['Logo'];
		$newClass=$_POST['class'];
		if($newDCity != NULL && gettype($newDCity) == 'string')
			$mysql = $mysql . " depart_city = '" .$newDCity. "', ";
		if($newDState !=NULL && gettype($newDCity) == 'string')
			$mysql = $mysql . " depart_st = '" .$newDState."', ";
		if($newDAirport != NULL && gettype($newDAirport) == 'string')
			$mysql = $mysql . " depart_airport = '" .$newDAirport."', ";
		if($newDTime !=NULL)
			$mysql = $mysql . " depart_time = '" .$newDTime."', ";
		if($newACity != NULL && gettype($newACity) == 'string')
			$mysql = $mysql . "arrival_city = '" .$newACity."', ";
		if($newAState !=NULL && gettype($newAState) == 'string')
			$mysql = $mysql . "arrival_st = '" .$newAState."', ";
		if($newAAirport !=NULL && gettype($newAAirport) == 'string')
			$mysql = $mysql . "arrival_airport = '" .$newAAirport."', ";
		if($newATime !=NULL)
			$mysql = $mysql . "arrival_time = '" .$newATime."', ";
		if($newDuration !=NULL)
			$mysql = $mysql . "flight_duration = '" .$newDuration."', ";
		if($newSeats !=NULL && gettype($newAState) == 'integer')
			$mysql = $mysql . "flight_seats_available = '" .$newSeats."', ";
		if($newPrice !=NULL)
			$mysql = $mysql . "price = '" .$newPrice."', ";
		if($newLogo !=NULL && gettype($newLogo) == 'string')
		$mysql = $mysql . "logo = '" .$newLogo."', ";
		if($newClass !=NULL && gettype($newClass) == 'string')
		$mysql = $mysql . "international = '" .$newClass."', ";
		$mysql = substr($mysql, 0, -2);
		$mysql = $mysql . " WHERE flight_num = ". $FlightNumber;
		$query = mysqli_query($dbCon, $mysql);
		
		if($query) {
			echo '<script type="text/javascript"> 
				window.onload=function(){alert("Flight changed successfully.");} 
				</script>'; 
		}
		else {
			echo '<script type="text/javascript"> 
				window.onload=function(){alert("Error changing flight, please try again.");} 
				</script>'; 
			die(mysqli_error($dbCon));
		}
	}
	else {
		echo '<script type="text/javascript"> 
	window.onload=function(){alert("Please enter a valid flight number.");} 
	</script>'; 
	}
}
	?>
	<html>
<link style="text/css" rel="stylesheet" href="adminFlightForms.css"/>
<section class = "container">
<div class = "contents">
	<fieldset>
	<h1>Change Flight</h1>
	<table>
	<form id='flightFormEdit' method='post'>
	<tr>
		<td>
		<label for='FlightNum'>Enter Number for the Flight to Alter:</label>
		<input type="text" name="FlightNum" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='DepartCity'>Departure City:</label>
		<input type="text" name="DepartCity" size="30" />
		</td>
		<td>
		<label for='ArrivalCity'>Arrival City:</label>
		<input type="text" name="ArrivalCity" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='DepartState'>Departure State:</label>
		<input type="text" name="DepartState" size="30" />
		</td>
		<td>
		<label for='ArrivalState'>Arrival State:</label>
		<input type="text" name="ArrivalState" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='DepartAirport'>Departure Airport:</label>
		<input type="text" name="DepartAirport" size="30" />
		</td>
		<td>
		<label for='ArrivalAirport'>Arrival Airport:</label>
		<input type="text" name="ArrivalAirport" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='DepartTime'>Departure Time:</label>
		<input type="text" name="DepartTime" size="30" />
		</td>
		<td>
		<label for='ArrivalTime'>Arrival Time:</label>
		<input type="text" name="ArrivalTime" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='FlightDuration'>Flight Duration:</label>
		<input type="text" name="FlightDuration" size="30" />
		</td>
		<td>
		<label for='SeatsAvailable'>Seats Available:</label>
		<input type="text" name="SeatsAvailable" size="30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='price'>Ticket Price:</label>
		<input type = "text" name = 'price' size = "30" />
		</td>
		<td>
		<label for='Logo'>Airline Logo:</label>
		<input type="text" name="Logo" size="150" />
		
		
	</tr>
	<tr>
		<td>
		<label for='price'>Class(domestic or international):</label>
		<input type = "text" name = 'class' size = "30" />
		</td>
		
		<td>
		<p><input type="submit" value="Change" name="Change" /></p>
		</td>
	</tr>
	</table>		
</fieldset>
</form>
</div>
</section>
</html>
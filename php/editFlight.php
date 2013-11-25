<?php
if(isset($_POST['Change'])){
	Change();
	}

function Change()
{
	$FlightNumber=intval($_POST['FlightNum']);
	if($FlightNumber >= 1 && gettype($FlightNumber) == 'integer') {
		include("dbconnect.php");	//Connects to database
		//Get information from admin form
		$mysql="UPDATE flights SET   ";
		$newDCity = $_POST['DepartCity'];
		$newDState = $_POST['DepartState'];
		$newDCountry = $_POST['DepartCountry'];
		$newDAirport = $_POST['DepartAirport'];
		$newDTime = $_POST['DepartTime'];
		$newACity = $_POST['ArrivalCity'];
		$newAState = $_POST['ArrivalState'];
		$newACountry = $_POST['ArrivalCountry'];
		$newAAirport = $_POST['ArrivalAirport'];
		$newATime = $_POST['ArrivalTime'];
		$newDuration = $_POST['FlightDuration'];
		$newCoachSeats = $_POST['CoachSeatsAvailable'];
		$newFCSeats = $_POST['FCSeatsAvailable'];

		$newFCPrice = $_POST['fc_price'];
		$newCoachPrice = $_POST['coach_price'];
		$newLogo = $_POST['Logo'];
		$newClass=$_POST['class'];
		//Set up query based on provided information 
		if($newDCity != NULL && gettype($newDCity) == 'string')
			$mysql = $mysql . " depart_city = '" .$newDCity. "', ";
		if($newDState !=NULL && gettype($newDCity) == 'string')
			$mysql = $mysql . " depart_st = '" .$newDState."', ";
		if($newDCountry !=NULL && gettype($newDCountry) == 'string')
			$mysql = $mysql . " depart_country = '" .$newDCountry."', ";
		if($newDAirport != NULL && gettype($newDAirport) == 'string')
			$mysql = $mysql . " depart_airport = '" .$newDAirport."', ";
		if($newDTime !=NULL)
			$mysql = $mysql . " depart_time = '" .$newDTime."', ";
		if($newACity != NULL && gettype($newACity) == 'string')
			$mysql = $mysql . "arrival_city = '" .$newACity."', ";
		if($newAState !=NULL && gettype($newAState) == 'string')
			$mysql = $mysql . "arrival_st = '" .$newAState."', ";
		if($newACountry !=NULL && gettype($newACountry) == 'string')
			$mysql = $mysql . " arrival_country = '" .$newACountry."', ";
		if($newAAirport !=NULL && gettype($newAAirport) == 'string')
			$mysql = $mysql . "arrival_airport = '" .$newAAirport."', ";
		if($newATime !=NULL)
			$mysql = $mysql . "arrival_time = '" .$newATime."', ";
		if($newDuration !=NULL)
			$mysql = $mysql . "flight_duration = '" .$newDuration."', ";
		if($newCoachSeats !=NULL && gettype($newCoachSeats) == 'integer')
			$mysql = $mysql . "coach_seats = '" .$newCoachSeats."', ";
		if($newFCSeats !=NULL && gettype($newFCSeats) == 'integer')
			$mysql = $mysql . "fc_seats = '" .$newFCSeats."', ";
		if($newCoachPrice !=NULL && gettype($newCoachPrice) == 'integer')
			$mysql = $mysql . "coach_price = '" .$newCoachPrice."', ";
		if($newFCPrice !=NULL && gettype($newFCPrice) == 'integer')
			$mysql = $mysql . "fc_price = '" .$newFCPrice."', ";

		  $logoCheck=@getimagesize($newLogo);
			
		if($newLogo !=NULL && gettype($newLogo) == 'string' && preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$newLogo))
		$mysql = $mysql . "logo = '" .$newLogo."', ";
		if($newClass !=NULL && gettype($newClass) == 'string' && ($newClass=="domestic" || $newClass=="international") )
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
			//die(mysqli_error($dbCon));
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
		<!-- Editing flight form for admin -->
		<label for='FlightNum'>Enter Number for the Flight to Alter:</label>
		<input type="text" name="FlightNum" size="30" />
		</td>
		<td>
		<p><input type="submit" value="Change" name="Change" /></p>
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
		<label for='DepartState'>Departure Country:</label>
		<input type="text" name="DepartCountry" size="30" />
		</td>
		<td>
		<label for='ArrivalState'>Arrival Country:</label>
		<input type="text" name="ArrivalCountry" size="30" />
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
		<label for='price'>Class(domestic or international):</label>
		<input type = "text" name = 'class' size = "30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='price'>First Class Ticket Price:</label>
		<input type = "text" name = 'fc_price' size = "30" />
		</td>
	<td>
		<label for='price'>Coach Ticket Price:</label>
		<input type = "text" name = 'coach_price' size = "30" />
		</td>
	</tr>
	<tr>
		<td>
		<label for='CoachSeatsAvailable'> Coach Seats Available:</label>
		<input type="text" name="CoachSeatsAvailable" size="30" />
		</td>
		<td>
		<label for='FCSeatsAvailable'>First Class Seats Available:</label>
		<input type="text" name="FCSeatsAvailable" size="30" />
		</td>
	</tr>
	<tr>
			<td>
		<label for='Logo'>Airline Logo:</label>
		<input type="text" name="Logo" size="150" />
		</td>
	</tr>
	</table>		
</fieldset>
</form>
</div>
</section>
</html>

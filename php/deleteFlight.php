<?php
if(isset($_POST['Delete'])){
	Delete();
	}
	
function Delete()
{
	
	$FlightNumber=$_POST['FlightNumber'];
	if($FlightNumber >= 1 && gettype($FlightNumber) == 'integer') {
		include("dbconnect.php");	//Connects to database
		$mysql="DELETE FROM flights WHERE flight_num =" .$FlightNumber;
		$query = mysqli_query($dbCon, $mysql);
		if($query) {
			echo '<script type="text/javascript"> 
				window.onload=function(){alert("Flight deleted successfully.");} 
				</script>'; 
		}
		else {
			echo '<script type="text/javascript"> 
				window.onload=function(){alert("Error deleting flight, please try again.");} 
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
	<link type="text/css"  rel="stylesheet" href="adminFlightForms.css"  />
<section class = "container">
<div class = "contents">
	<form id='flightFormDelete' method='post' accept-charset='UTF-8'>
		<label for='FlightNumber'>Please Enter the Flight Number you wish to remove:</label>
		<input type="text" name="FlightNumber" size="30" />
		<p><input type="submit" value="Delete" name="Delete"/></p>
	</form>
</div>
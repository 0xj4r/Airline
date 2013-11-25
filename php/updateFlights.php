<?php
if(isset($_POST['Update'])){
        Update();
        }
        
function Update()
{
	$logo = test_input($_POST['logo']);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$logo))
  {
 echo '<script type="text/javascript"> 
	window.onload=function(){alert("Please enter a valid URL");} 
	</script>'; 
	}



  else
  {
  //       $DepartCity=$_POST['DepartCity'];
  //       $DepartState=$_POST['DepartState'];
  //       $DepartAirport=$_POST['DepartAirport'];
  //       $DepartTime=$_POST['DepartTime'];
  //       $ArrivalCity=$_POST['ArrivalCity'];
  //       $ArrivalState=$_POST['ArrivalState'];
  //       $ArrivalAirport=$_POST['ArrivalAirport'];
  //       $ArrivalTime=$_POST['ArrivalTime'];
  //       $FlightDuration=$_POST['FlightDuration'];
  //       $SeatsAvailable=$_POST['SeatsAvailable'];
  //       $Logo=$_POST['logo'];
  //       $Price = $_POST['price'];
		// $Class = $_POST['class1'];
        include("dbconnect.php");        //Connects to database
        $DCity = $_POST['DepartCity'];
        $DState = $_POST['DepartState'];
        $DCountry = $_POST['DepartCountry'];
        $DAirport = $_POST['DepartAirport'];
        $DTime = $_POST['DepartTime'];
        $ACity = $_POST['ArrivalCity'];
        $AState = $_POST['ArrivalState'];
        $ACountry = $_POST['ArrivalCountry'];
        $AAirport = $_POST['ArrivalAirport'];
        $ATime = $_POST['ArrivalTime'];
        $Duration = $_POST['FlightDuration'];
        $CoachSeats = $_POST['CoachSeatsAvailable'];
        $FCSeats = $_POST['FCSeatsAvailable'];

        $FCPrice = $_POST['fc_price'];
        $CoachPrice = $_POST['coach_price'];
        $Logo = $_POST['Logo'];
        $International = $_POST['international'];


        $mysql="INSERT INTO flights (depart_city, depart_st, depart_country, depart_airport, depart_time, 
                arrival_city, arrival_st, arrival_country, arrival_airport, arrival_time, flight_duration, coach_seats, fc_seats, coach_price, fc_price, logo, international )
                VALUES ('".$DCity."', '".$DState."', '".$DCountry."', '".$DAirport."', '".$DTime."', '".$ACity."', '".$AState."', '".$ACountry."',
                '".$AAirport."', '".$ATime."', '".$Duration."', '".$CoachSeats."', '".$FCSeats."', '".$CoachPrice."', '".$FCPrice."', '".$Logo."', '".$International."')";
                $insert = mysqli_query($dbCon, $mysql);
        
        if($insert) {
                echo '<script type="text/javascript"> 
window.onload=function(){alert("Flight added successfully.");} 
</script>'; 
        }
        else {
                echo '<script type="text/javascript"> 
window.onload=function(){alert("Error adding flight, please try again.");} 
</script>'; 
               // die(mysqli_error($dbCon));
        }
}
}
     
 
                ?>
        
<!DOCTYPE HTML>
<html>
<link style="text/css" rel="stylesheet" href="adminFlightForms.css"/>
<section class = "container">
<div class = "contents">
    <fieldset>
    <h1>Add a New Flight</h1>
    <!-- Add flight form for admin -->        
    <form id='flightForm' method='post' accept-charset='UTF-8'>
    <table>
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
        <label for='international'>Class(domestic or international):</label>
        <input type = "text" name = 'international' size = "30" />
        </td>
    </tr>
    <tr>
        <td>
        <label for='fc_price'>First Class Ticket Price:</label>
        <input type = "text" name = 'fc_price' size = "30" />
        </td>
    <td>
        <label for='coachprice'>Coach Ticket Price:</label>
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
		 <td>
          <p><input type="submit" value="Update" name="Update"/></p>
         </td>
        </tr>
        </table>                
</fieldset>
</form>
</div>
</section>
</html>

<<?php
if(isset($_POST['Update'])){
        Update();
        }
        
function Update()
{
        $DepartCity=$_POST['DepartCity'];
        $DepartState=$_POST['DepartState'];
        $DepartAirport=$_POST['DepartAirport'];
        $DepartTime=$_POST['DepartTime'];
        $ArrivalCity=$_POST['ArrivalCity'];
        $ArrivalState=$_POST['ArrivalState'];
        $ArrivalAirport=$_POST['ArrivalAirport'];
        $ArrivalTime=$_POST['ArrivalTime'];
        $FlightDuration=$_POST['FlightDuration'];
        $SeatsAvailable=$_POST['SeatsAvailable'];
                $Logo=$_POST['logo'];
        $Price = $_POST['price'];
		$Class = $_POST['class'];
        include("dbconnect.php");        //Connects to database
        $mysql="INSERT INTO flights (depart_city, depart_st, depart_airport, depart_time, 
                arrival_city, arrival_st, arrival_airport, arrival_time, flight_duration, flight_seats_available, price, logo, international )
                VALUES ('".$DepartCity."', '".$DepartState."', '".$DepartAirport."', '".$DepartTime."', '".$ArrivalCity."', '".$ArrivalState."',
                '".$ArrivalAirport."', '".$ArrivalTime."', '".$FlightDuration."', '".$SeatsAvailable."', '".$Price."', '".$Logo."', '".$Class."')";
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
        
                ?>
        
<!DOCTYPE HTML>
<html>
<link style="text/css" rel="stylesheet" href="adminFlightForms.css"/>
<section class = "container">
<div class = "contents">
        <fieldset>
        <h1>Add a New Flight</h1>
        <table>
        <tr>
        <form id='flightForm' method='post' accept-charset='UTF-8'>
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
                <label for='logo'>Airline Logo:</label>
                <input type = "text" name = 'logo' size = "150" />
                </td>
                
        </tr>
		  <tr>
                <td>
                <label for='class'>Class (domestic or international):</label>
                <input type = "text" name = 'class' size = "30" />
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
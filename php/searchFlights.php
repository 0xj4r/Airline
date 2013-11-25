<?php
error_reporting(E_ALL); ini_set('display_errors', 'On');  
// (TOOL FOR TESTING/DEBUGGING)// 
session_start(); 

	 
	 //require_once("menu.html");
	// switch to internationalFlights page if button is clicked
	if(isset($_POST['internationalflights'])){
		header("Location: internationalFlights.php");
	}
	//
	if(isset($_POST['flightNum1'])) {
		$_SESSION['flight_num'] = $_POST['flightNum1']; 
		$_SESSION['class'] = 'First Class'; 
		$_SESSION['price'] = $_POST['flightCost1'];
		getflight(); 
	}
	if(isset($_POST['flightNum'])) {
		$_SESSION['flight_num'] = $_POST['flightNum']; 
		$_SESSION['class'] = 'Coach'; 
		 $_SESSION['price'] = $_POST['flightCost'];
		getflight(); 
	}

	function getflight() {
//Set the posted flight number into local variable
	
	 include("dbconnect.php");	//Set the posted flight number into local variable 
	// $con1 = mysqli_connect("localhost", "root", "root", "snagaflight") or die("cannot connect");
	 
	$flightNum= $_SESSION['flight_num'];

	// $flightNum = strip_tags($flightNum);
	// $flightNum = mysqli_real_escape_string($con1, $flightNum);
	
	// $_SESSION['flight_num']=$flightNum;
	
	$userid=$_SESSION['id'];
	

	$mysql = "SELECT depart_city, depart_st, depart_time, arrival_city,  arrival_st, arrival_time, flight_duration, coach_price, international, logo FROM flights WHERE flight_num = '$flightNum' LIMIT 1";
	$result4 = mysqli_query($dbCon, $mysql);
	$row = mysqli_fetch_array($result4);



	$dbDepartCity = $row["depart_city"];
	$dbDepartSt = $row["depart_st"];
	$dbDepartTime = $row["depart_time"];
    $dbArrivalCity = $row["arrival_city"]; 	
    $dbArrivalSt= $row["arrival_st"]; 	
    $dbArrivalTime=$row["arrival_time"];
	$dbFlightDuration=$row["flight_duration"];
	$dbLogo=$row["logo"];
	// $dbPrice=$row[6];
	// $dbClass=$row[8];
	$_SESSION['depart_city']=$dbDepartCity;
	$_SESSION['depart_st']=$dbDepartSt;
	$_SESSION['depart_time']=$dbDepartTime;
	$_SESSION['arrival_city']=$dbArrivalCity;
	$_SESSION['arrival_st']=$dbArrivalSt;
	$_SESSION['flight_duration']=$dbFlightDuration;
	$_SESSION['arrival_time']=$dbArrivalTime; 
	$_SESSION['logo']=$dbLogo;
	// $_SESSION['price']=$dbPrice;
	// $_SESSION['class']=$dbClass;
	//set flight_booked in members database to flight number booked
	mysqli_query($dbCon, "UPDATE members SET flight_booked='$flightNum' WHERE user_id='$userid'")
	or die(mysql_error());

	

	$result4->close(); 


	header("Location: bookFlight.php");
	//redirect to bookFlight 
	
	
}

		
	



function SearchFlights() {	
	include("dbconnect.php"); 

	//set depart_city and arrival_city to what the cities the customer chose
	$depart_city = strip_tags($_POST['depart_city']);
	$depart_city = mysqli_real_escape_string($dbCon, $depart_city);
	// $depart_st = strip_tags($_POST['depart_st']);
	// $depart_st = mysqli_real_escape_string($dbCon, $depart_st);
	$arrival_city = strip_tags($_POST['arrival_city']);
	$arrival_city = mysqli_real_escape_string($dbCon, $arrival_city);
	// $arrival_st = strip_tags($_POST['arrival_st']);
	// $arrival_st = mysqli_real_escape_string($dbCon, $arrival_st);

	//select all flights from database that have the same depart_city and arrival_city as what the user chose
	$query = "SELECT * FROM flights WHERE depart_city='$depart_city'
		  and arrival_city = '$arrival_city' ";
	$flights = mysqli_query($dbCon, $query) or die (mysqli_error());  
		
	// if($flights) {
	// header('Location: index.php');
	// }
	// else {
	// echo "failure";
	// die(mysqli_error($dbCon));
	// }
	//table printing out available flights
		echo "<table class='table table-striped' id='flightstable' >
		<thead>
	<tr>
	<th>Flight Number</th>
	<th>Departing City</th>
	<th>Depart Time</th>
	<th>Arriving City</th>
	<th>Arrival Time</th>
	<th>First Class Tickets</th>
	<th>Coach Tickets</th>

	<th></th>
	</tr></thead>";

	while($row = mysqli_fetch_array($flights))
	  {
	  echo "<tbody .table-striped ><tr>";
	  echo "<td>" . $row['flight_num'] . "</td>";
	  echo "<td>" . $row['depart_city'] . ", " . $row['depart_st'] . "</td>";
	  echo "<td>" . $row['depart_time'] . "</td>";
	  echo "<td>" . $row['arrival_city'] . ", " . $row['arrival_st'] . "</td>";
	  echo "<td>" . $row['arrival_time'] . "</td>";
	  
	  echo "<td><form method='post' action='searchFlights.php'><input type='hidden' name ='flightCost1' value='" . $row['fc_price'] . "'><input type='hidden' name ='flightNum1' value='" . $row['flight_num'] . "'> $".$row['fc_price']." "; 
	  			 if(isset($_SESSION['id'])){ echo   "  <button class='btn btn-success' type='submit' >Get Ticket</button></form></td>";}
	  echo "<td><form method='post' action='searchFlights.php'><input type='hidden' name ='flightCost' value='" . $row['coach_price'] . "'><input type='hidden' name ='flightNum' value='" . $row['flight_num'] . "'>
	  			$".$row['coach_price']."  ";  
	  			if(isset($_SESSION['id'])){ echo "  <button class='btn btn-success' type='submit' >Get Ticket</button></form></td>";} 

	  echo "</tr>";
	  
	  }
	echo "</tbody></table>";
	


	
		
		

}

	?>

		<!DOCTYPE HTML>
<html lang="en">
<head>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<!-- 	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 		-->
 		<!-- <link style="text/css" rel="stylesheet" href="menu.css"/> -->
 		<link style="text/css" rel="stylesheet" href="search.css"/>

</head>
<body>
	

<!-- <div>
	<form method="post" action="searchFlights.php">
Enter Flight Number:<br />
<input type="text" name="flightNum" size="10" /><br />
<input type="submit" Value="Search Flights"> 
</form>
</div> -->
<div id = "menu">
<ul id="sdt_menu" class="sdt_menu">
    <li>
        <a href="index.php">
            <img src="./images/1.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Home</span>
                <span class="sdt_descr"></span>
            </span>
        </a>
    </li>
	<li>
        <a href="searchFlights.php">
            <img src="./images/2.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Get Away</span>
                <span class="sdt_descr">Search for Flights</span>
            </span>
        </a>
    </li>
	<!-- <li>
        <a href="#">
            <img src="./images/3.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Deals</span>
                <span class="sdt_descr">Featured Flights</span>
            </span>
        </a>
    </li> -->
	<li>
        <?php  
		include_once('login.php');
		$dest = determineUserType();
		echo '<a href= ' .$dest . '>';
		?>
            <img src="./images/5.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">My Account</span>
                <span class="sdt_descr">Manage your Account</span>
            </span>
        </a>
    </li>
	<li>
		<?php  
			if(isset($_SESSION['id'])) {
				$dest2 = 'logout.php';
				$label = 'Logout';
			}
			else {
				$dest2 = 'createAccount.php';
				$label = 'Register';
			}
			echo '<a href= ' .$dest2 . '>';
		?>
            <img src="./images/6.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link"><?php echo $label ?></span>
            </span>
        </a>
    </li>
</ul>
</div>
<div class="big_div">
<div class="search_flights" >
	
	
	<form class='flightselector' action='searchFlights.php' method='post' accept-charset='UTF-8'>
		<fieldset>
		<h1>Search Flights:<h3>Domestic <button type="internationalFlights" name='internationalflights' class="btn btn-info" >
  			<span class="glyphicon glyphicon-globe"></span> International Flights
			</button></h3></h1>
		
		<div class='dropdowns'>	
			

				
			<label for=dCity>Departing City: </label>
				<?php
					include("dbconnect.php"); 
					$queryCity = "SELECT DISTINCT depart_city, depart_st FROM flights where international='0'";
					$result2 = mysqli_query($dbCon, $queryCity);

					echo '<SELECT name=depart_city>';
						while($row2 = $result2->fetch_assoc()) {
							echo '<OPTION VALUE='.$row2['depart_city'].'>'.$row2['depart_city'].', '.$row2['depart_st'].'</option>';	
						}
						echo '</select>';
				?>

			
			  
			<label for='aCity' >Arriving City:</label>
				<?php
					include("dbconnect.php"); 
					$queryCity1 = "SELECT DISTINCT arrival_city, arrival_st FROM flights where international='0'";
					$result3 = mysqli_query($dbCon, $queryCity1);

					echo '<SELECT name=arrival_city>';
						while($row2 = $result3->fetch_assoc()) {
							echo '<OPTION VALUE='.$row2['arrival_city'].'>'.$row2['arrival_city'].', '.$row2['arrival_st'].'</option>';	
						}
						echo '</select>';
				?>

			<button type="internationalFlights" name='Submit' class="btn btn-primary">
  				<span class="glyphicon glyphicon-plane"></span> Find Flights
			</button>
		</div>
		
			</fieldset>

			</form>

		
</div>
<div class="flightsearchtable">
	<?php
	if(isset($_POST['Submit'])) {
	SearchFlights(); 
}
	?>
</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="Javascript/menu.js"></script>
</body>
</html>

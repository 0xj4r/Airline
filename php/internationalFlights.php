<?php
error_reporting(E_ALL); ini_set('display_errors', 'On');  
// (TOOL FOR TESTING/DEBUGGING)// 
session_start(); 

	 
	 //require_once("menu.html");
		
	if(isset($_POST['domesticflights'])){
		header("Location: searchFlights.php");
	}

	if(isset($_POST['flightNum'])) {
	$flightNum = $_POST['flightNum']; 
	// include("dbconnect.php");	//Set the posted flight number into local variable 
	$con1 = mysqli_connect("localhost", "root", "", "airlineaccounts") or die("cannot connect");
	$flightNum = strip_tags($_POST['flightNum']);
	$flightNum = mysqli_real_escape_string($con1, $flightNum);
	// echo $flightNum;
	$_SESSION['flight_num']=$flightNum;
	
	$userid=$_SESSION['id'];
	
	
	$mysql = "SELECT depart_city, depart_country, depart_time, arrival_city, arrival_country, flight_duration, logo, price, international FROM flights WHERE flight_num = '$flightNum' LIMIT 1";
	$result4 = mysqli_query($con1, $mysql);
	$row = mysqli_fetch_row($result4);
	$dbDepartCity = $row[0];
	$dbDepartCountry = $row[1];
	$dbDepartTime = $row[2];
    $dbArrivalCity = $row[3]; 
	$dbArrivalCountry= $row[4]; 

	$dbFlightDuration=$row[5];
	$dbLogo=$row[6];
	$dbPrice=$row[7];
	$dbClass=$row[8];
	
	$_SESSION['depart_city']=$dbDepartCity;
	$_SESSION['depart_country']=$dbDepartCountry;
	$_SESSION['depart_time']=$dbDepartTime;
	$_SESSION['arrival_city']=$dbArrivalCity;
	$_SESSION['arrival_country']=$dbArrivalCountry;
	$_SESSION['flight_duration']=$dbFlightDuration;
	$_SESSION['logo']=$dbLogo;
	$_SESSION['price']=$dbPrice;
	$_SESSION['class']=$dbClass;
	
	//set flight_booked in members database to flight number booked
	mysqli_query($con1,"UPDATE members SET flight_booked='$flightNum' WHERE user_id='$userid'")
	or die(mysql_error());
	$result4->close(); 

	header("Location: bookFlight.php");
	//redirect to bookFlight 
	// header("Location: bookFlight.php");
	// $flightNum->close(); 
}

		
	



function SearchFlights() {	
	include("dbconnect.php"); 

	$depart_city = strip_tags($_POST['depart_city']);
	$depart_city = mysqli_real_escape_string($dbCon, $depart_city);
	$depart_country = strip_tags($_POST['depart_country']);
	$depart_country = mysqli_real_escape_string($dbCon, $depart_country);
	$arrival_city = strip_tags($_POST['arrival_city']);
	$arrival_city = mysqli_real_escape_string($dbCon, $arrival_city);
	$arrival_country = strip_tags($_POST['arrival_country']);
	$arrival_country = mysqli_real_escape_string($dbCon, $arrival_country);

	$query = "SELECT * FROM flights WHERE depart_city='$depart_city'
		  and depart_country = '$depart_country' and arrival_city = '$arrival_city' and arrival_country='$arrival_country'";
	$flights = mysqli_query($dbCon, $query) or die (mysqli_error());  
		
	// if($flights) {
	// header('Location: index.php');
	// }
	// else {
	// echo "failure";
	// die(mysqli_error($dbCon));
	// }
		echo "<table class='table table-striped' id='flightstable' >
		<thead>
	<tr>
	<th>Flight Number</th>
	<th>Departing City</th>
	<th>Depart Time</th>
	<th>Arriving City</th>
	<th>Arrival Time</th>

	<th></th>
	</tr></thead>";

	while($row = mysqli_fetch_array($flights))
	  {
	  echo "<tbody .table-striped ><tr>";
	  echo "<td>" . $row['flight_num'] . "</td>";
	  echo "<td>" . $row['depart_city'] . ", " . $row['depart_country'] . "</td>";
	  echo "<td>" . $row['depart_time'] . "</td>";
	  echo "<td>" . $row['arrival_city'] . ", " . $row['arrival_country'] . "</td>";
	  echo "<td>" . $row['arrival_time'] . "</td>";
	  echo "<td><form method='post' action='internationalFlights.php'><input type='hidden' name ='flightNum' value='" . $row['flight_num'] . "'>
	  			<button class='btn btn-success' type='submit' >Get Ticket</button></form></td></tbody>";

	  echo "</tr>";
	  }
	echo "</table>";

	$flights->close(); 
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
	<li>
        <a href="#">
            <img src="./images/3.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Deals</span>
                <span class="sdt_descr">Featured Flights</span>
            </span>
        </a>
    </li>
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
<div class="search_flights" >
	
	
	<form class='flightselector' action='internationalFlights.php' method='post' accept-charset='UTF-8'>
		<fieldset>
		<h1>Search Flights:<h3>Domestic <button type="internationalFlights" name='domesticflights' class="btn btn-info" >
  			<span class="glyphicon glyphicon-globe"></span> Domestic Flights
			</button></h3></h1>
		
		<div class='dropdowns'>	
			<label for='dSt' >Departing Country: </label>
				<?php
					include("dbconnect.php"); 
					$result = mysqli_query($dbCon, "SELECT DISTINCT depart_country FROM flights where international='international'");
					echo '<SELECT name=depart_country>';
					while($row1 = $result->fetch_assoc()) {
						echo '<OPTION VALUE='.$row1['depart_country'].'>'.$row1['depart_country'].'</option>';	
					}
					echo '</select>';
					$result->close(); 
				?>
				
			<label for=dCity>Departing City: </label>
				<?php
					include("dbconnect.php"); 
					$queryCity = "SELECT DISTINCT depart_city FROM flights where international='international'";
					$result2 = mysqli_query($dbCon, $queryCity);
					echo '<SELECT name=depart_city>';
						while($row2 = $result2->fetch_assoc()) {
							echo '<OPTION VALUE='.$row2['depart_city'].'>'.$row2['depart_city'].'</option>';	
						}
						echo '</select>';
					 	$result2->close();
				?>

			<label for='aSt' >Arriving Country:</label>
				<?php
					include("dbconnect.php"); 
					$result1 = mysqli_query($dbCon, "SELECT DISTINCT arrival_country FROM flights where international='international'");
					echo '<SELECT name=arrival_country>';
					while($row1 = $result1->fetch_assoc()) {
						echo '<OPTION VALUE='.$row1['arrival_country'].'>'.$row1['arrival_country'].'</option>';	
					}
					echo '</select>';
					$result1->close();
				?>
			  
			<label for='aCity' >Arriving City:</label>
				<?php
					include("dbconnect.php"); 
					$queryCity1 = "SELECT DISTINCT arrival_city FROM flights where international='international'";
					$result3 = mysqli_query($dbCon, $queryCity1);
					echo '<SELECT name=arrival_city>';
						while($row2 = $result3->fetch_assoc()) {
							echo '<OPTION VALUE='.$row2['arrival_city'].'>'.$row2['arrival_city'].'</option>';	
						}
						echo '</select>';
					 	$result3->close();
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="Javascript/menu.js"></script>
</body>
</html>

AdminControl
<?php
	include_once("dbconnect.php");	//Connects to database
	
	
	//code taken from http://www.w3schools.com/php/php_mysql_select.asp
	$result=mysqli_query($dbCon, "SELECT * FROM members");
	
	echo "<table border='1'>
	<tr>
	<th>User ID</th>
	<th>Username</th>
	<th>Password</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Admin Rights</th>
	</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_id'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['adminRights'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
	

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
<link style="text/css" rel="stylesheet" href="menu.css"/>
</head>
<body>
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
        <a href="#">
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
        <a href="#">
            <img src="./images/4.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">Contact Us</span>
                <span class="sdt_descr">Tell us what you think</span>
            </span>
        </a>
    </li>
	<li>
        <?php  
		echo "<a href = \"adminControl.php\">";
		?>
            <img src="./images/5.jpg" alt=""/>
            <span class="sdt_active"></span>
            <span class="sdt_wrap">
                <span class="sdt_link">My Account</span>
                <span class="sdt_descr">Manage your Account</span>
            </span>
        </a>
    </li>
</ul>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="Javascript/menu.js"></script>
	<form method ="link" action="updateFlights.php/">
	<input type="submit" Value="Add a flight"> 
</form>
</body>
</html>

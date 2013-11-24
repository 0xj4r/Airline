<?php
session_start();
if(isset($_SESSION['id'])){
	//Put stored session variables into local PHP variable
	$usid = $_SESSION['id'];
	$usname = $_SESSION['username'];
	$result = "<p>Welcome back ".$usname. "!<br /> Your ID is: ".$usid;
	}
	else {
	echo "<h2>Please log in to view your account.</h2><br /><a href='index.php'>Click here to return home to log in</a>";
	exit();
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>
<?PHP
echo $_SESSION['firstName'] . "'s Profile";
?>
</title>
<link style="text/css" rel="stylesheet" href="user.css"/>
</head>
<body>
<table>
<tr>
<?PHP
require_once("menu.html");
?>
</tr>
</table>
	
<section class = "mainBody">
	<div id ="showAccountInfoText" onclick = "Javascript: toggle_visibility('showAccountInfo', 'showAccountInfoText', 'Click to view your account information')">Click to view your account information</div>
	<section class = "container1">
	<div id = "showAccountInfo" style = "display: none">
		<?php
			session_start(); 
			echo $result; 
			$us_id = $_SESSION['id'];
			include('dbconnect.php');
			$sql = "SELECT flight_booked, firstname, lastname FROM members WHERE user_id = '$us_id' LIMIT 1";
			$query = mysqli_query($dbCon, $sql);
			$row2 = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$flight_num = $row2["flight_booked"];
			$firstname = $row2["firstname"];
			$lastname = $row2["lastname"];
			
 
			if($flight_num) {
			$sqlFlight = "SELECT depart_city, depart_st, depart_airport, depart_time, arrival_city, arrival_st, arrival_airport, arrival_time, flight_duration, fc_price FROM flights WHERE flight_num = '$flight_num'";
			$flightquery = mysqli_query($dbCon, $sqlFlight);
			$Frow = mysqli_fetch_array($flightquery, MYSQLI_ASSOC);
			$message = "<p>You've been booked to fly from " .$Frow["depart_city"]. ", " .$Frow["depart_st"]." at " .$Frow["depart_airport"]. " airport at " .$Frow["depart_time"].".<br />
			You will arrive at " .$Frow["arrival_city"].", ".$Frow["arrival_st"]." at " .$Frow["arrival_airport"]." airport at " .$Frow["arrival_time"].", which will take " .$Frow["flight_duration"]." hours.<br /> 
			You have already been charged $" .$Frow["fc_price"]. "<br />Have a safe trip!</p>";
			}
			else {
				$message = "<p>Oops! Looks like you haven't booked a flight. Why not see where we can take you?</p>";
				}
			echo $message;?>
	</div>
	</section>
	<div id = "changeNameText" onclick = "Javascript: toggle_visibility('changeName', 'changeNameText', 'Click to edit your name')">Click to edit your name</div>
	<section class = "container2">
	<div id = "changeName" style="display: none">
		<form id='nameChange' action='alterUserData.php' method='post' accept-charset='UTF-8'>
			<label for='newFName'>Your first name:</label><br />
			<input type="text" name="newFName" size="30" /><br />
			<label for ='newLName'>Your last name:</label><br />
			<input type = "text" name = "newLName" size="30" /><br />
			<p class = "submit"><input type = "submit" value = "Update" name = "Update" /></p>
		</form>
	</div>
	</section>
	<div id = "changePassText" onclick = "Javascript: toggle_visibility('changePass', 'changePassText', 'Click to change your password')">Click to change your password</div>
	<section class = "container3">
	<div id = "changePass" style="display: none">
		<form id='PassChange' action='alterUserData.php' method='post' accept-charset='UTF-8'>
			<label for='oldPword'>Enter old password:</label><br />
			<input type="text" name="oldPword" size="30" /><br />
			<label for ='newPword'>Enter your new password:</label><br />
			<input type = "text" name = "newPword" size="30" /><br />
			<p class = "submit"><input type = "submit" value = "Change" name = "Change" /></p>
		</form>
	</div>
	</section>
	<div id = "deleteAccText" onclick = "Javascript: toggle_visibility('deleteAcc', 'deleteAccText', 'Click to permanently delete your account')">Click to permanently delete your account</div>
	<section class = "container4">
	<div id = "deleteAcc" style="display:none">
		<form id='deleteAccount' action='alterUserData.php' method='post'>
			<p>We're sad to see you go! By deleting your account, we will no longer be able to sell you airline tickets. 
			We will have no record of your account or previous purchases. 
			If you understand this and still wish to delete your account, push the button below.</p>
			<p class = "submit"><input type = "submit" value = "Delete" name = "Delete" /></p>
		</form>
	</div>
	</section>
</section>

<script type="text/javascript">
function toggle_visibility(id, textId, expandText) {
    var e = document.getElementById(id);

    if (e.style.display == 'none') {
        document.getElementById(textId).innerHTML = 'Click to hide';
        e.style.display = 'block';
        //col.innerHTML = valu;
    }
    else {
        e.style.display = 'none';
        document.getElementById(textId).innerHTML = expandText;
    }
}
</script>

</body>
</html>

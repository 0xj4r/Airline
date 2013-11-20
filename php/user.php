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

<!DOCTYPE html>
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
		<?php echo $result; 
			$us_id = $_SESSION['id'];
			include_once('dbConnect.php');
			$sql = "SELECT flight_booked, firstname, lastname FROM members WHERE user_id = '" .$us_id."'";
			$query = mysqli_query($dbCon, $sql);
			$row = mysqli_fetch_row($query);
			$flight_num = $row[0];
			$firstname = $row[1];
			$lastname = $row[2];
			$sqlFlight = "SELECT depart_city, depart_st, depart_airport, depart_time, arrival_city, arrival_st, arrival_airport, arrival_time, flight_duration, price FROM flights WHERE flight_num = '" .$flight_num. "'";
			$flightquery = mysqli_query($dbCon, $sqlFlight);
			$Frow = mysqli_fetch_row($flightquery);
			$message = "<p>You've been booked to fly from " .$Frow[0]. ", " .$Frow[1]." at " .$Frow[2]. " airport at " .$Frow[3].".<br />
			You will arrive at " .$Frow[4].", ".$Frow[5]." at " .$Frow[6]." airport at " .$Frow[7].", which will take " .$Frow[8]." hours.<br /> 
			You have already been charged $" .$Frow[9]. "<br />Have a safe trip!</p>";
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
</section>
</body>
</html>

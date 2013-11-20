<?php
	session_start();
	include_once("dbconnect.php");	//Connects to database
	include_once("login.php");
	if(!userType()){
		echo '<h2>Whoops! You need administrative privileges to view this content</h2><br /><a href="index.php">Click here to go home</a>';
		exit();
		}
?>
	
<!DOCTYPE HTML>
<html>
<head>
<link type="text/css"  rel="stylesheet" href="adminControl.css"  />
</head>
<table>
<tr>
<?PHP
require_once("menu.html");
?>
</tr>
</table>
<section class = "mainBody">
<div id = "addFlightText" onclick = "Javascript: toggle_visibility('addFlight', 'addFlightText', 'Click to add flight')">Click to add flight</div>
<div id = "addFlight" style="display: none">
<?php
	include("updateFlights.php");
	
?>
</div>
<div id = "editFlightText" onclick = "Javascript: toggle_visibility('editFlight', 'editFlightText', 'Click to edit a flight')">Click to edit a flight</div>
<div id = "editFlight" style="display: none">
<?php
	include_once("editFlight.php");
	?>
</div>
<div id = "deleteFlightText" onclick = "Javascript: toggle_visibility('deleteFlight', 'deleteFlightText', 'Click to remove a flight')">Click to remove a flight</div>
<div id = "deleteFlight" style="display: none">
<?php
	include_once("deleteFlight.php");
	?>
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
</body>
</html>

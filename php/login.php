<?php
//Credit to PeterEntwitle for login tutorial and scripts
//http://www.youtube.com/watch?v=hlumBk7FZzY
if(isset($_POST['username'])) {
	login();
	}
else
	determineUserType();
function login(){
session_start();
	include_once("dbconnect.php");	//Connects to database
	//Set the posted data from teh form into local variables
	$usname = strip_tags($_POST["username"]);
	$paswd = strip_tags($_POST["password"]);
	
	$usname = mysqli_real_escape_string($dbCon, $usname);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	
	$paswd = md5($paswd); //hashing algorithm
	
	$sql = "SELECT username, password, adminRights, user_id FROM members WHERE username = '$usname' LIMIT 1";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	$dbUsname = $row[0];
	$dbPassword = $row[1];
	$dbIsAdmin = $row[2];
	$usid = $row[3];
    

	if($usname == $dbUsname && $paswd == $dbPassword) {
		//Set session
		$_SESSION['username'] = $usname;
        $_SESSION['id'] = $usid;
		$_SESSION['isAdmin'] = $dbIsAdmin;
		$destination = determineUserType();
		header("Location:" .$destination);
	}
	else {
		header("Location: createAccount.php");
		}
}
	
function determineUserType() {
if(isset($_SESSION['id'])){
	if($_SESSION['isAdmin'] == 1) {//If the user is an admin, redirect to admin controls	
		return "adminControl.php";
	}
	else{
		return "user.php";
	}
	}
else
	return "createAccount.php";
}
?>
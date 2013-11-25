<?php
session_start();

if(isset($_POST['Update'])) {
	updateNames();
	header("Location: user.php");
	}
if(isset($_POST['Change'])) {
	changePWord();
	header("Location: user.php");
	}
	
if(isset($_POST['Delete'])) {
	deleteUser();
	}
//Updates the name of the user
function updateNames() {
	include_once('dbconnect.php');
	$uName = $_SESSION['username'];
	$newFName = strip_tags($_POST['newFName']);
	$newFName = mysqli_real_escape_string($dbCon, $newFName);
	$newLName = strip_tags($_POST['newLName']);
	$newLName = mysqli_real_escape_string($dbCon, $newLName);
	$sql = "UPDATE members SET firstname = '".$newFName."', lastname = '".$newLName."' WHERE username = '".$uName."'";
	$query = mysqli_query($dbCon, $sql);
	return $query;
}
//Updates the password for the user
function changePWord() {
	include_once('dbconnect.php');
	$uName = $_SESSION['username'];
	//$oldpaswd = strip_tags($_POST['oldPword']);
	//$oldpaswd = mysqli_real_escape_string($dbCon, $oldpaswd);
	//$oldpaswd = md5($oldpaswd);
	$paswd = strip_tags($_POST['newPword']);
	$paswd = mysqli_real_escape_string($dbCon, $paswd);
	$paswd = md5($paswd);
	$sql = "UPDATE members SET password = '".$paswd."' WHERE password = '".$oldpaswd."'";
	$query = mysqli_query($dbCon, $sql);
	return $query;
}
//Deletes the user from the table
function deleteUser() {
	include_once('dbconnect.php');
	$uName = $_SESSION['username'];
	$sql = "DELETE FROM members WHERE username = '".$uName."'";
	$query = mysqli_query($dbCon, $sql);
	include_once('logout.php');
	return $query;
}
?>

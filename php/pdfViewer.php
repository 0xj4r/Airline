<?php
session_start();
include_once("dbconnect.php");
error_reporting(E_ALL);
set_time_limit(1800);
set_include_path('../src/' . PATH_SEPARATOR . get_include_path());

include 'Cezpdf.php';

class Creport extends Cezpdf{
	function Creport($p,$o){
  		$this->__construct($p, $o,'none',array());
	}
}
$pdf = new Creport('a4','portrait');
// to test on windows xampp
  if(strpos(PHP_OS, 'WIN') !== false){
        $pdf->tempPath = 'C:\xampp\htdocs\AirlineProject/Airline';
  }
  
$pdf->ezSetMargins(20,20,20,20);
$pdf->openHere('Fit');


$pdf->selectFont('../src/fonts/Helvetica');
$pdf->ezText("Reciept\n");


//$flightNum="hello";
$flightNum=$_SESSION['flight_num'];
$departCity= $_SESSION['depart_city'];
$departState=$_SESSION['depart_st'];
$departTime=$_SESSION['depart_time'];
$arrivalCity=$_SESSION['arrival_city'];
$arrivalState=$_SESSION['arrival_st'];
$flightDuration=$_SESSION['flight_duration'];


$pdf->selectFont('../src/fonts/Helvetica');
$pdf->ezText("Flight Number:");
$pdf->ezText($flightNum);

$pdf->ezText("Departure City:");
$pdf->ezText($departCity);

$pdf->ezText("Departure State:");
$pdf->ezText($departState);

$pdf->ezText("Departure Time:");
$pdf->ezText($departTime);

$pdf->ezText("Arrival City:");
$pdf->ezText($arrivalCity);

$pdf->ezText("Arrival State:");
$pdf->ezText($arrivalState);

$pdf->ezText("Flight Duration:");
$pdf->ezText($flight_duration);



if (isset($_GET['d']) && $_GET['d']){
  $pdfcode = $pdf->ezOutput(1);
  $pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
  echo '<html><body>';
  echo trim($pdfcode);
  echo '</body></html>';
} else {
  $pdf->ezStream(array('compress'=>0));
}
?>
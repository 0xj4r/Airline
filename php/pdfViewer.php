<?php
session_start();

error_reporting(E_ALL);
set_time_limit(1800);
set_include_path('../src/' . PATH_SEPARATOR . get_include_path());

include 'Cezpdf.php';

class Creport extends Cezpdf{
	function Creport($p,$o){
  		$this->__construct($p, $o,'color',array(0.8,0.8,0.8));

	}
}
$pdf = new Creport('a4','portrait');
// to test on windows xampp
if(strpos(PHP_OS, 'WIN') !== false){
    $pdf->tempPath = 'C:\xampp\htdocs\AirlineProject/Airline';
}

$pdf -> ezSetMargins(20,20,20,20);

$mainFont = '../src/fonts/Times-Roman.afm';
// select a font
$pdf->selectFont($mainFont);
$size=16;

$height = $pdf->getFontHeight($size);
// modified to use the local file if it can
$pdf->openHere('Fit');




//$flightNum="hello";
$flightNum=$_SESSION['flight_num'];
$departCity= $_SESSION['depart_city'];
$departState=$_SESSION['depart_st'];
$departTime=$_SESSION['depart_time'];
$arrivalCity=$_SESSION['arrival_city'];
$arrivalState=$_SESSION['arrival_st'];
$flightDuration=$_SESSION['flight_duration'];
$logo=$_SESSION['logo'];



$pdf->addText(300, 800, 24, "<b>Airline Ticket<b>", 0, 'center', 0);

$pdf->ezImage("http://www.logologo.com/logos/eagle-in-flight-logo.jpg",30,100,'width','center');

$pdf->addText(10, 650, 16, "<b>From: <b>", 0, 'left', 0);
$pdf->addText(150, 650, 14, $departCity, 0, 'left', 0);
$pdf->addText(10, 625, 16, "<b>To:<b>", 0, 'left', 0);
$pdf->addText(150, 625, 14, $arrivalCity, 0, 'left', 0);
$pdf->addText(10, 600, 16, "<b>Departure Time:<b>", 0, 'left', 0);
$pdf->addText(150, 600, 14, $departTime, 0, 'left', 0);
$pdf->addText(10, 575, 16, "<b>Flight Duration:<b>", 0, 'left', 0);
$pdf->addText(150, 575, 14, $flightDuration, 'left', 0);
$pdf->addText(10, 550, 16, "<b>Total Price:<b>", 0, 'left', 0);
$pdf->addText(150, 550, 14, "need to update price", 0, 'left', 0);
$pdf->addText(10, 525, 16, "<b>Flight Number:<b>", 0, 'left', 0);
$pdf->addText(150, 525, 14, $flightNum, 0, 'left', 0);
$pdf->addText(10, 500, 16, "<b>Class:<b>", 0, 'left', 0);
$pdf->addText(150, 500, 14, "need to update class", 0, 'left', 0);



//$pdf->ezText("Flight Number:");
//$pdf->ezText($flightNum);

//$pdf->ezText("Departure City:");
//$pdf->ezText($departCity);

/*$pdf->ezText("Departure State:");
$pdf->ezText($departState);

$pdf->ezText("Departure Time:");
$pdf->ezText($departTime);

$pdf->ezText("Arrival City:");
$pdf->ezText($arrivalCity);

$pdf->ezText("Arrival State:");
$pdf->ezText($arrivalState);

$pdf->ezText("Flight Duration:");
$pdf->ezText($flightDuration);


*/






if (isset($_GET['d']) && $_GET['d']){
  $pdfcode = $pdf->ezOutput(1);
  $pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
  echo '<html><body>';
  echo trim($pdfcode);
  echo '</body></html>';
} else {
  $pdf->ezStream(array('compress'=>0));
}

//error_log($pdf->messages);
?>
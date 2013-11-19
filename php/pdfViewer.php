<?php
session_start(); 
include_once("dbconnect.php");	//Connects to database
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
    $pdf->tempPath = 'C:\xampp\htdocs\Airlinenewnew/Airline-master';
  }
  
$pdf->ezSetMargins(20,20,20,20);
$pdf->openHere('Fit');

$pdf->selectFont('../src/fonts/Helvetica.afm');
$pdf->ezText("Text in Helvetica");
$pdf->selectFont('../src/fonts/Courier.afm');
$pdf->ezText("Text in Courier");
$pdf->selectFont('../src/fonts/Times-Roman.afm');
$pdf->ezText("Text in Times New Roman");

//$flightNum=$_SESSION['flight_num'];

//$mysql = "SELECT * FROM flights WHERE flight_num = '1' LIMIT 1";
	//$result = mysqli_query($dbCon, $mysql);
	//$row = mysqli_fetch_row($result);
	//$dbDepartCity = $row[0];
	//$dbDepartSt = $row[1];
	//$dbDepartTime = $row[2];
    //$dbArrivalCity = $row[3]; 
	//$dbArrivalSt= $row[4]; 
	//$dbFlightDuration=$row[5];



//$data=array();

//if($flightNum!=NULL)
//{
//$result=mysqli_query($dbCon,"SELECT * FROM flights WHERE flight_num='1'");
// WHERE flight_num=$flightNum

//$pdf->selectFont('./fonts/Helvetica');
//$pdf->addText(30,400,30,'hello');
//$pdf->addText(30,400,30,$dbDepartCity);
//$pdf->addText(30,400,30,$dbDepartSt);
//$pdf->addText(30,400,30,$dbDepartTime);
//$pdf->addText(30,400,30,$dbArrivalCity);
//$pdf->addText(30,400,30,$dbArrivalSt);
//$pdf->addText(30,400,30,$dbflightDuration);

//$pdf->ezstream();
//while($data[]=mysqli_fetch_array($result)){}
///in searchflights, take in users flight number, go through flights database and pull out the row, store each in session variables
//$pdf->selectFont('./fonts/Helvetica');

//$pdf->ezstream();
//$pdf->addText(150,$y,10,"the quick brown fox <b>jumps</b>
//<i>over</i> the lazy dog!",0, 'left',-10);


//$pdf->selectFont('../src/fonts/Helvetica');
//$pdf->ezText("Some annotations are only shown in Adobe Reader. Chrome Viewer for instance does not show the icons\n");
//$pdf->ezTable($data);
//$pdf->addText(30,400,30,"hello");
//else
//{
//$result=mysqli_query($dbCon,'SELECT * FROM flights');
// WHERE flight_num=$flightNum
//while($data[]=mysqli_fetch_array($result)){}
//$r=$row['flight_num']
//$pdf->selectFont('./fonts/Helvetica');
//$pdf->addText(30,400,30,$r);
//$pdf->stream();
//}
//$pdf->ezTable($data);

if (isset($d) && $d){
  $pdfcode = $pdf->output(1);
  $pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
  echo '<html><body>';
  echo trim($pdfcode);
  echo '</body></html>';
} else {
  $pdf->ezStream();
}

	

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
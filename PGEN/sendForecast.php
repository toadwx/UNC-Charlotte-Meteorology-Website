<?php
	//CODE GUIDE:
	//0100 - 5 Day Forecast for Wx Display
	//0225 - EM Hazard Forecast
	//1550 - Full Forecast
	//0000 - Return Forecast File, no submission
	
	//HAZARD MATRIX ENCODING GUIDE:
	//N - Normal
	//C - Cautionary
	//A - Alert
	//NP - Not Present (Greyed Out Box)
	// Ex: In Ice Accumulation: CT : Will produce a yellow box with T inside of it
	
	// BASIC INFORMATION ---------------------------------
	$forecaster = $_POST["forecaster"];
	$shortTerm = $_POST["shortTerm"];
	$longTerm = $_POST["longTerm"];
	$fcode = $_POST["fcode"];
	
	// 5DAY FORECAST --------------------------------------
	$d1Hi = $_POST["d1Hi"];
	$d2Hi = $_POST["d2Hi"];
	$d3Hi = $_POST["d3Hi"];
	$d4Hi = $_POST["d4Hi"];
	$d5Hi = $_POST["d5Hi"];
	
	$d1Lo = $_POST["d1Lo"];
	$d2Lo = $_POST["d2Lo"];
	$d3Lo = $_POST["d3Lo"];
	$d4Lo = $_POST["d4Lo"];
	$d5Lo = $_POST["d5Lo"];
	
	$d1Cond = $_POST["d1Cond"];
	$d2Cond = $_POST["d2Cond"];
	$d3Cond = $_POST["d3Cond"];
	$d4Cond = $_POST["d4Cond"];
	$d5Cond = $_POST["d5Cond"];
	
	$list = array (
		array($forecaster,$shortTerm,$longTerm),
	    array($d1Hi,$d1Lo,$d1Cond),
	    array($d2Hi,$d2Lo,$d2Cond),
	    array($d3Hi,$d3Lo,$d3Cond),
	    array($d4Hi,$d4Lo,$d4Cond),
	    array($d5Hi,$d5Lo,$d5Cond),
	);
	
	$fp = fopen('displayForecast.csv', 'w');
	
	foreach ($list as $fields) {
	    fputcsv($fp, $fields);
	}
	
	fclose($fp);
	
	// HAZARD MATRIX MESS ------------------------------------
	
?>
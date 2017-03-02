<?php // content="text/plain; charset=utf-8"

ob_start();
require("../cfg/config.php");
ob_end_clean();

// -----------------------------------------------------------
// Find total records
// -----------------------------------------------------------
$server = mysql_connect("mysql.brianmagiweatheruncc.dreamhosters.com", $username, $password);
$connection = mysql_select_db($database, $server);

// Go through all this trouble for a row count ... ... ...
$count = mysql_query("select count(1) FROM archive");
$grabCount = mysql_fetch_array($count);

if( ! $count ) 
{
	echo mysql_error();
	die;
}
 
// ROW BOUNDARIES
// We assume the max information we will want will be a year's worth
$rowStart = ($rows - 365);
$rowEnd = $rows;

$rainTot = 0; //Start running rainfall total
$rainAccum = 0;
$i = 0;

$monthRain=array();
$monthHighTemps=array();
$monthLowTemps=array();

// Find year start timestamp
$endYearDay = strtotime('January 1');
$currentMonth = 1;

// -------------------------------------------------------------
// Find 12 month Rain Totals, save to an array
// -------------------------------------------------------------
$myquery = "SELECT * FROM archive_day_rain ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";

$query = mysql_query($myquery);

 if ( ! $query ) 
 {
        echo mysql_error();
        die;
}
while($r = mysql_fetch_assoc($query))
{
	if($r['dateTime'] > $endYearDay)
	{
		$mdat = $r['dateTime'];	
		$dailyRain = $r['sum'];
		
		$tdat = new DateTime("@$mdat");
		$tdat->setTimeZone(new DateTimeZone('America/New_York'));
		$newDate = $tdat->format('n');
		
		if($newDate != $currentMonth) {
			$monthRain[$i] = $rainAccum;
			$rainAccum = 0;
			$currentMonth = $newDate;
		}
		$rainAccum = $rainAccum + $dailyRain;
		
	}
	
}
// -------------------------------------------------------------
// Find 12 month High/Low Temps, save to an array
// -------------------------------------------------------------
$i=1;
$j=1;
$hiTotal = 0;
$loTotal = 0;

$myquery = "SELECT * FROM archive_day_outTemp ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";

$query = mysql_query($myquery);

 if ( ! $query ) 
 {
        echo mysql_error();
        die;
}
while($r = mysql_fetch_assoc($query))
{
	if($r['dateTime'] > $endYearDay)
	{
		$mdat = $r['dateTime'];	
		$max = $r['max'];
		$min = $r['min'];
		if($i == 1){
			$tdat = new DateTime("@$mdat");
			$tdat->setTimeZone(new DateTimeZone('America/New_York'));
			$oldDate = $tdat->format('n');
		}
		$tdat = new DateTime("@$mdat");
		$tdat->setTimeZone(new DateTimeZone('America/New_York'));
		$newDate = $tdat->format('n');
		
		if($newDate != $oldDate) {
			$monthHighTemps[$i]=$hiTotal / $j;
			$monthLowTemps[$i]=$loTotal / $j;
			$i = $i+1;
			$j = 1;
			$hiTotal=0;
			$loTotal=0;
			$oldDate = $newDate;
		}
		$hiTotal = $max + $hiTotal;
		$loTotal = $min + $loTotal;
		$j = $j + 1;
	}	
}
$months=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

// Build an array thats Google Charts Readable ... ... ...
$table=array();

$table['cols'] = array(
	// Chart Labels (i.e. column headers)
	array('label' => 'Month', 'type' => 'string'),
	array('label' => 'Rain', 'type' => 'number'),
	array('label' => 'HighTemperature', 'type' => 'number'),
	array('label' => 'LowTemperature', 'type' => 'number'),
);

$rows = array(); //Prep initial input array

for ($x = 0; $x < 12; $x++) {
    $temp = array();
	$temp[] = array('v' => (string) $months[$x]); 
	$temp[] = array('v' => (float) $monthRain[$x]);
	$temp[] = array('v' => (float) $monthHighTemps[$x]);
	$temp[] = array('v' => (float) $monthLowTemps[$x]);
	$rows[] = array('c' => $temp);
} 

$table['rows'] = $rows;
$jsonTable = json_encode($table);

// Close up
mysql_close($server);

// Send back to Javascript ...
echo $jsonTable;
?>
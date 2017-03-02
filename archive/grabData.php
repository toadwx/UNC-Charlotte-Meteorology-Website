<?php

	$range = $_REQUEST['timeRange'];
	ob_start();
	require("../cfg/config.php");
	ob_end_clean();
	
	// Create connection
	$server = mysql_connect("mysql.brianmagiweatheruncc.dreamhosters.com", $username, $password);
	$connection = mysql_select_db($database, $server);
	
	// Go through all this trouble for a row count ... ... ...
	$count = mysql_query("select count(1) FROM archive");
	$grabCount = mysql_fetch_array($count);
	
	 if ( ! $count ) 
	 {
	        echo mysql_error();
	        die;
	}
	 
	
	
	
	// ROW BOUNDARIES  ... ... ...
	
	$hour = 60;
	$day = 1440;
	$week = 10080;
	$month = 43200;
	$year = 525600;
	
	if($range = "week")
	{
		$timeSpan = $week;
		$interval = 360;
	}
	if($range = "month")
	{
		$timeSpan = $month;
		$interval = 1440;
	}
	if($range = "sixmonth")
	{
		$timeSpan = $year / 2;
		$interval = 10080;
	}
	if($range = "year")
	{
		$timeSpan = $year;
		$interval = 30240;
	}
		
	$filter = $timeSpan / $interval;
	$rows = (int) ($grabCount[0]);
	
	$rowStart = ($rows - $timeSpan);
	$rowEnd = $rows;
	
	
	// Query the Database for what you want
	$myquery = "SELECT * FROM archive ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";
	
	$query = mysql_query($myquery);
	
	 if ( ! $query ) 
	 {
	        echo mysql_error();
	        die;
	}
	
	// Build an array thats Google Charts Readable ... ... ...
	$table=array();
	$table['cols'] = array(
		// Chart Labels (i.e. column headers)
		array('label' => 'dateTime', 'type' => 'string'),
		array('label' => 'Temp', 'type' => 'number'),
		array('label' => 'Dew', 'type' => 'number'),
		array('label' => 'Pressure', 'type' => 'number'),
		array('label' => 'Wind Speed', 'type' => 'number'),
		array('label' => 'Radiation', 'type' => 'number'),
		array('label' => 'Heat Index', 'type' => 'number'),
		array('label' => 'Wind Chill', 'type' => 'number')
	);
	
	$rows = array();
	$ifStop = $interval * 60;

	while($r = mysql_fetch_assoc($query))
	{
		
		$mdat = $r['dateTime'];
		
		if ( ($mdat % $ifStop) == 0) 
		{
			$tdat = new DateTime("@$mdat");
			$tdat->setTimeZone(new DateTimeZone('America/New_York'));
			$rdat = $tdat->format('H:i');
			
			$Tdat = $r['outTemp'];
			$Tdat = number_format($Tdat, 2, '.', '');
			
			$Ddat = $r['dewpoint'];
			$Ddat = number_format($Ddat, 2, '.', '');
			
			$Pdat = $r['barometer'];
			if ($Pdat == 0)
			{
				$Pdat = 29.92;
			}
			$Pdat = $Pdat * 33.8637526;
			$Pdat = number_format($Pdat, 2, '.', '');
			
			$Wdat = $r['windSpeed'];
			$Wdat = number_format($Wdat, 2, '.', '');
						
			$Sundat = $r['radiation'];
			$Sundat = number_format($Sundat, 2, '.', '');
			
			$HIdat = $r['heatindex'];
			$HIdat = number_format($HIdat, 2, '.', '');
			
			$WCdat = $r['windchill'];
			$WCdat = number_format($WCdat, 2, '.', '');
			
			$temp = array();
		    $temp[] = array('v' => (string) $rdat); 
		    $temp[] = array('v' => (float) $Tdat);
			$temp[] = array('v' => (float) $Ddat);
			$temp[] = array('v' => (float) $Pdat);
			$temp[] = array('v' => (float) $Wdat);
			$temp[] = array('v' => (float) $Sundat);
			$temp[] = array('v' => (float) $HIdat);
			$temp[] = array('v' => (float) $WCdat);
		    $rows[] = array('c' => $temp);
	    }
	}
	
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	
	// Close up
	mysql_close($server);
	
	// Send back to Javascript ...
	echo $jsonTable;
	
?>
<?php // content="text/plain; charset=utf-8"

	ob_start();
	require("../cfg/config.php");
	ob_end_clean();
	
	// Create connection
	$server = mysql_connect("mysql.brianmagiweatheruncc.dreamhosters.com", $username, $password);
	$connection = mysql_select_db($database, $server);
	
	// -----------------------------------------------------------
	// Find the number of data entries...
	// -----------------------------------------------------------
	$count = mysql_query("select count(1) FROM archive_day_outTemp");
	$grabCount = mysql_fetch_array($count);
	
	if ( ! $count ) 
	 {
	        echo mysql_error();
	        die;
	}
	 
	// ROW BOUNDARIES  ... ... ...
	$rows = (int) ($grabCount[0]);
	
	// Let's assume that the max time we will analyze will only ever be 365 days;
	$rowStart = ($rows - 365);
	$rowEnd = $rows;
	
	// ------------------------------------------------------
	// INITIALIZE SOME VARIABLES!
	// ------------------------------------------------------
	
	$data = array(); //Prep array
	
	// Set interval dates
	$endYearDay = strtotime('January 1');
	$end6moDay = strtotime('-6 month');
	$end30Day = strtotime('-30 day');
	$endWeekDay = strtotime('last sunday');
	
	// Weekly
	$hTtimWK = 0;
	$htWK = 0;
	$lTtimWK = 0;
	$ltWK = 9999;
	$rainTotWK = 0;
	$hiWndWK = 0;
	$hiWndTimWK = 0;
	$hiPresWK = 0;
	$hiPresTimWK = 0;
	$loPresWK = 9999;
	$loPresTimWK = 0;
	//30-Days
	$hTtim3D = 0;
	$ht3D = 0;
	$lTtim3D = 0;
	$lt3D = 9999;
	$rainTot3D = 0;
	$hiWnd3D = 0;
	$hiWndTim3D = 0;
	$hiPres3D = 0;
	$hiPresTim3D = 0;
	$loPres3D = 9999;
	$loPresTim3D = 0;
	//One Year
	$hTtimYR = 0;
	$htYR = 0;
	$lTtimYR = 0;
	$ltYR = 9999;
	$rainTotYR = 0;
	$hiWndYR = 0;
	$hiWndTimYR = 0;
	$hiPresYR = 0;
	$hiPresTimYR = 0;
	$loPresYR = 9999;
	$loPresTimYR = 0;
	//6-Months
	$hTtim6M = 0;
	$ht6M = 0;
	$lTtim6M = 0;
	$lt6M = 9999;
	$rainTot6M = 0;
	$hiWnd6M = 0;
	$hiWndTim6M = 0;
	$hiPres6M = 0;
	$hiPresTim6M = 0;
	$loPres6M = 9999;
	$loPresTim6M = 0;
	
	// -------------------------------------------------------------
	// GET TEMPERATURE STATISTICS...
	// -------------------------------------------------------------
	$myquery = "SELECT * FROM archive_day_outTemp ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";	
	$query = mysql_query($myquery);	
	if ( ! $query ) 
	{
		echo mysql_error();
		die;
	}
	
	while($r = mysql_fetch_assoc($query))
	{
		$tempTime = $r['dateTime'];
		$tempTH = $r['max'];
		$tempTL = $r['min'];
		if($r['dateTime'] > $endYearDay){	
			if ($tempTH > $htYR){
				$htYR = $tempTH;
				$hTtimYR = $r['maxtime'];
			}
			if ($tempTL < $ltYR){
				$ltYR = $tempTL;
				$lTtimYR = $r['mintime'];
			}
		}
		if($r['dateTime'] > $end6moDay){	
			if ($tempTH > $ht6M){
				$ht6M = $tempTH;
				$hTtim6M = $r['maxtime'];
			}
			if ($tempTL < $lt6M){
				$lt6M = $tempTL;
				$lTtim6M = $r['mintime'];
			}
		}
		if($r['dateTime'] > $end30Day){	
			if ($tempTH > $ht3D){
				$ht3D = $tempTH;
				$hTtim3D = $r['maxtime'];
			}
			if ($tempTL < $lt3D){
				$lt3D = $tempTL;
				$lTtim3D = $r['mintime'];
			}
		}
		if($r['dateTime'] > $endWeekDay){	
			if ($tempTH > $htWK){
				$htWK = $tempTH;
				$hTtimWK = $r['maxtime'];
			}
			if ($tempTL < $ltWK){
				$ltWK = $tempTL;
				$lTtimWK = $r['mintime'];
			}
		}
	}
	
	// Format Date Strings...
	$hTtimYR = new DateTime("@$hTtimYR");
	$hTtimYR->setTimeZone(new DateTimeZone('America/New_York'));
	$hTtimYR = $hTtimYR->format('H:i d-M-Y');
	
	$lTtimYR = new DateTime("@$lTtimYR");
	$lTtimYR->setTimeZone(new DateTimeZone('America/New_York'));
	$lTtimYR = $lTtimYR->format('H:i d-M-Y');
	
	$hTtim6M = new DateTime("@$hTtim6M");
	$hTtim6M->setTimeZone(new DateTimeZone('America/New_York'));
	$hTtim6M = $hTtim6M->format('H:i d-M-Y');
	
	$lTtim6M = new DateTime("@$lTtim6M");
	$lTtim6M->setTimeZone(new DateTimeZone('America/New_York'));
	$lTtim6M = $lTtim6M->format('H:i d-M-Y');
	
	$hTtim3D = new DateTime("@$hTtim3D");
	$hTtim3D->setTimeZone(new DateTimeZone('America/New_York'));
	$hTtim3D = $hTtim3D->format('H:i d-M-Y');
	
	$lTtim3D = new DateTime("@$lTtim3D");
	$lTtim3D->setTimeZone(new DateTimeZone('America/New_York'));
	$lTtim3D = $lTtim3D->format('H:i d-M-Y');
	
	$hTtimWK = new DateTime("@$hTtimWK");
	$hTtimWK->setTimeZone(new DateTimeZone('America/New_York'));
	$hTtimWK = $hTtimWK->format('H:i d-M-Y');
	
	$lTtimWK = new DateTime("@$lTtimWK");
	$lTtimWK->setTimeZone(new DateTimeZone('America/New_York'));
	$lTtimWK = $lTtimWK->format('H:i d-M-Y');

	// Assign Temp Variables to Data Array!
	$data[0] = $hTtimYR;
	$data[1] = $htYR;
	$data[2] = $lTtimYR;
	$data[3] = $ltYR;
	$data[4] = $hTtim6M;
	$data[5] = $ht6M;
	$data[6] = $lTtim6M;
	$data[7] = $lt6M;
	$data[8] = $hTtim3D;
	$data[9] = $ht3D;
	$data[10] = $lTtim3D;
	$data[11] = $lt3D;
	$data[12] = $hTtimWK;
	$data[13] = $htWK;
	$data[14] = $lTtimWK;
	$data[15] = $ltWK;

	// ----------------------------------------------------------
	// Rain Totals...  (This one's bound to be tricky)
	// ----------------------------------------------------------
	$myquery = "SELECT * FROM archive_day_rain ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";	
	$query = mysql_query($myquery);	
	if ( ! $query ) 
	{
		echo mysql_error();
		die;
	}
	
	while($r = mysql_fetch_assoc($query))
	{
		$tempTime = $r['dateTime'];
		$dailyRain = $r['sum'];
		if($tempTime > $endYearDay){
			$rainTotYR = $rainTotYR + $dailyRain;
			
			if($tempTime > $end6moDay){
				$rainTot6M = $rainTot6M + $dailyRain;
			}
			if($tempTime > $end30Day){
				$rainTot3D = $rainTot3D + $dailyRain;
			}
			if($tempTime > $endWeekDay){
				$rainTotWK = $rainTotWK + $dailyRain;
			}
			
		}
		
	}
	
	// Assign rain totals to data array...
	$data[16] = $rainTotYR;
	$data[17] = $rainTot6M;
	$data[18] = $rainTot3D;
	$data[19] = $rainTotWK;
	
	// ----------------------------------------------------------
	// High Winds
	// ----------------------------------------------------------
	$myquery = "SELECT * FROM archive_day_wind ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";	
	$query = mysql_query($myquery);	
	if ( ! $query ) 
	{
		echo mysql_error();
		die;
	}
	
	while($r = mysql_fetch_assoc($query))
	{
		$tempTime = $r['maxtime'];
		$windMax = $r['max'];
		if($tempTime > $endYearDay){
			if($windMax > $hiWndYR){
				$hiWndYR=$windMax;
				$hiWndTimYR=$tempTime;
			}
			if($tempTime > $end6moDay){
				if($windMax > $hiWnd6M){
					$hiWnd6M=$windMax;
					$hiWndTim6M=$tempTime;
				}
			}
			if($tempTime > $end30Day){
				if($windMax > $hiWnd3D){
					$hiWnd3D=$windMax;
					$hiWndTim3D=$tempTime;
				}
			}
			if($tempTime > $endWeekDay){
				if($windMax > $hiWndWK){
					$hiWndWK=$windMax;
					$hiWndTimWK=$tempTime;
				}
			}
		}
	}
	// Format Date Strings...
	$hiWndTimYR = new DateTime("@$hiWndTimYR");
	$hiWndTimYR->setTimeZone(new DateTimeZone('America/New_York'));
	$hiWndTimYR = $hiWndTimYR->format('H:i d-M-Y');
	
	$hiWndTim6M = new DateTime("@$hiWndTim6M");
	$hiWndTim6M->setTimeZone(new DateTimeZone('America/New_York'));
	$hiWndTim6M = $hiWndTim6M->format('H:i d-M-Y');
	
	$hiWndTim3D = new DateTime("@$hiWndTim3D");
	$hiWndTim3D->setTimeZone(new DateTimeZone('America/New_York'));
	$hiWndTim3D = $hiWndTim3D->format('H:i d-M-Y');
	
	$hiWndTimWK = new DateTime("@$hiWndTimWK");
	$hiWndTimWK->setTimeZone(new DateTimeZone('America/New_York'));
	$hiWndTimWK = $hiWndTimWK->format('H:i d-M-Y');
	
	// Assign high winds to data array...
	$data[20] = $hiWndTimYR;
	$data[21] = $hiWndYR;
	$data[22] = $hiWndTim6M;
	$data[23] = $hiWnd6M;
	$data[24] = $hiWndTim3D;
	$data[25] = $hiWnd3D;
	$data[26] = $hiWndTimWK;
	$data[27] = $hiWndWK;
	
	// -------------------------------------------------------------
	// GET PRESSURE STATISTICS...
	// -------------------------------------------------------------
	$myquery = "SELECT * FROM archive_day_pressure ORDER BY dateTime ASC LIMIT $rowStart, $rowEnd";	
	$query = mysql_query($myquery);	
	if ( ! $query ) 
	{
		echo mysql_error();
		die;
	}
	
	while($r = mysql_fetch_assoc($query))
	{
		$tempTime = $r['dateTime'];
		$hiPres = $r['max'];
		$loPres = $r['min'];
		if($r['dateTime'] > $endYearDay){	
			if ($hiPres > $hiPresYR){
				$hiPresYR = $hiPres;
				$hiPresTimYR = $r['maxtime'];
			}
			if ($loPres < $loPresYR){
				$loPresYR = $loPres;
				$loPresTimYR = $r['mintime'];
			}
		}
		if($r['dateTime'] > $end6moDay){	
			if ($hiPres > $hiPres6M){
				$hiPres6M = $hiPres;
				$hiPresTim6M = $r['maxtime'];
			}
			if ($loPres < $loPres6M){
				$loPres6M = $loPres;
				$loPresTim6M = $r['mintime'];
			}
		}
		if($r['dateTime'] > $end30Day){	
			if ($hiPres > $hiPres3D){
				$hiPres3D = $hiPres;
				$hiPresTim3D = $r['maxtime'];
			}
			if ($loPres < $loPres3D){
				$loPres3D = $loPres;
				$loPresTim3D = $r['mintime'];
			}
		}
		if($r['dateTime'] > $endWeekDay){	
			if ($hiPres > $hiPresWK){
				$hiPresWK = $hiPres;
				$hiPresTimWK = $r['maxtime'];
			}
			if ($loPres < $loPresWK){
				$loPresWK = $loPres;
				$loPresTimWK = $r['mintime'];
			}
		}
	}
	
	// Format Date Strings...
	$hiPresTimYR = new DateTime("@$hiPresTimYR");
	$hiPresTimYR->setTimeZone(new DateTimeZone('America/New_York'));
	$hiPresTimYR = $hiPresTimYR->format('H:i d-M-Y');
	
	$hiPresTim6M = new DateTime("@$hiPresTim6M");
	$hiPresTim6M->setTimeZone(new DateTimeZone('America/New_York'));
	$hiPresTim6M = $hiPresTim6M->format('H:i d-M-Y');
	
	$hiPresTim3D = new DateTime("@$hiPresTim3D");
	$hiPresTim3D->setTimeZone(new DateTimeZone('America/New_York'));
	$hiPresTim3D = $hiPresTim3D->format('H:i d-M-Y');
	
	$hiPresTimWK = new DateTime("@$hiPresTimWK");
	$hiPresTimWK->setTimeZone(new DateTimeZone('America/New_York'));
	$hiPresTimWK = $hiPresTimWK->format('H:i d-M-Y');
	
	$loPresTimYR = new DateTime("@$loPresTimYR");
	$loPresTimYR->setTimeZone(new DateTimeZone('America/New_York'));
	$loPresTimYR = $loPresTimYR->format('H:i d-M-Y');
	
	$loPresTim6M = new DateTime("@$loPresTim6M");
	$loPresTim6M->setTimeZone(new DateTimeZone('America/New_York'));
	$loPresTim6M = $loPresTim6M->format('H:i d-M-Y');
	
	$loPresTim3D = new DateTime("@$loPresTim3D");
	$loPresTim3D->setTimeZone(new DateTimeZone('America/New_York'));
	$loPresTim3D = $loPresTim3D->format('H:i d-M-Y');
	
	$loPresTimWK = new DateTime("@$loPresTimWK");
	$loPresTimWK->setTimeZone(new DateTimeZone('America/New_York'));
	$loPresTimWK = $loPresTimWK->format('H:i d-M-Y');
	
	// Assign Pressure Variables to Data Array!
	$data[28] = $hiPresTimYR;
	$data[29] = $hiPresYR;
	$data[30] = $hiPresTim6M;
	$data[31] = $hiPres6M;
	$data[32] = $hiPresTim3D;
	$data[33] = $hiPres3D;
	$data[34] = $hiPresTimWK;
	$data[35] = $hiPresWK;
	$data[36] = $loPresTimYR;
	$data[37] = $loPresYR;
	$data[38] = $loPresTim6M;
	$data[39] = $loPres6M;
	$data[40] = $loPresTim3D;
	$data[41] = $loPres3D;
	$data[42] = $loPresTimWK;
	$data[43] = $loPresWK;
	
	// ----------------------------------------------------------
	//  Encode Data and Clean-Up
	// ----------------------------------------------------------
	$jsonTable = json_encode($data);
	
	// Close up
	mysql_close($server);
	
	// Send back to Javascript ...
	echo $jsonTable;
?>
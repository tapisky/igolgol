<?

	// get current season (a season begins on August 1st and ends on July 31st every year)
	$today = date("Y-m-d",time());
	$year = substr($today,0,4);
	$season_end = mktime(0,0,0,7,31,$year);
	
	// if today is earlier than July 31st of current year, then season= 'previous_year/current_year', in other case, season = 'current_year/next_year'
	if (time() <= $season_end)
	{
		// season= 'previous_year/current_year'
		$current_season = ($year - 2). "/". ($year - 1);
	}
	else
	{
		// season= 'current_year/next_year'
		$current_season = ($year - 1). "/". ($year);
	}

	// Main structure of SQL sentence
	$myquery_general = "SELECT scorerid, COUNT( idgoals ) FROM goals WHERE assisterid=". $_POST["id"]. " AND season='". $current_season. "'";
	$myquery_general = $myquery_general. " GROUP BY assisterid ORDER BY COUNT( idgoals )";
	
	$result = mysql_query($myquery_general) or die(mysql_error());
	$num=mysql_numrows($result);
	
	$r = mysql_fetch_array( $result );
			
	// Player Total assists according to selection
	echo "Assists last season (". $current_season."): <b>". (($r['COUNT( idgoals )'] == "") ? 0 : $r['COUNT( idgoals )']). "</b>";
	
?>

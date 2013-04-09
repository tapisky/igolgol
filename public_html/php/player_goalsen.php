<?
	// Main structure of SQL sentence
	$myquery_general = "SELECT scorerid, COUNT( idgoals ) FROM goals WHERE scorerid=". $_POST["id"];
	$myquery_general = $myquery_general. " GROUP BY scorerid ORDER BY COUNT( idgoals )";
	
	$result = mysql_query($myquery_general) or die(mysql_error());
	$num=mysql_numrows($result);
	
	$r = mysql_fetch_array( $result );
			
	// Player Total goals according to selection
	echo "Total goals in igolgol: <b>". (($r['COUNT( idgoals )'] == "") ? 0 : $r['COUNT( idgoals )']). "</b>";
?>
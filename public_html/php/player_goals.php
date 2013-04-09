<?
	// Main structure of SQL sentence
	$myquery_general = "SELECT scorerid, COUNT( idgoals ) FROM goals WHERE scorerid=". $_POST["id"];
	$myquery_general = $myquery_general. " GROUP BY scorerid ORDER BY COUNT( idgoals )";
	
	$result = mysql_query($myquery_general) or die(mysql_error());
	$num=mysql_numrows($result);
	
	$r = mysql_fetch_array( $result );
			
	// Player Total goals according to selection
	echo "<td>Total goals in igolgol: <b>". (($r['COUNT( idgoals )'] == "") ? 0 : $r['COUNT( idgoals )']). "</b>";
	echo "<br>";
?>
<br>
<table>
<tr>
	<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
	<td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
</tr>
<tr>

<?php

	// 1. Left foot goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='left_foot'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 2. Right foot goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='right_foot'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 3. Header goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='header'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 4. Sliding header goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='sliding_header'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 5. Breast goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='breast'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 6. Bycicle goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='bycicle'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 7. Side_bycicle goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='side_bycicle'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 8. volley goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='volley'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 9. pk goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='pk'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 10. fk goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='fk'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 11. ck goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='ck'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 12. knee goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='knee'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 13. back_foot goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='back_foot'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 14. side_foot goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='side_foot'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////
	
	// 15. other goals
	// first prepare the SQL sentence
	$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	$myquery_gt = $myquery_gt. " WHERE ";

	$myquery_gt = $myquery_gt. "goal_type='other'";
	$myquery_gt = $myquery_gt. " AND scorerid=". $_POST["id"];
	$myquery_gt = $myquery_gt. " GROUP BY scorerid";
	$result_gt = mysql_query($myquery_gt) or die(mysql_error());
	$num_gt=mysql_numrows($result_gt);
	$r_gt = mysql_fetch_array( $result_gt );
	if ($r_gt['COUNT( idgoals )'] == "")
	{
		echo "<td>-</td>";
	}
	else
	{
		echo "<td>". $r_gt['COUNT( idgoals )']. "</td>";
	}
	////////////////////////////////////////////////////////////////	
?> 
</tr>
</table>
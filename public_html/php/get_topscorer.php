<?
include("../php/dbconnect.php");// Include for DataBase connection details
?>

<?			
// form to show scorer
echo "<form name='showscorer' action='../players/show_player.php' method='post'>
	  <input type='hidden' name='id' value='0'></form>";
?>

<table align='center'>
	<tr>
		<td></td><td>Jugador</td><td>Equipo</td>
		<td>Total</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
		<td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
	</tr>
	
	

<?
	// Main structure of SQL sentence
	$myquery_general = "SELECT scorerid, COUNT( idgoals ) FROM goals";
	
	// Initializing variables for constructing proper SQL sentence parts
	$myquery = "";
	$first = true;
	if (($_POST['id_season'] != 0) || ($_POST['id_country'] != 0) || ($_POST['id_region'] != 0) || ($_POST['id_division'] != 0) || ($_POST['id_group'] != 0))
	{
		$myquery = $myquery. " WHERE ";
		
		// season
		if ($_POST['id_season'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "season='". $_POST['id_season']. "'";
			}
			else
			{
				$myquery = $myquery. " AND season='". $_POST['id_season']. "'";
			}
		}
		
		//country
		if ($_POST['id_country'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "country='". $_POST['id_country']. "'";
			}
			else
			{
				$myquery = $myquery. " AND country='". $_POST['id_country']. "'";
			}
		}
		
		//region
		if ($_POST['id_region'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "region='". $_POST['id_region']. "'";
			}
			else
			{
				$myquery = $myquery. " AND region='". $_POST['id_region']. "'";
			}
		}
		
		//division
		if ($_POST['id_division'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "division='". $_POST['id_division']. "'";
			}
			else
			{
				$myquery = $myquery. " AND division='". $_POST['id_division']. "'";
			}
		}
		
		//group
		if ($_POST['id_group'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "groupid='". $_POST['id_group']. "'";
			}
			else
			{
				$myquery = $myquery. " AND groupid='". $_POST['id_group']. "'";
			}
		}
		
		//club
		if ($_POST['id_club'] != 0)
		{
			if ($first)
			{
				$first = false;
				$myquery = $myquery. "scorer_clubid='". $_POST['id_club']. "'";
			}
			else
			{
				$myquery = $myquery. " AND scorer_clubid='". $_POST['id_club']. "'";
			}
		}
		
	}
	$myquery_general = $myquery_general. $myquery;
	$myquery_general = $myquery_general. " GROUP BY scorerid ORDER BY COUNT( idgoals ) DESC LIMIT 0 , 10";
	
	$result = mysql_query($myquery_general) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			// Display information
			echo "<tr>";
			$result_player = mysql_query("SELECT * FROM players WHERE players.idplayers=". $r['scorerid']) or die(mysql_error());
			$num_player=mysql_numrows($result_player);
			$r_player = mysql_fetch_array( $result_player );
			//////////////////////////////////////////////////////
			
			// Player's picture
			if ($r_player['picture'] !="")
			{
				echo "<td><img height='50' width='50' src='../images/players/". $r_player['picture']. "'></td>";
			}
			else
			{
					echo "<td><img height='50' width='50' src='../images/players/no_picture.jpg'></td>";
			}
			// Player's name
			echo "<td><a onclick='show_player(". $r_player['idplayers']. ")'>". $r_player['first_name']. " ". $r_player['last_name']. "</a></td>";
			
			// Player's club
			$result_club = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r_player['clubid']) or die(mysql_error());
			$num_club=mysql_numrows($result_club);
			$r_club = mysql_fetch_array( $result_club );
			echo "<td>". $r_club['club_name']. "</td>";
			
			// Player Total goals according to selection
			echo "<td>". $r['COUNT( idgoals )']. "</td>";
			
			// 1. Left foot goals
			// first prepare the SQL sentence
			$myquery_gt = "SELECT scorerid, COUNT( idgoals ) FROM goals";
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='left_foot'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='right_foot'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='header'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='sliding_header'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='breast'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='bycicle'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='side_bycicle'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='volley'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='pk'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='fk'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='ck'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='knee'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='back_foot'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='side_foot'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			$myquery_gt = $myquery_gt. $myquery;
			if ($first)
			{
				$myquery_gt = $myquery_gt. " WHERE ";
			}
			else
			{
				$myquery_gt = $myquery_gt. " AND ";
			}
			$myquery_gt = $myquery_gt. "goal_type='other'";
			$myquery_gt = $myquery_gt. " AND scorerid=". $r['scorerid'];
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
			
			echo "</tr>";
			
		}
		
			
?> 

</table>
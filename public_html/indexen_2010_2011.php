<?php

include("php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database


//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)

include("php/headeren.php");// Include for header content
?>
	
	<div  class="logo">igolgol</div>
	<br>
	
	<script language="JavaScript" type="text/javascript" src="js/common.js">
	
		google_track();
		
	</script>

<?
// Construct season string depending in today's date
$my_t=getdate(date("U"));
if ($my_t[mon] < 8)
{
	// season is year -1 to year
	$season_start = $my_t[year] - 1;
	$season_end = $my_t[year];
}
else
{
	// season is year to year + 1
	$season_start = $my_t[year];
	$season_end = $my_t[year] + 1;
}
$season = $season_start . "/" . $season_end;

?>

	<div class='clubid'>
		<a href='#' onclick='show_club(14)'><img src='images/club_logos/de meer.jpg'></a>
	</div>

	<div class='toptenhits'>
<big><dfn><b>Season <? echo $season; ?>, fixture 18 </dfn></b></big><br><br>

	<table>
		<tr>
			<td colspan=2>
				<em>Sunday, 27th February 2011 11:30am @ RKAV </em><br>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>RKAV</big></b>
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td>
				<big>vs</big>
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td>
				<big><b>De Meer</big></b>
			</td>
			<td>
				
			</td>
		</tr>
	</table><br>
	
	- Click on "View Squad" to see the list of players.<br>
	- All the information about our opponents available! Click on "Season 2010/2011" to see it
	
	<br>
	<br>
	
	<hr>
	
	<table>
		<tr>
			<td colspan=2>
				<em>Latest Results:</em><br>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 17 - February 20, 2011:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<b>De Meer <big>1 - 1</big> Tos Actief</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 16 - February 13, 2011:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>De Meer <big>1 - 4</big> Geuzen'Meer </big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 15 - February 6, 2011:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="blue"><b>FIT <big>1 - 2</big> De Meer </big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 14 - January 30, 2011: game cancelled</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 13 - January 23, 2011:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="blue"><b>De Meer <big>5 - 3</big> Overamstel </big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 12 - January 16, 2011:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>Swift <big>8 - 2</big> De Meer </big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 11 - November 21, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<b>Jos Watergraafsmeer <big>2 - 2</big> De Meer</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 10 - November 14, 2010: game cancelled</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 9 - November 7, 2010: game cancelled</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 8 - October 31, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>De Meer <big>1 - 2</big> FC Weesp</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 7 - October 24, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>De Meer <big>1 - 5</big> Swift</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 6 - October 17, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>WV-HEDW <big>7 - 0</big> De Meer</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 5 - October 10, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<b>De Meer <big>2 - 2</big> SDZ</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 4 - October 3, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="blue"><b>Tos Actief <big>1 - 2</big> De Meer</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 3 - September 26, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="blue"><b>De Meer <big>3 - 0</big> FIT</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 2 - September 19, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>Diemen <big>3 - 2</big> De Meer</big></b></font>
			</td>
		</tr>
		<tr>
			<td>
				<big><b>Fixture 1 - September 12, 2010:</big></b>
			</td>
		</tr>
		<tr>
			<td>
				<font color="red"><b>Geuzenmiddenmeer <big>4 - 2</big> De Meer</big></b></font>
			</td>
		</tr>
	</table><br>

</div>

<div class='toptenscorers'>
<big><dfn><b>Top 5 Goal Scorers <? echo $season; ?></dfn></b></big><br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$top3scorer = get_top3scorers();

// print top ten igolgol.com scorers
for ( $i=0; $i<count($top3scorer); $i++ )
{
	print_playerpreview($i+1,$top3scorer[$i]);
	echo "<br><center></center>";
}

?>
	</table>


</div>

<div class='toptenassister'>
<big><dfn><b>Top 5 Goal Assisters <? echo $season; ?></dfn></b></big><br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$top3assister = get_top3assisters();

// print top ten igolgol.com scorers
for ( $i=0; $i<count($top3assister); $i++ )
{
	print_playerpreview($i+1,$top3assister[$i]);
	echo "<br><center></center>";
}

?>

	</table>

</div>
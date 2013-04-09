<?php

include("php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database


//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)


// get clubid
if (isset($_COOKIE['ID_my_site']))
{
	$check = mysql_query("SELECT * FROM users WHERE username = '".$_COOKIE['ID_my_site']."'")or die(mysql_error());
	$info = mysql_fetch_array( $check );
	$clubid = $info[clubid];
}
//else $clubid = -1; // user has no club associated
else $clubid=14;


include("php/headeren.php");// Include for header content
?>
	<div class='preload' id='blanklayer'>
	</div>
	
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
		<a href='#' onclick='show_club(<?echo $clubid; ?>)'><img src='images/club_logos/<? echo get_clublogo($clubid); ?>' height='50px' width='50px'></a>
	</div>

	<div class='toptenhits'>
	<big><dfn><b>
<?
if ($clubid < 0)
{
?>
	Your user has no club assigned. Please contact the administrator...
<?
}
else
{
?>

	<form name="showfixture" action="" enctype="multipart/form-data" method="post">
		<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
		<input type='hidden' name='numfixture' value=''>
		<input type='hidden' name='season' value=''>
	</form>

	Season <? echo $season; ?><br><br>
	<font color="blue">Trainings => Every Tuesday 20:30 - 22<br>Please get there by 20:15 so we can start at 20:30<br>
	</font>
	<br>
	<hr>
<?
	// get fixture information if there is a coming game
	$fixnumber = getnextfixture($clubid);
	if ($fixnumber)
	{
		$result = mysql_query("SELECT * FROM fixtures WHERE fix_number='".$fixnumber."' AND fix_season='". $season . "'")or die(mysql_error());
		$r = mysql_fetch_array($result);
		$fixdate = $r[fix_date];
		$fixtime = $r[fix_time];
		$fixclubhome = $r[fix_club_home];
		$fixclubaway = $r[fix_club_away];
	}

?>
	
Next game: <? echo $fixnumber == 0 ? "No games scheduled" : "Fixture ".$fixnumber; ?></dfn></b></big><br>
<?
	if ($fixnumber)
	{
?>
	<table>
		<tr>
			<td>
				<big><b><em><? echo outputdate($fixdate) . ", " . $fixtime ;?></em></b></big>
			</td>
		</tr>
		<tr>
			<td>
<?
		$address = get_clubaddress($fixclubhome);
?>
				<big><b><em><a href='http://maps.google.com/maps?q=<? echo $address; ?>'>@ <? echo $address; ?></a></em></b></big>
			</td>
		</tr>
		<tr>
			<td>&nbsp </td>
		</tr>	
		<tr>
			<td align='center'>
				<big><b><? echo get_clubname($fixclubhome); ?></big>&nbsp &nbsp &nbsp
				<big><font color='blue'>vs</font></big>&nbsp &nbsp &nbsp
				<big><b><? echo get_clubname($fixclubaway); ?></big></b></b>
			</td>
	</table>
	<br>
<?
	}
?>

	<br>
	
	<hr>
	
	<h3>Latest Results:</h3><br>
		
<?php
// get fixtures
$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $season . "' AND (fix_club_home='".$clubid . "' OR fix_club_away='".$clubid . "') ORDER BY fix_number DESC")or die(mysql_error());
$num=mysql_numrows($result);
while ( $r = mysql_fetch_array($result) )
{
	// print if there are results for the game
	if ($r[fix_goals_away] != "")
	{
?>



	<a href='#' onclick='show_fixture(<? echo $r[fix_number];?>,"<? echo $season;?>")'>
		<big><b>Fixture <? echo $r[fix_number]; ?> - <? echo outputdate($r["fix_date"]);?>:</big></b>
	</a>
	<table>
		<tr>
			<td align='center' width ='125px'>
				<font color="blue"><b><? echo get_clubname($r["fix_club_home"]); ?></font></b>
			</td>
			<td><font color="blue"><b><big><? echo $r[fix_goals_home]; ?></big></b></font></td>
			<td><font color="blue"><b>-</b></td>
			<td><font color="blue"><b><big><? echo $r[fix_goals_away]; ?></big></b></font></td>
			<td align='center' width ='125px'>
				<font color="blue"><b><? echo get_clubname($r["fix_club_away"]); ?></b></font></b>
			</td>
		</tr>
		<tr height='8px'>
		</tr>
	</table>
<?
	}
}
?>		
	<br>

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
<?
}
?>
</div>
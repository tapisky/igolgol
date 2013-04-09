<html>
<?php 

include("../php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/headeren.php");// Include for header content

// get season
$season = $_POST['season'];

// get fixture number
$numfixture = $_POST['numfixture'];

//get club info
$clubid = $_POST['clubid'];
//$club_info = get_clubinfo($clubid);

//get all the info related to the fixture:
$result= mysql_query("SELECT * FROM fixtures 
						   WHERE fix_season='$season'
						   AND (fix_club_home='". $clubid."' OR fix_club_away='". $clubid."')
						   AND fix_number='$numfixture'")or die(mysql_error());

$r = mysql_fetch_array($result);

//fixture date
$date = $r["fix_date"];

//fixture time
$time = $r["fix_time"];

// home club
$club_home = $r["fix_club_home"];

// away club
$club_away = $r["fix_club_away"];

// home goals
$goals_home = $r["fix_goals_home"];

// away goals
$goals_away = $r["fix_goals_away"];

?>

<script type="text/javascript">
<!--//

//-->
</script>

	<div id='fixturedetails' class='fixturedetails'>
	
		<center><h2>Season <? echo getcurrentseason();?>: Fixture <? echo $numfixture; ?></h2>
		<? echo outputdate($date);?> - <? echo $time;?></center>
		<br>
		<br>

	<table align='center'>
		<tr>
			<td align='left' width=235px><h2><? echo get_clubname($club_home);?></h2></td>
			<td><h2><em><b><? echo $goals_home; ?></em></b></h2></td>
			<td align='center' width=20px><h2>-</h2></td>
			<td><h2><em><b><? echo $goals_away; ?></em></b></h2></td>
			<td align='right' width=235px><h2><? echo get_clubname($club_away);?></h2></td>
		</tr>
		<tr>
			<td align='left'>
<?
// get goals scored
	$result_goals = mysql_query("SELECT scorerid,assisterid FROM goals 
						   WHERE season='$season'
						   AND (away_clubid='". $clubid."' OR home_clubid='". $clubid."')
						   AND fixture_num='$numfixture'")or die(mysql_error());
// if home club is the user's club
if ($clubid == $club_home)
{
	while ( $r_goals = mysql_fetch_array($result_goals) )
	{
		// add goal scorer and assister if exists
		if ($r_goals["assisterid"] != "30")
		{
			echo "<p><em><b><a href='#' onclick='show_player(".$r_goals["scorerid"].")'>". get_playername($r_goals["scorerid"]) . "</a> (<a href='#' onclick='show_player(".$r_goals["assisterid"].")'>" . get_playername($r_goals["assisterid"]) . "</a>)</em></b></p>";
		}
		else
		{
			echo "<p><em><b><a href='#' onclick='show_player(".$r_goals["scorerid"].")'>". get_playername($r_goals["scorerid"]) . "</a></em></b></p>";		
		}
	}
}
?>


			</td>
			
			<td></td>
			<td></td>
			<td></td>
			
			<td align='right'>
<?
if ($clubid == $club_away)
{
	while ( $r_goals = mysql_fetch_array($result_goals) )
	{
		// add goal scorer and assister if exists
		if ($r_goals["assisterid"] != "30")
		{
			echo "<p><em><b><a href='#' onclick='show_player(".$r_goals["scorerid"].")'>". get_playername($r_goals["scorerid"]) . "</a> (<a href='#' onclick='show_player(".$r_goals["assisterid"].")'>" . get_playername($r_goals["assisterid"]) . "</a>)</em></b></p>";
		}
		else
		{
			echo "<p><em><b><a href='#' onclick='show_player(".$r_goals["scorerid"].")'>". get_playername($r_goals["scorerid"]) . "</a></em></b></p>";		
		}
	}
}
?>
			
			</td>
		</tr>	
	</table>
	</div>	
</html>


<html>



<?php 

include("../php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/headeren.php");// Include for header content

// get player's details
$result = mysql_query("SELECT * FROM players WHERE players.idplayers=". $_POST["id"]) or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array( $result );

//get club info
$result2 = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["clubid"]) or die(mysql_error());
$num2=mysql_numrows($result2);
$r2 = mysql_fetch_array( $result2 );

?>

	<div id='playerpos' class='playerposition'>
	
		<br><br><br><br><br>
		<table align='center'>
			<tr>
				<td>
					<img class='posimage' src='../images/graphics/positions/<?php echo $r["position"]; ?>.jpg'>
				</td>
			</tr>
		</table>

	</div>
	
	<div id='playerstats' class='playerstats'>
	
		<h2>Player stats this season</h2>
		<br>
		<table align='center'>
			<tr>
			
			
			</tr>
			<tr>
			
			
			</tr>
		</table>
	
	</div>
	
	<div id='playerdetails' class='playerdetails'>

	<h1><? echo $r["first_name"]. " ". $r["last_name"];?></h1>
	
	<table>
	
		<tr>
			<td>
<?
if ($r["picture"] != "")
{
	echo "<img height='140' width='140' src='http://www.igolgol.com/images/players/" .$r['picture']. "'>";
}
else
{
	echo "<img height='140' width='140' src='http://www.igolgol.com/images/players/no_picture.jpg'>";
}
?>
			</td>
			<td>
<?
if ($r2["logo"] != "")
{
	echo "<img height='45' width='45' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/" .$r2['logo']. "'>";
}
else
{
	echo "<img height='45' width='45' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'>";
}
?>
				<br>
				<a onclick='show_club(<? echo $r["clubid"]; ?>)'><? echo $r2["club_name"];?></a>
			</td>
		</tr>
	</table>

	<br><br>
	
	<table>
		<?/*<tr>
			<td>Gender:</td>
			<td>
				<? if ($r["gender"] == "M")
					{
						echo "Man";
					}
					else
					{
						echo "Woman";
					}
				?>
			</td>
			<td><a href='<? echo $r2["website"];?>'><? echo $r2["website"];?></td>
		</tr>*/?>
		<tr>
			<td></td>
			<td>Nationality:</td>
			<td><? echo $r["nationality"];?></td>
			
			
		</tr>
		<tr>
			<td></td>
			<td>Date of birth:</td>
			<td align='left'><? echo $r["birth_date"];?></td>
			
		</tr>
		<tr>
			<td></td>
			<td>Height:</td>
			<td><? echo $r["height"];?>cm</td>
			
		</tr>
		<tr>
			<td></td>
			<td>Weight:</td>
			<td><? echo $r["weight"];?>kg</td>
		</tr>
		<tr>
			<td></td>
			<td>Stronger foot:</td>
			<td><? if ($r["stronger_foot"] == "l")
					{
						echo "Left foot";
					}
					else if ($r["stronger_foot"] == "r")
					{
						echo "Right foot";
					}
					else
					{
						echo "Both";
					}
				?></td>
		</tr>
		<tr>
			<td></td>
			<td>Main position:</td>
			<td><?switch($r["position"])
					{
						case 'gk':
							echo "Goalkeeper";
							break;
						case 'df':
							echo "Defender";
							break;
						case 'rb':
							echo "Rigth Back";
							break;
						case 'cb':
							echo "Central Defender";
							break;
						case 'lb':
							echo "Left Back";
							break;
						case 'dm':
							echo "Defensive Midfielder";
							break;
						case 'lm':
							echo "Left Midfielder";
							break;
						case 'cm':
							echo "Midfielder";
							break;
						case 'rm':
							echo "Right Midfielder";
							break;
						case 'lw':
							echo "Left Wing";
							break;
						case 'am':
							echo "Attack Midfielder";
							break;
						case 'at':
							echo "Forward";
							break;
						case 'rw':
							echo "Right Wing";
							break;
					}
				?></td>
		</tr>
	</table>
	<br>
	
	<table border=0>
		<tr>
			<td>
<?php 
// include for player's total goals
include("../php/player_goalsen.php");// Include for player goals
?>
			</td>
			<td>
<?php 
// include for player's total assists
include("../php/player_current_season_goalsen.php");// Include for player goals
?>
			</td>
			<td>
<?php 			
echo "<br>";
// include for player's last season total goals
include("../php/player_last_season_goalsen.php");// Include for player assists
?>
			</td>
		</tr>
		<tr>
			<td>
<?php 			
echo "<br>";
// include for player's current season total goals
include("../php/player_assists.php");// Include for player assists
?>
			</td>
			<td>
<?php 			
echo "<br>";
// include for player's current season total assists
include("../php/player_current_season_assists.php");// Include for player assists
?>
			</td>
			<td>
<?php 			
echo "<br>";
// include for player's last season total assists
include("../php/player_last_season_assists.php");// Include for player assists
?>
			</td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td colspan=4>
			Training attendance this season: <b><?php echo getplayerattendance($_POST["id"]); ?></b>
			</td>
		</tr>
	</table>
	</div>
	
</html>
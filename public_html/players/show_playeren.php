

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
$season = getcurrentseason();

// get player's details
$result = mysql_query("SELECT * FROM players WHERE players.idplayers=". $_POST["id"]) or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array( $result );

//get club info
$result2 = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["clubid"]) or die(mysql_error());
$num2=mysql_numrows($result2);
$r2 = mysql_fetch_array( $result2 );

?>

<script type="text/javascript">
<!--//

// function to check the values entered
function checkplayersdetails()
{
	// check date
	// date validation information
	var mdate = new Date();
	s_year= mdate.getFullYear();
	byear = (document.player.year.value != "") && (document.player.year.value > (s_year-100));
	byear = (byear) && (document.player.year.value <= (s_year));
	sdate = document.player.year.value + "-" + document.player.month.value + "-" + document.player.day.value;
	var monthname=new Array("January","February","March","April","May","June","July","August",
		"September","October","November","December")
	var mdate2 = new Date(monthname[document.player.month.value - 1] + " " + Number(document.player.day.value) + "," + document.player.year.value);
	bdate = (byear) && ((mdate2.getMonth() + 1) == (Number(document.player.month.value)));
	if (! bdate)
	{
		document.getElementById('datemsg').innerHTML="  -> Invalid date";
	}
	else
	{
		document.player.date.value = sdate;
	}
	
	// check height
	bheight = (! isNaN(document.player.height.value)) && ((document.player.height.value >= 50) && (document.player.height.value <= 240));
	if (! bheight)
	{
		document.getElementById('heightmsg').innerHTML="  -> Invalid height";
	}

	// check weight
	bweight = (! isNaN(document.player.weight.value)) && ((document.player.weight.value >= 30) && (document.player.weight.value <= 120));
	if (! bweight)
	{
		document.getElementById('weightmsg').innerHTML="  -> Invalid weight";
	}
	
	if ( bdate && bheight && bweight )
	{
		// send form
		document.player.action = "update_player_details.php";
		document.player.submit();
	}
	
}

// function to clear the error message
function clearmsg(id)
{
	document.getElementById(id).innerHTML="";
}

//function to change the pciture when changing position
function change_position()
{
	document.getElementById('pitchpos').src="../images/graphics/positions/" + document.player.position.value + ".jpg";
}

// function to validate the picture
function validate_picture()
{
	document.player.action = "validate_picture.php";
	document.player.submit();
}

// function to create progress bar for attendance
function attprogress(limit)
{
   if (document.images["attbar"].width < limit)
   {
	document.images["attbar"].width += 1;
    document.images["attbar"].height = 12;
   }
   else
   {
    clearInterval(ID);
   }
}

// function to create progress bar for attendance
function playedprogress(limit2)
{
   if (document.images["playedbar"].width < limit2)
   {
	document.images["playedbar"].width += 1;
    document.images["playedbar"].height = 12;
   }
   else
   {
    clearInterval(ID2);
   }
}

// function to create progress bar for goals
function goalsprogress(limit3)
{
   if (document.images["goalsbar"].width < limit3)
   {
	document.images["goalsbar"].width += 1;
    document.images["goalsbar"].height = 12;
   }
   else
   {
    clearInterval(ID3);
   }
}

// function to create progress bar for assists
function assistsprogress(limit4)
{
   if (document.images["assistsbar"].width < limit4)
   {
	document.images["assistsbar"].width += 1;
    document.images["assistsbar"].height = 12;
   }
   else
   {
    clearInterval(ID4);
   }
}

// function to create progress bar for clean sheets
function cleansheetsprogress(limit5)
{
   if (document.images["cleansheetsbar"].width < limit5)
   {
	document.images["cleansheetsbar"].width += 1;
    document.images["cleansheetsbar"].height = 12;
   }
   else
   {
    clearInterval(ID5);
   }
}

//-->
</script>

	<div class='preload' id='blanklayer'>
	</div>
	
	<div id='playerpos' class='playerposition'>
	
		<br><br>
		<table align='center'>
			<tr>
				<td>
					<img id='pitchpos' class='posimage' src='../images/graphics/positions/<?php echo $r["position"]; ?>.jpg'>
				</td>
			</tr>
		</table>

	</div>
	
	<div id='playerstats' class='playerstats'>
	
		<center><h2>Player stats this season</h2></center>
		<br>
		<table align='center' cellpadding=8px>
			<tr>
				<td>
					<img src='../images/graphics/icons/cone.png' width=33 height=33 title='Training attendances'>
				</td>
				<td>
					<b><?php echo (getplayerattendance($_POST["id"]) == "") ? 0:getplayerattendance($_POST["id"]); ?></b>
				</td>
				<td width='150px' style="background-image: url(http://www.igolgol.com/images/graphics/elements/progress_bk.png); background-repeat: no-repeat; background-position: center;">
<?
if (getplayerattendance($_POST["id"]))
{
?>
					<img src="../images/graphics/elements/progress.png" name="attbar" width=1 height=12/>
<?
// calculate attendance percentage
if (totalnumbertrainings($r["clubid"],$season))
{
	$attperc = (getplayerattendance($_POST["id"]) * 150)/ totalnumbertrainings($r["clubid"],$season);
	$avgperc = round ((totalnumbertrainings($r["clubid"],$season)/numberplayers($r["clubid"]))*150/ totalnumbertrainings($r["clubid"],$season));
	if ( $attperc > ($avgperc *1.5) )
	{
		$perc = 150;
	}
	elseif ( ($attperc < ($avgperc*1.5)) && ($attperc >= $avgperc) )
	{
		$perc = round((75*150)/100);
	}
	elseif ( ($attperc < $avgperc) && ($attperc > ($avgperc*0.5) ) )
	{
		$perc = round((40*150)/100);
	}
	elseif ( ($attperc < ($avgperc*0.5)) && ($attperc > 0) )
	{
		$perc = round((10*150)/100);
	}
	else $perc = 0;
}
else $perc = 0;

?>
					<script>
						ID = setInterval("attprogress(<?echo $perc;?>);", 4);
					</script>
				</td>
				<td>
<?
?>
						<em><b><? echo round(($perc*100)/150);?>%</b></em>
				</td>
<?
}
?>
			</tr>
			<tr>
				<td>
					<img src='../images/graphics/icons/played.png' width=27 height=30 title='Games played'>
				</td>
				<td>
					<b><?php echo getgamesplayed($_POST["id"],$r["clubid"]); ?></b>
				</td>
<?
if (numplayedgames($r["clubid"]))
{
	$pergames = round (getgamesplayed($_POST["id"],$r["clubid"])*150/numplayedgames($r["clubid"]));
}
else $pergames = 0;

?>
				<td width='150px' style="background-image: url(http://www.igolgol.com/images/graphics/elements/progress_bk.png); background-repeat: no-repeat; background-position: center;">
					<img src="../images/graphics/elements/progress.png" name="playedbar" width=1 height=12/>
					<script>
						ID2 = setInterval("playedprogress(<? echo $pergames;?>);", 2);
					</script>
				</td>
				<td>
						<em><b><? echo "(".getgamesplayed($_POST["id"],$r["clubid"])."/".numplayedgames($r["clubid"]).")";?></b></em>
				</td>				
			</tr>
			<tr>
				<td>
					<img src='../images/graphics/icons/goals.png' width=26 height=26 title='Goals scored'>
				</td>
				<td>
					<b><?php echo get_goalsthisseason($_POST["id"]); ?></b>
				</td>
				<td width='150px' style="background-image: url(http://www.igolgol.com/images/graphics/elements/progress_bk.png); background-repeat: no-repeat; background-position: center;">
					<img src="../images/graphics/elements/progress.png" name="goalsbar" width=1 height=12/>
<?
if (totalclubgoals($r["clubid"],$season))
{
	$pergoals = round (get_goalsthisseason($_POST["id"])*150/totalclubgoals($r["clubid"],$season));
}
else $pergoals = 0;

?>
					<script>
						ID3 = setInterval("goalsprogress(<? echo $pergoals;?>);", 2);
					</script>
				</td>
				<td>
						<em><b><? echo "(".get_goalsthisseason($_POST["id"])."/".totalclubgoals($r["clubid"],$season).")";?></b></em>
				</td>
			</tr>
			<tr>
				<td>
					<img src='../images/graphics/icons/assists.png' width=30 height=30 title='Assists'>
				</td>
				<td>
					<b><?php echo get_assiststhisseason($_POST["id"]); ?></b>
				</td>
				<td width='150px' style="background-image: url(http://www.igolgol.com/images/graphics/elements/progress_bk.png); background-repeat: no-repeat; background-position: center;">
					<img src="../images/graphics/elements/progress.png" name="assistsbar" width=1 height=12/>
<?
if (totalclubassists($r["clubid"],$season))
{
	$perassists = round (get_assiststhisseason($_POST["id"])*150/totalclubassists($r["clubid"],$season));
}
else $perassists = 0;
?>
					<script>
						ID4 = setInterval("assistsprogress(<? echo $perassists;?>);", 2);
					</script>
				</td>
				<td>
						<em><b><? echo "(".get_assiststhisseason($_POST["id"])."/".totalclubassists($r["clubid"],$season).")";?></b></em>
				</td>
			</tr>
			<tr>
				<td>
					<img src='../images/graphics/icons/clean_sheet.png' width=27 height=27 title='Clean sheets'>
				</td>
				<td>
					<b><?php echo getcleansheets($_POST["id"],$r["clubid"]); ?></b>
				</td>
				<td width='150px' style="background-image: url(http://www.igolgol.com/images/graphics/elements/progress_bk.png); background-repeat: no-repeat; background-position: center;">
					<img src="../images/graphics/elements/progress.png" name="cleansheetsbar" width=1 height=12/>
<?
if (totalclubcleansheets($r["clubid"],$season))
{
	$percleansheets = round (getcleansheets($_POST["id"],$r["clubid"])*150/totalclubcleansheets($r["clubid"],$season));
}
else $percleansheets = 0;
?>
					<script>
						ID5 = setInterval("cleansheetsprogress(<? echo $percleansheets;?>);", 2);
					</script>
				</td>
				<td>
						<em><b><? echo "(".getcleansheets($_POST["id"],$r["clubid"])."/".totalclubcleansheets($r["clubid"],$season).")";?></b></em>
				</td>
			</tr>
			<tr>
			
			
			</tr>
		</table>
	
	</div>
	
	<div id='playerdetails' class='playerdetails'>
	
		<form name="player" action="" enctype="multipart/form-data" method="post">
			<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
			<input type='hidden' name='playerid' value='<? echo $_POST["id"]; ?>'>
			<input type='hidden' name='date' value=''>
			
	<table>
	
		<tr>
			<td rowspan=15>
<?
if ($r["picture"] != "")
{
	echo "<img height='140' class='shadowblur' width='140' src='http://www.igolgol.com/images/players/" .$r['picture']. "'>";
}
else
{
	echo "<img height='140' class='shadowblur' width='140' src='http://www.igolgol.com/images/players/no_picture.jpg'>";
}
?>
			</td>
			<td>
<?
if ($r2["logo"] != "")
{
	echo "<img height='35' width='35' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/" .$r2['logo']. "'>";
}
else
{
	echo "<img height='35' width='35' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'>";
}
?>
			</td>
			<td>
				<h1><? echo $r["first_name"];?></h1>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<h1><? echo $r["last_name"];?></h1>
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
			<td>
				Club:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		// add clubs combobox
		echo "<td>";
		// get all clubs
		$result_clubs = mysql_query("SELECT idclubs,club_name FROM clubs ORDER BY club_name")or die(mysql_error());
		$num_clubs=mysql_numrows($result_clubs);
		echo "<select name='club'>";
		if (! $r["clubid"])
		{
			echo "<option value='' selected>No club</option>";
		}
		else
		{
			echo "<option value=''>No club</option>";
			echo "<option value='" . $r["clubid"] . "' selected>" . get_clubname($r["clubid"]) . "</option>";
		}
		while ( $r_clubs = mysql_fetch_array($result_clubs) )
		{
			echo "<option value='". $r_clubs["idclubs"] ."'>". get_clubname($r_clubs["idclubs"]) . "</option>";
		}

		echo "</select>";
		echo "</td>";
	}
}
else
{
?>
			<td>
				<a href="#" onclick='show_club(<? echo $r["clubid"]; ?>)'><? echo $r2["club_name"];?></a>
			</td>
<?
}
?>
				
		</tr>
		<tr>
			<td></td>
			<td>Nationality:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// print nationalities combobox
		create_nations($r["nationality"]);
		echo "</td>";
	}
}
else
{
?>
			<td><? echo $r["nationality"];?></td>
<?
}
?>
		</tr>
		<tr>
			<td></td>
			<td>Date of birth:</td>
<?
// get the birth day date into separated variables
$bdayyear = substr($r["birth_date"],0,4);
$bdaymonth = substr($r["birth_date"],5,2);
$bdayday = substr($r["birth_date"],8,2);

if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
?>
			<select name='day' onclick='clearmsg("datemsg")'>
<?
			for ( $i=1;$i<=31;$i++ )
				if ( $i == (int)$bdayday )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			echo "</select>";
?>
			<select name='month' onclick='clearmsg("datemsg")'>
<?
			for ( $i=1;$i<=12;$i++ )
				if ( $i == (int)$bdaymonth )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			echo "</select>";

?>
			<select name='year' onclick='clearmsg("datemsg")'>
<?
			$my_t = getdate(date("U"));
			$year = $my_t[year];
			
			for ( $i=($year-60);$i<=($year-4);$i++ )
			{
				if ( $i == (int)$bdayyear )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			}
			echo "</select>";
			echo "<font color='red'><em id='datemsg'></em></font>";
			echo "</td>";

?>

<?
	}
}
else
{
?>
			<td align='left'><? echo outputdate($r["birth_date"]);?></td>
<?
}
?>			
		</tr>
		<tr>
			<td></td>
			<td>Height:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// height text filed
		echo "<input type='text' size='2' name='height' value='" . $r["height"] . "' onfocus='clearmsg(\"heightmsg\")'> cm";
		echo "<font color='red'><em id='heightmsg'></em></font>";
		echo "</td>";
	}
}
else
{
?>
			<td><? echo $r["height"];?> cm</td>
<?
}
?>		
		</tr>
		<tr>
			<td></td>
			<td>Weight:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// height text filed
		echo "<input type='text' size='2' name='weight' value='" . $r["weight"] . "' onfocus='clearmsg(\"weightmsg\")'> kg";
		echo "<font color='red'><em id='weightmsg'></em></font>";
		echo "</td>";
	}
}
else
{
?>
			<td><? echo $r["weight"];?> kg</td>
<?
}
?>
		</tr>
		<tr>
			<td></td>
			<td>Stronger foot:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
?>
		<td>
			<select name="strongerfoot">
				<option value="r" <?php echo ( $r["stronger_foot"] == "r" )? "selected":"" ?>>Right foot</option>
				<option value="l" <?php echo ( $r["stronger_foot"] == "l" )?"selected":"" ?>>Left foot</option>
				<option value="lr" <?php echo ( $r["stronger_foot"] == "lr" )?"selected":"" ?>>Both</option>
			</select>
		</td>
<?
	}
}
else
{
?>
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
<?
}
?>
		</tr>
		<tr>
			<td></td>
			<td>Main position:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
?>
			<td>
				<select name="position" onchange='change_position()'>
					<option value="gk" <?php echo ( $r["position"] == "gk" )?"selected":"" ?>>Goalkeeper</option>
					<option value="df" <?php echo ( $r["position"] == "df" )?"selected":"" ?>>Defender</option>
					<option value="lb" <?php echo ( $r["position"] == "lb" )?"selected":"" ?>>Left back</option>
					<option value="cb" <?php echo ( $r["position"] == "cb" )?"selected":"" ?>>Central Back</option>
					<option value="rb" <?php echo ( $r["position"] == "rb" )?"selected":"" ?>>Rigth back</option>
					<option value="dm" <?php echo ( $r["position"] == "dm" )?"selected":"" ?>>Defensive midfielder</option>
					<option value="lm" <?php echo ( $r["position"] == "lm" )?"selected":"" ?>>Left midfielder</option>
					<option value="cm" <?php echo ( $r["position"] == "cm" )?"selected":"" ?>>Midfielder</option>
					<option value="rm" <?php echo ( $r["position"] == "rm" )?"selected":"" ?>>Right midfielder</option>
					<option value="am" <?php echo ( $r["position"] == "am" )?"selected":"" ?>>Attacking midfielder</option>
					<option value="lw" <?php echo ( $r["position"] == "lw" )?"selected":"" ?>>Left wing</option>
					<option value="at" <?php echo ( $r["position"] == "at" )?"selected":"" ?>>Forward</option>
					<option value="rw" <?php echo ( $r["position"] == "rw" )?"selected":"" ?>>Right wing</option>
				</select>
			</td>
<?
	}
}
else
{
?>
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
<?
}
?>
		</tr>

<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to add button to save changes
{
	if ( $info["type"] < 2 )
	{
		echo "<tr>";
		echo "<td align='center' colspan=3>";
		// add edit player button
		echo "<input type='button' value='Save changes' onclick='checkplayersdetails()'>";
		echo "</td>";
		echo "</tr>";
	}
}
?>
	</table>
	
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to add button to save changes
{
	if ( $info["type"] < 2 )
	{
?>
	<table>
		<tr>
			<td>Change picture:</td>
			<td><input type="file" name="picture" id="picture" maxlength="45" size="20" value="Select file" accept="image/gif, image/jpeg, image/png"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='button' value='Upload picture' onclick='validate_picture()'>
		</tr>	
	</table>
<?
	}
}
?>
	</form>
	<br>
	
<?php
// include for player's last season total goals
include("../php/player_last_season_goalsen.php");// Include for player assists
echo "<br>";
// include for player's last season total assists
include("../php/player_last_season_assists.php");// Include for player assists
echo "<br>";
// include for player's total goals
include("../php/player_goalsen.php");// Include for player goals
echo "<br>";
// include for player's current season total goals
include("../php/player_assists.php");// Include for player assists
echo "<br>";
?>
	<br>
	</div>
	
</html>
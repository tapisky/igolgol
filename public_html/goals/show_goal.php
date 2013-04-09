<html>
<?php 
// filename: upload_player_success.php

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/header.php");// Include for header content


// 30 is the id in the data base for blank players
$blank_player = "30";

// get goal info
$result = mysql_query("SELECT * FROM goals WHERE goals.idgoals=". $_POST["id"]) or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array( $result );

// get country info
$result_country = mysql_query("SELECT * FROM countries WHERE idcountries=". $r["country"]) or die(mysql_error());
$num_country=mysql_numrows($result_country);
$r_country = mysql_fetch_array( $result_country );

// get region info
$result_region = mysql_query("SELECT * FROM regions WHERE idregion=". $r["region"]) or die(mysql_error());
$num_region=mysql_numrows($result_region);
$r_region = mysql_fetch_array( $result_region );

// get division info
$result_division = mysql_query("SELECT * FROM divisions WHERE iddivisions=". $r["division"]) or die(mysql_error());
$num_division=mysql_numrows($result_division);
$r_division = mysql_fetch_array( $result_division );

// get group info
$result_group = mysql_query("SELECT * FROM groups WHERE idgroups=". $r["groupid"]) or die(mysql_error());
$num_group=mysql_numrows($result_group);
$r_group = mysql_fetch_array( $result_group );


// get home club info
$result_home = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["home_clubid"]) or die(mysql_error());
$num_home=mysql_numrows($result_home);
$r_home = mysql_fetch_array( $result_home );


// get away club info
$result_away = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["away_clubid"]) or die(mysql_error());
$num_away=mysql_numrows($result_away);
$r_away = mysql_fetch_array( $result_away );


// get scoring club info
$result_scoring = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["scorer_clubid"]) or die(mysql_error());
$num_scoring=mysql_numrows($result_scoring);
$r_scoring = mysql_fetch_array( $result_scoring );


// get scorer info
$result_scorer = mysql_query("SELECT * FROM players WHERE players.idplayers=". $r["scorerid"]) or die(mysql_error());
$num_scorer=mysql_numrows($result_scorer);
$r_scorer = mysql_fetch_array( $result_scorer );


// get assister info
$result_assister = mysql_query("SELECT * FROM players WHERE players.idplayers=". $r["assisterid"]) or die(mysql_error());
$num_assister=mysql_numrows($result_assister);
$r_assister = mysql_fetch_array( $result_assister );

// Update the number of hits by incrementing 'num_hits' by 1
$hits = $r["num_hits"] + 1;
$result_update = mysql_query("UPDATE goals SET num_hits=". $hits. " WHERE idgoals=". $_POST["id"]) or die(mysql_error());


//Display information
?>

<html>
    <head>
     
        <title>Ver Gol</title>
    
    </head>
    
    <body>
	
	<div class='goaldetails'>
	
		<table align=center>
		
			<tr>
				
				<td colspan=7><b><? echo $r_country["country_name"]; ?> - <? echo $r_region["region_name"]; ?> - <? echo $r_division["division_name"]; ?> - <? echo $r_group["group_name"]; ?></b>
				</td>
			</tr>
			
			<tr>
				<td colspan=7><b>Temporada <? echo $r["season"]; ?></b> - <? echo $r["goal_date"]; ?> - Jornada <b><? echo $r["fixture_num"]; ?></b>
				</td>
			</tr>
			
			<tr>
				<td align=center rowspan=2>
<?
if ($r_home["logo"] != "")
{
	echo "<a onclick='show_club(". $r["home_clubid"]. ")'><img height='75' width='75' src='http://www.igolgol.com/images/club_logos/" .$r_home['logo']. "'></a>";
}
?>		
				</td>
				<td align=center><? echo "<b><a onclick='show_club(". $r["home_clubid"]. ")'>". $r_home["club_name"]. "</b></a>"; ?></td>
				<td align=center><? echo " - " ?></td>
				<td align=center><? echo "<b><a onclick='show_club(". $r["away_clubid"]. ")'>". $r_away["club_name"]. "</b></a>"; ?></td>
				<td align=center rowspan=2>
<?
if ($r_away["logo"] != "")
{
	echo "<a onclick='show_club(". $r["away_clubid"]. ")'><img height='75' width='75' src='http://www.igolgol.com/images/club_logos/" .$r_away['logo']. "'></a>";
}
?>
				</td>
			</tr>
			
			<tr>
				<td align=center><b><? echo $r["goals_home"]; ?></b></td>
				<td></td>
				<td align=center><b><? echo $r["goals_away"]; ?></b></td>
			</tr>
			<tr>
				<td colspan=7 align=center>(despu&eacute;s del gol)</td>
			</tr>
			<tr>
				<td colspan=7><hr></td>
			
			<tr>
				<td colspan=7><b>Gol</b> de <b><a onclick='show_club(<? echo $r["scorer_clubid"]; ?>)'><? echo " ". $r_scoring["club_name"]; ?></a></b> en el minuto <? echo $r["minute"]; ?>
				</td>
			</tr>
			
			<tr>
				<td colspan=7>Marcado por <b><a onclick='show_player(<? echo $r["scorerid"]; ?>)'><? echo " ". $r_scorer["first_name"]. " ". $r_scorer["last_name"];?></a></b>
				</td>
			</tr>

<?
if ($r["assisterid"] != $blank_player )
{
?>		
			<tr>
				<td colspan=7>Pase de <b><a onclick='show_player(<? echo $r["assisterid"]; ?>)'><? echo " ". $r_assister["first_name"]. " ". $r_assister["last_name"];?></a></b>
				</td>
			</tr>
<?
}
?>
			<tr>
				<td colspan=7>Tipo de gol: 
<?
switch ($r["goal_type"])
{
	case "left_foot":
		echo "Pie izquierdo";
		break;
	case "right_foot":
		echo "Pie derecho";
		break;
	case "header":
		echo "Cabeza";
		break;
	case "sliding_header":
		echo "Plancha";
		break;
	case "breast":
		echo "Pecho";
		break;
	case "bycicle":
		echo "Chilena/Tijera";
		break;
	case "side_bycicle":
		echo "Media chilena";
		break;
	case "volley":
		echo "Volea";
		break;
	case "pk":
		echo "Penalty";
		break;
	case "fk":
		echo "Falta directa";
		break;
	case "ck":
		echo "Corner";
		break;
	case "knee":
		echo "Rodilla";
		break;
	case "back_foot":
		echo "Tacon";
		break;
	case "side_foot":
		echo "Espuela";
		break;
	case "other":
		echo "Otro";
		break;
}
?>
				
				</td>
			</tr>
			
			<tr>
				<td colspan=7><b>Gol</b> visto <b><? echo $hits; ?></b> 
<? if ($hits > 1)
{
	echo "veces";
}
else
{
	echo "vez";
}
?>
				</td>
			</tr>
			
		</table>
		
<?
	// Get the id of the video. We need it to create the correct embeded object for you tube
	$video = $r["video_link"];
	$index = strrpos($video, "=");
	$video_value = trim(substr($video,$index+1));
?>
		<center>
		<object width="425" height="344">
			<param name="movie" value="http://www.youtube.com/v/<? echo $video_value; ?>&hl=en&fs=1&rel=0&color1=0x2b405b&color2=0x6b8ab6"></param>
			<param name="allowFullScreen" value="true"></param>
			<param name="allowscriptaccess" value="always"></param>
			<embed src="http://www.youtube.com/v/<? echo $video_value; ?>&hl=en&fs=1&rel=0&color1=0x2b405b&color2=0x6b8ab6" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed>
		</object>
		</center>
	</div>
    </body>
</html>
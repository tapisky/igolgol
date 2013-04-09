<html>
<?php 

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/header.php");// Include for header content

// get player's details
$result = mysql_query("SELECT * FROM players WHERE players.idplayers=". $_POST["id"]) or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array( $result );

//get club info
$result2 = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r["clubid"]) or die(mysql_error());
$num2=mysql_numrows($result2);
$r2 = mysql_fetch_array( $result2 );

?>

	

    
	<center><font color=white>Ficha de Jugador</font></center>

	<div id='playerdetails' class='playerdetails'>

		<table>
		
			<tr>
				<td rowspan="9">
<?
if ($r["picture"] != "")
{
	echo "<img height='250' width='250' src='http://www.igolgol.com/images/players/" .$r['picture']. "'>";
}
else
{
	echo "<img height='100' width='100' src='http://www.igolgol.com/images/players/no_picture.jpg'>";
}
?>				
				</td>
				<td colspan=2 rowspan=2><h2><p class='playername'><? echo $r["first_name"]. " ". $r["last_name"];?></p></h2></td>
				<td rowspan="3">
<?
if ($r2["logo"] != "")
{
	echo "<img height='100' width='100' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/" .$r2['logo']. "'>";
}
else
{
	echo "<img height='100' width='100' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'>";
}
?>				
				</td>
			</tr>
			<tr>
				<td><a onclick='show_club(<? echo $r["clubid"]; ?>)'><? echo $r2["club_name"];?></a></td>
			</tr>
			<tr>
				<td>Sexo:</td>
				<td>
					<? if ($r["gender"] == "M")
						{
							echo "Var&oacute;n";
						}
						else
						{
							echo "Mujer";
						}
					?>
				</td>
				<td><a href='<? echo $r2["website"];?>'><? echo $r2["website"];?></td>
			</tr>
			<tr>
				<td>Pa&iacute;s de origen:</td>
				<td><? echo $r["nationality"];?></td>
				<td rowspan=6><img src='../images/graphics/positions/<?php echo $r["position"]; ?>.jpg' height='150' width='110'></td>
				
			</tr>
			<tr>
				<td>Fecha de nacimiento:</td>
				<td><? echo $r["birth_date"];?></td>
				
			</tr>
			<tr>
				<td>Altura:</td>
				<td><? echo $r["height"];?>cm</td>
				
			</tr>
			<tr>
				<td>Peso:</td>
				<td><? echo $r["weight"];?>kg</td>
			</tr>
			<tr>
				<td>Zurdo/Diestro:</td>
				<td><? if ($r["stronger_foot"] == "l")
						{
							echo "Zurdo";
						}
						else if ($r["stronger_foot"] == "r")
						{
							echo "Diestro";
						}
						else
						{
							echo "Ambidiestro";
						}
					?></td>
			</tr>
			<tr>
				<td>Posici&oacute;n principal:</td>
				<td><?switch($r["position"])
						{
							case 'gk':
								echo "Portero";
								break;
							case 'df':
								echo "Defensa";
								break;
							case 'rb':
								echo "Lateral Derecho";
								break;
							case 'cb':
								echo "Defensa Central";
								break;
							case 'lb':
								echo "Lateral Izquierdo";
								break;
							case 'dm':
								echo "Medio Centro";
								break;
							case 'lm':
								echo "Centrocampista Izquierdo";
								break;
							case 'cm':
								echo "Centrocampista";
								break;
							case 'rm':
								echo "Centrocampista Derecho";
								break;
							case 'lw':
								echo "Extremo Izquierdo";
								break;
							case 'am':
								echo "Media Punta";
								break;
							case 'at':
								echo "Delantero";
								break;
							case 'rw':
								echo "Extremo Derecho";
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
include("../php/player_goals.php");// Include for player goals
?>
			</td>
			<td>
<?php 
// include for player's total assists
include("../php/player_current_season_goals.php");// Include for player goals
?>
			</td>
			<td>
<?php 			
echo "<br>";
// include for player's last season total goals
include("../php/player_last_season_goals.php");// Include for player assists
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
	</div>

</html>
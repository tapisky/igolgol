<?php 
/*
Goal test
*/
?>

<html>

<?php 

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/header.php");// Include for header content

// get club info
$clubid = $_POST['id'];
$club_info = get_clubinfo($clubid);
?>


	<div id='clubdetails' class='clubdetails'>
			<table align='left'>

				<tr>
					<td rowspan=3>
<?
if ($club_info["logo"] == "")
{
?>
					<img width='100' height='100' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td>
<?
}
else
{
?>
					<img width='100' height='100' src='http://www.igolgol.com/images/club_logos/<?php echo $club_info["logo"]; ?>'></td>
<?
}
?>
					<td><b><p class='clubname'><?php echo $club_info["club_name"]; ?></p></b></td>
				</tr>
				<tr>
					<td><a href='<?php echo $club_info["website"]; ?>'><?php echo $club_info["website"]; ?></a></td>
				</tr>
			</table>
	</div>
	
	<div id='clubplayers' class='clubplayersright'>
	
<?php 
// get club players in an array
$players_array = getclubplayers($clubid);
?>
		<table align='center'>
<?php
for ( $i=0; $i<=count($players_array)-1; $i++ )
{
	echo "<tr><td>";
	// position
	echo substr($players_array[$i],0,2);
	echo "</td>";
	// name
	echo "<td>";
	echo "<a onclick='show_player(". substr($players_array[$i],2,strrpos($players_array[$i],".") - 2). ")'>". substr($players_array[$i],strrpos($players_array[$i],".") + 1). "</a>";
	echo "</td>";
	echo "</tr>";
}
?>		
		</table>
	</div>
	

</html>
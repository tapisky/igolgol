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

//get club info
$clubid = $_POST['id'];
$club_info = get_clubinfo($clubid);

?>

<script type="text/javascript">
<!--//

// function to validate the picture
function validate_picture()
{
	document.player.action = "validate_league_info.php";
	document.player.submit();
}

//-->
</script>

	<div id='standings' class='fixturedetails'>
	
		<form name="player" action="" enctype="multipart/form-data" method="post">
			<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
		<center><h2>Season <? echo getcurrentseason();?> standings</h2></center>
		<br>
		<br>
<?
		// construct season with underscores
		$thisseason = str_replace("/","_",getcurrentseason());
		$thisclub = str_replace(" ","_",strtolower(get_clubname($clubid)));
?>
		<center><img src='../images/standings/<? echo $thisseason . "_" . $thisclub; ?>.jpg'></center>
		<br>
		<br>

<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to add button to save changes
{
	if ( $info["type"] < 2 )
	{
?>
	<table align='center'>
		<tr>
			<td>Standings picture:</td>
			<td><input type="file" name="picture" id="picture" maxlength="80" size="20" value="Select file" accept="image/gif, image/jpeg, image/png"></td>
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
	</div>	
</html>
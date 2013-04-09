<?php 
/*
Goal test
*/

include("../php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database

// make a note of the current working directory, relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload form in case we need it
$uploadForm = "show_cluben.php";
////////////////////////////////

// get all players
$result = mysql_query("SELECT idplayers FROM players WHERE clubid=". $_POST[clubid]) or die(mysql_error());
$num=mysql_numrows($result);

// Update table
while($r = mysql_fetch_array( $result ))
{	
	// if checkbox checked
	if ( $_POST[$r["idplayers"]] == "on" )
	{
		$sql="UPDATE players_have_tr_att SET attendance=attendance+1 WHERE player_id=". $r["idplayers"];

		if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}
	}
}
		
// show club
echo "<html><head><script language='JavaScript'>
function show_club()
{
	document.showclub.submit();
}
</script></head><body>";
echo "<form name='showclub' action='show_cluben.php' method='post'>
	  <input type='hidden' name='id' value='" . $_POST[clubid] . "'>
	  </form>";
echo "<script>show_club()</script>";
echo "</body></html>";

?>

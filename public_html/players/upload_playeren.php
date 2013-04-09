<?php
// filename: delete_result_from_fixture.php

// Include for goal php functions
include("../php/phplibraryen.php");
dbconnect(); // connection to database

// make a note of the current working directory, relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload form in case we need it
////////////////////////////////

// avoid sql injection on text fields
$secure_firstname = check_input($_POST[firstname]);
$secure_lastname = check_input($_POST[lastname]);

// Check that the player does not exist already in the databse
$result = mysql_query("SELECT * FROM players WHERE players.first_name=$secure_firstname AND players.last_name=$secure_lastname
	AND players.gender='$_POST[gender]' AND players.nationality='$_POST[nationality]' AND players.birth_date='$_POST[date]'
    AND players.height='$_POST[height]' AND players.weight='$_POST[weight]'") or die(mysql_error());
 
$num=mysql_numrows($result);

if ($num)
{
	echo "The player exists already in the database!";
}
else
{

	$sql="INSERT INTO players (first_name, last_name, gender, nationality, birth_date, height, weight, stronger_foot, position, picture, clubid)
	VALUES
	($secure_firstname,$secure_lastname,'$_POST[gender]','$_POST[nationality]','$_POST[date]','$_POST[height]','$_POST[weight]','$_POST[strongerfoot]','$_POST[position]','','$_POST[clubid]')";

	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		$player_new_id = mysql_insert_id();
		// get the id of the just added player
/*		$result = mysql_query("SELECT idplayers FROM players WHERE players.first_name=$secure_firstname AND players.last_name=$secure_lastname
		   AND players.gender='". $_POST[gender]. "' AND players.nationality='". $_POST[nationality]. "' AND players.birth_date='". $_POST[date]. 
		"' AND players.height=". $_POST[height]. " AND players.weight=". $_POST[weight]. " AND players.stronger_foot='". $_POST[strongerfoot].
		"' AND players.position='". $_POST[position]. "' AND players.clubid=". $_POST[clubid]) or die(mysql_error());
		$num=mysql_numrows($result);
		$r = mysql_fetch_array( $result );


		// execute insert statement
		if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}
		else
		{
*/			// go to show player info again
			echo "<html><head><script language='JavaScript'>
					function show_player()
					{
						document.showplayer.submit();
					}
				</script></head><body>";
			echo "<form name='showplayer' action='show_playeren.php' method='post'>
				  <input type='hidden' name='id' value='" . $player_new_id . "'></form>";
			echo "<script>show_player()</script>";
			echo "</body></html>";
	}
}	

// The following function is an error handler which is used
// to output an HTML error page if the file upload fails
function error($error, $location, $seconds = 5)
{
    header("Refresh: $seconds; URL=\"$location\"");
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."\n".
    '"http://www.w3.org/TR/html4/strict.dtd">'."\n\n".
    '<html lang="en">'."\n".
    '    <head>'."\n".
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."\n\n".
    '        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."\n\n".
    '    <title>Error</title>'."\n\n".
    '    </head>'."\n\n".
    '    <body>'."\n\n".
    '    <div id="Upload">'."\n\n".
    '        <h1>Error</h1>'."\n\n".
    '        <p>A ocurrido un error: '."\n\n".
    '        <span class="red">' . $error . '...</span>'."\n\n".
    '         Redireccionando a Crear Jugador</p>'."\n\n".
    '     </div>'."\n\n".
    '</html>';
    exit;
} // end error handler

?> 
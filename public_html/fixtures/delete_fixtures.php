<?php
// filename: delete_fixtures.php

// Include for goal php functions
include("../php/phplibraryen.php");
dbconnect(); // connection to database

// make a note of the current working directory, relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload form in case we need it
////////////////////////////////

// create season
$current_season = getcurrentseason();

// get fixtures
$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $current_season . "' AND (fix_club_home='".$_POST[clubid] . "' OR fix_club_away='".$_POST[clubid] . "') ORDER BY fix_number")or die(mysql_error());
$num=mysql_numrows($result);

// delete affected records
while($r = mysql_fetch_array( $result ))
{
	// if checkbox checked
	if ( $_POST[$r["fix_number"]] == "on" )
	{
		//delete record
		$sql="DELETE FROM fixtures
			  WHERE
			  fix_number = '$r[fix_number]'
			  AND fix_season = '$current_season'
			  AND (fix_club_home = '$_POST[clubid]' OR fix_club_away = '$_POST[clubid]')";

  	    // execute insert statement
		if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}	  
	}
}

// go to show club info again
echo "<html><head><script language='JavaScript'>
		function show_fixtures()
		{
			document.showfixtures.submit();
		}
	</script></head><body>";
echo "<form name='showfixtures' action='control_fixtures.php' method='post'>
	  <input type='hidden' name='id' value='" . $_POST[clubid] . "'></form>";
echo "<script>show_fixtures()</script>";
echo "</body></html>";

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
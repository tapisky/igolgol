<?php
// filename: add_fixture.php

// Include for goal php functions
include("../php/phplibraryen.php");
dbconnect(); // connection to database

// make a note of the current working directory, relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload form in case we need it
$uploadForm = "create_goal.php";
////////////////////////////////

// create season
$current_season = getcurrentseason();

// retrieve information of the club's division
$div = get_clubdivisioninfo($_POST[clubid]);

// construct sql query
$sql="INSERT INTO fixtures (fix_number, fix_season, fix_date, fix_time, fix_club_home, fix_club_away, fix_country, fix_region, fix_division, fix_group, fix_goals_home, fix_goals_away)
VALUES
('$_POST[fixture_number]','$current_season','$_POST[date]','$_POST[time]','$_POST[home_club]','$_POST[away_club]','$div[country]','$div[region]','$div[division]','$div[group]',null,null)";

// execute insert statement
if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
else
{
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
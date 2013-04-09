<?php
// filename: upload_goalen.php

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

//date
$today = date('Y') . "-". date('m') . "-" .date('d');

// retrieve fixture details
$result = mysql_query("SELECT * FROM fixtures WHERE fix_number='" . $_POST[fixture] . "' AND fix_season='". $current_season . "' AND (fix_club_home='". $_POST[clubid] . "' OR fix_club_away='". $_POST[clubid] . "')")or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array($result);

// construct sql query
$sql="INSERT INTO goals (season, fixture_num, goal_date, goal_type, video_link, num_hits, userid, goals_home, goals_away, scorerid, scorer_clubid, assisterid, away_clubid, home_clubid, minute, country, region, division, groupid)
VALUES
('$current_season','$r[fix_number]','$r[fix_date]','$_POST[goaltype]','','0','1','','','$_POST[scorerid]','$_POST[clubid]','$_POST[assisterid]','$r[fix_club_away]','$r[fix_club_home]','','$r[fix_country]','$r[fix_region]','$r[fix_division]','$r[fix_group]')";

// execute insert statement
if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
else
{
	// go to show club info again
	echo "<html><head><script language='JavaScript'>
			function show_club()
			{
				document.showclub.submit();
			}
		</script></head><body>";
	echo "<form name='showclub' action='../clubs/show_cluben.php' method='post'>
		  <input type='hidden' name='id' value='" . $_POST[clubid] . "'></form>";
	echo "<script>show_club()</script>";
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
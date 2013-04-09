<?php
// filename: upload_goal.php

include("../php/dbconnect.php");// Include for DataBase connection details

// make a note of the current working directory, relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload form in case we need it
$uploadForm = "create_goal.php";
////////////////////////////////

// Check that the goal does not exist already in the databse
$result = mysql_query("SELECT * FROM goals WHERE season='". $_POST[season]."' AND fixture_num=". $_POST[fixture].
 " AND goal_date='". $_POST[date]. "' AND goal_type='". $_POST[goaltype]. "' AND goals_home=". $_POST[goals_home]. 
 " AND goals_away=". $_POST[goals_away]. " AND scorerid=". $_POST[scorer]. " AND scorer_clubid=". $_POST[scoring_club].
 " AND assisterid=". $_POST[assister]. " AND away_clubid=". $_POST[clubaway]. " AND home_clubid=". $_POST[clubhome].
 " AND minute=". $_POST[minute]. " AND country=". $_POST[clubcountry]. " AND region=". $_POST[clubregion].
 " AND division=". $_POST[clubdivision]. " AND groupid=". $_POST[clubgroup]) or die(mysql_error());

$num=mysql_numrows($result);

if ($num != 0)
{
	// Player already exists
	error('El gol ya existe en la base de datos!', $uploadForm);
}
else
{

	
	// check for sql injection on text field "video"
	$secure_video = check_input($_POST[video]);
	$sql="INSERT INTO goals (season, fixture_num, goal_date, goal_type, video_link, num_hits, userid, goals_home, goals_away, scorerid, scorer_clubid, assisterid, away_clubid, home_clubid, minute, country, region, division, groupid)
	VALUES
	('$_POST[season]','$_POST[fixture]','$_POST[date]','$_POST[goaltype]',$secure_video,'0','1','$_POST[goals_home]','$_POST[goals_away]','$_POST[scorer]','$_POST[scoring_club]','$_POST[assister]','$_POST[clubaway]','$_POST[clubhome]','$_POST[minute]','$_POST[clubcountry]','$_POST[clubregion]','$_POST[clubdivision]','$_POST[clubgroup]')";

	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		// get the id of the just added goal
		$result = mysql_query("SELECT idgoals FROM goals WHERE season='". $_POST[season]."' AND fixture_num=". $_POST[fixture].
		" AND goal_date='". $_POST[date]. "' AND goal_type='". $_POST[goaltype]. "' AND goals_home=". $_POST[goals_home]. 
		" AND goals_away=". $_POST[goals_away]. " AND scorerid=". $_POST[scorer]. " AND scorer_clubid=". $_POST[scoring_club].
		" AND assisterid=". $_POST[assister]. " AND away_clubid=". $_POST[clubaway]. " AND home_clubid=". $_POST[clubhome].
		" AND minute=". $_POST[minute]. " AND country=". $_POST[clubcountry]. " AND region=". $_POST[clubregion].
		" AND division=". $_POST[clubdivision]. " AND groupid=". $_POST[clubgroup]) or die(mysql_error());
		$num=mysql_numrows($result);
		$r = mysql_fetch_array( $result );

		// show goal
		echo "<html><head><script language='JavaScript'>
				function show_goal()
				{
					document.showgoal.submit();
				}
			</script></head><body>";
		echo "<form name='showgoal' action='show_goalen.php' method='post'>
			  <input type='hidden' name='id' value='" . $r["idgoals"] . "'>
			  </form>";
		echo "<script>show_goal()</script>";
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

// Function to avoid SQL injection (database attacks)
function check_input($value)
{
// Stripslashes
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// Quote if not a number
if (!is_numeric($value))
  {
  $value = "'" . mysql_real_escape_string($value) . "'";
  }
return $value;
}

?> 
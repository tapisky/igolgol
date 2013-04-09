<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>igolgol-f&uacute;tbol base</title>
<link href="igolgol.css" rel="stylesheet" type="text/css" />
</head>

<?php
include("php/phplibrary.php");// Include for DataBase connection details
dbconnect();
?>

<body>

<table border=1 align="center">
	<tr>
		<td><a href=''>Buscar Jugadores</a></td>
		<td><a href=''>Buscar Equipos</a></td>
		<td><a href=''>Ver/Buscar Goles</a></td>
		<td><a href='goals/list_goals.php'>Tablas de Goleadores</a></td>
		<td><a href=''>Tablas de Pasadores</a></td>
		<td><a href='players/create_player.php'>Crear Jugador</a></td>
		<td><a href='goals/create_goal.php'>Crear Gol</a></td>
	</tr>
</table>
<div  class="logo"><img src="images/logo.png" height="20%" width="20%" /></div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6517397-1");
pageTracker._trackPageview();
} catch(err) {}
</script>


<div class='toptenhits'>
Top 10 Goles m&aacute;s vistos<br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$topten = get_topmostviewed();

// print top ten most viewed goals
for ( $i=0; $i<count($topten); $i++ )
{
	print_goalpreview($topten[$i]);
	echo "<br>";
}

?>

	</table>
</div>

<div class='toptenscorers'>
Top 10 goleadores igolgol.com<br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$toptenscorer = get_toptenscorers();

// print top ten igolgol.com scorers
for ( $i=0; $i<count($toptenscorer); $i++ )
{
	print_playerpreview($toptenscorer[$i]);
	echo "<br>";
}

?>
	</table>


</div>

<div class='toptenassister'>
Top 10 pasadores igolgol.com<br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$toptenassister = get_toptenassisters();

// print top ten igolgol.com scorers
for ( $i=0; $i<count($toptenassister); $i++ )
{
	print_playerpreview($toptenassister[$i]);
	echo "<br>";
}

?>

	</table>


</div>

	
</body>

</html>
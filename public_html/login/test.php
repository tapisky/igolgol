<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

// Connects to Database 
include("../php/dbconnect.php");


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>igolgol-f&uacute;tbol base</title>
<link href="igolgol.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div  class="logo"><img src="images/logo.png"  /></div>
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

<a href=''>1. Buscar Jugadores</a><br>

<a href=''>2. Buscar Equipos</a><br>

<a href=''>3. Ver/Buscar Goles</a><br>

<a href='goals/list_goals.php'>4. Tablas de Goleadores</a><br>

<a href=''>5. Tablas de Pasadores</a><br>

<a href='players/create_player.php'>6. Crear Jugador</a><br>

<a href='goals/create_goal.php'>7. Crear Gol</a>

<div class='toptenhits'>Top 10 Goles m&aacute;s vistos</div>

</body>
</html>

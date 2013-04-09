<?php

include("php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database


//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)

		include("php/header.php");// Include for header content
?>
	
	<div  class="logo">igolgol</div>
	<br>
	
	<script language="JavaScript" type="text/javascript" src="js/common.js">
	
		google_track();
		
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
	print_goalpreview($i+1,$topten[$i]);
	echo "<br><center><hr></center>";
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
	print_playerpreview($i+1,$toptenscorer[$i]);
	echo "<br><center><hr></center>";
}

?>
	</table>


</div>

<div class='toptenassister'>
Top 10 asistentes igolgol.com<br><br>
	<table>
<?php

// get an array containing the top ten most viewed goals
$toptenassister = get_toptenassisters();

// print top ten igolgol.com scorers
for ( $i=0; $i<count($toptenassister); $i++ )
{
	print_playerpreview($i+1,$toptenassister[$i]);
	echo "<br><center><hr></center>";
}

?>

	</table>

</div>
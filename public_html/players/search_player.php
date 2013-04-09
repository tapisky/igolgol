<?php

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/header.php");// Include for header content

?>
	
	<div  class="logo"><img src="../images/logo.png" height="15%" width="15%" /></div>
	
	<script language="JavaScript" type="text/javascript" src="../js/common.js">
	
		google_track();
		
	</script>
			
	<div class='toptenhits'>
	Resultados de la b&uacute;squeda de jugadores<br><br>
	<table>
<?php

// get player search string from POST
$search_string = $_POST['player_name'];

// get an array containing the top ten most viewed goals
$search_array = get_playersearch($search_string);

// print top ten most viewed goals
for ( $i=0; $i<count($search_array); $i++ )
{
	print_playerpreview($search_array[$i]);
	echo "<br>";
}

?>

	</table>
</div>

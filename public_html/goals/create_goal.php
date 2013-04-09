<?php 
/*
Add goal
*/
?>

<html>

<?php 

include("../php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/headeren.php");// Include for header content

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload handler script
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload_goal.php';
?>

		<center>Añadir Gol</center>
			
		<script language="JavaScript" type="text/javascript" src="../js/create_goal.js">
			
			
			
		</SCRIPT>

		<form name="createitem" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
		
<?php

$info = get_userinfo($_COOKIE['ID_my_site']);
switch ($info["type"])
{
	case 1:
		include "create_goal_admin.php";
		break;
	case 2:
		include "create_goal_manager.php";
		break;
	case 3:
		include "create_goal_player.php";
		break;
	default:
		break;
}
?>		

		</form>

</html>
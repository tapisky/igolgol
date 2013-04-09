<?php
// filename: upload_player.php

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

// initialize $picture_uploaded
$picture_uploaded = false;

// fieldname used within the file <input> of the HTML form
$fieldname = 'file';

// avoid sql injection on text fields
$secure_firstname = check_input($_POST[firstname]);
$secure_lastname = check_input($_POST[lastname]);

// Check that the player does not exist already in the databse
$result = mysql_query("SELECT * FROM players WHERE players.first_name=$secure_firstname AND players.last_name=$secure_lastname
	AND players.gender='". $_POST[gender]. "' AND players.nationality='". $_POST[nationality]. "' AND players.birth_date='". $_POST[date]. 
 "' AND players.height=". $_POST[height]. " AND players.weight=". $_POST[weight]. " AND players.stronger_foot='". $_POST[strongerfoot].
 "' AND players.position='". $_POST[position]. "' AND players.clubid=". $_POST[club]) or die(mysql_error());
 
$num=mysql_numrows($result);

if ($num != 0)
{
	// Player already exists
	error('El jugador ya existe en la base de datos!', "../index3.php");
}

// Check that the Maximum number of players in a club is reached (27)
$result = mysql_query("SELECT COUNT(idplayers) FROM players WHERE clubid =". $_POST[club]) or die(mysql_error());
$num=mysql_numrows($result);
$r = mysql_fetch_array($result);
if ( $r["COUNT(idplayers)"] >= 27)
{
	// Maximum number of players in a club reached (27)
	// Get club´s name
	$club_name = get_clubname($_POST[club]);
	error($club_name. " ya est&aacute;n registrados el n&uacute;mero m&aacute;ximo de jugadores permitido por club (27)." , "../index3.php");
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//if we reached this far, the player trying to be uploaded does not exist already and there is a position available in the selected club for him

// if the user wants to upload a picture
if ($_FILES[$fieldname]['name'] !="")
{
	
	// first let's set some variables and check if the picture to be uploaded is valid

	// make a note of the current working directory, relative to root.
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

	// make a note of the directory that will recieve the uploaded file
	$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . '/images/players/';

	// make a note of the location of the upload form in case we need it
	$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . '/players/create_player.php';

	// make a note of the location of the success page
	$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'show_player.php';


	// Now let's deal with the upload

	// possible PHP upload errors
	$errors = array(1 => 'php.ini se ha superado el tamaño maximo de fichero',
	                2 => 'se ha superado el tamaño maximo del formulario html permitido',
	                3 => 'el fichero no se ha podido subir completamente',
	                4 => 'no hay fichero para subir');

	// check the upload form was actually submitted else print the form
	isset($_POST['firstname'])
	    or error('the upload form is neaded', $uploadForm);

	// check for PHP's built-in uploading errors
	($_FILES[$fieldname]['error'] == 0)
	    or error($errors[$_FILES[$fieldname]['error']], $uploadForm);
	    
	// check that the file we are working on really was the subject of an HTTP upload
	@is_uploaded_file($_FILES[$fieldname]['tmp_name'])
	    or error('not an HTTP upload', $uploadForm);
	    
	// validation... since this is an image upload script we should run a check  
	// to make sure the uploaded file is in fact an image. Here is a simple check:
	// getimagesize() returns false if the file tested is not an image.
	@getimagesize($_FILES[$fieldname]['tmp_name'])
	    or error('el fichero elegido no es una imagen', $uploadForm);
	    
	// make a unique filename for the uploaded file and check it is not already
	// taken... if it is already taken keep trying until we find a vacant one
	// sample filename: 1140732936-filename.jpg
	
	// avoid sql injection on text fields
	$secure_lastname = check_input($_POST[lastname]);
	$secure_lastname = str_replace("'","",$secure_lastname);
	
	// get extension of image file
	$position = strrpos($_FILES[$fieldname]['name'],".");
	$ext = substr($_FILES[$fieldname]['name'],$position);
	//echo $_FILES[$fieldname]['tmp_name'];
	//echo "<br>";
	$now = time();
	while(file_exists($uploadFilename = '../images/players/' . $_POST['club'].'-'.$now.'-'.$secure_lastname. $ext))
	{
	    $now++;
	}

	// now let's move the file to its final location and allocate the new filename to it
	@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename)
	    or error('no hay permiso para subir el fichero', $uploadForm);
	    
	// If you got this far, everything has worked and the file has been successfully saved.
	// We are now going to redirect the client to a success page.
	$picture_uploaded = true;
}
// end if user wants to upload a picture
/////////////////////////////////////////////////

// Insert sent data into players table
if (!$picture_uploaded)
{
	$uploadFilename = "";	
}
	
if ($uploadFilename != "")
{
	$uploadFilename = str_replace("../images/players/", "", $uploadFilename);
}

// avoid sql injection on text fields
$secure_firstname = check_input($_POST[firstname]);
$secure_lastname = check_input($_POST[lastname]);

$sql="INSERT INTO players (first_name, last_name, gender, nationality, birth_date, height, weight, stronger_foot, position, picture, clubid)
VALUES
($secure_firstname,$secure_lastname,'$_POST[gender]','$_POST[nationality]','$_POST[date]','$_POST[height]','$_POST[weight]','$_POST[strongerfoot]','$_POST[position]','$uploadFilename','$_POST[club]')";

if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
else
{
	// get the id of the just added player
	$result = mysql_query("SELECT idplayers FROM players WHERE players.first_name=$secure_firstname AND players.last_name=$secure_lastname
	   AND players.gender='". $_POST[gender]. "' AND players.nationality='". $_POST[nationality]. "' AND players.birth_date='". $_POST[date]. 
	"' AND players.height=". $_POST[height]. " AND players.weight=". $_POST[weight]. " AND players.stronger_foot='". $_POST[strongerfoot].
	"' AND players.position='". $_POST[position]. "' AND players.clubid=". $_POST[club]) or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array( $result );

	// insert also in table 'users_have_players'
	$info = get_userinfo($_COOKIE['ID_my_site']);
	$sql = "INSERT INTO users_have_players (userid, playerid)
		    VALUES ('". $info["id"]. "','". $r["idplayers"]. "')";

	$update = mysql_query($sql);
	
	// show added player details
	echo "<html><head><script language='JavaScript'>
			function show_player()
			{
				document.showplayer.submit();
			}
		</script></head><body>";
	echo "<form name='showplayer' action='show_player.php' method='post'>
		  <input type='hidden' name='id' value='" . $r["idplayers"] . "'>
		  </form>";
	echo "<script>show_player()</script>";
	echo "</body></html>";

}

	

// The following function is an error handler which is used
// to output an HTML error page if the file upload fails
function error($error, $location, $seconds = 9)
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
    '        <p>Ha ocurrido un error: '."\n\n".
    '        <span class="red">' . $error . '...</span>'."\n\n".
    '         Redireccionando a igolgol.com</p>'."\n\n".
    '     </div>'."\n\n".
    '</html>';
    exit;
} // end error handler


?> 
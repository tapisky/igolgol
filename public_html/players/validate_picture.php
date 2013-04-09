<?php
// filename: validate_picture.php

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

// initialize $picture_uploaded
$picture_uploaded = false;

// fieldname used within the file <input> of the HTML form
$fieldname = 'picture';


// if the user wants to upload a picture
if ($_FILES[$fieldname]['name'] !="")
{
	
	// first let's set some variables and check if the picture to be uploaded is valid

	// make a note of the current working directory, relative to root.
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

	// make a note of the directory that will recieve the uploaded file
	$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . '/images/players/';

	// make a note of the location of the upload form in case we need it
	$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . '/players/show_playeren.php';

	// make a note of the location of the success page
	$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'show_playeren.php';


	// Now let's deal with the upload

	// possible PHP upload errors
	$errors = array(1 => 'php.ini se ha superado el tamaño maximo de fichero',
	                2 => 'se ha superado el tamaño maximo del formulario html permitido',
	                3 => 'el fichero no se ha podido subir completamente',
	                4 => 'no hay fichero para subir');

	// check the upload form was actually submitted else print the form
	isset($_POST['playerid'])
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
		
		
	// file size <100kb
	filesize ($_FILES[$fieldname]['tmp_name']) < 55000
		or error('file exceeds 50kb',$uploadForm);
	
	// make a unique filename for the uploaded file and check it is not already
	// taken... if it is already taken keep trying until we find a vacant one
	// sample filename: 1140732936-filename.jpg
	
	// get extension of image file
	$position = strrpos($_FILES[$fieldname]['name'],".");
	$ext = substr($_FILES[$fieldname]['name'],$position);
	
	$now = time();
	while(file_exists($uploadFilename = '../images/players/' . $_POST['clubid'].'-'.$now.'-'.$_POST['playerid']. $ext))
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

$sql="UPDATE players SET picture='$uploadFilename'
	  WHERE idplayers='$_POST[playerid]'";

if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
else
{
	// go to show player info again
	echo "<html><head><script language='JavaScript'>
			function show_player()
			{
				document.showplayer.submit();
			}
		</script></head><body>";
	echo "<form name='showplayer' action='show_playeren.php' method='post'>
		  <input type='hidden' name='id' value='" . $_POST[playerid] . "'></form>";
	echo "<script>show_player()</script>";
	echo "</body></html>";

}

// The following function is an error handler which is used
// to output an HTML error page if the file upload fails
function error($error, $location, $seconds = 4)
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
    '        <p>An error occurred: '."\n\n".
    '        <span class="red">' . $error . '...</span>'."\n\n".
    '         Going back...</p>'."\n\n".
    '     </div>'."\n\n".
    '</html>';
    exit;
} // end error handler

?> 
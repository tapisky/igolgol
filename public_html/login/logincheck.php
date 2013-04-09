<?php
//checks cookies to make sure they are logged in 
if(isset($_COOKIE['ID_my_site'])) 
{ 
	$legalok=false;
	$username = $_COOKIE['ID_my_site']; 
	$pass = $_COOKIE['Key_my_site']; 
	$check = mysql_query("SELECT * FROM users WHERE Login_Name = '$username'")or die(mysql_error()); 
	while($info = mysql_fetch_array( $check ) AND !($legalok)) 
	{ 
		
		$info['password'] = md5($info['password']);
		//echo $pass ;
		//echo $info['password'] ;
		//if the cookie has the wrong password, they are taken to the login page 
		if ($pass != $info['password']) 
		{ header("Location: index.php");  //echo "Members Area<p>"; 
		}else{ 
			$legalok = true;
			$empname = $info['EmpName'];
		}
		
	}
}else{ 
//if the cookie does not exist, they are taken to the login screen 
header("Location: index.php"); 
} 
?>
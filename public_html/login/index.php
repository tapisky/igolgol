<?php

include("../php/dbconnect.php");// Include for DataBase connection details


//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))
//if there is, it logs you in and directes you to the members page
{ 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM users WHERE Login_Name = '$username'")or die(mysql_error());
while($info = mysql_fetch_array( $check )) 
{
if ($pass != $info['password']) 
{
}
else
{
header("Location: members.php");

}
}
}

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

//echo "Test" ;

if ($_POST['username1'] != "" )
{
//echo "Test" ;
$username1 =  $_POST['username1'] ;

$check1 = mysql_query("SELECT Login_Name, password, EmpName,EmpEmailId FROM users WHERE Login_Name = '$username1'")or die(mysql_error()); 
while($info1 = mysql_fetch_array( $check1 )) 
{
$email = $info1['EmpEmailId'];
$subject = "NOREPLY: Your TestTeam Password";
$message = $info1['password'] ;
echo "email:$email<br>subject$subject<br>message$message";
mail($email,$subject,$message);
die ('<link rel="stylesheet" type="text/css" href="style.css" />A mail detailing your password has been sent to your mail address<br><a href=index.php><< Back</a>');
}
}

// makes sure they filled in username and password for username
else if(!$_POST['username'] | !$_POST['pass']) {
die('<link rel="stylesheet" type="text/css" href="style.css" />You did not fill in a required field. <br><a href=index.php><< Back</a>');
}
// checks it against the database

//if (!get_magic_quotes_gpc()) {
//$_POST['email'] = addslashes($_POST['email']);
//}
$check = mysql_query("SELECT * FROM users WHERE Login_Name = '".$_POST['username']."'")or die(mysql_error());

//Gives error if user doesn't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
die ('<link rel="stylesheet" type="text/css" href="style.css" />This user does not exist in our database. <br><a href=index.php><< Back</a>');
}
while($info = mysql_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['password'] = stripslashes($info['password']);
$_POST['pass'] = md5($_POST['pass']);
$info['password'] = md5($info['password']);
//gives error if the password is wrong
 
//echo $info['password'];  
//echo $_POST['pass'] ; 


//if remember password has been requested , redirect the user to that page
//if ($_POST['username1'] != $info[]









if ($_POST['pass'] != $info['password']) {
die('<link rel="stylesheet" type="text/css" href="style.css" />Incorrect password, please try again. <br><a href=index.php><< Back</a>');
}

else 

{ 
	//echo "Login Successful! <br />"; 
	// if login is ok then we add a cookie 
	$_POST['username'] = stripslashes($_POST['username']); 
	$hour = time() + 3600; 
	setcookie(ID_my_site, $_POST['username'], $hour); 
	setcookie(Key_my_site, $_POST['pass'], $hour); 

	//then redirect them to the members area 
	header("Location: members.php"); 
}

} 
} 
else 
{ 

// if they are not logged in 
?>
<head>
<title>your testteam Login page</title>
<link rel="shortcut icon" href="favicon.ico">	
</head>
<center>
<link rel="stylesheet" type="text/css" href="style.css" />





	<div class='header'></div>
	<div class='backofficeImg'><div class='backofficeImgletter'>
		<span class='splashtitle'><p><h1>Welcome to <FONT COLOR="#FF3300">your</FONT>&nbsp;TestTeam.<br></p></h1>
		<p>Your TestTeam server for Functional Testing...</p></span>



		<!---Login Form ---->
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<table align="center" class="loginbox" >
		<tr><td colspan=2><h1><FONT SIZE="2">Login</FONT></h1></td></tr> 
		<tr><td><FONT SIZE="2">Username:</FONT></td><td> 
		<input type="text" name="username" maxlength="40"> 
		</td></tr> 
		<tr><td><FONT SIZE="2">Password:</FONT></td><td> 
		<input type="password" name="pass" maxlength="50"> 
		</td></tr> 
		<tr><td colspan="2" align="right"> 
		<input type="submit" name="submit" value="Login"> 
		</td></tr>
		</table> 
		</form>
		<!---Login Form ---->
		<!--Forgot Password Form 
		<form action='<?php// echo $_SERVER['PHP_SELF']?>' method="post">
		<table align="center" class="loginbox">
		<tr><td colspan=2><h1><FONT SIZE="2" COLOR="#FF3300">Forgot Password?</FONT></h1></td></tr> 
		<tr><td><FONT SIZE="2">Username:</FONT></td><td> 
		<input type="text" name="username1" maxlength="40" disabled> 
		<tr><td colspan="2" align="right"> 
		<input type="submit" name="submit" value="Request" disabled> 
		</td></tr>
		</table> 
		</form>
		</center>
		Forgot Password Form -->
		</div>
	</div>
	<div class='footer'><br><img src="images/web/skeletormininobone.png"><br><b>Powered by Skeletor</b></div>
	
	
<?php 
} 

?> 

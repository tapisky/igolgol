<?php 
/*
yourTestTeam php engine
Teammembers module
(c) 2008 TomTomBV 
*/



include("common/dbconnect.php");// Include for DataBase connection details

include("common/logincheck.php");//Include for Login check validation

?>

<head>
<title>Welcome to 'your TestTeam' members area</title>
<link rel="shortcut icon" href="favicon.ico">

<?php
include("common/pagemenu.js");//Include for pagemenu
?>


	
</head>
<TD align="left"></TD>
<link rel="stylesheet" type="text/css" href="style.css" />


		<div class='header2'>Welcome</div>
		<div class='memberpageImg'>


	<?php
		include("common/header.php");//Include for header welcome message
	?>
		<br>
			<br>
	<?
		include("common/pagemenu.html");//Include page menu
	?>
		<br>
			<br>
				<br>
					<br>
						<br>
							<br>
								<br>
									<br>
			<?
	/*$i++;
	}*/
	
	//include("db.php");
	
	/*?>
	<table align="center" bgcolor="FFFFCC" frame="box" width="30%">
	<tr>
	<td <td colspan=2 ><?php*/

include ("pollution.php");


DisplayPollution($empname, "members.php");



if ($_POST["poll"] != "") {

	
	polluted($empname);
	
}
?>

<div class='centerwrapper'><div class='eighteen'>News</div>News Content Placeholder<br><br><img src="images/web/feedicon_trans.png"></div>

<div class='rightwrapper'><div class='eighteen'>Upcoming Events</div>Upcoming events Content Placeholder<br><br><img src="images/web/newstom.png"><br><br><span class="eighteen"><span class="red">25-12-08</span> : Christmas<br><br><span class="red">15-01-09</span> : Sassari Release<br><img src="images/devices/go740_540live.jpg"><br><span class="red">27-01-09</span> : Kremnica Release<br><img src="images/devices/go940live.jpg">

</span>



</div>
	

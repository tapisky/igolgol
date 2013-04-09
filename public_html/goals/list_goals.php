<?php 
/*
List goals
*/
?>

<html>

<?php 

include("../php/dbconnect.php");// Include for DataBase connection details

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload handler script
// $uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'show_goal_list.php';
?>

<head>
<title>List goals</title>

<link href="http://www.igolgol.com/igolgol.css" rel="stylesheet" type="text/css" />
</head>

	<BODY>
	
		<h2>
		M&aacute;ximos Goleadores - Selecciona Division/Grupo</h2>
		<br>
			
		<script language="JavaScript" type="text/javascript" src="../js/list_goal.js">
			
			
			
		</SCRIPT>

		<FORM name="createitem" action="" enctype="multipart/form-data" method="post">
				<TABLE align="center">
				
				<TR>
					<TD></TD>
					<TD></TD>
				</TR>
				
				<TR>
					<TD>Temporada:</TD>
					<TD><select name="season1" onChange="adjust_season()">
							<option value="0" selected="selected">[Temp.]</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
						</select>/
						<input type="text" name="season2" maxlength="4" size="4" disabled="disabled">
						<input type="hidden" name="season" maxlength="9">
					</TD>
					<TD<div id="seasonmsg"></div></TD>
				</TR>

				
				<br>
					<TD>Pa&iacute;s</TD>
					<TD><select name="clubcountry" onchange='optionRegion("div_region","region.php",1)'>
							<option value="0" selected="selected">[ Selecciona ]</option>
<?php

	$result = mysql_query("SELECT * FROM countries")or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			//////////////////////////////////////////////////////
			$IdCountry=$r["idcountries"];
			$CountryName=$r["country_name"];
			echo "<option value='$IdCountry'>$CountryName</option>";
		}
?>
						</select></TD>
					<TD<div id="countrymsg"></div></TD>
				</TR>
				<TR>
					<TD>Federaci&oacute;n:</TD>
					<TD><div id="div_region"><select><option>[ Selecciona ]</option></select></div>
					</TD>
					<TD<div id="regionmsg"></div></TD>
				</TR>
				<TR>
					<TD>Competici&oacute;n:</TD>
					<TD><div id="div_division"><select><option>[ Selecciona ]</option></select></div>
					</TD>
					<TD<div id="divisionmsg"></div></TD>
				</TR>

				<TR>
					<TD>Grupo:</TD>
					<TD><div id="div_group"><select><option>[ Selecciona ]</option></select></div>
					</TD>
					<TD<div id="groupmsg"></div></TD>
							
				</TR>
				
				<TR>
					<TD>Equipo:</TD>
					<TD><div id="div_club"><select><option>[ Selecciona ]</option></select></div>
					</TD>
				</TR>
				
				<tr>
					<td></td>
					<TD><input type="button" value="Ver Tabla" onClick="validate_form_goal()"></TD>
				</TR>
					
			</TABLE>
					
		</FORM>
		<br>
		<hr>
		<br>
		
		<center>
			<div id="div_topscorer"></div>
		</center>

	</BODY>
</html>
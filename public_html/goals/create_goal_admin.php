		<div id='matchdetails' class='playerdetails'>

			<center><b>Informaci&oacute;n del partido</b></center>
			<table align='left'>

			<tr>
				<td width=20%></td>
				<td width=45%></td>
				<td width=35%></td>
			</tr>
			<tr>
				<td align='right'><b>Pa&iacute;s:</b></td>
				<td><select name="clubcountry" onchange='optionRegion("div_region","region_create_goal.php",1)'>
						<option value="0" selected="selected">[ Selecciona ]</option>
<?php

	$result = mysql_query("select * FROM countries")or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			//////////////////////////////////////////////////////
			$IdCountry=$r["idcountries"];
			$CountryName=$r["country_name"];
			echo "<option value='$IdCountry'>$CountryName</option>";
		}
?>
					</select>
				</td>
				<td><div id="countrymsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Federaci&oacute;n:</b></td>
				<td><div id="div_region"><select><option>[ Selecciona ]</option></select></div></td>
				<td><div id="regionmsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Competici&oacute;n:</b></td>
				<td><div id="div_division"><select><option>[ Selecciona ]</option></select></div>
				</td>
				<td><div id="divisionmsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Grupo:</b></td>
				<td><div id="div_group"><select><option>[ Selecciona ]</option></select></div>
				</td>
				<td><div id="groupmsg"></div></td>
			</tr>
			<tr>
			<tr>
			
<?php
$my_t=getdate(date("U"));
if ($my_t[mon] < 8)
{
	// season is year -1 to year
	$season_start = $my_t[year] - 1;
	$season_end = $my_t[year];
}
else
{
	// season is year to year + 1
	$season_start = $my_t[year];
	$season_end = $my_t[year] + 1;
}
?> 
				<td align='right'><b>Temporada:</b></td>
				<td><input type="text" name="season1" maxlength="4" size="4" disabled="disabled" value="<? echo $season_start ?>">/
					<input type="text" name="season2" maxlength="4" size="4" disabled="disabled" value="<? echo $season_end ?>">
					<input type="hidden" name="season" maxlength="9">
				</td>
				<td><div id="seasonmsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Jornada:</b></td>
				<td><select name="fixture">
<?
for ($i=1 ; $i<43 ; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
}
?>
				</td>
				<td<div id="fixturemsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Fecha:</b></td>
				<td>D&iacute;a <select name="day">
						<option value="01" selected="selected">1</option>
						<option value="02">2</option>
						<option value="03">3</option>
						<option value="04">4</option>
						<option value="05">5</option>
						<option value="06">6</option>
						<option value="07">7</option>
						<option value="08">8</option>
						<option value="09">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					Mes <select name="month">
						<option value="01" selected="selected">1</option>
						<option value="02">2</option>
						<option value="03">3</option>
						<option value="04">4</option>
						<option value="05">5</option>
						<option value="06">6</option>
						<option value="07">7</option>
						<option value="08">8</option>
						<option value="09">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					Año <input type="text" name="year" maxlength="4" size="4"></td>
						<input type="hidden" name="date" size="10">
				<td><div id="datemsg"></div></td>
			</tr>
			<tr>
				<td><b>Equipo local</b></td><td><b>Equipo visitante</b></td>
			</tr>
			<tr>
				<td align='right'><div id="div_home"><select><option>[ Selecciona ]</option></select></div></td>
				<td><div id="div_away"><select><option>[ Selecciona ]</option></select></div></td>
				<td><div id="clubsmsg"></div></td>
			</tr>
		</table>
	</div>
			
	<div id='goalinfo' class='playerclub'>
	
	
	<center><b>Informaci&oacute;n del gol</b></center>

		<table align='center'>
			
			<tr>
				<td align='right'><b>Marcador despu&eacute;s del gol:</b></td>
				<td><select name="goals_home">
<?
for ($i=0 ; $i<26 ; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
}
?>
					</select>
					<select name="goals_away">
<?
for ($i=0 ; $i<26 ; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
}
?>
					</select>
				</td>
				<td><div id="resultmsg"></div></td>
					
			</tr>
			<tr>
				<td align='right'><b>Minuto:</b></td>
				<td><select name="minute">
<?
for ($i=1 ; $i<91 ; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
}
?>
				</td>
			</tr>
			<tr>
				<td align='right'><b>Equipo que marca:</b></td>
				<td><select name="scoring_club" onchange='fill_players()'>
							<option value="0" selected= "selected">[ Selecciona ]</option>
							<option></option>
							<option></option>
						</select>
				</td>
				<td><div id="scoringmsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Goleador:</b></td>
				<td><div id="div_scorer"><select><option>[ Selecciona ]</option></select></div>
				<td><div id="scorermsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Asistente:</b></td>
				<td><div id="div_assister"><select><option>[ Selecciona ]</option></select></div>
				<td><div id="assistermsg"></div></td>
			</tr>
			<tr>
				<td align='right'><b>Tipo:</b></td>
				<td><select name="goaltype">
						<option value="left_foot">Pie Izquierdo</option>
						<option value="right_foot">Pie Derecho</option>
						<option value="header">Cabeza</option>
						<option value="sliding_header">Plancha</option>
						<option value="breast">Pecho</option>
						<option value="bycicle">Chilena</option>
						<option value="side_bycicle">Media Tijera</option>
						<option value="volley">Volea</option>
						<option value="pk">Penalty</option>
						<option value="fk">Falta Directa</option>
						<option value="ck">C&oacute;rner</option>
						<option value="knee">Rodilla</option>
						<option value="back_foot">Tac&oacute;n</option>
						<option value="side_foot">Espuela</option>
						<option value="other">Otros</option>
				</td>
			</tr>
			<tr>
				<td align='right'><b>Link de YouTube:</b></td>
				<td><input type"text" name="video" maxsize="100" size="20"></td>
				<td>¿Tienes tu gol en YouTube? ¡Adj&uacute;ntalo!</td>
			</tr>
		</table>
		<br>
		<center><input type="button" value="[ Crear Gol ]" onclick="validate_form_goal()"></center>
		
	</div>

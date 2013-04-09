<?php 
/*
Goal test
*/
?>

<html>

<?php 

include("../php/dbconnect.php");// Include for DataBase connection details

// Uploading files...
// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler script
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload_player.php';

// set a max file size for the html upload form
$max_file_size = 55000; // size in bytes
?>

<head>
<title>Goal create player</title>
</head>

	<BODY>
	
		<h2>
		Añadir Jugador</h2>
		<br>
			
		<script language="JavaScript" type="text/javascript" src="../js/create_player.js">
			
			
			
		</SCRIPT>

		<FORM name="createitem" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
				<TABLE align="center">
				<TR>
						
				</TR>
				<TR>
					<TD></TD>
					<TD>Informaci&oacute;n del jugador</TD>
				</TR>
				<TR></TR>
				<TR></TR>
				<TR>
					<TD>Nombre:</TD>
					<TD><input type="text" name="firstname" maxlength="45" size="15">
					<div id="firstnamemsg"></div></TD>
				</TR>
				<TR>
				<TR>
					<TD>Apellidos:</TD>
					<TD><input type="text" name="lastname" maxlength="45" size="25"></TD>
					<TD<div id="lastnamemsg"></div></TD>
				</TR>
				<TR>
				<TR>
					<TD>Sexo:</TD>
					<TD><select name="gender">
							<option value="M" selected="selected">Masculino</option>
							<option value="W">Femenino</option>
						</select></TD>
				</TR>
				<TR>
					<TD>Pa&iacute;s de origen:</TD>
					<TD>
					<select name="nationality">
						<option value="España" selected>España
						<option value="United States">United States
						<option value="Canada">Canada
						<option value="United Kingdom">United Kingdom
						<option value="Afghanistan">Afghanistan
						<option value="Aland Islands">Aland Islands
						<option value="Albania">Albania
						<option value="Algeria">Algeria
						<option value="American Samoa">American Samoa
						<option value="Andorra">Andorra
						<option value="Angola">Angola
						<option value="Anguilla">Anguilla
						<option value="Antarctica">Antarctica
						<option value="Antigua And Barbuda">Antigua And Barbuda
						<option value="Argentina">Argentina
						<option value="Armenia">Armenia
						<option value="Aruba">Aruba
						<option value="Australia">Australia
						<option value="Austria">Austria
						<option value="Azerbaijan">Azerbaijan
						<option value="Bahamas">Bahamas
						<option value="Bahrain">Bahrain
						<option value="Bangladesh">Bangladesh
						<option value="Barbados">Barbados
						<option value="Belarus">Belarus
						<option value="Belgium">Belgium
						<option value="Belize">Belize
						<option value="Benin">Benin
						<option value="Bermuda">Bermuda
						<option value="Bhutan">Bhutan
						<option value="Bolivia">Bolivia
						<option value="Bosnia And Herzegovina">Bosnia And Herzegovina
						<option value="Botswana">Botswana
						<option value="Bouvet Island">Bouvet Island
						<option value="Brazil">Brazil
						<option value="British Indian Ocean Territory">British Indian Ocean Territory
						<option value="Brunei Darussalam">Brunei Darussalam
						<option value="Bulgaria">Bulgaria
						<option value="Burkina Faso">Burkina Faso
						<option value="Burundi">Burundi
						<option value="Cambodia">Cambodia
						<option value="Cameroon">Cameroon
						<option value="Canada">Canada
						<option value="Cape Verde">Cape Verde
						<option value="Cayman Islands">Cayman Islands
						<option value="Central African Republic">Central African Republic
						<option value="Chad">Chad
						<option value="Chile">Chile
						<option value="China">China
						<option value="Christmas Island">Christmas Island
						<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
						<option value="Colombia">Colombia
						<option value="Comoros">Comoros
						<option value="Congo">Congo
						<option value="Cook Islands">Cook Islands
						<option value="Costa Rica">Costa Rica
						<option value="Cote D'Ivoire">Cote D'Ivoire
						<option value="Croatia">Croatia
						<option value="Cuba">Cuba
						<option value="Cyprus">Cyprus
						<option value="Czech Republic">Czech Republic
						<option value="Denmark">Denmark
						<option value="Djibouti">Djibouti
						<option value="Dominica">Dominica
						<option value="Dominican Republic">Dominican Republic
						<option value="East Timor">East Timor
						<option value="Ecuador">Ecuador
						<option value="Egypt">Egypt
						<option value="El Salvador">El Salvador
						<option value="Equatorial Guinea">Equatorial Guinea
						<option value="Eritrea">Eritrea
						<option value="Estonia">Estonia
						<option value="Ethiopia">Ethiopia
						<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
						<option value="Faroe Islands">Faroe Islands
						<option value="Fiji">Fiji
						<option value="Finland">Finland
						<option value="France">France
						<option value="French Guiana">French Guiana
						<option value="French Polynesia">French Polynesia
						<option value="French Southern Territories">French Southern Territories
						<option value="Gabon">Gabon
						<option value="Gambia">Gambia
						<option value="Georgia">Georgia
						<option value="Germany">Germany
						<option value="Ghana">Ghana
						<option value="Gibraltar">Gibraltar
						<option value="Greece">Greece
						<option value="Greenland">Greenland
						<option value="Grenada">Grenada
						<option value="Guadeloupe">Guadeloupe
						<option value="Guam">Guam
						<option value="Guatemala">Guatemala
						<option value="Guernsey">Guernsey
						<option value="Guinea">Guinea
						<option value="Guinea-Bissau">Guinea-Bissau
						<option value="Guyana">Guyana
						<option value="Haiti">Haiti
						<option value="Heard Island And Mcdonald Islands">Heard Island And Mcdonald Islands
						<option value="Holy See (Vatican City State)">Holy See (Vatican City State)
						<option value="Honduras">Honduras
						<option value="Hong Kong">Hong Kong
						<option value="Hungary">Hungary
						<option value="Iceland">Iceland
						<option value="India">India
						<option value="Indonesia">Indonesia
						<option value="Iran">Iran
						<option value="Iraq">Iraq
						<option value="Ireland">Ireland
						<option value="Isle Of Man">Isle Of Man
						<option value="Israel">Israel
						<option value="Italy">Italy
						<option value="Jamaica">Jamaica
						<option value="Japan">Japan
						<option value="Jersey">Jersey
						<option value="Jordan">Jordan
						<option value="Kazakhstan">Kazakhstan
						<option value="Kenya">Kenya
						<option value="Kiribati">Kiribati
						<option value="Korea">Korea
						<option value="Korea, Republic Of">Korea, Republic Of
						<option value="Kuwait">Kuwait
						<option value="Kyrgyzstan">Kyrgyzstan
						<option value="Lao People's Democratic Republic">Lao People's Democratic Republic
						<option value="Latvia">Latvia
						<option value="Lebanon">Lebanon
						<option value="Lesotho">Lesotho
						<option value="Liberia">Liberia
						<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
						<option value="Liechtenstein">Liechtenstein
						<option value="Lithuania">Lithuania
						<option value="Luxembourg">Luxembourg
						<option value="Macao">Macao
						<option value="Macedonia">Macedonia
						<option value="Madagascar">Madagascar
						<option value="Malawi">Malawi
						<option value="Malaysia">Malaysia
						<option value="Maldives">Maldives
						<option value="Mali">Mali
						<option value="Malta">Malta
						<option value="Marshall Islands">Marshall Islands
						<option value="Martinique">Martinique
						<option value="Mauritania">Mauritania
						<option value="Mauritius">Mauritius
						<option value="Mayotte">Mayotte
						<option value="Mexico">Mexico
						<option value="Micronesia">Micronesia
						<option value="Moldova">Moldova
						<option value="Monaco">Monaco
						<option value="Mongolia">Mongolia
						<option value="Montenegro">Montenegro
						<option value="Montserrat">Montserrat
						<option value="Morocco">Morocco
						<option value="Mozambique">Mozambique
						<option value="Myanmar">Myanmar
						<option value="Namibia">Namibia
						<option value="Nauru">Nauru
						<option value="Nepal">Nepal
						<option value="Netherlands">Netherlands
						<option value="Netherlands Antilles">Netherlands Antilles
						<option value="New Caledonia">New Caledonia
						<option value="New Zealand">New Zealand
						<option value="Nicaragua">Nicaragua
						<option value="Niger">Niger
						<option value="Nigeria">Nigeria
						<option value="Niue">Niue
						<option value="Norfolk Island">Norfolk Island
						<option value="Northern Mariana Islands">Northern Mariana Islands
						<option value="Norway">Norway
						<option value="Oman">Oman
						<option value="Pakistan">Pakistan
						<option value="Palau">Palau
						<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
						<option value="Panama">Panama
						<option value="Papua New Guinea">Papua New Guinea
						<option value="Paraguay">Paraguay
						<option value="Peru">Peru
						<option value="Philippines">Philippines
						<option value="Pitcairn">Pitcairn
						<option value="Poland">Poland
						<option value="Portugal">Portugal
						<option value="Qatar">Qatar
						<option value="Reunion">Reunion
						<option value="Romania">Romania
						<option value="Russian Federation">Russian Federation
						<option value="Rwanda">Rwanda
						<option value="Saint Helena">Saint Helena
						<option value="Saint Kitts And Nevis">Saint Kitts And Nevis
						<option value="Saint Lucia">Saint Lucia
						<option value="Saint Pierre And Miquelon">Saint Pierre And Miquelon
						<option value="Saint Vincent And The Grenadines">Saint Vincent And The Grenadines
						<option value="Samoa">Samoa
						<option value="San Marino">San Marino
						<option value="Sao Tome And Principe">Sao Tome And Principe
						<option value="Saudi Arabia">Saudi Arabia
						<option value="Senegal">Senegal
						<option value="Serbia">Serbia
						<option value="Serbia And Montenegro">Serbia And Montenegro
						<option value="Seychelles">Seychelles
						<option value="Sierra Leone">Sierra Leone
						<option value="Singapore">Singapore
						<option value="Slovakia">Slovakia
						<option value="Slovenia">Slovenia
						<option value="Solomon Islands">Solomon Islands
						<option value="Somalia">Somalia
						<option value="South Africa">South Africa
						<option value="South Georgia">South Georgia
						<option value="Sri Lanka">Sri Lanka
						<option value="Sudan">Sudan
						<option value="Suriname">Suriname
						<option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen
						<option value="Swaziland">Swaziland
						<option value="Sweden">Sweden
						<option value="Switzerland">Switzerland
						<option value="Syrian Arab Republic">Syrian Arab Republic
						<option value="Taiwan, Province Of China">Taiwan, Province Of China
						<option value="Tajikistan">Tajikistan
						<option value="Tanzania">Tanzania
						<option value="Thailand">Thailand
						<option value="Togo">Togo
						<option value="Tokelau">Tokelau
						<option value="Tonga">Tonga
						<option value="Trinidad And Tobago">Trinidad And Tobago
						<option value="Tunisia">Tunisia
						<option value="Turkey">Turkey
						<option value="Turkmenistan">Turkmenistan
						<option value="Turks And Caicos Islands">Turks And Caicos Islands
						<option value="Tuvalu">Tuvalu
						<option value="Uganda">Uganda
						<option value="Ukraine">Ukraine
						<option value="United Arab Emirates">United Arab Emirates
						<option value="United Kingdom">United Kingdom
						<option value="United States">United States
						<option value="US Minor Outlying Islands">US Minor Outlying Islands
						<option value="Uruguay">Uruguay
						<option value="Uzbekistan">Uzbekistan
						<option value="Vanuatu">Vanuatu
						<option value="Venezuela">Venezuela
						<option value="Viet Nam">Viet Nam
						<option value="Virgin Islands, British">Virgin Islands, British
						<option value="Virgin Islands, U.S.">Virgin Islands, U.S.
						<option value="Wallis And Futuna">Wallis And Futuna
						<option value="Western Sahara">Western Sahara
						<option value="Yemen">Yemen
						<option value="Yugoslavia">Yugoslavia
						<option value="Zambia">Zambia
						<option value="Zimbabwe">Zimbabwe
					</select>						
					</TD>
					<TD<div id="nationalitymsg"></div></TD>
				</TR>
				<TR>
					<TD>Fecha de nacimiento:</TD>
					<TD>D&iacute;a <select name="day">
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
						Año <input type="text" name="year" maxlength="4" size="4"></TD>
						<input type="hidden" name="date" size="10">
						<TD<div id="datemsg"></div></TD>
																		
				</TR>
				<TR>
					<TD>Altura:</TD>
					<TD><input type="text" name="height" maxlength="3" size="3"> cm</TD>
					<TD<div id="heightmsg"></div></TD>
				</TR>
				<TR>
					<TD>Peso:</TD>
					<TD><input type="text" name="weight" maxlength="3" size="3"> kg</TD>
					<TD<div id="weightmsg"></div></TD>
				</TR>
				<TR>
					<TD>Zurdo/Diestro:</TD>
					<TD><select name="strongerfoot">
							<option value="r" selected="selected">Diestro</option>
							<option value="l">Zurdo</option>
							<option value="lr">Ambidiestro</option>
						</select></TD>
				</TR>
				<TR>
					<TD>Posici&oacute;n principal:</TD>
						
					<TD>
					<select name="position" onchange='change_position()'>
							<option value="gk" selected="selected">Portero</option>
							<option value="df">Defensa</option>
							<option value="lb">Lateral Izquierdo</option>
							<option value="cb">Defensa Central</option>
							<option value="rb">Lateral Derecho</option>
							<option value="dm">Medio Centro</option>
							<option value="lm">Centrocampista Izquierdo</option>
							<option value="cm">Centrocampista</option>
							<option value="rm">Centrocampista Derecho</option>
							<option value="am">Media Punta</option>
							<option value="lw">Extremo Izquierdo</option>
							<option value="at">Delantero</option>
							<option value="rw">Extremo Derecho</option>
						</select>
					</TD>
					<td>
						<div id='pitch_cover'>
							<img src='../images/graphics/positions/gk.jpg' height='150' width='110'>
						</div>
					</td>
				</TR>
				<TR>
					<TD></TD>
					<TD></TD>
					
				</TR>
									
				<TR>
					<TD></TD>
					<TD>Equipo actual del jugador</TD><TD<div id="clubmsg"></div></TD>
				<TR></TR>
				<TR></TR>
				</TR>
				<TR>
					<TD>Pa&iacute;s del equipo</TD>
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
				</TR>
				<TR>
					<TD>Federaci&oacute;n:</TD>
					<TD><div id="div_region"><select><option>[ Selecciona ]</option></select></div>
					</TD>
				</TR>
				<TR>
					<TD>Competici&oacute;n:</TD>
					<TD><div id="div_division"><select><option>[ Selecciona ]</option></select></div>
					</TD>		
				</TR>

				<TR>
					<TD>Grupo:</TD>
					<TD><div id="div_group"><select><option>[ Selecciona ]</option></select></div>
					</TD>
							
				</TR>
				<TR>
					<TD>Equipo:</TD>
					<TD><div id="div_club"><select><option>[ Selecciona ]</option></select></div>
					</TD>
				</TR>

				<TR>
					<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
					<TD>Foto:</TD>
					<TD><input type="file" name="file" id="file" maxlength="45" size="25")"></TD>
					<td><div id='div_picture'></td>
					
				</tr>
				<tr>
					<td></td>
					<TD> JPG/GIF no mayor de 50kb</TD>
					
				</TR>
				
				<TR></TR><TR></TR><TR></TR><TR></TR>
					<TD></TD>
					<TD><input type="button" value="Crear Jugador" onclick="validate_form()"></TD>
				</TR>
					
			</TABLE>
					
			</FORM>

	</BODY>
</html>
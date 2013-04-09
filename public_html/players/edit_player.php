<?php 
/*
Goal test
*/
?>

<html>

<?php 

include("../php/phplibrary.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/header.php");// Include for header content

// if an update has already been made, make the update on the database; check also if the cookie has been created
if(isset($_COOKIE['ID_my_site']))
{	

	if ($_POST[formsent] == 1)
	{
		$userplayerid = get_userplayerid($info["id"]);
		if ( $userplayerid == 0 )
		{
			die('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
					No tienes un jugador asignado!!. <br><a href="http://www.igolgol.com/index3.php"><< Back</a>');
		}
		
		// avoid sql injection on text fields
		$secure_firstname = check_input($_POST[firstname]);
		$secure_lastname = check_input($_POST[lastname]);

		// fieldname used within the file <input> of the HTML form
		$fieldname = 'file';		
				
		// if the user does not want to upload a picture (picture field is blank)
		if ($_FILES[$fieldname]['name'] == "")
		{
			// make update on the database
			$sql_update = "UPDATE `igolgolc_goals`.`players` SET `first_name` = $secure_firstname,
						`last_name` = $secure_lastname,
						`gender` = '$_POST[gender]',
						`nationality` = '$_POST[nationality]',
						`birth_date` = '$_POST[date]',
						`height` = '$_POST[height]',
						`weight` = '$_POST[weight]',
						`stronger_foot` = '$_POST[strongerfoot]',
						`position` = '$_POST[position]'
						WHERE `players`.`idplayers` = $userplayerid LIMIT 1";
						
			if (!mysql_query($sql_update))
			{
				die('Error: ' . mysql_error());
			}
		}
		else // user wants to upload a picture
		{
		
			// get the name of the old picture in case we want to delete it
			$result = mysql_query("SELECT picture FROM players WHERE idplayers =". $userplayerid) or die(mysql_error());
			$num=mysql_numrows($result);
			$r = mysql_fetch_array($result);
			if ( $r["picture"] != "")
			{
				$deletefile = "../images/players/" .$r["picture"];
				$deleteok = 1;
			}
			
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

			$uploadFilename = str_replace("../images/players/", "", $uploadFilename);
			
			// avoid sql injection on text fields
			$secure_lastname = check_input($_POST[lastname]);
			
			// make update on the database
			$sql_update = "UPDATE `igolgolc_goals`.`players` SET `first_name` = $secure_firstname,
						`last_name` = $secure_lastname,
						`gender` = '$_POST[gender]',
						`nationality` = '$_POST[nationality]',
						`birth_date` = '$_POST[date]',
						`height` = '$_POST[height]',
						`weight` = '$_POST[weight]',
						`stronger_foot` = '$_POST[strongerfoot]',
						`position` = '$_POST[position]',
						`picture` = '$uploadFilename'
						WHERE `players`.`idplayers` = $userplayerid LIMIT 1";
						
			if (!mysql_query($sql_update))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				// delete old file
				if ( $deleteok == 1)
				{
					unlink($deletefile);
				}
			}
		}
		
	}
}

// Uploading files...
// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler script
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'edit_player.php';

// set a max file size for the html upload form
$max_file_size = 170000; // size in bytes

// get id of user's player
$userplayerid = get_userplayerid($info["id"]);
if ( $userplayerid == 0 )
{
	die('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
		     No tienes un jugador asignado!!. <br><a href="http://www.igolgol.com/index3.php"><< Back</a>');
}

$player_info = get_playerinfo($userplayerid);
?>

	<script language="JavaScript" type="text/javascript" src="../js/create_player.js">

	</script>
	
	<center><font color=white>Editar Jugador</font></center>
	
	<form name="createitem" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
	
	<div id='playerdetails' class='playerdetails'>

			<center><b>Informaci&oacute;n del jugador</b></center>

		
			<table align='left'>

				<tr>
					<td width=20%></td>
					<td width=30%></td>
					<td width=50%></td>
				</tr>
				<tr>
					<td align='right'><b>Nombre:</b></td>
					<td><input type="text" name="firstname" maxlength="45" size="15" value='<?php echo $player_info["first_name"]  ?>'></td>
					<td><div id="firstnamemsg"></div></td>
				</tr>
				
				<tr>
				<tr>
					<td align='right'><b>Apellidos:</b></td>
					<td><input type="text" name="lastname" maxlength="45" size="25" value='<?php echo $player_info["last_name"]  ?>'></td>
					<td><div id="lastnamemsg"></div></td>
				</tr>
				
				<tr>
					<td align='right'><b>Sexo:</b></td>
					<td><select name="gender">
							<option value="M" <?php echo ( $player_info["gender"] == M)?"selected='selected'":"" ?>>Masculino</option>
							<option value="W" <?php echo ( $player_info["gender"] == W)?"selected='selected'":"" ?>>Femenino</option>
						</select></td>
				</tr>
				<tr>
					<td align='right'><b>Pa&iacute;s:</b></td>
					<td>
					<select name="nationality">
						<option value="<?php echo $player_info["nationality"] ?>" selected><?php echo $player_info["nationality"] ?>
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
						<option value="trinidad And Tobago">trinidad And Tobago
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
					</select></td>
				</tr>
				<tr>
					<td align='right'><b>Nacido el:</b></td>
					<td><b>D&iacute;a</b><select name="day">
<?php
// get the day, the month and the year sepparately
$day = substr($player_info["birth_date"],8,2);
$month = substr($player_info["birth_date"],5,2);
$year = substr($player_info["birth_date"],0,4);
for ( $counter = 1; $counter<32; $counter++ )
{
?>					
							<option value="<?php echo $counter ?>" <?php echo ( $day == $counter )?"selected='selected'":"" ?>>
							<?php echo $counter ?></option>
<?php
}
?>
						</select>
						<b>Mes</b><select name="month">
<?php
for ( $counter = 1; $counter<13; $counter++ )
{
?>					
							<option value="<?php echo $counter ?>" <?php echo ( $month == $counter )?"selected='selected'":"" ?>>
							<?php echo $counter ?></option>
<?php
}
?>

						</select>
						<b>Año</b> <input type="text" name="year" maxlength="4" size="4" value="<?php echo $year; ?>">
						<input type="hidden" name="date" size="10"></td>
						<td><div id="datemsg"></div></td>
																		
				</tr>
				<tr>
					<td align='right'><b>Altura:</b></td>
					<td><input type="text" name="height" maxlength="3" size="3" value="<?php echo $player_info["height"]; ?>"> cm</td>
					<td><div id="heightmsg"></div></td>
				</tr>
				<tr>
					<td align='right'><b>Peso:</b></td>
					<td><input type="text" name="weight" maxlength="3" size="3" value="<?php echo $player_info["weight"]; ?>"> kg</td>
					<td><div id="weightmsg"></div></td>
				</tr>
				<tr>
					<td align='right'><b>Zurdo/Diestro:</b></td>
					<td><select name="strongerfoot">
							<option value="r" <?php echo ( $player_info["stronger_foot"] == "r" )?"selected='selected'":"" ?>>Diestro</option>
							<option value="l" <?php echo ( $player_info["stronger_foot"] == "l" )?"selected='selected'":"" ?>>Zurdo</option>
							<option value="lr" <?php echo ( $player_info["stronger_foot"] == "lr" )?"selected='selected'":"" ?>>Ambidiestro</option>
						</select></td>
				</tr>
				<tr>
					<td align='right'><b>Posici&oacute;n:</b></td>
						
					<td>
					<select name="position" onchange='change_position()'>
							<option value="gk" <?php echo ( $player_info["position"] == "gk" )?"selected='selected'":"" ?>>Portero</option>
							<option value="df" <?php echo ( $player_info["position"] == "df" )?"selected='selected'":"" ?>>Defensa</option>
							<option value="lb" <?php echo ( $player_info["position"] == "lb" )?"selected='selected'":"" ?>>Lateral Izquierdo</option>
							<option value="cb" <?php echo ( $player_info["position"] == "cb" )?"selected='selected'":"" ?>>Defensa Central</option>
							<option value="rb" <?php echo ( $player_info["position"] == "rb" )?"selected='selected'":"" ?>>Lateral Derecho</option>
							<option value="dm" <?php echo ( $player_info["position"] == "dm" )?"selected='selected'":"" ?>>Medio Centro</option>
							<option value="lm" <?php echo ( $player_info["position"] == "lm" )?"selected='selected'":"" ?>>Centrocampista Izquierdo</option>
							<option value="cm" <?php echo ( $player_info["position"] == "cm" )?"selected='selected'":"" ?>>Centrocampista</option>
							<option value="rm" <?php echo ( $player_info["position"] == "rm" )?"selected='selected'":"" ?>>Centrocampista Derecho</option>
							<option value="am" <?php echo ( $player_info["position"] == "am" )?"selected='selected'":"" ?>>Media Punta</option>
							<option value="lw" <?php echo ( $player_info["position"] == "lw" )?"selected='selected'":"" ?>>Extremo Izquierdo</option>
							<option value="at" <?php echo ( $player_info["position"] == "at" )?"selected='selected'":"" ?>>Delantero</option>
							<option value="rw" <?php echo ( $player_info["position"] == "rw" )?"selected='selected'":"" ?>>Extremo Derecho</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>
						<div id='pitch_cover'>
							<img src='../images/graphics/positions/<?php echo $player_info["position"];?>.jpg' height='150' width='110'>
						</div>
					</td>
				</tr>
			</table>
		</div>
	<div id='playerclub' class='playerclub'>
			
	<center><b>Equipo actual del jugador</b></center>

			<table align='center'>
			
			


<?php
// first check if user is a player, if not, we stop displaying info
if ( $info["type"] == 3)
{
				if ( $player_info["clubid"] == 0 )
				{
					echo "Tu usuario no tiene ning&uacute;n club asociado.";
				}
				else
				{
					$clubdiv = get_clubdivisioninfo($player_info["clubid"]);
?>
					<tr>
						<td align='right'><b>Pa&iacute;s:</b><div id='clubmsg'></div></td>
						<td><?php echo get_countryname($clubdiv["country"]); ?></td>
					</tr>
					<tr>
						<td align='right'><b>Federaci&oacute;n:</b></td>
						<td><?php echo get_regionname($clubdiv["region"]); ?></td>
					</tr>
					<tr>
						<td align='right'><b>Competici&oacute;n:</b></td>
						<td><?php echo get_divisionname($clubdiv["division"]); ?></td>
					</tr>

					<tr>
						<td align='right'><b>Grupo:</b></td>
						<td><?php echo get_groupname($clubdiv["group"]); ?></td>
					</tr>
					<tr>
						<td align='right'><b>Equipo:</b></td>
						<td><?php echo get_clubname($player_info["clubid"]); ?><input type='hidden' name='club' value='<?php echo $player_info["clubid"]; ?>'>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
						<td align='right'><b>Foto:</b></td>
						<td colspan=2><input type="file" name="file" id="file" maxlength="45" size="20"></td>
						
					</tr>
					<tr>
						<td></td>
						<td> JPG/GIF no mayor de 150kb</td>
						
					</tr>
			
				</table>
			<br>	
			<center><input type="button" value="[ Realizar Cambios ]" onclick="validate_form_player_manager()"></center>
			<br>
			<center><img src='http://igolgol.com/images/players/<?php echo $player_info["picture"]; ?>' height=150px width=150px></center>
			
			<input type="hidden" name="formsent" value="0">
			
	</div>	
	</form>
					
<?php
				}
}
?>
</html>
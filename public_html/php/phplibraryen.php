<?php 

// Connects to your Database
function dbconnect()
{
	mysql_connect("", "", "") or die(mysql_error()); 
	mysql_select_db("igolgolc_goals") or die(mysql_error()); 
}


//function to construct nationality combobox
function create_nations($nationality)
{
	echo '<select name="nationality">
						<option value="'.$nationality.'" selected>'.$nationality.
						'<option value="Afghanistan">Afghanistan
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
						<option value="Cote D\'Ivoire">Cote D\'Ivoire
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
						<option value="Espa�a">Espa�a
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
						<option value="Lao People\'s Democratic Republic">Lao People\'s Democratic Republic
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
						<option value="Scotland">Scotland
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
					</select>';
}

// this function retrieves all the info of a given user and returns it in an array
function get_userinfo($iid)
{
	$result = mysql_query("SELECT * FROM users WHERE username ='" .$iid. "'")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);

	// Get user�s id
	$uid=$r["idusers"];
	
	// Get user's email
	$email=$r["email"];
	
	// Get user's type
	$type=$r["type"];
	
	// Get user's active value
	$active=$r["active"];
	
	$userinfo = Array("id"=>$uid,"email"=>$email,"type"=>$type,"active"=>$active);
	
	// return array
	return $userinfo;
}



///////////////////////////////////////////////////
/////////// Get Player Details functions///////////////
///////////////////////////////////////////////////

// this function retrieves all the info of a given player and returns it in an array
function get_playerinfo($iid)
{
	$result = mysql_query("SELECT * FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$firstName=$r["first_name"];
	$lastName=$r["last_name"];
	
	// Get player's gender
	$gender=$r["gender"];
	
	// Get player's nationality
	$nationality=$r["nationality"];
	
	// Get player's birthdate
	$birth_date=$r["birth_date"];
	
	// Get player's height
	$height=$r["height"];
	
	// Get player's weight
	$weight=$r["weight"];
	
	// Get player's strongerfoot
	$stronger_foot=$r["stronger_foot"];
	
	// Get player's position
	$position=$r["position"];
	
	// Get player's picture
	$picture=$r["picture"];
	
	// Get player's clubid
	$clubid=$r["clubid"];
	
	// build array
	$playerinfo = Array("first_name"=>$firstName,"last_name"=>$lastName,"gender"=>$gender,"nationality"=>$nationality,"birth_date"=>$birth_date,
						"height"=>$height,"weight"=>$weight,"stronger_foot"=>$stronger_foot,"position"=>$position,"picture"=>$picture,
						"clubid"=>$clubid);
	// return array
	return $playerinfo;
}

// this function returns the number of total goals scored by a given player
function get_totalgoals($playerid)
{
	$result = mysql_query("SELECT scorerid, COUNT( idgoals ) FROM goals WHERE scorerid=" .$playerid. " GROUP BY scorerid")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$num_goals = $r['COUNT( idgoals )'];
	return $num_goals;
}

// this function returns the number of goals scored this season by a given player
function get_goalsthisseason($playerid)
{

	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;

	$result = mysql_query("SELECT scorerid, COUNT( idgoals ) FROM goals WHERE scorerid=" .$playerid. " AND season='" . $season. "' GROUP BY scorerid")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$num_goals = $r['COUNT( idgoals )'];
	if (isset($num_goals))
	{
		return $num_goals;
	}
	else return 0;
	
}

// this function returns the number of total assists made by a given player
function get_totalassists($playerid)
{
	$result = mysql_query("SELECT assisterid, COUNT( idgoals ) FROM goals WHERE assisterid=" .$playerid. " GROUP BY assisterid")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$num_assists = $r['COUNT( idgoals )'];
	if (isset($num_assists))
	{
		return $num_assists;
	}
	else return 0;
}

// this function returns the number of total assists made by a given player
function get_assiststhisseason($playerid)
{

		// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;

	$result = mysql_query("SELECT assisterid, COUNT( idgoals ) FROM goals WHERE assisterid=" .$playerid. " AND season='" . $season. "' GROUP BY assisterid")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$num_assists = $r['COUNT( idgoals )'];
	if (isset($num_assists))
	{
		return $num_assists;
	}
	else return 0;
}

// this function retrieves first and last name of a given player
function get_playername($iid)
{
	$result = mysql_query("SELECT first_name, last_name FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$firstName=$r["first_name"];
	$lastName=$r["last_name"];
	
	// return value
	$cName = $firstName . " " . $lastName;
	return $cName;
}

// this function retrieves gender of a given player
function get_playergender($iid)
{
	$result = mysql_query("SELECT gender FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's gender
	$gender=$r["gender"];
	
	// return
	return $gender;
}

// this function retrieves nationality of a given player
function get_playernationality($iid)
{
	$result = mysql_query("SELECT nationality FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's nationality
	$nationality=$r["nationality"];
	
	// return
	return $nationality;
}

// this function retrieves birth_date of a given player
function get_playerbirthdate($iid)
{
	$result = mysql_query("SELECT birth_date FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's birthdate
	$birth_date=$r["birth_date"];
	
	// return
	return $birth_date;
}

// this function retrieves height of a given player
function get_playerheight($iid)
{
	$result = mysql_query("SELECT height FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's height
	$height=$r["height"];
	
	// return 
	return $height;
}

// this function retrieves weight of a given player
function get_playerweight($iid)
{
	$result = mysql_query("SELECT weight FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's weight
	$weight=$r["weight"];
	
	// return
	return $weight;
}

// this function retrieves stronger_foot of a given player
function get_playerstrongerfoot($iid)
{
	$result = mysql_query("SELECT stronger_foot FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's strongerfoot
	$stronger_foot=$r["stronger_foot"];
	
	// return
	return $stronger_foot;
}

// this function retrieves position of a given player
function get_playerposition($iid)
{
	$result = mysql_query("SELECT position FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's position
	$position=$r["position"];
	
	// return 
	return $position;
}

// this function retrieves picture of a given player
function get_playerpicture($iid)
{
	$result = mysql_query("SELECT picture FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's picture
	$picture=$r["picture"];
	
	// return 
	return $picture;
}

// this function retrieves clubid of a given player
function get_playerclubid($iid)
{
	$result = mysql_query("SELECT clubid FROM players WHERE idplayers=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get player's clubid
	$clubid=$r["clubid"];
	
	// return
	return $clubid;
}
///////////////////////////////////////////////////
///////////////////////////////////////////////////

/////////////////////////////////////////////////
/////////// Get Club Details functions///////////////
/////////////////////////////////////////////////


// this function retrieves clubid if a given user from table 'users_have_clubs'
function get_managerclubid($iid)
{
	$result = mysql_query("SELECT * FROM users_have_clubs WHERE userid=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// return club id
	if ( $r > 0 )
	{
		return $r["clubid"];
	}
	else
	{
		return 0;
	}
}

// this function retrieves clubid if a given user from table 'users_have_clubs'
function get_userplayerid($iid)
{
	$result = mysql_query("SELECT * FROM users_have_players WHERE userid=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// return club id
	if ( $r > 0 )
	{
		return $r["playerid"];
	}
	else
	{
		return 0;
	}
}

// this function retrieves club_name of a given club
function get_clubinfo($iid)
{
	$result = mysql_query("SELECT * FROM clubs WHERE idclubs=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get clubname
	$club_name=$r["club_name"];
	
	// Get clublogo
	$logo=$r["logo"];
	
	// Get clubwebsite
	$website=$r["website"];	
	
	// build array
	$clubinfo = Array("club_name"=>$club_name,"logo"=>$logo,"website"=>$website);
	// return array
	return $clubinfo;
}


// this function retrieves club_name of a given club
function get_clubname($iid)
{
	$result = mysql_query("SELECT club_name FROM clubs WHERE idclubs=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get clubname
	$club_name=$r["club_name"];
	
	// return 
	return $club_name;
}

// this function retrieves logo of a given club
function get_clublogo($iid)
{
	$result = mysql_query("SELECT logo FROM clubs WHERE idclubs=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get clublogo
	$logo=$r["logo"];
	
	// return 
	return $logo;
}

// this function retrieves website of a given club
function get_clubwebsite($iid)
{
	$result = mysql_query("SELECT website FROM clubs WHERE idclubs=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get clubwebsite
	$website=$r["website"];
	
	// return
	return $website;
}

// this function retrieves club_address of a given club
function get_clubaddress($iid)
{
	$result = mysql_query("SELECT address FROM clubs WHERE idclubs=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get clubname
	$club_name=$r["address"];
	
	// return 
	return $club_name;
}


//  this function retrieves group, division, region and country of a given club
function get_clubdivisioninfo($iid)
{
	$result = mysql_query("SELECT * FROM divisions_have_groups WHERE clubid=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$group=$r["groupid"];
	$division=$r["divisionid"];
	$region=$r["regionid"];
	$country=$r["countryid"];
	
	$clubdivisioninfo = Array("group"=>$group,"division"=>$division,"region"=>$region,"country"=>$country);
	
	// return
	return $clubdivisioninfo;
}
/////////////////////////////////////////////////
/////////////////////////////////////////////////

//////////////////////////////////////////////////
/////////// Get Goals Details functions///////////////
//////////////////////////////////////////////////

// this function retrieves season of a given goal
function get_goalseason($iid)
{
	$result = mysql_query("SELECT season FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$season=$r["season"];
	
	// return value
	return $season;
}

// this function retrieves fixture_num of a given goal
function get_goalfixture($iid)
{
	$result = mysql_query("SELECT fixture_num FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$fixture=$r["fixture_num"];
	
	// return value
	return $fixture;
}

// this function retrieves goal_date of a given goal
function get_goaldate($iid)
{
	$result = mysql_query("SELECT goal_date FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$goal_date=$r["goal_date"];
	
	// return value
	return $goal_date;
}

// this function retrieves goal_type of a given goal
function get_goaltype($iid)
{
	$result = mysql_query("SELECT goal_type FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$goal_type=$r["goal_type"];
	
	// return value
	return $goal_type;
}

// this function retrieves video_link of a given goal
function get_goalvideo($iid)
{
	$result = mysql_query("SELECT video_link FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$video_link=$r["video_link"];
	
	// return value
	return $video_link;
}

// this function retrieves num_hits of a given goal
function get_goalhits($iid)
{
	$result = mysql_query("SELECT num_hits FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$num_hits=$r["num_hits"];
	
	// return value
	return $num_hits;
}

// this function retrieves rate of a given goal
function get_goalrate($iid)
{
	$result = mysql_query("SELECT rate FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$rate=$r["rate"];
	
	// return value
	return $rate;
}

// this function retrieves userid of a given goal
function get_goaluserid($iid)
{
	$result = mysql_query("SELECT userid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$userid=$r["userid"];
	
	// return value
	return $userid;
}

// this function retrieves goals_home of a given goal
function get_goalgoals_home($iid)
{
	$result = mysql_query("SELECT goals_home FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$goals_home=$r["goals_home"];
	
	// return value
	return $goals_home;
}

// this function retrieves goals_away of a given goal
function get_goalgoals_away($iid)
{
	$result = mysql_query("SELECT goals_away FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$goals_away=$r["goals_away"];
	
	// return value
	return $goals_away;
}

// this function retrieves goals_away of a given goal
function get_goalnum_rate($iid)
{
	$result = mysql_query("SELECT num_rate FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$num_rate=$r["num_rate"];
	
	// return value
	return $num_rate;
}

// this function retrieves scorerid of a given goal
function get_goalscorerid($iid)
{
	$result = mysql_query("SELECT scorerid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$scorerid=$r["scorerid"];
	
	// return value
	return $scorerid;
}

// this function retrieves scorer_clubid of a given goal
function get_goalsscorer_clubid($iid)
{
	$result = mysql_query("SELECT scorer_clubid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$scorer_clubid=$r["scorer_clubid"];
	
	// return value
	return $scorer_clubid;
}

// this function retrieves assisterid of a given goal
function get_goalassisterid($iid)
{
	$result = mysql_query("SELECT assisterid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$assisterid=$r["assisterid"];
	
	// return value
	return $assisterid;
}

// this function retrieves away_clubid of a given goal
function get_goalaway_clubid($iid)
{
	$result = mysql_query("SELECT away_clubid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$away_clubid=$r["away_clubid"];
	
	// return value
	return $away_clubid;
}

// this function retrieves home_clubid of a given goal
function get_goalhome_clubid($iid)
{
	$result = mysql_query("SELECT home_clubid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$home_clubid=$r["home_clubid"];
	
	// return value
	return $home_clubid;
}

// this function retrieves minute of a given goal
function get_goalminute($iid)
{
	$result = mysql_query("SELECT minute FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$minute=$r["minute"];
	
	// return value
	return $minute;
}

// this function retrieves country of a given goal
function get_goalcountry($iid)
{
	$result = mysql_query("SELECT country FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$country=$r["country"];
	
	// return value
	return $country;
}

// this function retrieves region of a given goal
function get_goalregion($iid)
{
	$result = mysql_query("SELECT region FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$region=$r["region"];
	
	// return value
	return $region;
}

// this function retrieves division of a given goal
function get_goaldivision($iid)
{
	$result = mysql_query("SELECT division FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$division=$r["division"];
	
	// return value
	return $division;
}

// this function retrieves groupid of a given goal
function get_goalgroupid($iid)
{
	$result = mysql_query("SELECT groupid FROM goals WHERE idgoals=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$groupid=$r["groupid"];
	
	// return value
	return $groupid;
}

//////////////////////////////////////////////////
//////////////////////////////////////////////////
///// Groups, Divisions, Regions and Countries/////////

// this function retrieves name of a given groupid
function get_groupname($iid)
{
	$result = mysql_query("SELECT group_name FROM groups WHERE idgroups=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$group = $r["group_name"];
	
	// return value
	return $group;
}

// this function retrieves name of a given divisionid
function get_divisionname($iid)
{
	$result = mysql_query("SELECT division_name FROM divisions WHERE iddivisions=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$division = $r["division_name"];
	
	// return value
	return $division;
}

// this function retrieves name of a given regionid
function get_regionname($iid)
{
	$result = mysql_query("SELECT region_name FROM regions WHERE idregion=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$region = $r["region_name"];
	
	// return value
	return $region;
}

// this function retrieves name of a given countryid
function get_countryname($iid)
{
	$result = mysql_query("SELECT country_name FROM countries WHERE idcountries=" .$iid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	// Get info
	$country = $r["country_name"];
	
	// return value
	return $country;
}

// this function retrieves top10 goals most viewed
function get_topmostviewed()
{
	$result = mysql_query("SELECT idgoals FROM goals ORDER BY num_hits DESC LIMIT 0 , 10")or die(mysql_error());
	$num=mysql_numrows($result);
	
	// create array to store the top ten goalids
	$topten = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push goalid in array
		array_push($topten,$r["idgoals"]);
		
	}
	
	// return array
	return $topten;

}

// this function returns an array with all the clubs in a specified country, region, division and group
function getclubsindivision($country,$region,$division,$group)
{
	//retrieve clubs
	$result = mysql_query("SELECT clubid FROM divisions_have_groups WHERE countryid=" .$country. " AND regionid=" .$region. " AND divisionid=". $division. " AND groupid=".$group)or die(mysql_error());
	$num=mysql_numrows($result);
	$clubs = array();
	while ( $r = mysql_fetch_array($result) )
	{
		$clubs[]=$r[clubid];
	}
	
	// return array
	return $clubs;
}

// this function retrieves top10 igolgol.com scorers
function get_toptenscorers()
{
	$result = mysql_query("SELECT scorerid, COUNT( idgoals ) FROM goals 
						   GROUP BY scorerid ORDER BY COUNT( idgoals ) DESC LIMIT 0 , 10")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$topten = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push playerid in array
		array_push($topten,$r["scorerid"]);
		
	}
	
	// return array
	return $topten;

}

// this function retrieves top3 igolgol.com scorers

function get_top3scorers()
{
	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;


	$result = mysql_query("SELECT scorerid, COUNT( idgoals ) FROM goals
						   WHERE season ='" . $season . "'
						   GROUP BY scorerid ORDER BY COUNT( idgoals ) DESC LIMIT 0 , 5")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$top3 = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push playerid in array
		array_push($top3,$r["scorerid"]);
		
	}
	
	// return array
	return $top3;

}


// this function retrieves top10 igolgol.com assisters
function get_toptenassisters()
{
	$result = mysql_query("SELECT assisterid, COUNT( idgoals ) FROM goals 
						   GROUP BY assisterid ORDER BY COUNT( idgoals ) DESC LIMIT 0 , 10")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$topten = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push playerid in array
		array_push($topten,$r["assisterid"]);
		
	}
	
	// remove key 30 from array since 30 is the playerid of the 'empty player'
	$position = -1;
	for ( $i=0; $i<count($topten); $i++ )
	{
		if ( $topten[$i] == "30" )
		{
			$position = $i;
		}
	}

	if ( $position >= 0 )
	{
		array_splice($topten,(int)$position,1);
	}
	
	// return array
	return $topten;

}

// this function retrieves top10 igolgol.com assisters
function get_top3assisters()
{

	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;
	
	$result = mysql_query("SELECT assisterid, COUNT( idgoals ) FROM goals
						   WHERE season ='" . $season . "'
						   GROUP BY assisterid ORDER BY COUNT( idgoals ) DESC")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$top3 = array();
	$j = 0;
	while (( $r = mysql_fetch_array($result) ) && ( $j<5 ))
	{
		
		// Push playerid in array
		if ( $r["assisterid"] != "30" )
		{
			array_push($top3,$r["assisterid"]);
			$j++;
		}
		
	}
	
	/*
	// remove key 30 from array since 30 is the playerid of the 'empty player'
	$position = -1;
	for ( $i=0; $i<count($top3); $i++ )
	{
		if ( $top3[$i] == "30" )
		{
			$position = $i;
		}
	}

	if ( $position >= 0 )
	{
		array_splice($top3,(int)$position,1);
	}
	*/
	// return array
	return $top3;

}

// this function retrieves the playersid search giving a search string
function get_playersearch($ssearch)
{
	$result = mysql_query("SELECT idplayers FROM players WHERE first_name LIKE '%". $ssearch. "%'
						   OR last_name LIKE '%". $ssearch. "%' LIMIT 0 , 20")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$topten = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push playerid in array
		array_push($topten,$r["idplayers"]);
		
	}
	
	// remove key 30 from array since 30 is the playerid of the 'empty player'
	$position = -1;
	for ( $i=0; $i<count($topten); $i++ )
	{
		if ( $topten[$i] == "30" )
		{
			$position = $i;
		}
	}

	if ( $position >= 0 )
	{
		array_splice($topten,(int)$position,1);
	}
	
	// return array
	return $topten;
}


// this function retrieves the club search giving a search string
function get_clubsearch($ssearch)
{
	$result = mysql_query("SELECT idclubs FROM clubs WHERE club_name LIKE '%". $ssearch. "%' LIMIT 0 , 20")or die(mysql_error());
	
	$num=mysql_numrows($result);
	
	// create array to store the top ten playerids
	$topten = array();
	while ( $r = mysql_fetch_array($result) )
	{
		
		// Push playerid in array
		array_push($topten,$r["idclubs"]);
		
	}
	
	/* remove key xx from array since xx is the clubid of the 'empty club'
	$position = -1;
	for ( $i=0; $i<count($topten); $i++ )
	{
		if ( $topten[$i] == "30" )
		{
			$position = $i;
		}
	}

	if ( $position >= 0 )
	{
		array_splice($topten,(int)$position,1);
	}
	*/
	// return array
	return $topten;
}


// this function prints a preview of a goal
function print_goalpreview($index,$goalid)
{
	$result = mysql_query("SELECT * FROM goals WHERE idgoals=" .$goalid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	echo "<table>";
	
	// print season
	$season = $r["season"];
	$fixture_num = $r["fixture_num"];
	echo "<tr><td colspan=5><b><a onclick='show_goal(" . $goalid . ")'>". $index . ". Season ".  $season. ", Fixture ". $fixture_num. "</a></td></b></tr>";
	
	echo "<tr><td rowspan=3>";
	
	// print video or goal type icon
	// Get the id of the video. We need it to create the correct embeded object for you tube
	$video = $r["video_link"];
	if ( $video != "" )
	{
		$index = strrpos($video, "=");
		$video_value = trim(substr($video,$index+1));
		
		echo "<object width='100' height='100'>
			<param name='movie' value='http://www.youtube.com/v/". $video_value. "&hl=en&fs=1&rel=0&color1=0x2b405b&color2=0x6b8ab6'></param>
			<param name='allowFullScreen' value='false'></param>
			<param name='allowscriptaccess' value='never'></param>
			<embed src='http://www.youtube.com/v/". $video_value. "&hl=en&fs=1&rel=0&color1=0x2b405b&color2=0x6b8ab6' 
			type='application/x-shockwave-flash' allowscriptaccess='never' allowfullscreen='false' width='100' height='100'></embed>
			</object></td>";
	}
	else
	{
		$goal_type = $r["goal_type"];
		echo "<img width='100' onclick='show_goal(" . $goalid . ")' height='100' src='http://www.igolgol.com/images/graphics/goal_types/". $goal_type. ".jpg'></td>";
	}
	
	echo "</tr>";
	
	// print club home logo, name and goals_home (print also minute if this team scored this goal)
	// first, retrieve club home info
	$home_clubid = $r["home_clubid"];
	$clubinfo = get_clubinfo($home_clubid);
	
	$goals_home = $r["goals_home"];
	$scorer_clubid = $r["scorer_clubid"];
	$minute = $r["minute"];
	
	if ($clubinfo["logo"] != "")
	{
		echo "<tr><td align=left><img width='45' onclick='show_club(" . $home_clubid . ")' height='45' src='http://www.igolgol.com/images/club_logos/". $clubinfo["logo"] . "'></td><td colspan=2 align=left><a onclick='show_club(" . $home_clubid . ")'>". $clubinfo["club_name"] ."</a></td><td> </td><td><b>". $goals_home. "</b>";
	}
	else
	{
		echo "<tr><td align=left><img width='45' onclick='show_club(" . $home_clubid . ")' height='45' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td><td colspan=2 align=left><a onclick='show_club(" . $home_clubid . ")'>". $clubinfo["club_name"] ."</a></td><td> </td><td><b>". $goals_home. "</b>";
	}
	if ( $scorer_clubid == $home_clubid )
	{
		echo "   (". $minute. "')";
	}
	echo "</td></tr>";
	
	// print club away logo, name and goals_home (print also minute if this team scored this goal)
	// first, retrieve club home info
	$away_clubid = $r["away_clubid"];
	$clubinfo = get_clubinfo($away_clubid);
	
	$goals_away = $r["goals_away"];
	if ($clubinfo["logo"] != "")
	{
		echo "<tr><td align=left><img width='45' height='45' onclick='show_club(" . $away_clubid . ")' src='http://www.igolgol.com/images/club_logos/". $clubinfo["logo"] . "'></td><td colspan=2 align=left><a onclick='show_club(" . $away_clubid . ")'>". $clubinfo["club_name"] ."</a></td><td> </td><td><b>". $goals_away. "</b>";
	}
	else
	{
		echo "<tr><td align=left><img width='45' height='45' onclick='show_club(" . $away_clubid . ")' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td><td colspan=2 align=left><a onclick='show_club(" . $away_clubid . ")'>". $clubinfo["club_name"] ."</a></td><td> </td><td><b>". $goals_away. "</b>";
	}
	
	if ( $scorer_clubid == $away_clubid )
	{
		echo "   (". $minute. "')";
	}
	echo "</td></tr>";
	
	// print goal scorer name
	$scorerid = $r["scorerid"];
	echo "<tr><td colspan=4>GoalScorer <b><a onclick='show_player(". $scorerid . ")'>". get_playername($scorerid). "</a></b></td></tr>";
	
	// print goal assister name
	$assisterid = $r["assisterid"];
	$assistername = get_playername($assisterid);
	if ( $assistername != "empty empty" )
	{
		echo "<tr><td colspan=5>Assister: <b><a onclick='show_player(". $assisterid . ")'>". $assistername. "</a></b></td></tr>";
	}
	
	// print number of hits
	$num_hits = $r["num_hits"];
	if ( $num_hits > 0 )
	{
		echo "<tr><td colspan=5><a onclick='show_goal(" . $goalid . ")'>Goal reviews: <b>". $num_hits. "</a></b></td></tr>";
	}
	
	// end of goal preview
	echo "</table>";

}

// this function prints a preview of a player
function print_playerpreview($index,$playerid)
{
	$result = mysql_query("SELECT idplayers,first_name,last_name,picture,clubid FROM players WHERE idplayers=" .$playerid)or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	echo "<table>";
	
	// print name
	$firstName=$r["first_name"];
	$lastName=$r["last_name"];
	echo "<tr><td colspan=4><b><a onclick='show_player(". $r["idplayers"] . ")'>". $index . ". " . $firstName. " ". $lastName. "</a></b></td></tr>";
	
	echo "<tr><td rowspan=4>";
	
	// print player�s picture
	// Get the id of the video. We need it to create the correct embeded object for you tube
	$picture = $r["picture"];
	if ($picture != "")
	{
		echo "<img width='100' class='shadowblur' onclick='show_player(". $r["idplayers"] . ")' height='100' src='http://www.igolgol.com/images/players/". $picture. "'></td>";
	}
	else
	{
		echo "<img width='100' class='shadowblur' onclick='show_player(". $r["idplayers"] . ")' height='100' src='http://www.igolgol.com/images/players/no_picture.jpg'></td>";
	}
	
	
	echo "</tr>";
	
	// print player's club logo and name
	// first, retrieve club home info
	$clubid = $r["clubid"];
	$clubinfo = get_clubinfo($clubid);
	
	if ($clubinfo["logo"] != "")
	{
		echo "<tr><td><img width='40' height='40' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/". $clubinfo["logo"] . "'></td><td colspan=2><a onclick='show_club(" . $r["clubid"] . ")'>". $clubinfo["club_name"] ."</a></td></tr>";
	}
	else
	{
		echo "<tr><td><img width='40' height='40' onclick='show_club(" . $r["clubid"] . ")' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td><td colspan=2><a onclick='show_club(" . $r["clubid"] . ")'>". $clubinfo["club_name"] ."</a></td></tr>";
	}
	
	// print number of total goals by player
	$total_goals = get_goalsthisseason($playerid);
	if ( $total_goals == "" )
	{
		$total_goals = 0;
	}
	echo "<tr><td></td><td><img src='../images/graphics/icons/goals.png' width=20 height=20></td>
	          <td><b>". $total_goals. "</b></td></tr>";
	
	// print number of total assists by player
	$total_assists = get_assiststhisseason($playerid);
	if ( $total_assists == "" )
	{
		$total_assists = 0;
	}
	echo "<tr><td></td><td><img src='../images/graphics/icons/assists.png' width=20 height=20></td>
			  <td><b>". $total_assists. "</b></td></tr>";
	
	// end of player preview
	echo "</table>";

}

// this function prints a preview of a club
function print_clubpreview($clubid)
{

	// retrieve club info
	$club_info = get_clubinfo($clubid);
	echo "<table>";
	
	// print name
	echo "<tr><td colspan=2><h3><b><a onclick='show_club(" . $clubid . ")'>".  $club_info["club_name"]. "</a></b></h3></td></tr>";
	
	echo "<tr><td rowspan=2>";
	
	// print club�s picture
	if ($club_info["logo"] != "")
	{
		echo "<img width='100' onclick='show_club(" . $clubid . ")' height='100' src='http://www.igolgol.com/images/club_logos/". $club_info["logo"]. "'></td>";
	}
	else
	{
		echo "<img width='100' onclick='show_club(" . $clubid . ")' height='100' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td>";
	}
	
	
	echo "</tr>";
	
	// print club's website
	echo "<tr><td><a href='". $club_info["website"] . "'>". $club_info["website"] ."</td></tr>";
	
	// end of club preview
	echo "</table>";

}

// Function to avoid SQL injection (database attacks)
function check_input($value)
{
// Stripslashes
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// Quote if not a number
if (!is_numeric($value))
  {
  $value = "'" . mysql_real_escape_string($value) . "'";
  }
return $value;
}

// Function to retrieve all the goalkeepers of a team
function getclubplayers($clubid)
{
	// remember, 30 is the empty player
	// get first the goalkeepers
	$result_gk = mysql_query("SELECT idplayers,first_name,last_name,position FROM players 
						   WHERE clubid=". $clubid. " AND idplayers<>30 AND position='gk'")or die(mysql_error());
	
	$num_gk =mysql_numrows($result_gk);
	
	// create array to store the top ten playerids
	$players = array();
	while ( $r_gk = mysql_fetch_array($result_gk) )
	{
		
		// Push playerid in array
		array_push($players,$r_gk["position"].$r_gk["idplayers"]. "." .$r_gk["first_name"]. " ". $r_gk["last_name"]);

	}

	// get defenders
	$result_df = mysql_query("SELECT idplayers,first_name,last_name,position FROM players 
						   WHERE clubid=". $clubid. " AND idplayers<>30
						   AND (position='lb' OR position='df' OR position='rb' OR position='cb')")or die(mysql_error());
	
	$num_df =mysql_numrows($result_df);
	// add records to array
	while ( $r_df = mysql_fetch_array($result_df) )
	{
		
		// Push playerid in array
		array_push($players,$r_df["position"].$r_df["idplayers"]. "." .$r_df["first_name"]. " ". $r_df["last_name"]);
	}
	
	// get midfielders
	$result_mf = mysql_query("SELECT idplayers,first_name,last_name,position FROM players 
						   WHERE clubid=". $clubid. " AND idplayers<>30
						   AND (position='dm' OR position='lm' OR position='cm' OR position='rm' OR position='am')")or die(mysql_error());
	
	$num_mf =mysql_numrows($result_mf);
	// add records to array
	while ( $r_mf = mysql_fetch_array($result_mf) )
	{
		
		// Push playerid in array
		array_push($players,$r_mf["position"].$r_mf["idplayers"]. "." .$r_mf["first_name"]. " ". $r_mf["last_name"]);
	}
	
	// get attackers
	$result_at = mysql_query("SELECT idplayers,first_name,last_name,position FROM players 
						   WHERE clubid=". $clubid. " AND idplayers<>30
						   AND (position='lw' OR position='at' OR position='rw')")or die(mysql_error());
	
	$num_at =mysql_numrows($result_at);
	// add records to array
	while ( $r_at = mysql_fetch_array($result_at) )
	{
		
		// Push playerid in array
		array_push($players,$r_at["position"].$r_at["idplayers"]. "." .$r_at["first_name"]. " ". $r_at["last_name"]);
	}	
	
	// return array
	return $players;

}

// Function to retrieve the attendance of a player in a season
function getplayerattendance($playerid)
{

	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;
	
	//retrieve attendance for player
	$result = mysql_query("SELECT attendance FROM players_have_tr_att 
						   WHERE player_id=". $playerid. " AND season='". $season."'")or die(mysql_error());
	
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	return $r["attendance"];
}

// Function to retrieve the number of games played of a player in a season
function getgamesplayed($playerid,$club)
{

	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;
	
	//retrieve games_played for player
	$result = mysql_query("SELECT COUNT(player_id) AS num_games
						   FROM players_have_played_games 
						   WHERE player_id=". $playerid. " AND clubid='" . $club . "' AND season='". $season."'")or die(mysql_error());
	
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	if ($num)
	{
		return $r["num_games"];
	}
	else return 0;
}

// Function to retrieve the number of clean sheets of a player in a season
function getcleansheets($playerid,$club)
{

	// Construct season string depending in today's date
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
	$season = $season_start . "/" . $season_end;
	
	//retrieve games_played for player
	$result = mysql_query("SELECT COUNT(player_id) AS clean_sheets
						   FROM players_have_clean_sheet 
						   WHERE player_id=". $playerid. " AND clubid='" . $club . "' AND season='". $season."'")or die(mysql_error());
	
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	if ($num)
	{
		return $r["clean_sheets"];
	}
	else return 0;
}

// Function that returns current season
function getcurrentseason()
{
	// Construct season string depending in today's date
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
	return $season_start . "/" . $season_end;
}

// Function that returns current season
function outputdate($converted_date)
{
	$day = substr($converted_date,8,2);
	$month = substr($converted_date,5,2);
	$year = substr($converted_date,0,4);
	return date("j F Y", mktime(0, 0, 0,$month,$day, $year));
}

// function to retrieve the next game
function getnextfixture($clubid)
{
	// calculate season
	$season = getcurrentseason();
	// get fixtures
	$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $season . "' AND (fix_club_home='".$clubid . "' OR fix_club_away='".$clubid . "') ORDER BY fix_date ASC")or die(mysql_error());
	$num=mysql_numrows($result);

	// if there are fixtures
	if ($num)
	{
		// Initialize varuable
		$found = false;
		$today = time();
		// go through the records and stop when you find the next fixture in time
		while ( ($r = mysql_fetch_array($result)) && (! $found) )
		{
			// if today's date is bigger than fixture date then we have found the next fixture
			$day = substr($r[fix_date],8,2);
			$month = substr($r[fix_date],5,2);
			$year = substr($r[fix_date],0,4);
			$nextfix = mktime(0,0,0,$month,$day,$year);
			if ( $today <= $nextfix )
			{
				$found = true;
				$nextfixture = $r[fix_number];
			}
		}

		// return next fixture
		return $nextfixture;
	}
	else
	{
		// return "No coming games scheduled"
		return 0;
	}

}

// Function to calculate the number of players of a club
function numberplayers($clubid)
{
	// get first all the players
	$result= mysql_query("SELECT COUNT(idplayers) AS numplayers FROM players 
						   WHERE clubid=". $clubid)or die(mysql_error());
	$r = mysql_fetch_array($result);
	return $r["numplayers"];
}

// Function to calculate the number of games already played of a club
function numplayedgames($clubid)
{
	// get current season
	$season = getcurrentseason();

	// get result
	$result= mysql_query("SELECT COUNT(fix_number) AS numgames FROM fixtures 
						   WHERE fix_goals_home>-1
						   AND fix_season='". $season ."'
						   AND (fix_club_home=".$clubid." OR fix_club_away=".$clubid.")")or die(mysql_error());
	$r = mysql_fetch_array($result);
	return $r["numgames"];
}

// Function to calculate sum of trainings for all players in a club in a season
function totalnumbertrainings($clubid,$season)
{
	// get first all the players
	$result= mysql_query("SELECT idplayers FROM players 
						   WHERE clubid=". $clubid)or die(mysql_error());
	//$num=mysql_numrows($result);
	$count = 0;
	while ( $r = mysql_fetch_array($result) )
	{
		$count += getplayerattendance($r["idplayers"]);
	}
	return $count;
}

// Function to calculate count of goals scored in a season for a club
function totalclubgoals($clubid,$season)
{
	// construct sql query
	$result= mysql_query("SELECT COUNT(idgoals) AS numgoals FROM goals 
						   WHERE season='$season'
						   AND (away_clubid='". $clubid."' OR home_clubid='". $clubid."')")or die(mysql_error());
	//$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	return $r["numgoals"];
}

// Function to calculate count of assists in a season for a club
function totalclubassists($clubid,$season)
{
	// construct sql query
	$result= mysql_query("SELECT COUNT(idgoals) AS numassists FROM goals 
						   WHERE season='$season'
						   AND (away_clubid='". $clubid."' OR home_clubid='". $clubid."')
						   AND assisterid<>'30'")or die(mysql_error());
	//$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	return $r["numassists"];
}

// Function to calculate count of cleansheets in a season for a club
function totalclubcleansheets($clubid,$season)
{
	// construct sql query
	$result= mysql_query("SELECT COUNT(player_id) AS numcleansheets FROM players_have_clean_sheet 
						   WHERE season='$season'
						   AND clubid='". $clubid."'")or die(mysql_error());
	//$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	return $r["numcleansheets"];
}

?>

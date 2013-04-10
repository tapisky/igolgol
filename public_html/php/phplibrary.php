<?php 

// Connects to your Database
function dbconnect()
{
	mysql_connect("", "", "") or die(mysql_error()); 
	mysql_select_db("igolgolc_goals") or die(mysql_error()); 
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

// this function returns the number of total assists made by a given player
function get_totalassists($playerid)
{
	$result = mysql_query("SELECT assisterid, COUNT( idgoals ) FROM goals WHERE assisterid=" .$playerid. " GROUP BY assisterid")or die(mysql_error());
	$num=mysql_numrows($result);
	$r = mysql_fetch_array($result);
	
	$num_assists = $r['COUNT( idgoals )'];
	return $num_assists;
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
	echo "<tr><td colspan=5><b><a onclick='show_goal(" . $goalid . ")'>". $index . ". Temporada ".  $season. ", Jornada ". $fixture_num. "</a></td></b></tr>";
	
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
	echo "<tr><td colspan=4><b>Gol</b> de <b><a onclick='show_player(". $scorerid . ")'>". get_playername($scorerid). "</a></b></td></tr>";
	
	// print goal assister name
	$assisterid = $r["assisterid"];
	$assistername = get_playername($assisterid);
	if ( $assistername != "empty empty" )
	{
		echo "<tr><td colspan=5><b>Asistencia</b> de <b><a onclick='show_player(". $assisterid . ")'>". $assistername. "</a></b></td></tr>";
	}
	
	// print number of hits
	$num_hits = $r["num_hits"];
	if ( $num_hits > 0 )
	{
		echo "<tr><td colspan=5><a onclick='show_goal(" . $goalid . ")'><b>Gol</b> visto <b>". $num_hits. " veces</a></b></td></tr>";
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
		echo "<img width='100' onclick='show_player(". $r["idplayers"] . ")' height='100' src='http://www.igolgol.com/images/players/". $picture. "'></td>";
	}
	else
	{
		echo "<img width='100' onclick='show_player(". $r["idplayers"] . ")' height='100' src='http://www.igolgol.com/images/players/no_picture.jpg'></td>";
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
	$total_goals = get_totalgoals($playerid);
	if ( $total_goals == "" )
	{
		$total_goals = 0;
	}
	echo "<tr><td colspan=3>Goles: <b>". $total_goals. "</b></td></tr>";
	
	// print number of total assists by player
	$total_assists = get_totalassists($playerid);
	if ( $total_assists == "" )
	{
		$total_assists = 0;
	}
	echo "<tr><td colspan=3>Asistencias: <b>". $total_assists. "</b></td></tr>";
	
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
?>

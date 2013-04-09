<?php

//if the login form is submitted
if (isset($_POST['submit']))
{ // if form has been submitted

	if ($_POST['username1'] != "" )
	{
		$username1 =  $_POST['username1'] ;
		$check1 = mysql_query("SELECT username, password, email FROM users WHERE username = '$username1'")or die(mysql_error()); 
		while($info1 = mysql_fetch_array( $check1 )) 
		{
			$email = $info1['email'];
			$subject = "NOREPLY: Your igolgol.com Password";
			$message = $info1['password'] ;
			echo "email:$email<br>subject$subject<br>message$message";
			mail($email,$subject,$message);
			die ('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
			      An email containing the password has been sent to the specified email address. 
			<br><a href="http://www.igolgol.com/indexen.php"><< Back</a>');
		}
	}

	// makes sure they filled in username and password for username
	else if(!$_POST['username'] | !$_POST['pass'])
	{
		die('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
		     All fields must be filled! <br><a href="http://www.igolgol.com/indexen.php"><< Back</a>');
	}
	// checks it against the database
	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());

	//Gives error if user doesn't exist
	$check2 = mysql_num_rows($check);
	if ($check2 == 0)
	{
		die ('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
		      The specified user does not exist. <br><a href="http://www.igolgol.com/indexen.php"><< Back</a>');
	}
	while($info = mysql_fetch_array( $check )) 
	{
		$_POST['pass'] = stripslashes($_POST['pass']);
		$info['password'] = stripslashes($info['password']);
		$_POST['pass'] = md5($_POST['pass']);
		$info['password'] = md5($info['password']);
		//gives error if the password is wrong
		if ($_POST['pass'] != $info['password'])
		{
			die('<link rel="stylesheet" type="text/css" href="http://www.igolgol.com/igolgol.css" />
			    Wrong Password, try again.
				<br><a href="http://www.igolgol.com/indexen.php"><< Back</a>');
		}

		else 
		{
			// if login is ok then we add a cookie 
			$_POST['username'] = stripslashes($_POST['username']); 
			$hour = time() + 3600; 
			setcookie(ID_my_site, $_POST['username'], $hour); 
			setcookie(Key_my_site, $_POST['pass'], $hour); 

			//then reload the page with the new content
			header("Location: ". $_SERVER['PHP_SELF']); 
		}
	} 
} 

	// print information
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>igolgol-football club</title>
	<link href="http://www.igolgol.com/igolgol.css" rel="stylesheet" type="text/css" />
	
	</head>
	
	<script language='Javascript'>
	
	function show_club(id)
	{
		if ( id != 0 )
		{
			document.showclub.id.value = id;
			document.showclub.submit();
		}
	}
	
	function show_player(id)
	{
		if ( id != 0 )
		{
			document.showplayer.id.value = id;
			document.showplayer.submit();
		}
	}
	
	function show_goal(id)
	{
		if ( id != 0 )
		{
			document.showgoal.id.value = id;
			document.showgoal.submit();
		}
	}
	
	function show_fixtures(id)
	{
		if ( id != 0 )
		{
			document.showfixtures.id.value = id;
			document.showfixtures.submit();
		}
	}
	
	function add_player(id)
	{
		if ( id != 0 )
		{
			document.addplayer.id.value = id;
			document.addplayer.submit();
		}
	}
	
	function show_league_info(id)
	{
		if ( id != 0 )
		{
			document.leagueinfo.id.value = id;
			document.leagueinfo.submit();
		}
	}
	
	//function to show details of a fixture
	function show_fixture(numfixture,season)
	{
		document.showfixture.action = "fixtures/show_fixture.php";
		document.showfixture.numfixture.value = numfixture;
		document.showfixture.season.value = season;
		document.showfixture.submit();
	}
	
	//function to hide the white layer after the content is loaded
	function loaded()
	{
		document.getElementById('blanklayer').style.visibility = 'hidden';
	}

	</script>
	
	<body onload='loaded()'>
	
	
	<div id='user_info' class='currentuser'>
		<form name='showclub' action='http://www.igolgol.com/clubs/show_cluben.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		<form name='showplayer' action='http://www.igolgol.com/players/show_playeren.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		<form name='showgoal' action='http://www.igolgol.com/goals/show_goal.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		<form name='showfixtures' action='http://www.igolgol.com/fixtures/control_fixtures.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		<form name='addplayer' action='http://www.igolgol.com/players/add_playeren.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		<form name='leagueinfo' action='http://www.igolgol.com/clubs/league_info.php' method='post'>
			<input type='hidden' name='id' value=''>
		</form>
		
		
<?php
	
	// get user info
	if(isset($_COOKIE['ID_my_site']))
	{
		$info = get_userinfo($_COOKIE['ID_my_site']);
		
		// print user큦 name
		echo $_COOKIE['ID_my_site']. "<br>";
		
		// print user's type and club (if applicable)
		switch ($info["type"])
		{
			case 1:
				echo "Admin<br>";
				break;
			case 2:
				echo "Manager<br>";
				// print club's logo
				// get user큦 club
				$club = get_managerclubid($info["id"]);
				
				if ( $club > 0 )
				{
					// get club info
					$clubinfo = get_clubinfo($club);
					//print club큦 logo
					if ( $clubinfo["logo"] <> "" )
					{
						echo "<img width='50' height='50' onclick='show_club(" . $club . ")' src='http://www.igolgol.com/images/club_logos/". $clubinfo["logo"] . "'>";
					}
					else
					{
						echo $clubinfo["club_name"];
					}
				}
				break;
			case 3:
				echo "Jugador<br>";
				// print club's logo
				// get user큦 club
				$playerid = get_userplayerid($info["id"]);
				
				if ( $playerid > 0 )
				{
					// get player큦 club
					$club = get_playerclubid($playerid);
				
					// get club info
					$clubinfo = get_clubinfo($club);
					//print club큦 logo
					if ( $clubinfo["logo"] <> "" )
					{
						echo "<img width='50' height='50' src='http://www.igolgol.com/images/club_logos/". $clubinfo["logo"] . "' onclick='show_club(" . $club . ")'>";
					}
					else
					{
						echo $clubinfo["club_name"];
					}
				}
				break;
			case 4:
				echo "Aficionado<br>";
				break;
			default:
				break;
		}
	}
	
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
	
	
?>
	</div>
	<div class="header">
		<table border="0" align="center" cellpadding="3">
<?
// select para recuperar el equipo del que esta conectado
if (isset($_COOKIE['ID_my_site']))
{
	$check = mysql_query("SELECT * FROM users WHERE username = '".$_COOKIE['ID_my_site']."'")or die(mysql_error());
	$info = mysql_fetch_array( $check );
	$clubid = $info[clubid];
}
else $clubid = 14; // hardcoded for De Meer 4

?>
			<tr>
				<td><a href='http://www.igolgol.com/indexen.php'>HOME</a></td>
				<td>|<a href='#' onclick='show_club(<?echo $clubid; ?>)'> View Squad</a></td>
				<td>|<a href='#' onclick='show_fixtures(<?echo $clubid; ?>)'> Fixtures</a></td>
				<td>|<a href='#' onclick='show_league_info(<?echo $clubid; ?>)'> League Info</a></td>
<?
if (isset($_COOKIE['ID_my_site']))
{
?>
				<td>|<a href='#' onclick='add_player(<?echo $clubid; ?>)'> Add Player</a></td>
				<?/*<td><a href='http://www.igolgol.com/season/show_season.php'>| Season <? echo $season; ?></a></td>*/?>
<?php
}
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 3 )
	{
		// user is admin or manager so he/she can create/edit info

		
			//<td><a href='http://www.igolgol.com/players/create_player.php'>| Create Player</a></td>
	}
	elseif ( $info["type"] == 3 ) // user can edit his player info
	{

			//<td><a href='http://www.igolgol.com/players/edit_player.php'>| Edit Player</a></td>
	
	}
	
	if ( $info["type"] < 4 )
	{
		// user is admin, manager or player so he/she can create goals

			
		//	<td><a href='http://www.igolgol.com/goals/create_goal.php'>| Add Goal</a></td>
			
	}
}
?>
					
			</tr>
							
		</table>
	</div>

<?php			
if(!isset($_COOKIE['ID_my_site']))
{
	// if user is not logged in, print login form
?>
	<div id='logindiv' class='logindiv'>
		<form name='loginform' action="http://www.igolgol.com/indexen.php" method="post">
			<table align="center" class="loginbox" >
				<tr><td><FONT SIZE="2">User:</FONT></td><td> 
				<input type="text" name="username" maxlength="40"> 
				</td></tr> 
				<tr><td><FONT SIZE="2">Password:</FONT></td><td> 
				<input type="password" name="pass" maxlength="50"> 
				</td></tr> 
				<tr><td colspan="2" align="right"> 
				<input type="submit" name="submit" value="Login"> 
				</td></tr>
				<tr><td><div id='loginmsg'></div>
			</table></td></tr>
		</form>
	</div>	
	
<?php	
}
?>	
	

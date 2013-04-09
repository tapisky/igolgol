<?php 
/*
Goal test
*/
?>

<html>

<?php 

include("../php/phplibraryen.php");// Include for goal php functions
dbconnect(); // connection to database

//////////////////////////////
/////////Header//////////////
//////////////////////////////
// print header (menus, login form, user info etc...)
include("../php/headeren.php");// Include for header content

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
// make a note of the location of the upload handler script
//$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'process_tr_att.php';

// get club info
$clubid = $_POST['id'];
$club_info = get_clubinfo($clubid);
?>

<script type="text/javascript">
<!--//

// function to process attendance and played games
function changeaction(url)
{
    document.attendance.action = url;
	document.attendance.submit();
}

// function to process added goals
function processthisgoal(playerid,goaltype,assisterid,fixtureid)
{
	document.attendance.scorerid.value = playerid;
	document.attendance.assisterid.value = assisterid;
	document.attendance.goaltype.value = goaltype;
	document.attendance.fixture.value = fixtureid;
	document.attendance.action = "../goals/upload_goalen.php";
	document.attendance.submit();

}

// function to control penalty goals
function controlgoal(selectedgoaltype,selectedassister)
{
	//if selected is Penalty, then assister must be 30 and disable select
	if ( selectedgoaltype.value == "pk" )
	{
		selectedassister.selectedIndex = 0;
		selectedassister.disabled = true;
	}
	else
	{
		selectedassister.disabled = false;
	}

}
//-->
</script>

	<div class='preload' id='blanklayer'>
	</div>
	
	<div id='clubdetails' class='clubdetails'>
		<table align='left'>

				<tr>
					<td rowspan=3>
<?
if ($club_info["logo"] == "")
{
?>
					<img width='100' class='shadowblur' height='100' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td>
<?
}
else
{
?>
					<img width='100' class='shadowblur' height='100' src='http://www.igolgol.com/images/club_logos/<?php echo $club_info["logo"]; ?>'></td>
<?
}
?>
					<td><b><h1><?php echo $club_info["club_name"]; ?></h1></b></td>
				</tr>
				<tr>
					<td><a href='<?php echo $club_info["website"]; ?>'><?php echo $club_info["website"]; ?></a></td>
				</tr>
			</table>
			
	</div>
	
	<div id='clubplayers' class='clubplayersright'>
	
	
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		// user is admin, create form to process attendance
?>
		<form name="attendance" action="" enctype="multipart/form-data" method="post">
			<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
			<input type='hidden' name='scorerid' value='0'>
			<input type='hidden' name='assisterid' value='0'>
			<input type='hidden' name='goaltype' value='left_foot'>
			<input type='hidden' name='fixture' value=''>
<?
	}
}
?>
	
<?php
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

// get club players in an array
$players_array = getclubplayers($clubid);
?>
		<table align='center' cellspacing="5">
			<tr>
<?
	// checkboxes if user is admin to process attendance and games played
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// form to process attendance			
			// add check box
			echo "<td align='center'>";
			echo "</td>";
		}
	}
?>
				<td><b>Pos</b>
				</td>
				<td>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/cone.png' width=33 height=33 title='Training attendances'>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/played.png' width=24 height=27 title='Games played'>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/goals.png' width=27 height=27 title='Goals scored'>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/assists.png' width=30 height=30 title='Assists'>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/clean_sheet.png' width=25 height=25 title='Clean sheets'>
				</td>
			</tr>
<?php
for ( $i=0; $i<=count($players_array)-1; $i++ )
{

	// checkboxes if user is admin to process attendance and games played
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// form to process attendance			
			// add check box
			echo "<tr ><td align='center'>";
?>
			<input type="checkbox" name='<? echo substr($players_array[$i],2,strrpos($players_array[$i],".") - 2);  ?>' id='<? substr($players_array[$i],2,strrpos($players_array[$i],".") - 2);  ?>' />
<?
			echo "</td>";
		}
	}
	
	echo "<td>";
	// position
	echo substr($players_array[$i],0,2);
	echo "</td>";
	// name
	echo "<td>";
	echo "<a href='#' onclick='show_player(". substr($players_array[$i],2,strrpos($players_array[$i],".") - 2). ")'>". substr($players_array[$i],strrpos($players_array[$i],".") + 1). "</a>";
	echo "</td>";
	// attendance
	echo "<td align='center'><b>";
	if ( getplayerattendance(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2)) =='' )
	{
		$sql="INSERT INTO players_have_tr_att (player_id,season,attendance) VALUES ('". substr($players_array[$i],2,strrpos($players_array[$i],".") - 2) . "','" .$season. "','0')";

		if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}
		else
		{
			echo "0";
		}
	
	}
	else
	{
		echo getplayerattendance(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2));
	}
	echo "</b></td>";
	// games played
	echo "<td align='center'><b>";
	echo getgamesplayed(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2),$clubid);
	echo "</b></td>";
	
	// goals scored
	echo "<td align='center'><b>";
	echo get_goalsthisseason(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2));
	echo "</b></td>";
	
	// assists this season
	echo "<td align='center'><b>";
	echo get_assiststhisseason(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2));
	echo "</b></td>";
	
	// clean sheets this season
	echo "<td align='center'><b>";
	echo getcleansheets(substr($players_array[$i],2,strrpos($players_array[$i],".") - 2),$clubid);
	echo "</b></td>";
	
	// checkboxes if user is admin to process attendance and games played
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// form to process attendance			
			// goal combo boxes (goal type, assister id) and add button
			//goal type
			echo "<td align='center'>";
?>
			<select name='goaltype_<? echo substr($players_array[$i],2,strrpos($players_array[$i],".") - 2); ?>' onchange='controlgoal(this,document.attendance.assister_<? echo substr($players_array[$i],2,strrpos($players_array[$i],".") - 2);?>)'>
				<option value="left_foot">Left foot</option>
				<option value="right_foot">Right foot</option>
				<option value="header">Header</option>
				<option value="pk">Penalty</option>
			</select>
<?
			echo "</td>";
			//assister id
			echo "<td align='center'>";
?>
			<select name='assister_<? echo substr($players_array[$i],2,strrpos($players_array[$i],".") - 2); ?>'>
				<option value="30">No assist</option>
<?
			for ( $j=0; $j<=count($players_array)-1; $j++ )
			{
				if ( substr($players_array[$j],2,strrpos($players_array[$j],".") - 2) != substr($players_array[$i],2,strrpos($players_array[$i],".") - 2))
				{
					echo "<option value='". substr($players_array[$j],2,strrpos($players_array[$j],".") - 2). "'>".substr($players_array[$j],strrpos($players_array[$j],".") + 1)."</option>";
				}
			}

			echo "</select>";
			echo "</td>";
			
			// fixture information
			// get fixtures and print them plus add goal button if there are fixtures
			$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $season . "' AND (fix_club_home='".$clubid . "' OR fix_club_away='".$clubid . "') ORDER BY fix_number")or die(mysql_error());
			$num=mysql_numrows($result);
			if ($num)
			{
				echo "<td align='center'>";
?>
			<select name='fixture_<? echo substr($players_array[$i],2,strrpos($players_array[$i],".") - 2); ?>'>
<?
				while ( $r = mysql_fetch_array($result) )
				{
					// pre-select the last fixture
					$today = time();
					$day = substr($r[fix_date],8,2);
					$month = substr($r[fix_date],5,2);
					$year = substr($r[fix_date],0,4);
					$nextfix = mktime(0,0,0,$month,$day,$year);
					if ( $today < $nextfix )
					{
						echo "<option value='". $r["fix_number"] ."'>". outputdate($r["fix_date"]) . "</option>";
					}
					else
					{
						echo "<option value='". $r["fix_number"] ."' selected>". outputdate($r["fix_date"]) . "</option>";
					}
				}

				echo "</select>";
				echo "</td>";
			
				//add goal button
				$iid = substr($players_array[$i],2,strrpos($players_array[$i],".") - 2);
				$sName = substr($players_array[$i],strrpos($players_array[$i],".") + 1);
				echo "<td align='center'>";
				$goaltype = "document.attendance.goaltype_". $iid . ".value";
				$assisterid = "document.attendance.assister_". $iid . ".value";
				$fixtureid = "document.attendance.fixture_". $iid . ".value";
				echo "<input type='button' name='add_". $iid ."' onclick='processthisgoal(". $iid .",".$goaltype.",".$assisterid.",".$fixtureid.")' value='+Goal'>";
				echo "</td>";
			}
		}
	}
		
	echo "</tr>";

}

	echo "</table>";
	echo "<br>";
	
	// if admin, add button for processing attendance
	if(isset($_COOKIE['ID_my_site']))
	{
		if ( $info["type"] < 2 )
		{
			// user is admin, create button to process attendance
?>
		<center>
			<input type="button" value="[+1 Att]" onclick='changeaction("process_tr_att.php")'>
			<input type="button" value="[-1 Att]" onclick='changeaction("process_tr_att_dec.php")'>
			<input type="button" value="[+1 Game]" onclick='changeaction("process_games.php")'>
			<input type="button" value="[-1 Game]" onclick='changeaction("process_games_dec.php")'>
			<input type="button" value="[+1 Clean]" onclick='changeaction("process_clean_sheet.php")'>
			<input type="button" value="[-1 Clean]" onclick='changeaction("process_clean_sheet_dec.php")'>
<?
// get fixtures and print them plus add goal button if there are fixtures
			$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $season . "' AND (fix_club_home='".$clubid . "' OR fix_club_away='".$clubid . "') ORDER BY fix_number")or die(mysql_error());
			$num=mysql_numrows($result);
			if ($num)
			{
?>
			<select name='gameplayed'>
<?
				while ( $r = mysql_fetch_array($result) )
				{
					// pre-select the last fixture
					$today = time();
					$day = substr($r[fix_date],8,2);
					$month = substr($r[fix_date],5,2);
					$year = substr($r[fix_date],0,4);
					$nextfix = mktime(0,0,0,$month,$day,$year);
					if ( $today < $nextfix )
					{
						echo "<option value='". $r["fix_number"] ."'>". outputdate($r["fix_date"]) . "</option>";
					}
					else
					{
						echo "<option value='". $r["fix_number"] ."' selected>". outputdate($r["fix_date"]) . "</option>";
					}
				}
			}
?>
			</select>
		</center>
<?
		
		}
	}
?>

	</div>
	
</html>
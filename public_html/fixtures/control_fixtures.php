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
$club_division = get_clubdivisioninfo($clubid);
?>

<script type="text/javascript">
<!--//

// add fixture
function addnewfixture()
{
	document.fixtures.date.value = document.fixtures.year.value + "-" + document.fixtures.month.value + "-" + document.fixtures.day.value;
	document.fixtures.time.value = document.fixtures.hour.value + ":" + document.fixtures.minute.value;
	document.fixtures.action = "add_fixture.php";
	document.fixtures.submit();
}

// disable add fixture button if teams are equal
function checkclub()
{
	if ( document.fixtures.home_club.selectedIndex == document.fixtures.away_club.selectedIndex )
	{
		document.fixtures.addfixture.disabled = true;
	}
	else
	{
		document.fixtures.addfixture.disabled = false;
	}
}

// function to add result to a fixture
function processthisresult(fixnumber,scoredhome,scoredaway)
{
	document.fixtures.fixture_number_result.value = fixnumber;
	document.fixtures.scored_home.value = scoredhome.value;
	document.fixtures.scored_away.value = scoredaway.value;
	document.fixtures.action = "add_result_to_fixture.php";
	document.fixtures.submit();
}

// function to delete a result from a fixture
function processthisresultdelete(fixnumber)
{
	document.fixtures.fixture_number_result.value = fixnumber;
	document.fixtures.action = "delete_result_from_fixture.php";
	document.fixtures.submit();
}

// functin to delete selected fixtures
function deletefixture()
{
	document.fixtures.action = "delete_fixtures.php";
	document.fixtures.submit();
}

//function to show details of a fixture
function show_fixture(numfixture,season)
{
	document.showfixture.action = "show_fixture.php";
	document.showfixture.numfixture.value = numfixture;
	document.showfixture.season.value = season;
	document.showfixture.submit();
}

//-->
</script>

	<div class='clubid'>
<?
if ($club_info["logo"] == "")
{
?>
					<img width='50' height='50' src='http://www.igolgol.com/images/club_logos/no_picture.jpg'></td>
<?
}
else
{
?>
					<img width='50' height='50' src='http://www.igolgol.com/images/club_logos/<?php echo $club_info["logo"]; ?>'></td>
<?
}
?>
	</div>


	<div id='fixturedetails' class='fixturedetails'>
			
		
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		// user is admin, create form to process fixtures
?>
		<form name="fixtures" action="" enctype="multipart/form-data" method="post">
			<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
			<input type='hidden' name='date' value=''>
			<input type='hidden' name='time' value=''>
			<input type='hidden' name='fixture_number' value=''>
			<input type='hidden' name='fixture_number_result' value=''>
			<input type='hidden' name='scored_home' value=''>
			<input type='hidden' name='scored_away' value=''>
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

?>
		<h2>Fixtures <? echo $season; ?></h2>
		<table cellspacing="10">
			<tr>
<?
	//checkbox for admin
	// checkboxes if user is admin to process attendance and games played
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// form to process results			
			// add check box column
			echo "<td align='center'>";
			echo "</td>";
		}
	}
?>
				<td><u><b>No.</u></b>
				</td>
				<td><u><b>Date</u></b>
				</td>
				<td><u><b>Time</u></b>
				</td>
				<td><u><b>Home</u></b>
				</td>
				<td><u><b>Away</u></b>
				</td>
				</td>
				<td><u><b>Result</u></b>
				</td>
<?
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( ($info["type"] < 2) && ($r["fix_goals_home"] == "") )
		{
			// add result combo boxes
			echo "<td align='center'>";
			echo "</td>";
			echo "<td align='center'>";
			echo "</td>";
			echo "<td align='center'>";
			echo "</td>";
		}
	}
?>
				<?/*
				<td align='center' width=45>
					<img src='../images/graphics/icons/cone.png' width=33 height=33>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/played.png' width=24 height=27>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/goals.png' width=27 height=27>
				</td>
				<td align='center' width=45>
					<img src='../images/graphics/icons/assists.png' width=30 height=30>
				</td>
				*/?>
			</tr>
<?php
// get fixtures
$result = mysql_query("SELECT * FROM fixtures WHERE fix_season='". $season . "' AND (fix_club_home='".$clubid . "' OR fix_club_away='".$clubid . "') ORDER BY fix_number")or die(mysql_error());
$num=mysql_numrows($result);

// array to store fixture numbers so that we won´t give the user the option to add a fixture number which already exists
$fixture_numbers = array();
while ( $r = mysql_fetch_array($result) )
{
?>	
	<tr> 
<?
	//onMouseOver="this.bgColor = 'cyan'" onMouseOut ="this.bgColor = '#FFFFFF'" bgcolor="#FFFFFF">
	// checkboxes if user is admin to process attendance and games played
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// form to process attendance			
			// add check box
			echo "<td align='center'>";
?>
			<input type="checkbox" name='<? echo $r["fix_number"]; ?>' id='<? echo $r["fix_number"]; ?>' />
<?
		}
			echo "</td>";
	}
	echo "<td align='left' width='30px'>";
	// fixture number
	echo "<a>" .$r["fix_number"]. "</a>";
	$fixture_numbers[] = $r["fix_number"];
	echo "</td>";
	// fixture date
	echo "<td align='left' width='450px'>";
	echo outputdate($r["fix_date"]);
	echo "</td>";
	// fixture time
	echo "<td align='left' width='250px'>";
	echo ($r["fix_time"]);
	echo "</td>";
	// fixture club home
	echo "<td align='left' width='220px'>";
	echo get_clubname($r["fix_club_home"]);
	echo "</td>";
	// fixture club away
	echo "<td align='left' width='220px'>";
	echo get_clubname($r["fix_club_away"]);
	echo "</td>";
	// fixture result
	echo "<td align='left' width='220px'>";
	if ($r["fix_goals_home"] != "")
	{
		echo "<a href='#' onclick='show_fixture(". $r["fix_number"] .",\"". $season . "\")'><em><b>".$r["fix_goals_home"] . " - " . $r["fix_goals_away"]."<em><b></a>";
		echo "</td>";
	}
	else
	{
		echo "Not played yet";
	}
	
	// controls to add a result
	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( ($info["type"] < 2) && ($r["fix_goals_home"] == "") )
		{
			// form to process new results		
			// add results home select
			echo "<td align='center'>";
?>
			<select name='addresulthome_<? echo $r["fix_number"]; ?>'>
<?
			for ( $i=0;$i<=20;$i++ )
			{
				echo "<option value='". $i . "'>". $i ."</option>";
			}
			echo "</select>";
			echo "</td>";
			
			echo "<td>-</td>";
			
		
			// form to process new results		
			// add results away select
			echo "<td align='center'>";
?>
			<select name='addresultaway_<? echo $r["fix_number"]; ?>'>
<?
			for ( $i=0;$i<=20;$i++ )
			{
				echo "<option value='". $i . "'>". $i ."</option>";
			}
			echo "</select>";
			echo "</td>";


			// add results button
			echo "<td align='center'>";
			$scored_home = "document.fixtures.addresulthome_" . $r["fix_number"];
			$scored_away = "document.fixtures.addresultaway_" . $r["fix_number"];
			echo "<input type='button' name='add_". $r["fix_number"] ."' onclick='processthisresult(". $r["fix_number"] .",".$scored_home.",".$scored_away.")' value='+Result'>";
			echo "</td>";
		}
		else
		{
			// add 'delete result' button
			echo "<td align='center' colspan=3>";
			echo "<input type='button' name='delete_". $r["fix_number"] ."' onclick='processthisresultdelete(". $r["fix_number"] .")' value='-Result'>";
			echo "</td>";
		}
	}
		
	echo "</tr>";
	
}

	if(isset($_COOKIE['ID_my_site']))
	//if user logged, we need to check what kind of user it is and display the right menus according to security
	{
		if ( $info["type"] < 2 )
		{
			// add controls to add new fixtures
			echo "<tr>";
			echo "<td></td>";
			// fixture number
			echo "<td align='left'>";
?>
			<select name='fixture_number'>
<?
			
			for ( $i=1;$i<=42;$i++ )
			{
				if (! in_array($i,$fixture_numbers))
				{
					echo "<option value='". $i  . "'>". $i ."</option>";
				}
			}
			echo "</select>";
			echo "</td>";
			
			// fixture date
			echo "<td>";
?>
			<select name='day'>
<?
			for ( $i=1;$i<=31;$i++ )
			{
				echo "<option value='". $i . "'>". $i ."</option>";
			}
			echo "</select>";
?>
			<select name='month'>
<?
			for ( $i=1;$i<=12;$i++ )
			{
				echo "<option value='". $i . "'>". $i ."</option>";
			}
			echo "</select>";

		}
?>
			<select name='year'>
				<option value='<? echo substr($season,0,4); ?>'><? echo substr($season,0,4); ?></option>
				<option value='<? echo substr($season,5,4); ?>'><? echo substr($season,5,4); ?></option>
			</select>
<?
			echo "</td>";
			
			//Time
			echo "<td>";
?>
			<select name='hour'>
<?
			for ( $i=9;$i<=22;$i++ )
			{
				echo "<option value='". $i . "'>". $i ."</option>";
			}
			echo "</select>";
			
?>
			<select name='minute'>
				<option value='00'>00</option>
				<option value='15'>15</option>
				<option value='30'>30</option>
				<option value='45'>45</option>
			</select>
<?
			echo "</td>";
			
			//Home Club
			echo "<td>";
?>
			<select name='home_club' onchange='checkclub()'>
<?
			// get division info
			$div = get_clubdivisioninfo($clubid);
			$clubslist = getclubsindivision($div[country],$div[region],$div[division],$div[group]);
			foreach ($clubslist as $clubids)
			{
				echo "<option value='". $clubids . "'>". get_clubname($clubids) ."</option>";
			}
			echo "</select>";
			echo "</td>";
			
			//Away Club
			echo "<td>";
?>
			<select name='away_club' onchange='checkclub()'>
<?
			foreach ($clubslist as $clubids)
			{
				echo "<option value='". $clubids . "'>". get_clubname($clubids) ."</option>";
			}
			echo "</select>";
			echo "</td>";
			
			// Button to add fixture
			echo "<td>";			
			echo "<input type='button' name='addfixture' value='+Fix' onclick='addnewfixture()' disabled='disabled'>";
			
			echo "</td>";
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
			<input type="button" value="-Fixture" onclick='deletefixture()'>
		</center>
<?
		
		}
	}
?>

	</form>
	
	<form name="showfixture" action="" enctype="multipart/form-data" method="post">
		<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
		<input type='hidden' name='numfixture' value=''>
		<input type='hidden' name='season' value=''>
	</form>
	
	</div>


</html>
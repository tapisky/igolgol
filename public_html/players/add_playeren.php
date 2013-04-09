<?//add_playeren.php
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

// get season
$season = getcurrentseason();

// get club info
$check = mysql_query("SELECT * FROM users WHERE username = '".$_COOKIE['ID_my_site']."'")or die(mysql_error());
$info = mysql_fetch_array( $check );
$clubname = get_clubname($info[clubid]);
$clubid = $info[clubid];
?>

<script type="text/javascript">
<!--//

// function to check that the input is not containing injections
function isAlpha(parm)
{
	var lwr = 'abcdefghijklmnñopqrstuvwxyzàáâãäåæçèéêëìíîïðòóôõöøùúûüýþÿ ';
	var upr = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÒÓÔÕÖ×ØÙÚÛÜÝÞß';
	var val = lwr+upr;
	if (parm == "") return true;
	for (i=0; i<parm.length; i++)
	{
		if (val.indexOf(parm.charAt(i),0) == -1) return false;
	}
	return true;
}

// function to check the values entered
function checkplayersdetails()
{

	// check player name
	bfirst = (document.player.firstname.value != "") && (isAlpha(document.player.firstname.value));
	blast = (document.player.lastname.value != "") && (isAlpha(document.player.lastname.value));
	
	// check date
	// date validation information
	var mdate = new Date();
	s_year= mdate.getFullYear();
	byear = (document.player.year.value != "") && (document.player.year.value > (s_year-100));
	byear = (byear) && (document.player.year.value <= (s_year));
	sdate = document.player.year.value + "-" + document.player.month.value + "-" + document.player.day.value;
	var monthname=new Array("January","February","March","April","May","June","July","August",
		"September","October","November","December")
	var mdate2 = new Date(monthname[document.player.month.value - 1] + " " + Number(document.player.day.value) + "," + document.player.year.value);
	bdate = (byear) && ((mdate2.getMonth() + 1) == (Number(document.player.month.value)));
	if (! bdate)
	{
		document.getElementById('datemsg').innerHTML="  -> Invalid date";
	}
	else
	{
		document.player.date.value = sdate;
	}
	
	// check first name
	if (! bfirst)
	{
		document.getElementById('firstmsg').innerHTML="  -> Invalid input";
	}
	
	// check last name
	if (! blast)
	{
		document.getElementById('lastmsg').innerHTML="  -> Invalid input";
	}
	
	// check height
	bheight = (! isNaN(document.player.height.value)) && ((document.player.height.value >= 50) && (document.player.height.value <= 240));
	if (! bheight)
	{
		document.getElementById('heightmsg').innerHTML="  -> Invalid height";
	}

	// check weight
	bweight = (! isNaN(document.player.weight.value)) && ((document.player.weight.value >= 30) && (document.player.weight.value <= 120));
	if (! bweight)
	{
		document.getElementById('weightmsg').innerHTML="  -> Invalid weight";
	}
	
	if ( bfirst && blast && bdate && bheight && bweight )
	{
		// send form
		document.player.action = "upload_playeren.php";
		document.player.submit();
	}
	
}

// function to clear the error message
function clearmsg(id)
{
	document.getElementById(id).innerHTML="";
}

//function to change the pciture when changing position
function change_position()
{
	document.getElementById('pitchpos').src="../images/graphics/positions/" + document.player.position.value + ".jpg";
}

// function to validate the picture
function validate_picture()
{
	document.player.action = "validate_picture.php";
	document.player.submit();
}

//-->
</script>

	<div id='playerpos' class='playerposition'>
	
		<br><br>
		<table align='center'>
			<tr>
				<td>
					<img id='pitchpos' class='posimage' src='../images/graphics/positions/gk.jpg'>
				</td>
			</tr>
		</table>

	</div>
	
	<div id='playerdetails' class='playerdetails'>
	
		<form name="player" action="" enctype="multipart/form-data" method="post">
			<input type='hidden' name='clubid' value='<? echo $clubid; ?>'>
			<input type='hidden' name='playerid' value='<? echo $_POST["id"]; ?>'>
			<input type='hidden' name='date' value=''>
			
	<table>
	
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input type='text' name='firstname' value='' size='25' onfocus='clearmsg("firstmsg")'><font color='red'><em id='firstmsg'></em></font>
			</td>
		</tr>
		<tr>
			<td>
				Last name:
			</td>
			<td>
				<input type='text' name='lastname' value='' size='25' onfocus='clearmsg("lastmsg")'><font color='red'><em id='lastmsg'></em></font>
			</td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td>
				<select name="gender">
					<option value="M" selected="selected">Man</option>
					<option value="W">Woman</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Club:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		// add clubs combobox
		echo "<td>";
		echo "<input type='text' name='club' disabled value='$clubname'>";
		echo "</td>";
	}
}
?>
				
		</tr>
		<tr>
			<td>Nationality:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// print nationalities combobox
		create_nations("Afghanistan");
		echo "</td>";
	}
}
?>
		</tr>
		<tr>
			<td>Date of birth:</td>
<?
// get the birth day date into separated variables
$bdayyear = substr($r["birth_date"],0,4);
$bdaymonth = substr($r["birth_date"],5,2);
$bdayday = substr($r["birth_date"],8,2);

if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
?>
			<select name='day' onclick='clearmsg("datemsg")'>
<?
			for ( $i=1;$i<=31;$i++ )
				if ( $i == (int)$bdayday )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			echo "</select>";
?>
			<select name='month' onclick='clearmsg("datemsg")'>
<?
			for ( $i=1;$i<=12;$i++ )
				if ( $i == (int)$bdaymonth )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			echo "</select>";

?>
			<select name='year' onclick='clearmsg("datemsg")'>
<?
			$my_t = getdate(date("U"));
			$year = $my_t[year];
			
			for ( $i=($year-60);$i<=($year-4);$i++ )
			{
				if ( $i == (int)$bdayyear )
				{
					echo "<option value='". $i . "' selected>". $i ."</option>";
				}
				else
				{
					echo "<option value='". $i . "'>". $i ."</option>";
				}
			}
			echo "</select>";
			echo "<font color='red'><em id='datemsg'></em></font>";
			echo "</td>";

?>

<?
	}
}

?>			
		</tr>
		<tr>
			<td>Height:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// height text filed
		echo "<input type='text' size='2' name='height' value='" . $r["height"] . "' onfocus='clearmsg(\"heightmsg\")'> cm";
		echo "<font color='red'><em id='heightmsg'></em></font>";
		echo "</td>";
	}
}
else
{
?>
			<td><? echo $r["height"];?> cm</td>
<?
}
?>		
		</tr>
		<tr>
			<td>Weight:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
		echo "<td>";
		// height text filed
		echo "<input type='text' size='2' name='weight' value='" . $r["weight"] . "' onfocus='clearmsg(\"weightmsg\")'> kg";
		echo "<font color='red'><em id='weightmsg'></em></font>";
		echo "</td>";
	}
}
else
{
?>
			<td><? echo $r["weight"];?> kg</td>
<?
}
?>
		</tr>
		<tr>
			<td>Stronger foot:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
?>
		<td>
			<select name="strongerfoot">
				<option value="r" <?php echo ( $r["stronger_foot"] == "r" )? "selected":"" ?>>Right foot</option>
				<option value="l" <?php echo ( $r["stronger_foot"] == "l" )?"selected":"" ?>>Left foot</option>
				<option value="lr" <?php echo ( $r["stronger_foot"] == "lr" )?"selected":"" ?>>Both</option>
			</select>
		</td>
<?
	}
}
else
{
?>
			<td><? if ($r["stronger_foot"] == "l")
					{
						echo "Left foot";
					}
					else if ($r["stronger_foot"] == "r")
					{
						echo "Right foot";
					}
					else
					{
						echo "Both";
					}
				?></td>
<?
}
?>
		</tr>
		<tr>
			<td>Main position:</td>
<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to check what kind of user it is and display the right menus according to security
{
	if ( $info["type"] < 2 )
	{
?>
			<td>
				<select name="position" onchange='change_position()'>
					<option value="gk" <?php echo ( $r["position"] == "gk" )?"selected":"" ?>>Goalkeeper</option>
					<option value="df" <?php echo ( $r["position"] == "df" )?"selected":"" ?>>Defender</option>
					<option value="lb" <?php echo ( $r["position"] == "lb" )?"selected":"" ?>>Left back</option>
					<option value="cb" <?php echo ( $r["position"] == "cb" )?"selected":"" ?>>Central Back</option>
					<option value="rb" <?php echo ( $r["position"] == "rb" )?"selected":"" ?>>Rigth back</option>
					<option value="dm" <?php echo ( $r["position"] == "dm" )?"selected":"" ?>>Defensive midfielder</option>
					<option value="lm" <?php echo ( $r["position"] == "lm" )?"selected":"" ?>>Left midfielder</option>
					<option value="cm" <?php echo ( $r["position"] == "cm" )?"selected":"" ?>>Midfielder</option>
					<option value="rm" <?php echo ( $r["position"] == "rm" )?"selected":"" ?>>Right midfielder</option>
					<option value="am" <?php echo ( $r["position"] == "am" )?"selected":"" ?>>Attacking midfielder</option>
					<option value="lw" <?php echo ( $r["position"] == "lw" )?"selected":"" ?>>Left wing</option>
					<option value="at" <?php echo ( $r["position"] == "at" )?"selected":"" ?>>Forward</option>
					<option value="rw" <?php echo ( $r["position"] == "rw" )?"selected":"" ?>>Right wing</option>
				</select>
			</td>
<?
	}
}
else
{
?>
			<td><?switch($r["position"])
					{
						case 'gk':
							echo "Goalkeeper";
							break;
						case 'df':
							echo "Defender";
							break;
						case 'rb':
							echo "Rigth Back";
							break;
						case 'cb':
							echo "Central Defender";
							break;
						case 'lb':
							echo "Left Back";
							break;
						case 'dm':
							echo "Defensive Midfielder";
							break;
						case 'lm':
							echo "Left Midfielder";
							break;
						case 'cm':
							echo "Midfielder";
							break;
						case 'rm':
							echo "Right Midfielder";
							break;
						case 'lw':
							echo "Left Wing";
							break;
						case 'am':
							echo "Attack Midfielder";
							break;
						case 'at':
							echo "Forward";
							break;
						case 'rw':
							echo "Right Wing";
							break;
					}
				?></td>
<?
}
?>
		</tr>

<?
if(isset($_COOKIE['ID_my_site']))
//if user logged, we need to add button to save changes
{
	if ( $info["type"] < 2 )
	{
		echo "<tr>";
		echo "<td align='center' colspan=3>";
		// add edit player button
		echo "<input type='button' value='Save changes' onclick='checkplayersdetails()'>";
		echo "</td>";
		echo "</tr>";
	}
}
?>
	</table>
	</form>
	</div>
	
</html>
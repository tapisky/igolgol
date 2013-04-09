<?
include("dbconnect.php");// Include for DataBase connection details
$blank_player = "30"; // 30 is the id in the data base for blank players
?>

<select name="assister" id="list_assister">
<option value="<? echo $blank_player ?>" selected="selected">[ Selecciona ]</option>

<?
	// 30 is the id of the empty player
	$result = mysql_query("SELECT * FROM players WHERE players.idplayers<>30 AND players.clubid=". $_POST['id_club']) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			//////////////////////////////////////////////////////
			$PlayerId=$r["idplayers"];
			$PlayerFirstName=$r["first_name"];
			$PlayerLastName=$r["last_name"];
			echo "<option value='$PlayerId'>$PlayerFirstName $PlayerLastName</option>";
		}
?> 

</select>
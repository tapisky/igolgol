<?
include("dbconnect.php");// Include for DataBase connection details
?>

<select name="scorer" id="list_scorer">
<option value="0" selected="selected">[ Selecciona ]</option>

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
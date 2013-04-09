<?
include("dbconnect.php");// Include for DataBase connection details
?>

<select name="club" id="list_club">
<option value="0" selected="selected">[ Selecciona ]</option>

<?
	$result = mysql_query("SELECT * FROM divisions_have_groups WHERE divisions_have_groups.regionid=". $_POST['id_region']. " AND divisions_have_groups.countryid=". $_POST['id_country']. " AND divisions_have_groups.divisionid=". $_POST['id_division']. " AND divisions_have_groups.groupid=". $_POST['id_group']) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			$result2 = mysql_query("SELECT * FROM clubs WHERE clubs.idclubs=". $r['clubid']) or die(mysql_error());
			$num2=mysql_numrows($result2);
			$r2 = mysql_fetch_array( $result2 );
			//////////////////////////////////////////////////////
			$ClubId=$r2["idclubs"];
			$ClubName=$r2["club_name"];
			echo "<option value='$ClubId'>$ClubName</option>";
		}
?> 

</select>
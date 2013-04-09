<?
include("dbconnect.php");// Include for DataBase connection details
?>
<select name="clubgroup" id="list_group" onchange='optionRegion("div_club","club.php",4)'>
<option value="0" selected="selected">[ Selecciona ]</option>

<?
	$result = mysql_query("SELECT DISTINCT groupid FROM divisions_have_groups WHERE divisions_have_groups.regionid=". $_POST['id_region']. " AND divisions_have_groups.countryid=". $_POST['id_country']. " AND divisions_have_groups.divisionid=". $_POST['id_division']) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			$result2 = mysql_query("SELECT * FROM groups WHERE groups.idgroups=". $r['groupid']) or die(mysql_error());
			$num2=mysql_numrows($result2);
			$r2 = mysql_fetch_array( $result2 );
			//////////////////////////////////////////////////////
			$GroupId=$r2["idgroups"];
			$GroupName=$r2["group_name"];
			echo "<option value='$GroupId'>$GroupName</option>";
		}
?> 


</select>
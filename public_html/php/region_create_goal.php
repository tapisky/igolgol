<?
include("dbconnect.php");// Include for DataBase connection details
?>
<select name="clubregion" id="list_region" onchange='optionRegion("div_division","division_create_goal.php",2)'>
<option value="0" selected="selected">[ Selecciona ]</option>

<?
	
	$result = mysql_query("SELECT * FROM regions WHERE regions.countryid=". $_POST['id_country']) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			//////////////////////////////////////////////////////
			$IdRegion=$r["idregion"];
			$RegionName=$r["region_name"];
			echo "<option value='$IdRegion'>$RegionName</option>";
		}
?> 

</select>
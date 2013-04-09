<?
include("dbconnect.php");// Include for DataBase connection details
?>

<select name="clubdivision" id="list_division" onchange='optionRegion("div_group","group.php",3)'>
<option value="0" selected="selected">[ Selecciona ]</option>

<?
	$result = mysql_query("SELECT * FROM divisions WHERE divisions.regionid=". $_POST['id_region']. " AND divisions.countryid=". $_POST['id_country']) or die(mysql_error());
	$num=mysql_numrows($result);
	while($r = mysql_fetch_array( $result ))
		{
			//////////////////////////////////////////////////////
			$IdDivision=$r["iddivisions"];
			$DivisionName=$r["division_name"];
			echo "<option value='$IdDivision'>$DivisionName</option>";
		}
?> 

</select>
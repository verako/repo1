<?php
include_once('functions.php');
connect();
$coid=$_GET['coid'];
$sel='select * from cities where countryid='.$coid;
$res=mysql_query($sel);
//echo "<table width='45%' align='center'> <tr><th>City</th></tr>";
echo "<select name='cityid' id='cityid' onchange='showHotels(this.value)'>";
while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
	//echo "<tr><td>".$row[1]."</td></tr>";
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
echo "</select>";
mysql_free_result($res);
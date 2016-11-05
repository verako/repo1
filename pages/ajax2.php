<?php 
include_once('functions.php');
connect();
$hoid=$_POST['hoid'];
$res=mysql_query('select id,hotel,stars,cost from hotels where cityid='.$hoid);
echo "<table align='center' class='table table-stripped'>";
echo "<tr><th>Hotel</th><th>Stars</th><th>Cost</th><th>Info</th></tr>";
while($row=mysql_fetch_array($res,MYSQL_NUM)){
	echo "<tr>";
	echo "<td>".$row[1]."</td><td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td><td><a target='_blank' href='index.php?page=5&hoid='".$row[0]." >...</a></td>";
	echo "</tr>";
}
echo "</table>";
mysql_free_result($res);
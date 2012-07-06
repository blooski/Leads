<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Test PHP</title>
</head>
<body>
<?php
include 'config.php';
include 'opendb.php';

$ShipVia = $_GET["ShipVia"];
if ($ShipVia == "") {$ShipVia = '%';}
$result = mysql_query ("SELECT * FROM Shipvia 
	WHERE ShipVia LIKE '$ShipVia%'");
if ($row = mysql_fetch_array($result)) {
do {
	print $row["KeyNum"];
	print (" ");
	print $row["ShipVia"];
	print ("<p>");
} while($row = mysql_fetch_array($result));
} else {print "Sorry, no records were found!";}

?>
</body>
</html>

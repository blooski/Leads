<?php
include 'conn_db.php';

//Set up and execute the query.
$tsql = "SELECT *
         FROM BLDetail2
         WHERE (Agent = '102') AND (OrderNo = '08963A')";
$stmt = sqlsrv_query( $conn, $tsql);
if( $stmt === false)
{
     echo "Error in query preparation/execution.\n";
     die( print_r( sqlsrv_errors(), true));
}
// Retrieve each row as an associative array and display the results in a table.
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
{
	$agent = $row['Agent'];
	$orderno = $row['OrderNo'];
	$mfline = $row['MFLine'];
	$cicode = $row['CICode'];
	$pom = $row['POM'];
	$ordqty = $row['OrdQty'];
	$qtyprd = $row['QtyPrd'];
	$targdate = $row['TargDate'];
	$promdate = $row['PromDate'];
	//make a display block to display the results on a html table row at a time

	$display_block .= "
	<tr>
	<td class=\"cellcenter\">$agent</td>
	<td class=\"cellcenter\">$orderno</td>
	<td class=\"cellcenter\">$mfline</td>
	<td class=\"cellcenter\">$cicode</td>
	<td class=\"cellcenter\">$pom</td>
	<td class=\"cellright\">$ordqty</td>
	<td class=\"cellright\">$qtyprd</td>
	<td class=\"cellcenter\">$targdate</td>
	<td class=\"cellcenter\">$promdate</td>
	</tr>";
} //close the while loop
// Free statement and connection resources.
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
// close the php and start a html table
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <link rel="stylesheet" type="text/css" href="dg.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" type="text/css" href="MasterStyle.css">
	<SCRIPT LANGUAGE="JavaScript" SRC="menu.js"></SCRIPT>
    <title>Backlog Report</title>
</head>
<body>
<form action="" method="post">
<?php include_once("menu.htm"); ?>
<!-- Set up Page Title and Table, with Header Row -->
<div style="position:absolute;top:96px;">
<h3><b>Backlog Report</b></h3>
<table class="dg">
<tr class="dgHd">
<td class="cellcenter"><strong>Agent</strong></td>
<td class="cellcenter"><strong>Order #</strong></td>
<td class="cellcenter"><strong>MF Line</strong></td>
<td class="cellcenter"><strong>CI Code</strong></td>
<td class="cellcenter"><strong>POM</strong></td>
<td class="cellright"><strong>Ord Qty</strong></td>
<td class="cellright"><strong>Prd Qty</strong></td>
<td class="cellcenter"><strong>Targ Date</strong></td>
<td class="cellcenter"><strong>Prom Date</strong></td>
</tr>
<?php //open a php block to populate the table
echo "$display_block";
//close the php block and then the table
?>
</table>
</div>
</form>
</body>
</html>
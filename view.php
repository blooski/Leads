<?php
require 'includes/classes/dataaccess.php';

//Set up and execute the query.
$query = "SELECT * FROM prospects WHERE Status < 4 ";
if (isset($_GET['sortfield'])) {
    if ($_GET['sortfield'] == "nextdate") $query .= "ORDER BY NextDate";
    if ($_GET['sortfield'] == "status") $query .= "ORDER BY Status DESC";
}
else {
    $query .= "ORDER BY NextDate";
}

//Instantiate Data Access object
$data = new dataaccess();

$result = $data->get_view($query);

//Error Handling
if( $result == false)
{
     echo "Error in query preparation/execution.\n";
     die( print_r(mysql_error()));
}

// Retrieve each row as an associative array and display the results in a table.
$display_block = "";
while( $row = mysql_fetch_array($result))
{
    $contact = $row['Contact'];
    $company = $row['Company'];
    $phone = $row['Phone'];
    $email = $row['Email'];
    $lastdate = date("m/d/Y",strtotime($row['LastDate']));
    $nextdate = date("m/d/Y",strtotime($row['NextDate']));
    $status = $row['Status'];
    
    //make a display block to display the results on a html table row at a time
    $display_block .= "<tr";
    if ($status == 3) $display_block .= " bgcolor='#FFCCCC'";
    $display_block .= ">
    <td class=\"cellleft\"><a href=\"update.php?Contact=$contact\">$contact</a></td>
    <td class=\"cellleft\">$company</td>
    <td class=\"cellleft\">$phone</td>
    <td class=\"cellleft\"><a href=\"mailto:$email\">$email</a></td>
    <td class=\"cellleft\">$lastdate</td>
    <td class=\"cellleft\">$nextdate</td>
    <td class=\"cellcenter\">$status</td>
    <td class=\"cellleft\"><a href=\"javascript:popup('$contact');\">Note</a></td>
    </tr>";
    
} //close the while loop

// close the php and start a html table
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <link rel="stylesheet" type="text/css" href="css/dg.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/menu.css"/>
    <title>View Prospects</title>
    
<SCRIPT LANGUAGE="JavaScript">

//Popup to Add Note
function popup(contact) {
  window.open("addnote.php?Contact=" + contact, "myRemote", "height=350,width=450,screenX=160,left=160,screenY=80,top=80,channelmode=0,dependent=1,directories=0,fullscreen=0,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}

</SCRIPT>

</head>
<body>
<form action="" method="post">
<!-- Menu -->
<?php include_once'includes/menu.htm'; ?>
<img id="top" src="images/top.png" alt="" />
<div id="form_container">
    <h3><b>View Prospects</b></h3>
    <table class="dg">
        <tr class="dgHd">
            <td class="cellcenter"><strong>Contact</strong></td>
            <td class="cellcenter"><strong>Company</strong></td>
            <td class="cellcenter"><strong>Phone</strong></td>
            <td class="cellcenter"><strong>Email</strong></td>
            <td class="cellcenter"><strong>Last Date</strong></td>
            <td class="cellcenter"><strong><a href="view.php?sortfield=nextdate">Next Date</a></strong></td>
            <td class="cellcenter"><strong><a href="view.php?sortfield=status">St</strong></a></td>
        </tr>
        <?php //open a php block to populate the table
        echo "$display_block";
        //close the php block and then the table
        ?>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr id="footer">
            <td colspan="7">
            Status Codes:&nbsp; 0=New Prospect&nbsp;&nbsp;  1=Cool&nbsp;&nbsp;  2=Warm&nbsp;&nbsp; 3=Hot&nbsp;&nbsp; 4=Dead</td>
        </tr>
    </table>
</div>
</form>
</body>
</html>
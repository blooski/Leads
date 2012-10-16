<?php
$display_block = "";
// Retrieve each row as an associative array and display the results in a table.
foreach($leads_items as $row)
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
    <td class=\"cellleft\"><a name=\"contact\" href=\"leads/update/$contact\">$contact</a></td>
    <td class=\"cellleft\">$company</td>
    <td class=\"cellleft\">$phone</td>
    <td class=\"cellleft\"><a href=\"mailto:$email\">$email</a></td>
    <td class=\"cellleft\">$lastdate</td>
    <td class=\"cellleft\">$nextdate</td>
    <td class=\"cellcenter\">$status</td>
    <td class=\"cellleft\"><a href=\"javascript:popup('$contact');\">Note</a></td>
    </tr>";
}   //Close foreach loop
?>
<script src="/Leads/javascript/addnote_popup.js"></script>
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

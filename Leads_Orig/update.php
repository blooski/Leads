<?php
require 'includes/classes/dataaccess.php';

if(isset($_POST["update"]))
{
    $contact = $_POST["firstname"] . " " . $_POST["lastname"];

    //Set up Query string
    $query="UPDATE prospects SET
        Contact = '" . $contact . "', 
        Company = '" . $_POST["company"] . "',
        Address1 = '" . $_POST["address1"] . "',
        Address2 = '" . $_POST["address2"] . "',
        City = '" . $_POST["city"] . "',
        State = '" . $_POST["state"] . "',
        Zip = '" . $_POST["zip"] . "',
        Phone = '" . $_POST["phone"] . "',
        Ext = '" . $_POST["ext"] . "',
        Fax = '" . $_POST["fax"] . "',
        Cell = '" . $_POST["cell"] . "',
        Email = '" . $_POST["email"] . "',
        LastDate = '" . date("Y/m/d : H:i:s", time()) . "',
        NextDate = '" . date("Y/m/d : H:i:s", strtotime($_POST["nextdate"])) . "',
        Status = " . $_POST["status"] . "
        WHERE Contact = '".$contact."'";

    //Instantiate Data Access object
    $data = new dataaccess();
    
    //Do Update
    $data->insert_prospect($query);

//    mysql_query($strSql)
//    or die(mysql_error());
    header("Location: view.php");
}

function getprospectdata($contact)
{
    $query = "SELECT * FROM prospects
        WHERE Contact = '".$contact."'";
        
    //Instantiate Data Access object
    $data = new dataaccess();
    
    //Get Prospect Data when passed in from another page
    return $data->get_prospect_data($query);
}

function getnotes($contact)
{
    $query = "SELECT * FROM notes
        WHERE Contact = '".$contact."'
        ORDER BY ConDate DESC";

    //Instantiate Data Access object
    $data = new dataaccess();
    
    //Do Update and Return Data
    $result = $data->get_notes($query);

    //Sequence through Notes and put in a display block
    $display_block = "";
    for ($i=0; $i<sizeof($result); $i++) {
        $row = $result[$i];
    
        if (isset($result[$i])) {
            
            $contact = $row['Contact'];
            $condate = $row['ConDate'];
            $note = $row['Note'];

            //make a display block to display the results in textarea
            $display_block .= $condate." -- ".$note."\n"."--------------------------------------------------------------------------------"."\n";
        }
    }
    return $display_block;
}

if(isset($_POST["find"]))
{
    $contact = $_POST["firstname"] . " " . $_POST["lastname"];
    $row = getprospectdata($contact);
    $notes = getnotes($contact);
}
else if(isset($_GET["Contact"]))
{
    $contact = $_GET["Contact"];
    $row = getprospectdata($contact);
    $notes = getnotes($contact);
}
list($firstname, $lastname) = explode(' ', $row[0]);
$company = $row[1];
$address1 = $row[2];
$address2 = $row[3];
$city = $row[4];
$state = $row[5];
$zip = $row[6];
$phone = $row[7];
$ext = $row[8];
$fax = $row[9];
$cell = $row[10];
$email = $row[11];
$dateadd = date("m/d/Y",strtotime($row[12]));
$lastdate = date("m/d/Y",strtotime($row[13]));
$nextdate = date("m/d/Y",strtotime($row[14]));
$status = $row[15];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Update / Add Notes</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/menu.css"/>

<!--    <script type="text/javascript" src="view.js"></script> -->
<SCRIPT LANGUAGE="JavaScript">
function popup(firstname,lastname) {
  window.open("addnote.php?Contact=" + firstname + " " + lastname, "myRemote", "height=350,width=450,screenX=160,left=160,screenY=80,top=80,channelmode=0,dependent=1,directories=0,fullscreen=0,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
</SCRIPT>
</head>
<body>
  <?php include_once'includes/menu.htm'; ?>
    <img id="top" src="images/top.png" alt="" />
    <div id="form_container">
        <form action="" method="post">
            <div class="form_description">
                <h2>
                    Update / Add Notes</h2>
            </div>
            <ul>
                <li id="li_1">
                    <label class="description" for="element_1_1">
                        Contact Name
                    </label>
                    <span>
                        <input id="element_1_1" name="firstname" class="element text" maxlength="20" size="20"
                            value="<?PHP echo $firstname; ?>" />
                        <label for="element_1_1">
                            First</label>
                    </span><span>
                        <input id="element_1_2" name="lastname" class="element text" maxlength="20" size="20"
                            value="<?PHP echo $lastname; ?>" />
                        <label for="element_1_2">
                            Last</label>
                    </span>
                    <span>&nbsp;&nbsp;&nbsp;<input id="element_1_3" class="button_text" type="submit" name="find" value="Find" /></span>
                </li>
                <li id="li_3">
                    <label class="description" for="element_3_1">
                        Company Name
                    </label>
                    <div>
                        <input id="element_3_1" name="company" class="element text large" value="<?PHP echo $company; ?>" type="text" />
                    </div>
                </li>
                <li id="li_2">
                    <label class="description" for="element_2">
                        Address
                    </label>
                    <div>
                        <input id="element_2_1" name="address1" class="element text large" value="<?PHP echo $address1; ?>" type="text" />
                        <label for="element_2_1">
                            Street Address</label>
                    </div>
                    <div>
                        <input id="element_2_2" name="address2" class="element text large" value="<?PHP echo $address2; ?>" type="text" />
                        <label for="element_2_2">
                            Address Line 2</label>
                    </div>
                    <div class="left">
                        <input id="element_2_3" name="city" class="element text medium" value="<?PHP echo $city; ?>" type="text" />
                        <label for="element_2_3">
                            City</label>
                    </div>
                    <div class="right">
                        <input id="element_2_4" name="state" class="element text small" value="<?PHP echo $state; ?>" type="text" />
                        <label for="element_2_4">
                            State</label>
                    </div>
                    <div class="left">
                        <input id="element_2_5" name="zip" class="element text medium" maxlength="10" value="<?PHP echo $zip; ?>"
                            type="text" />
                        <label for="element_2_5">
                            Zip Code</label>
                    </div>
                </li>
                <li id="li_4">
                    <label class="description" for="element_4">
                        Phone Numbers
                    </label>
                    <div class="left">
                        <input id="element_4_1" name="phone" class="element text medium" value="<?PHP echo $phone; ?>" type="text" />
                        <label for="element_4_1">
                            Phone</label>
                    </div>
                    <div class="right">
                        <input id="element_4_2" name="ext" class="element text small" value="<?PHP echo $ext; ?>" type="text" />
                        <label for="element_4_2">
                            Ext</label>
                    </div>
                    <div class="left">
                        <input id="element_4_3" name="cell" class="element text medium" value="<?PHP echo $cell; ?>" type="text" />
                        <label for="element_4_3">
                            Cell</label>
                    </div>
                    <div class="right">
                        <input id="element_4_4" name="fax" class="element text large" value="<?PHP echo $fax; ?>" type="text" />
                        <label for="element_4_4">
                            Fax</label>
                    </div>
                </li>
                <li id="li_5">
                    <label class="description" for="element_5_1">
                        Email</label>
                    <div>
                        <input id="element_5_1" name="email" class="element text large" value="<?PHP echo $email; ?>" type="text" />
                    </div>
                </li>
                <li id="li_6">
                    <label class="description" for="element_6">
                        Dates
                    </label>
                    <div class="left">
                        <input id="element_6_1" name="adddate" class="element text medium" value="<?PHP echo $dateadd; ?>" type="text" />
                        <label for="element_6_1">
                            Date Added</label>
                    </div>
                    <div class="right">
                        <input id="element_6_2" name="lastdate" class="element text large" value="<?PHP echo $lastdate; ?>" type="text" />
                        <label for="element_6_2">
                            Last Activity Date</label>
                    </div>
                    <div class="left">
                        <input id="element_6_3" name="nextdate" class="element text medium" value="<?PHP echo $nextdate; ?>" type="text" />
                        <label for="element_6_3">
                            Next Contact Date</label>
                    </div>
                </li>
                <li id="li_7">
                    <label class="description" for="element_7_1">
                        Status Code</label>
                    <div class="left">
                    <?php
                        echo "<select  id=\"element_7_1\" name=\"status\" class=\"element select medium\">
                        <option value=\"0\" ";
                        if ($status == "0") {echo "SELECTED";};
                        echo ">0 - New Prospect</option>
                        <option value=\"1\" ";
                        if ($status == "1") {echo "SELECTED";};
                        echo ">1 - Cool</option>
                        <option value=\"2\" ";
                        if ($status == "2") {echo "SELECTED";};
                        echo ">2 - Warm</option>
                        <option value=\"3\" ";
                        if ($status == "3") {echo "SELECTED";};
                        echo ">3 - Hot</option>
                        <option value=\"4\" ";
                        if ($status == "4") {echo "SELECTED";};
                        echo ">4 - Dead</option>
                        </select>"
                        ?>
                    </div>
                    <div class="right">
                        <input id="saveForm" class="button_text" type="submit" name="update" value="Update" />
                    </div>
                </li>
                <li id="li_8">
                    <label class="description" for="element_8_1">
                        Notes</label>
                    <div>
                        <textarea id="element_8_2" name="notes" class="element textarea medium" disabled><?PHP echo $notes; ?></textarea>
                    </div>
                    <div class="right">
                    <span>&nbsp;&nbsp;&nbsp;<input id="element_8_3" class="button_text" onclick="javascript:popup('<?php echo $firstname; ?>','<?php echo $lastname; ?>');" type="button" name="addnote" value="Add Note" /></span>               
                        <input type="hidden" name="form_id" value="73364" />
                    </div>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
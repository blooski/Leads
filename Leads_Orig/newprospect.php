<?php
require 'includes/classes/dataaccess.php';

//Set up Query string for insert
if(isset($_POST["lastname"]))
{
    $query = "INSERT INTO prospects (
            Contact,
        Company,
        Address1,
        Address2,
        City,
        State,
        Zip,
        Phone,
        Ext,
        Fax,
        Cell,
        Email,
        DateAdd
    ) VALUES('" .
        $_POST["firstname"] . " " . $_POST["lastname"] . "','" .
        $_POST["company"] . "','" .
        $_POST["address1"] . "','" .
        $_POST["address2"] . "','" .
        $_POST["city"] . "','" .
        $_POST["state"] . "','" .
        $_POST["zip"] . "','" .
        $_POST["phone"] . "','" .
        $_POST["ext"] . "','" .
        $_POST["fax"] . "','" .
        $_POST["cell"] . "','" .
        $_POST["email"] . "','" . 
        date("Y/m/d : H:i:s", time()) .
    "')";
    
//Instantiate Data Access object
$data = new dataaccess();

//Do Insert
$data->insert_prospect($query);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Prospect</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <script type="text/javascript" src="view.js"></script>
</head>
<body>
    <?php include_once'includes/menu.htm'; ?>
    <img id="top" src="images/top.png" alt="" />
    <div id="form_container">
        <form id="form_73364" class="appnitro" method="post" action="">
            <div class="form_description">
                <h2>New Prospect</h2>
            </div>
            <ul>
                <li id="li_1">
                    <label class="description" for="element_1_1">
                        Contact Name
                    </label>
                    <span>
                        <input id="element_1_1" name="firstname" class="element text" maxlength="255" size="8"
                            value="" />
                        <label for="element_1_1">
                            First</label>
                    </span><span>
                        <input id="element_1_2" name="lastname" class="element text" maxlength="255" size="14"
                            value="" />
                        <label for="element_1_2">
                            Last</label>
                    </span></li>
                <li id="li_3">
                    <label class="description" for="element_3_1">
                        Company Name
                    </label>
                    <div>
                        <input id="element_3_1" name="company" class="element text large" value="" type="text" />
                    </div>
                </li>
                <li id="li_2">
                    <label class="description" for="element_2">
                        Address
                    </label>
                    <div>
                        <input id="element_2_1" name="address1" class="element text large" value="" type="text" />
                        <label for="element_2_1">
                            Street Address</label>
                    </div>
                    <div>
                        <input id="element_2_2" name="address2" class="element text large" value="" type="text" />
                        <label for="element_2_2">
                            Address Line 2</label>
                    </div>
                    <div class="left">
                        <input id="element_2_3" name="city" class="element text medium" value="" type="text" />
                        <label for="element_2_3">
                            City</label>
                    </div>
                    <div class="right">
                        <input id="element_2_4" name="state" class="element text small" value="" type="text" />
                        <label for="element_2_4">
                            State</label>
                    </div>
                    <div class="left">
                        <input id="element_2_5" name="zip" class="element text medium" maxlength="10" value=""
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
                        <input id="element_4_1" name="phone" class="element text medium" value="" type="text" />
                        <label for="element_4_1">
                            Phone</label>
                    </div>
                    <div class="right">
                        <input id="element_4_2" name="ext" class="element text small" value="" type="text" />
                        <label for="element_4_2">
                            Ext</label>
                    </div>
                    <div class="left">
                        <input id="element_4_3" name="cell" class="element text medium" value="" type="text" />
                        <label for="element_4_3">
                            Cell</label>
                    </div>
                    <div class="right">
                        <input id="element_4_4" name="fax" class="element text large" value="" type="text" />
                        <label for="element_4_4">
                            Fax</label>
                    </div>
                </li>
                <li id="li_5">
                    <label class="description" for="element_5_1">
                        Email</label>
                    <div>
                        <input id="element_5_1" name="email" class="element text large" value="" type="text" />
                    </div>
                </li>
                <li class="buttons">
                    <input type="hidden" name="form_id" value="73364" />
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                </li>
            </ul>
        </form>
    </div>
</body>
</html>

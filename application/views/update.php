<?php
    //Load Data to Form for Selected Contact
    //print_r($contact);
    if (empty($contact)){
        $firstname = "";
        $lastname = "";
        $company = "";
        $address1 = "";
        $address2 = "";
        $city = "";
        $state = "";
        $zip = "";
        $phone = "";
        $ext = "";
        $cell = "";
        $fax = "";
        $email = "";
        $dateadd = "";
        $lastdate = "";
        $nextdate = "";
        $status = "";
    } else {
        list($firstname, $lastname) = explode(' ', $contact["Contact"]);
        $company = $contact["Company"];
        $address1 = $contact["Address1"];
        $address2 = $contact["Address2"];
        $city = $contact["City"];
        $state = $contact["State"];
        $zip = $contact["Zip"];
        $phone = $contact["Phone"];
        $ext = $contact["Ext"];
        $cell = $contact["Cell"];
        $fax = $contact["Fax"];
        $email = $contact["Email"];
        $dateadd = date("m/d/Y",strtotime($contact["DateAdd"]));
        $lastdate = date("m/d/Y",strtotime($contact["LastDate"]));
        $nextdate = date("m/d/Y",strtotime($contact["NextDate"]));
        $status = $contact["Status"];
    } 
    //Load Notes - Sequence through Notes and put in a display block
    $display_block = "";
    //print_r($notes);
    foreach ($notes as $row) {
        if (isset($row)) {
            
            $contact = $row['Contact'];
            $condate = $row['ConDate'];
            $note = $row['Note'];

            //make a display block to display the results in textarea
            $display_block .= $condate." -- ".$note."\n"."--------------------------------------------------------------------------------"."\n";
        }
    }
    
?>
<script src="/Leads/javascript/addnote_popup.js"></script>
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
                        <textarea id="element_8_2" name="notes" class="element textarea medium" disabled><?php echo $display_block; ?></textarea>
                    </div>
                    <div class="right">
                    <span>&nbsp;&nbsp;&nbsp;<input id="element_8_3" class="button_text" onclick="javascript:popup2('<?php echo $firstname; ?>','<?php echo $lastname; ?>');" type="button" name="addnote" value="Add Note" /></span>               
                        <input type="hidden" name="form_id" value="73364" />
                    </div>
                </li>
            </ul>
</div>
</form>
</body>
</html>

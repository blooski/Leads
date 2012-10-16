<?php
require 'includes/classes/dataaccess.php';

//Local Variables
$contact = $_GET['Contact'];
$timestamp = date("Y-m-d h:i:s",time());
$timestamp2 = date("m/d/Y h:i:s",time());
$notes = "Notes on ".$contact." -- ".$timestamp2;   

//Submit Button Clicked
if(isset($_POST["btnSubmit"]))
{
    //Insert New Note
    $query = "INSERT INTO notes (
        Contact,
        ConDate,
        Note
    ) VALUES('" .
        $contact . "','" .
        $_POST["timestamp"] . "','" .
        htmlentities($_POST["notes"], ENT_QUOTES) . 
    "')";
    
    //Instantiate Data Access object
    $data = new dataaccess();
    
    //Add Note
    $data->add_note($query);

    //Javascript to close popup
    echo '<script type="text/javascript" language="JavaScipt">
        opener.location.reload(true);
        self.close();
        </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <title>Add Notes</title>
    
<script language="javascript" type="text/javascript">
//Set Focus
function focusIt()
{
    var mytext = document.getElementById("notes");
    mytext.focus();
}
</script>
</head>

<body OnLoad="focusIt();">
<div id="note_container">
<form action="" method="post">
<h3>Add a Note</h3>
<label id="title"><?php echo "$notes\n"; ?></label>
<textarea id="notes" name="notes" rows="12"></textarea></br>
<input name="btnSubmit" type="submit" class="buttons" value="Add Note" />
<input type="hidden" name="timestamp" value="<?php echo $timestamp  ?>" />
</form>
</div>
</body>
</html>
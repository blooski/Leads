<?php
if(isset($_POST["name"]))
{
	session_start();
	if(($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'])) || $_POST['captcha'] == 'false') {
		$to      = 'kerry@phoenixdev.net';
		$subject = "New " . $_POST['subject'];
		
		$message = "Name: " . $_POST["name"] . "\n";
		$message .= "Email: " . $_POST["email"] . "\n\n";
		
		$message.= "------------------------\n\n";
		
		$message .= $_POST['message'];
		
		$headers = 'From: Phoenix Development <noreply@phoenixdev.net>' . "\r\n" .
		   'Reply-To: ' . $_POST["email"] . "\r\n" .
		   'X-Mailer: PHP/' . phpversion();
	
		mail($to, $subject, $message, $headers);
		$sent = true;
	} else {
		$error = true;
		$message = "Invalid Security Code. Please try again.";
	}
}

$head = '<script type="text/javascript" language="javascript" src="/js/validator.js"></script>' . "\n";
$title = "Contact Us";
include("includes/header.php");

$subject = strtolower($_GET["subject"]);
?>
<div id="left">
	<h1><span class="highlight">Contact</span> Us</h1>
	<? if(!$sent) { ?>
	<? if($error) { echo '<p style="font-weight: bold; color: red;">' . $message . "</p>\n"; } ?>
  <p>If you need to reach us for any reason, please use the form below:</p>
	<form id="form_contact" method="post" action="contact.php">
		<table width="390">
			<tr>
				<td width="100">Name:</td>
				<td><input id="name" name="name" type="text" size="30" maxlength="60" /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input id="email" name="email" type="text" size="30" maxlength="60" /></td>
			</tr>
			<tr>
				<td>Subject:</td>
				<td>
					<select id="subject" name="subject">
						<option value="Question"<?= ($subject == "question") ? ' selected="selected"' : ''; ?>>Question</option>
						<option value="Comment"<?= ($subject == "comment") ? ' selected="selected"' : ''; ?>>Comment</option>
						<option value="Complaint"<?= ($subject == "complaint") ? ' selected="selected"' : ''; ?>>Complaint</option>
						<option value="Suggestion"<?= ($subject == "suggestion") ? ' selected="selected"' : ''; ?>>Suggestion</option>
						<option value="Other"<?= ($subject == "other") ? ' selected="selected"' : ''; ?>>Other</option>
					</select>	
				</td>
			</tr>	
			<tr>
				<td valign="top">Message:</td>
				<td><textarea rows="8" cols="40" name="message" id="message"></textarea></td>
			</tr>
			<tr><td colspan="2">Security Code</td></tr>
			<tr>
				<td valign="top"><img src="/images/captcha.jpg" width="120" height="40" alt="CAPTCHA" /></td>
				<td><input id="security_code" name="security_code" type="text" /></td>
			<tr>
				<td></td>
				<td><input id="submit" type="submit" value="Send Message" /></td>
			</tr>	
		</table>
	</form>
	<script language="javaScript" type="text/javascript">
		var frmvalidator  = new Validator("form_contact");
		frmvalidator.addValidation("message","maxlen=1000", "Your message must be under 1000 characters.");
		frmvalidator.addValidation("message","req", "The \"Message\" field is required");
		
		frmvalidator.addValidation("name","customselect", "The \"Name\" field must be alpha-numeric");
			
		frmvalidator.addValidation("email","email", "Your email must be a valid email address.");
	</script>
	<? } else { ?>
	<p>Thank you for your message! If you provided an e-mail, we will respond to you as soon as possible.</p>
	<? } ?>
	<br /><br />
&nbsp;</div>
<? include("includes/footer.php"); ?>
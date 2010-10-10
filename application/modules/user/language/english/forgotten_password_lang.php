<?php

// General
$lang['forgotten_password']				= "Forgotten password";
$lang['forgotten_password_description']	= "Please enter your username and an email address and you will receive email with further instructions on how to reset your password.";

// Message
$lang['email_successfully_sent']		= "Email with link to reset your password has been sent to your email address";
$lang['successfully_reset']				= "Your password has been successfully reset, please check your email for a new password";

// Validation
$lang['user_existence']					= "User with this username does not exists.";
$lang['email_existence']				= "User with this email address does not exists.";

// Form
$lang['form_username']					= "Username";
$lang['form_email']						= "E-mail";

$lang['send']							= "Send";

// Email templates
$lang['forgotten_password_subject']		= "Forgotten password request";
$lang['forgotten_password_body']		= "<p>Hello,</p>
<p>We've received a password reset request for your user account.</p>
<p>To initiate the process, please click the following link:</p>
<p><a href='%s'>%s</a></p>
<p>If clicking the link above does not work, copy and paste the URL in<br />
a new browser window instead.</p>
<p>Please disregard this message if you did not make a password reset request.</p>
<p>This is an automatically generated message. Replies are not monitored or<br>
answered.</p>
<p>Sincerely,<br />the Open Blog team</p>";

$lang['new_password_subject']			= "New password";
$lang['new_password_body']				= "<p>Hello,</p>
<p>Your password has been successfully reset.</p>
<p>Your new password is: <strong>%s</strong></p>
<p>You can now <a href='%s'>login</a> with the new password provided above.</p>
<p>This is an automatically generated message. Replies are not monitored or<br>
answered.</p>
<p>Sincerely,<br />The Open Blog team</p>";

/* End of file forgotten_password_lang.php */
/* Location: ./application/modules/user/language/english/forgotten_password_lang.php */
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once('./PHPMailer/src/PHPMailer.php');
require_once('./PHPMailer/src/SMTP.php');
require_once('./PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($to_, $subject_, $content_) {
	global $pw;
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;              // or SMTP::DEBUG_OFF in production
		$mail->isSMTP();
		$mail->Host       = 'smtp.partage.univ-smb.fr';		//$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'Maxent.Bernier@etu.univ-savoie.fr';               // SMTP username //$mail->Username   = 'sophimmo.doubs@gmail.com';               // SMTP username
		$mail->Password   = $pw;                     // SMTP password//$mail->Password   = 'meilleure_agence25';                     // SMTP password
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = 465;

		//Recipients
		$mail->setFrom('Maxent.Bernier@etu.univ-savoie.fr', "Soph'Immo");
		$mail->addAddress($to_, $to_);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		// Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject_;
		$mail->Body    = $content_;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		//echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
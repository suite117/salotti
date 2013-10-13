<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
	// entro per la prima volta

} else {
	// get the posted data
	$name = isset($_POST['contact_name']) ? trim($_POST['contact_name']) : null;
	$email_address = isset($_POST['contact_email']) ? trim($_POST['contact_email']) : null;
	$phone = isset($_POST['contact_phone']) ? trim($_POST['contact_phone']) : null;
	$message = isset($_POST['contact_message']) ? trim($_POST['contact_message']) : null;

	// check that a name was entered
	$errors = array();
	if (empty($name))
		array_push($errors, 'Devi inserire il tuo nome.');
	// check that an email address was entered
	if (empty($email_address))
		array_push($errors, 'Devi inserire l\'indirizzo email.');
	// check for a valid email address
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
		array_push($errors, 'Devi inserire un\'email valida.');
	// check that a phone number was entered
	if (empty($phone))
		array_push($errors, 'Devi inserire il tuo numero di telefono');
	// check that a message was entered
	if (empty($message))
		array_push($errors, 'Devi inserire un messaggio.');

	// check if an error was found - if there was, send the user back to the form
	if (sizeof($errors) != 0) {
		//var_dump($errors);
		// header('Location: contact.html?e='.urlencode($error)); exit;
	} else {
		$headers = "Da: $email_address\r\n";
		$headers .= "Spedito a: $email_address\r\n";

		// write the email content
		$email_content = "Nome: $name\n";
		$email_content .= "Indirizzo Email: $email_address\n";
		$email_content .= "Numero di telefono: $phone\n";
		$email_content .= "Messaggio:\n\n$message";

		// send the email
		// $site_mail definito in index.php
		$subject = "Messaggio inviato dal sito Alessi salotti a $site_email";

		if (sendEmail($email_address, $site_email, $subject, $email_content))
			$success = 'Messaggio inviato con successo da ' . $email_address . 'a ' . $site_mail;
		else
			array_push($errors, 'Invio del messaggio fallito!');
		
		if (sendEmail($site_email, $email_address, "Copia del $subject", $email_content))
			$success = 'E\' stata inviata una copia anche a te all\'indirizzo' . $email_address ;
		else
			array_push($errors, 'Invio del messaggio fallito!');

	}
}
?>

<?php

function sendEmail($sender, $to, $subject, $email_content) {
	// Genera un boundary
	$mail_boundary = "=_NextPart_" . md5(uniqid(time()));

	$headers = "From: $sender\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: multipart/alternative;\n\tboundary=\"$mail_boundary\"\n";
	$headers .= "X-Mailer: PHP " . phpversion();

	// Corpi del messaggio nei due formati testo e HTML
	$text_msg = "messaggio in formato testo";
	$html_msg = "<b>messaggio</b> in formato <p><a href='http://www.aruba.it'>html</a><br><img src=\"http://hosting.aruba.it/image_top/top_01.gif\" border=\"0\"></p>";

	// Costruisci il corpo del messaggio da inviare
	$msg = "This is a multi-part message in MIME format.\n\n";
	$msg .= "--$mail_boundary\n";
	$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
	$msg .= "Content-Transfer-Encoding: 8bit\n\n";
	$msg .= "Email di prova";
	// aggiungi il messaggio in formato text

	$msg .= "\n--$mail_boundary\n";
	$msg .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$msg .= "Content-Transfer-Encoding: 8bit\n\n";
	$msg .= $email_content;

	// aggiungi il messaggio in formato HTML

	// Boundary di terminazione multipart/alternative
	$msg .= "\n--$mail_boundary--\n";

	// Imposta il Return-Path (funziona solo su hosting Windows)
	ini_set("sendmail_from", $sender);

	// Invia il messaggio, il quinto parametro "-f$sender" imposta il Return-Path su hosting Linux
	if (mail($to, $subject, $msg, $headers, "-f$sender")) {

		// send the user back to the form

		//echo "Mail inviata correttamente !<br><br>Questo di seguito è il codice sorgente usato per l'invio della mail:<br><br>";
		//highlight_file($_SERVER["SCRIPT_FILENAME"]);
		//unlink($_SERVER["SCRIPT_FILENAME"]);
		return true;
	} else {

		return false;
	}

}
?>
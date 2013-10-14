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


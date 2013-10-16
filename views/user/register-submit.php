<?php
# if form is submitted
if (isset($_POST['submit'])) {


	if($password !== $password_check)
		$errors[] = 'Le password devono coincidere.';

	if (empty($password) || empty($email) || empty($partitaiva) || empty($ragionesociale)) {
		$errors[] = 'Devi compilare tutti i campi.';
	} else {
		#validating user's input with functions that we will create next
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'La password deve essere di almeno 6 caratteri';
		} else if (strlen($_POST['password']) > 18) {
			$errors[] = 'La tua password è più lunga di 18 caratteri';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Inserisci un\'email valida.';
		} else if ($users -> email_exists($email) === true) {
			$errors[] = 'L\'email '. $email. ' esiste già.';
		}
	}
	if (empty($errors) === true) {
		$ragionesociale = htmlentities($_POST['ragionesociale']);
		$partitaiva = $_POST['partitaiva'];
		$password = $_POST['password'];
		$email = htmlentities($_POST['email']);
		$nome = $_POST['firstname'];
		$cognome = $_POST['lastname'];
		$indirizzo = $_POST['indirizzo'];
		$n_civico = $_POST['numero_civico'];
		$citta = $_POST['citta'];
		$cap = $_POST['cap'];
		$telefono = $_POST['telefono'];
		$cellulare = $_POST['cellulare'];
		$users -> register($ragionesociale, $partitaiva, $password, $email, $nome, $cognome, $indirizzo, $n_civico, $citta, $cap, $telefono, $cellulare);

		//$email_content = ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n";
		//sendEmail($sender, $email, $subject, $email_content);

		$success = 'Grazie per esserti registrato. Per favore controlla la tua email.';
	}
}

?>

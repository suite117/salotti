<?php
# if form is submitted
if (isset($_POST['submit'])) {

	if (empty($password) || empty($email) || empty($partitaiva) || empty($ragionesociale))
		$errors[] = 'Devi compilare tutti i campi.';

	#validating user's input with functions that we will create next
	if (strlen($password) < 6 | strlen($password) > 18)
		$errors[] = 'La password deve essere tra 6  e 18 caratteri';

	if($password !== $password_check)
		$errors[] = 'Le password devono coincidere.';

	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		$errors[] = 'Inserisci un\'email valida.';

	if ($users -> email_exists($email))
		$errors[] = 'L\'email '. $email. ' esiste già.';

	if (empty($errors) === true) {
		$users -> register($ragionesociale, $partitaiva, $password, $email, $firstname, $lastname, $indirizzo, $numero_civico, $citta, $cap, $telefono, $cellulare, $username);

		//$email_content = ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n";
		//sendEmail($sender, $email, $subject, $email_content);

		$success = 'Grazie per esserti registrato. Per favore controlla la tua email.';
	}
}
elseif(isset($user)) {
	foreach ($user as $key => $value) {
		${
			$key} = $value;
	}
}

?>

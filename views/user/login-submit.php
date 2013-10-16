<?php

$general -> logged_in_protect();
$field = "";
if (empty($_POST) === false) {
	$value = trim($_POST['user_login']);
	$password = $_POST['password'];
	if (empty($user_login) || empty($password)) {
		$errors[] = 'Devi inserire le tua email o il tuo username e la tua password.';
	} else if ($users -> email_exists($value) === true) {
		$field = "email";
	} else if ($users -> user_exists($value) === true) {

		$field = "username";
	} else {
		$errors[] = 'Spiacenti l\'utente non esiste.';
	}
	/* else if($users->email_confirmed($username)===false) {
	 $errors[]='Sorry, but you need to activate your account.  //per ora tutti gli utenti sono attivi di default
	 Please check your email.';
	 }*/
	if ($field === "email" || $field === "username") {
		$login = $users -> login($field, $value, $password);

		if ($login === false) {
			$errors[] = 'Spiacenti, username e/o password non validi';
		} else {
			// username/password is correct and the login method of the $users object returns the user's id, which is stored in $login.
			$_SESSION['id'] = $login['id'];
			$_SESSION['role'] = $login['role'];
			// The user's id is now set into the user's session  in the form of $_SESSION['id']
			#Redirect the user to home.php.
			header('Location: index.php');
			exit();
		}
	}
}
?>

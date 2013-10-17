<?php

$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if (empty($password) || empty($user_login)){
		$errors[] = 'Devi compilare tutti i campi.';
	}else if($users->email_exists($user_login)===false && $users->user_exists($user_login) === false) {
		$errors[]='Spiacenti l\'utente non esiste.';
	}else {
	$login=$users->login($user_login,$password);

	if($login===false) {
		$errors[]='Spiacenti, username e/o password non validi';
	} else {
		// username/password is correct and the login method of the $users object returns the user's id, which is stored in $login.
		$_SESSION['id']= $login['id'];
		$_SESSION['role'] = $login['role'];
		// The user's id is now set into the user's session  in the form of $_SESSION['id']
		#Redirect the user to home.php.
		header('Location: index.php');
		exit();
	}
	}
	
	
	
}


?>

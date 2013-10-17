<?php

$general->logged_in_protect();

if(empty($_POST)===false) {
	$email=trim($_POST['email']);
	$password=$_POST['password'];
	if(empty($email) || empty($password)) {
		$errors[]='Devi inserire le tua email e la tua password.';
	} else if($users->email_exists($email)===false) {
		$errors[]='Spiacenti l\'utente non esiste.';
	}/* else if($users->email_confirmed($username)===false) {
	$errors[]='Sorry, but you need to activate your account.  //per ora tutti gli utenti sono attivi di default
	Please check your email.';
	}*/ else {
	$login=$users->login($email,$password);

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

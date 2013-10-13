<?php
require 'views/core/init.php';
$general->logged_in_protect();
if(empty($_POST)===false) {
$email=trim($_POST['email']);
$password=trim($_POST['password']);
if(empty($email)===true||empty($password)===true) {
$errors[]='Sorry, but we need your email and password.';
} else if($users->email_exists($email)===false) {
$errors[]='Sorry that username doesn\'t exists.';
}/* else if($users->email_confirmed($username)===false) {
 $errors[]='Sorry, but you need to activate your account.  //per ora tutti gli utenti sono attivi di default
 Please check your email.';
 }*/ else {
$login=$users->login($email,$password);
if($login===false) {
$errors[]='Sorry, that username/password is invalid';
} else {
// username/password is correct and the login method of the $users object returns the user's id, which is stored in $login.
$_SESSION['id']=$login;
// The user's id is now set into the user's session  in the form of $_SESSION['id']
#Redirect the user to home.php.
header('Location: index.php');
exit();
}
}
}
?>

<?php
if(empty($errors)===false) {
echo '<p>'.implode('</p><p>',$errors).'</p>';
}
?>
<div class="container">

	<form role="form" method="post" action="">
		<div class="form-group">
			<label for="email">Indirizzo Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Iserisci la tua email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="La tua password">
		</div>
		<div class="form-group">
			<div class="col-md-1">
				<div class="checkbox">
					<label>
						<input type="checkbox">
						Ricordami </label>
				</div>
			</div>
			<div class="col-md-1">
				<button type="submit" name="submit" class="btn btn-default">
					Accedi
				</button>
			</div>
		</div>
	</form>

</div>
<!-- /container -->
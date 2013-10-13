<?php
require 'core/init.php';
# if form is submitted
if (isset($_POST['submit'])) {
	if (empty($_POST['password']) || empty($_POST['email']) || empty($_POST['partitaiva']) || empty($_POST['ragionesociale'])) {
		$errors[] = 'Devi compilare tutti i campi.';
	} else {
		#validating user's input with functions that we will create next
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be at least 6 characters';
		} else if (strlen($_POST['password']) > 18) {
			$errors[] = 'Your password cannot be more than 18 characters long';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Please enter a valid email address';
		} else if ($users -> email_exists($_POST['email']) === true) {
			$errors[] = 'That email already exists.';
		}
	}
	if (empty($errors) === true) {
		$ragionesociale = htmlentities($_POST['ragionesociale']);
		$partitaiva = $_POST['partitaiva'];
		$password = $_POST['password'];
		$email = htmlentities($_POST['email']);
		$users -> register($ragionesociale, $partitaiva, $password, $email);
		// Calling the register function, which we will create soon.
		header('Location: views/register.php?success');
		exit();
	}
}
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Grazie per esserti registrato. Please check your email.';
}
?>

<div class="container">
	
	<form class="form-horizontal" role="form" method="post" action="">
		
		 <div class="form-group">
      		<label for="firstname" class="col-md-2">Nome:</label>
      		<div class="col-md-10">
        		<input type="text" class="form-control" id="firstname" placeholder="Inserisci il tuo nome">
      		</div> 
    	</div>
 
	    <div class="form-group">
	      <label for="lastname" class="col-md-2">
	        Cognome:
	      </label>
	      <div class="col-md-10">
	        <input type="text" class="form-control" id="lastname" placeholder="Inserisci il tuo cognome">
	      </div>
	    </div>
		
		<div class="form-group">
			<label for="email" class="col-md-2">Indirizzo Email</label>
			 <div class="col-md-10">
			<input type="email" class="form-control" name="email" id="email" placeholder="Iserisci la tua email">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-md-2">Password</label>
			 <div class="col-md-10">
			<input type="password" class="form-control" name="password" id="password" placeholder="La tua password">
			</div>
		</div>
		<div class="form-group">
			<label for="password_check" class="col-md-2">Conferma la password</label>
			 <div class="col-md-10"> 	 
			<input type="password" class="form-control" name="password_check" id="password_check" placeholder="Digita di nuovo la password">
			</div>
		</div>
		<div class="form-group">
			<label for="ragionesociale" class="col-md-2">Ragione Sociale</label>
			 <div class="col-md-10">
			<input type="text" class="form-control" name="ragionesociale" id="ragionesociale" placeholder="Il nome dell'azienda">
			</div>
		</div>
		<div class="form-group">
			<label for="partitaiva" class="col-md-2">Partita IVA</label>
			 <div class="col-md-10">
			<input type="text" class="form-control" name="partitaiva" id="partitaiva" placeholder="Inserisci la Partita IVA">
			</div>
		</div>
		<div class="form-group">
			<label for="indirizzo" class="col-md-2">Indirizzo</label>
			 <div class="col-md-6">
			<input type="text" class="form-control" id="indirizzo" placeholder="Inserisci il tuo indirizzo">
			</div>
			<label for="numero_civico" class="col-md-2">N° civico</label>
			 <div class="col-md-2">
			<input type="text" class="form-control" id="numero_civico" placeholder="N° civico">
			</div>
		</div>
		
		<div class="form-group">
			<label for="cap" class="col-md-2">CAP</label>
			 <div class="col-md-3">
			<input type="text" class="form-control" id="cap" placeholder="Codice Avviamento Postale">
			</div>
			<label for="citta" class="col-md-1">Città</label>
			 <div class="col-md-6">
			<input type="text" class="form-control" id="citta" placeholder="Inserisci la città di residenza">
			</div>
		</div>
		
		<div class="form-group">
			<label for="provincia" class="col-md-2">Provincia</label>
			 <div class="col-md-10">
			<input type="text" class="form-control" id="provincia" placeholder="Inserisci la provincia">
			</div>
		</div>
		
		<div class="form-group">
			<label for="cap" class="col-md-2">Telefono</label>
			 <div class="col-md-4">
			<input type="text" class="form-control" id="telefono" placeholder="Inserisci il tuo telefono">
			</div>
			<label for="citta" class="col-md-2">Cellulare</label>
			 <div class="col-md-4">
			<input type="text" class="form-control" id="citta" placeholder="Inserisci un numero attivo">
			</div>
		</div>
		
		<button type="submit" name="submit" class="btn btn-default">
			Invia richiesta
		</button>
	</form>

</div>
<!-- /container -->


 
		<?php
		# if there are errors, they would be displayed here.
		if (empty($errors) === false) {
			echo '<p>' . implode('</p><p>', $errors) . '</p>';
		}
	?>

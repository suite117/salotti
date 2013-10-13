<?php
# if form is submitted
if (isset($_POST['submit'])) {
	$firstname= $_POST['firstname'] ? trim($_POST['firstname']) : null;
	$lastname= $_POST['lastname'] ? trim($_POST['lastname']) : null;
	$email = $_POST['email'] ? trim($_POST['email']) : null;
	$password = $_POST['password'] ? trim($_POST['password']) : null;
	$password_check  = $_POST['password_check'] ? trim($_POST['password_check']) : null;

	$partitaiva = $_POST['partitaiva'] ? trim($_POST['partitaiva']) : null;
	$ragionesociale = $_POST['ragionesociale'] ? trim($_POST['ragionesociale']) : null;

	$indirizzo  = $_POST['indirizzo'] ? trim($_POST['indirizzo']) : null;
	$numero_civico  = $_POST['numero_civico'] ? trim($_POST['numero_civico']) : null;
	$cap = $_POST['cap'] ? trim($_POST['cap']) : null;
	$citta = $_POST['citta'] ? trim($_POST['citta']) : null;
	$provincia = $_POST['provincia'] ? trim($_POST['provincia']) : null;
	$telefono = $_POST['telefono'] ? trim($_POST['telefono']) : null;
	$cellulare = $_POST['cellulare'] ? trim($_POST['cellulare']) : null;

	if (empty($password) || empty($email) || empty($partitaiva) || empty($ragionesociale)) {
		$errors[] = 'Devi compilare tutti i campi.';
	} else {
		#validating user's input with functions that we will create next
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'La password deve essere di almeno 6 caratteri';
		} else if (strlen($_POST['password']) > 18) {
			$errors[] = 'La tua password � pi� lunga di 18 caratteri';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Inserisci un\'email valida.';
		} else if ($users -> email_exists($email) === true) {
			$errors[] = 'L\'email'. $email. ' esiste gi�.';
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
	$success = 'Grazie per esserti registrato. Please check your email.';
}
?>

<div class="container">
	<?php
	// check for a successful form post
	if (isset($success))
		echo "<div class=\"alert alert-success\">" . $success . "</div>";

	// check for a form error
	elseif (isset($errors))
	foreach ($errors as $error)
		echo "<div class=\"alert alert-danger\">" . $error . "</div>";
	?>


	<form class="form-horizontal" role="form" method="post" action="">

		<div class="form-group">
			<label for="firstname" class="col-md-2">Nome:</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="firstname"
					placeholder="Inserisci il tuo nome">
			</div>
		</div>

		<div class="form-group">
			<label for="lastname" class="col-md-2"> Cognome: </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="lastname"
					placeholder="Inserisci il tuo cognome">
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-md-2">Indirizzo Email</label>
			<div class="col-md-10">
				<input type="email" class="form-control" name="email" id="email"
					placeholder="Iserisci la tua email">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-md-2">Password</label>
			<div class="col-md-10">
				<input type="password" class="form-control" name="password"
					id="password" placeholder="La tua password">
			</div>
		</div>
		<div class="form-group">
			<label for="password_check" class="col-md-2">Conferma la password</label>
			<div class="col-md-10">
				<input type="password" class="form-control" name="password_check"
					id="password_check" placeholder="Digita di nuovo la password">
			</div>
		</div>
		<div class="form-group">
			<label for="ragionesociale" class="col-md-2">Ragione Sociale</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="ragionesociale"
					id="ragionesociale" placeholder="Il nome dell'azienda">
			</div>
		</div>
		<div class="form-group">
			<label for="partitaiva" class="col-md-2">Partita IVA</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="partitaiva"
					id="partitaiva" placeholder="Inserisci la Partita IVA">
			</div>
		</div>
		<div class="form-group">
			<label for="indirizzo" class="col-md-2">Indirizzo</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="indirizzo"
					placeholder="Inserisci il tuo indirizzo">
			</div>
			<label for="numero_civico" class="col-md-2">N° civico</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="numero_civico"
					placeholder="N° civico">
			</div>
		</div>

		<div class="form-group">
			<label for="cap" class="col-md-2">CAP</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="cap"
					placeholder="Codice Avviamento Postale">
			</div>
			<label for="citta" class="col-md-1">Città</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="citta"
					placeholder="Inserisci la città di residenza">
			</div>
		</div>

		<div class="form-group">
			<label for="provincia" class="col-md-2">Provincia</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="provincia"
					placeholder="Inserisci la provincia">
			</div>
		</div>

		<div class="form-group">
			<label for="cap" class="col-md-2">Telefono</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="telefono"
					placeholder="Inserisci il tuo telefono">
			</div>
			<label for="citta" class="col-md-2">Cellulare</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="citta"
					placeholder="Inserisci un numero attivo">
			</div>
		</div>

		<button type="submit" name="submit" class="btn btn-default">Invia
			richiesta</button>
	</form>

</div>
<!-- /container -->



<?php
# if there are errors, they would be displayed here.
if (empty($errors) === false) {
	echo '<p>' . implode('</p><p>', $errors) . '</p>';
}
?>

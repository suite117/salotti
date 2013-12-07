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


	<form class="form-horizontal" method="post" action="">

		<div class="form-group">
			<label for="username" class="col-md-2">Username:</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="username"
					name="username" placeholder="Inserisci il tuo username"
					value="<?=@$username ?>">
			</div>
		</div>

		
		<div class="form-group">
			<label for="firstname" class="col-md-2">Nome:</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="firstname"
					name="firstname" placeholder="Inserisci il tuo nome"
					value="<?=@$firstname ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="lastname" class="col-md-2"> Cognome: </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="lastname"
					name="lastname" placeholder="Inserisci il tuo cognome"
					value="<?=@$lastname ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-md-2">Indirizzo Email</label>
			<div class="col-md-10">
				<input type="email" class="form-control" id="email" name="email"
					placeholder="Iserisci la tua email" value="<?=@$email ?>">
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
					id="ragionesociale" placeholder="Il nome dell'azienda"
					value="<?=@$ragionesociale ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="partitaiva" class="col-md-2">Partita IVA</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="partitaiva"
					id="partitaiva" placeholder="Inserisci la Partita IVA"
					value="<?=@$partitaiva ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="indirizzo" class="col-md-2">Indirizzo</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="indirizzo"
					name="indirizzo" placeholder="Inserisci il tuo indirizzo"
					value="<?=@$indirizzo ?>">
			</div>
			<label for="numero_civico" class="col-md-2">N° civico</label>
			<div class="col-md-2">
				<input type="text" class="form-control" id="numero_civico"
					name="numero_civico" placeholder="N° civico"
					value="<?=@$numero_civico ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="cap" class="col-md-2">CAP</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="cap" name="cap"
					placeholder="Codice Avviamento Postale" value="<?=@$cap ?>">
			</div>
			<label for="citta" class="col-md-1">Città</label>
			<div class="col-md-6">
				<input type="text" class="form-control" id="citta" name="citta"
					placeholder="Inserisci la città di residenza" value="<?=@$citta ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="provincia" class="col-md-2">Provincia</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="provincia"
					name="provincia" placeholder="Inserisci la provincia"
					value="<?=@$provincia ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="cap" class="col-md-2">Telefono</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="telefono"
					name="telefono" placeholder="Inserisci il tuo telefono"
					value="<?=@$telefono ?>">
			</div>
			<label for="cellulare" class="col-md-2">Cellulare</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="cellulare"
					name="cellulare" placeholder="Inserisci il tuo numero di cellulare"
					value="<?=@$cellulare ?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" name="submit" class="btn btn-default">Invia
					richiesta</button>
			</div>
		</div>
	</form>

</div>
<!-- /container -->

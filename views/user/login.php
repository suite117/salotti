<?php require 'login-submit.php';?>

<div class="section">
	<div class="container">
		<div class="col-md-12">
			<h3>
				Non sei registrato? <a href="<?=curUrl() ?>register.html">Registrati</a>
			</h3>
		</div>
	</div>
</div>

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

	<form role="form" method="post" action="">
		<div class="form-group">

			<label for="username" class="col-md-12">Indirizzo Email o Username</label>
			<div class="col-md-12">
				<input type="username" class="form-control" name="user_login" id="email"
					placeholder="Iserisci la tua email o il tuo username" value="<?=@$field ?>">
			</div>
		</div>
		<div class="form-group">

			<label for="password" class="col-md-12">Password</label>
			<div class="col-md-12">
				<input type="password" class="form-control" name="password"
					id="password" placeholder="La tua password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" name="submit" class="btn btn-default">Accedi</button>
			</div>
		</div>
	</form>

</div>
<!-- /container -->

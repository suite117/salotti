<?php require 'product-add-submit.php';?>

<div class="container">
	<?php
	// check for a successful form post
	if (isset($success))
		echo "<div class=\"alert alert-success\">" . $success . "</div>";

	// check for a form error
	elseif (isset($errors))
	foreach ($errors as $key => $error)
		echo "<div class=\"alert alert-danger\">" . $error . "</div>";
	?>

	<form class="form-horizontal" role="form" method="post" action="">

		<div
			class="form-group <?= isset($errors['name']) ? 'has-error' : 'has-success' ?>">
			<label for="name" class="col-md-2">Titolo</label>
			<div class="controls">
				<input type="text" class="form-control" name="name" id="name"
					placeholder="Iserisci il nome del prodotto">
			</div>
		</div>
		<div class="form-group">
			<label for="category_id" class="col-md-2">Categoria</label>
			<div class="col-md-4">
				<select class="form-control" name="category_id" id="category_id">
					<option value="1">sofa</option>
					<option value="2">bed</option>
				</select>
			</div>
			<label for="version_id" class="col-md-2">Versione</label>
			<div class="col-md-4">
				<select class="form-control" name="version_id" id="version_id">
					<option value="2p">2 posti</option>
					<option value="l2p">laterale 2 posti</option>
					<option value="2pm">2 posti max</option>
					<option value="l2pm">laterale 2 posti max</option>
					<option value="l3p">laterale 3 posti</option>
					<option value="l3pm">laterale 3 posti max</option>
					<option value="cl">chaise longe</option>
					<option value="clm">chaise longe max</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label for="description">Descrizione</label>
				<textarea name="description" class="form-control editor" rows="6"
					id="description"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label for="scheda_tecnica">Scheda tecnica</label>
				<textarea name="scheda_tecnica" class="form-control editor" rows="6"
					id="scheda_tecnica"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-1">
				<button type="submit" name="submit" class="btn btn-default">Crea
					prodotto</button>
			</div>
		</div>
	</form>

</div>

<?php
require '/../core/init.php';
# if form is submitted
if (isset($_POST['submit'])) {
	if (empty($_POST['title'])) {
		$errors[] = 'Devi inserire il titolo.';
	} 
	if (empty($errors) === true) {
		print_r($_POST);
		$nome = htmlentities($_POST['title']);
		//$immagine = $_POST['immagine'];
		$descrizione = $_POST['description'];
		$schedatecnica = $_POST['scheda_tecnica'];
		$idcategoria = $_POST['category'];
		$idversione = $_POST['version'];
		$immagine = null;
		$products -> insert($nome, $immagine, $descrizione, $schedatecnica, $idcategoria, $idversione);
		// Calling the register function, which we will create soon.
		header('Location: views/store/product-add.php?success');
		exit();
	}
}
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Il prodotto è stato inserito correttamente.';
}
?>

<div class="container">

	<form class="form-horizontal" role="form" method="post" action="">
		<div class="form-group">
			<label for="title" class="col-md-2">Titolo</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="title" id="title" placeholder="Iserisci il nome del prodotto">
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="col-md-2">Categoria</label>
			<div class="col-md-4">
				<select class="form-control" name="category" id="category">
					<option value="1">sofa</option>
					<option value="2">bed</option>
				</select>
			</div>
			<label for="version" class="col-md-2">Versione</label>
			<div class="col-md-4">
				<select class="form-control" name="version" id="version">
					<option value="2p">2 posti</option>
					<option value="l2p">laterale 2 posti</option>
					<option value="2pm">2 posti max </option>
					<option value="l2pm">laterale 2 posti max </option>
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
				<textarea name="description" class="form-control editor" rows="6" id="description" ></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label for="scheda_tecnica">Scheda tecnica</label>
				<textarea name="scheda_tecnica" class="form-control editor" rows="6" id="scheda_tecnica" ></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-1">
				<button type="submit" name="submit" class="btn btn-default">
					Crea prodotto
				</button>
			</div>
		</div>
	</form>

</div>

<?php
$general->not_admin_out_protect();
$product = $products_dao->get_product($id);
//var_dump("product", $product);
/* popola le categorie per il select del form */
if (isset($product)) {

	$categories = $category_dao->get_categories_by_type($product['type']);
	var_dump("product['type']", $product['type']);
}

/* controlli validazione */
if (isset($_POST['create']) || isset($_POST['save']))  {
	if (empty($name))
		$errors['name'] = 'Devi inserire il titolo.';
	if(empty($category_id))
		$errors['category_id'] = 'Devi inserire la categoria.';
	if(empty($description))
		$errors['description'] = 'Devi inserire la descrizione.';
	if(empty($version_id))
		$errors['version_id'] = 'Devi inserire la versione.';
}

# if form is submitted
if (isset($_POST['save'])) {

	if (empty($errors) === true) {
		$products_dao->update_product($name, @$immagine, $description, $scheda_tecnica, $category_id, $version_id, $product['id']);
		$success= 'Il prodotto è stato aggiornato correttamente. <a href="'.curUrl() .'prodotti/' .   $product['nome']  . '.html">Visualizza le modifiche</a>';

		// recupero il bean aggiornato
		$product = $products_dao->get_product($id);
	}
}
elseif (isset($_POST['create'])) {

	if (empty($errors) === true) {
		$products_dao -> insert($name, null, $description, $scheda_tecnica, $category_id, $version_id);
		$success= 'Il prodotto è stato inserito correttamente. <a href="'.curUrl() .'prodotti/' .   $product['nome']  . '.html">Visualizza le modifiche</a>';

	}
}


var_dump($categories);

?>
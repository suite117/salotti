<?php
$general->not_admin_out_protect();

if (isset($id)){
	$category = $category_dao->get_product($id);
	//var_dump("product", $product);
}

/* popola le categorie per il select del form */
if (isset($category)) {

	$categories = $category_dao->get_categories_by_type($product['type']);
	$options = $options_dao->get_options_by_type($product['type']);
	$selected_options = $options_dao->get_selected_options_by_product($product);
	//var_dump("product['type']", $product['type']);
}

$types = isset($product) ? array(0 => $product) : $products_dao->get_types();

/* controlli validazione */
if (isset($_POST['create']) || isset($_POST['save']))  {
	if (empty($name))
		$errors['name'] = 'Devi inserire il nome della categoria.';

}

# if form is submitted
if (isset($_POST['save'])) {

	if (empty($errors) === true) {
		$products_dao->update_category($name, $descriprion, $category['id']);
		$success= 'La categoria è stata aggiornata correttamente. <a href="'.curUrl() .'prodotti/' .   $category['nome']  . '.html">Visualizza le modifiche</a>';

		// recupero il bean aggiornato
		$category = $category_dao->get_category($id);
		var_dump($category);
	}
}
elseif (isset($_POST['create'])) {

	if (empty($errors) === true) {
		$category_dao -> insert($name, $description);
		$success= 'La categoria è stato inserita correttamente. <a href="'.curUrl() .'prodotti/' .   $category['nome']  . '.html">Visualizza le modifiche</a>';

	}
}


//var_dump($categories);

?>
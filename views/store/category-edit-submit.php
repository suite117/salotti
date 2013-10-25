<?php
$general->not_admin_out_protect();

if (isset($id)){
	$category = $category_dao->get_category($id);
	//var_dump("product", $product);
}


/* controlli validazione */
if (isset($_POST['create']) || isset($_POST['save']))  {
	if (empty($cat_name))
		$errors['name'] = 'Devi inserire il nome della categoria.';

}

# if form is submitted
if (isset($_POST['save'])) {

	if (empty($errors) === true) {
		$category_dao->update_category($name, $descriprion, $category['id']);
		$success= 'La categoria è stata aggiornata correttamente. <a href="'.curUrl() .'categorie/' .   $cat_name  . '.html">Visualizza le modifiche</a>';

		// recupero il bean aggiornato
		$category = $category_dao->get_category($id);
		var_dump($category);
	}
}
elseif (isset($_POST['create'])) {

	if (empty($errors) === true) {
		$category_dao -> insert($cat_name, $description, @$category_parent_id);
		$success= 'La categoria è stato inserita correttamente. <a href="'.curUrl() .'categorie/' .   $cat_name  . '.html">Visualizza le modifiche</a>';

	}
}


//var_dump($categories);

?>
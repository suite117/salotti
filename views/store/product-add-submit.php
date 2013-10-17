<?php
$general->logged_out_protect();

$categories = $category_dao->get_categories();
//var_dump($categories);


# if form is submitted
if (isset($_POST['submit'])) {
	if (empty($name))
		$errors['name'] = 'Devi inserire il titolo.';
	if(empty($category_id))
		$errors['category_id'] = 'Devi inserire la categoria.';
	if(empty($description))
		$errors['description'] = 'Devi inserire la descrizione.';
	if(empty($version_id))
		$errors['version_id'] = 'Devi inserire la versione.';

	if (empty($errors) === true) {
		$products_dao -> insert($name, null, $description, $scheda_tecnica, $category_id, $version_id);
		$success= 'Il prodotto è stato inserito correttamente.';
	}
}

?>
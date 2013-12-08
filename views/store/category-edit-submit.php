<?php
$general->not_admin_out_protect();

if(isset($id))
    $category = $category_dao->get_category($id);

/* controlli validazione */
if (isset($_POST['create']) || isset($_POST['save']))  {
    if (empty($cat_name))
        $errors['name'] = 'Devi inserire il nome della categoria.';

}

# if form is submitted
if (isset($_POST['save'])) {

    if (empty($errors) === true) {
        $category_dao->update_category($category_id, $cat_name, @$description, @$category_parent_id, $category_order);
        $success= 'La categoria ' . $cat_name . ' è stata aggiornata correttamente. <a href="'.BASE_URL .'categorie/' .   $cat_name  . '.html">Visualizza le modifiche</a>';

        // recupero il bean aggiornato
        $category = $category_dao->get_category($category_id);
        //var_dump($category);
    }
}
elseif (isset($_POST['create'])) {

    if (empty($errors) === true) {
        $category_dao -> insert($cat_name, @$description, @$category_parent_id);
        $success= 'La categoria è stata inserita correttamente. <a href="'.BASE_URL .'lista-categorie.html">Visualizza le modifiche</a>';

    }
}


//var_dump($categories);

?>
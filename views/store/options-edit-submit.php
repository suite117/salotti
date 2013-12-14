<?php
$general->not_admin_out_protect();


// CASO AGGIUNGI - VISUALIZZAZIONE
// recupero i tipi
$types = $products_dao->get_types();

/* controlli validazione */
if (isset($_POST['create']) || isset($_POST['save']))  {  
    if (empty($option_name) || empty($product_type))
        $errors['all'] = 'Devi riempire tutti i campi.';
}

# if form is submitted
if (isset($_POST['save'])) { // CASO MODIFICA

    if (empty($errors) === true) {
        $options_dao->update($option_code, $option_name, $product_type, $option_order);
        $success= 'L\'opzione ' . $option_name . ' è stata aggiornata correttamente. <a href="'.BASE_URL .'lista-opzioni.html">Visualizza tutte le opzioni.</a>';
        
        //var_dump($category);
    }
    
    
}
elseif (isset($_POST['create'])) { // CASO AGGIUNGI

    if (empty($errors) === true) {
        $options_dao -> insert($option_code, $option_name, $product_type);
        $success= 'L\'opzione è stata inserita correttamente. <a href="'.BASE_URL .'lista-opzioni.html">Visualizza le modifiche</a>';
        $option = $options_dao->get_option($option_code);
    }
}


// CASO MODIFICA - RIEMPIMENTO FORM
// se è presente l'id recupero il bean aggiornato
if(isset($id)) // recupero il bean categoria
    $option = $options_dao->get_option($id);


?>
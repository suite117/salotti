<?php
//error_reporting(E_ALL ^ E_WARNING);
// riporta tutti gli errori
error_reporting(E_ALL | E_STRICT);

require_once 'init.php';



$view = 'views/home.php';
$page_title = '';
$page_description = '';
$category_name = null;
$config['isOnline'] = true;

/* informazioni generali del sito */
$site_name = 'Alessi Salotti';
$site_email = 'suite117@gmail.com';

require_once 'header.php';


//var_dump("get", $_GET);
//var_dump("post", $_POST);

// POST CONTROLLER
$errors = array();
if (isset($_POST))
foreach ($_POST as $key => $value) {
    if (is_array($value)|| is_numeric($value)) {
        ${
            $key} = $value;
    } elseif (!is_array($key)) {
        ${
            $key} = strtolower(trim($value));

            // se la variabile è vuota viene settata a null
            if (strlen(${
                $key}) == 0)
                    ${
                    $key} = null;

    }
}

// redirect alla home se non settato
$controller = isset($_GET["controller"]) ? $_GET["controller"] : 'index';
switch($controller) {

    /* CASO AGGIUNGI */
    case 'aggiungi':
        $type = $_GET['title'];

        switch($type) {
            case 'utente' :
                $action = 'views/user/user-submit.php';
                $view = 'views/user/register.php';
                $page_title = 'Aggiungi un' . $type;
                $page_description = 'Inserisci un nuovo utente';
                break;
            case 'prodotto' :
                $view = 'views/store/product-edit.php';
                $page_title = 'Aggiungi un' . $type;
                $page_description = 'Inserisci un nuovo prodotto';
                break;
            case 'categoria' :
                $view = 'views/store/category-edit.php';
                $page_title = 'Aggiungi una' . $type;
                $page_description = 'Inserisci una nuova categoria';
                break;
            case 'opzione':
                $view = 'views/store/options-edit.php';
                $page_title = 'Aggiungi una' . $type;
                $page_description = 'Inserisci una nuova opzione';
                break;
        }

        break;
        /* CASO MODIFICA */
    case 'modifica':
        $type = $_GET['category'];
        $id = $_GET['title'];

        switch($type) {
            case 'utente' :
                $view = 'views/user/register.php';
                $user = $users_dao -> get_user($id);
                $suffix = $user['username'];
                break;
            case 'prodotto' :
                $view = 'views/store/product-edit.php';
                $suffix = 'prodotto';
                break;
            case 'categoria' :
                $view = 'views/store/category-edit.php';
                $suffix = '';
                break;
            case 'opzione' :
                $view = 'views/store/options-edit.php';
                $suffix = '';
                break;
        }
        $page_title = 'Modifica ' . $suffix;
        $page_description = $type;
        break;

        /* TUTTI GLI ALTRI CASI */
        /* per Aruba - caso solo cartella principale */
    case 'index' :
    case 'index.php' :
    case 'index.html' :
        $view = 'views/home.php';
        break;
    case 'breadcrumb' :
        $view = 'views/store/products.php';
        $page_title = _('Gallery');
        break;
    case 'products':
    case 'prodotti' :
        if (isset($_GET['title'])) {
            $product = $products_dao -> get_product_by_field('nome', $_GET['title']);
            $view = 'views/store/product-view.php';
            $page_title = $product['nome'];
        } else {
            $view = 'views/store/products.php';
            $page_title = _('Gallery');
            $page_description = _('Show products');
        }
        break;
    case 'prodotto' :
        $page_title = $_GET["title"];
        if ($page_title !== 'modifica')
            $view = 'views/store/product-view.php';
        else {
            $view = 'views/store/product-edit.php';
            $category_name = null;
        }
        break;
    case 'login' :
        $view = 'views/user/login.php';
        $page_title = "Accedi";
        break;
    case 'logout' :
        $view = 'views/user/logout.php';
        $page_title = _("Logout");
        break;
    case 'register' :
        require 'views/user/register-submit.php';
        $view = 'views/user/register.php';
        $page_title = _("Registration");
        break;
    case 'profilo' :
        $view = 'views/user/profile.php';
        $page_title = _("My profile");
        break;
    case 'user-list':
    case 'lista-utenti' :
        $view = 'views/user/users-list.php';
        $page_title = _("User list");
        break;
    case 'lista-categorie' :
        $view = 'views/store/category-view.php';
        $page_title = _("Category");
        $page_description = _("Sort the cateogries below");
        break;
    case 'lista-opzioni' :
        $view = 'views/store/options-view.php';
        $page_title = _("Options");
        $page_description = _("Sort the options below");
        break;
    case 'contatti' :
        $view = 'views/contact/contact.php';
        $page_title = _("Contacts");
        break;
    case 'activate' :
        $view = 'views/users/activate.php';
        $page_title = _('Activate');
    default :
        $view = 'views/' . $controller . '.php';
        $page_title = $controller;
        break;
         
}


// GET CONTROLLER
// setta la categoria se esiste
$category_name = isset($_GET["category"]) ? $_GET["category"] : null;
$subcategory_name = isset($_GET["subcategory"]) ? $_GET["subcategory"] : null;

// UTF-8 encoding
header("Content-type: text/html; charset=$encoding");

// se passa il test non sono nella home
if (!empty($_GET['controller']) && strpos($controller, 'index') === false)
    require 'breadcrumb.php';

//var_dump($view);
if (isset($action))
    require_once $action;
require_once $view;

require 'footer.php';
?>
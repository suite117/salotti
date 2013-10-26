<?php
//error_reporting(E_ALL ^ E_WARNING);
require_once 'utils.php';
require_once 'init.php';

$view = 'views/home.php';
$page_title = '';
$page_description = '';
$category_name = null;
$config['isOnline'] = false;

/* informazioni generali del sito */
$site_name = 'Alessi Salotti';
$site_email = 'suite117@gmail.com';

var_dump("get", $_GET);
var_dump("post", $_POST);

require_once 'header.php';

// POST CONTROLLER
$errors = array();
if (isset($_POST))
	foreach ($_POST as $key => $value) {
		if (is_array($value)) {
			${$key} = $value;
		} else
			${$key} = strtolower(trim($value));
	}

// GET CONTROLLER
// setta la categoria se esiste
$category_name = isset($_GET["category"]) ? $_GET["category"] : null;
$subcategory_name = isset($_GET["subcategory"]) ? $_GET["subcategory"] : null;

$controller = null;
if (isset($_GET["controller"])) {
	$controller = $_GET["controller"];

	/* CASO MODIFICA */
	if ($controller === 'modifica') {
		$type = $_GET['category'];
		$id = $_GET['title'];

		switch($type) {
			case 'utente' :
				$view = 'views/user/register.php';
				$user = $users -> get_user($id);
				$suffix = $user['username'];
				break;
			case 'prodotto' :
				$view = 'views/store/product-edit.php';
				$suffix = 'prodotto';
				break;
		}
		$page_title = 'Modifica ' . $suffix;
		$page_description = $type;

	}
	/* CASO AGGIUNGI */
	elseif ($controller === 'aggiungi') {
		$type = $_GET['title'];

		switch($type) {
			case 'prodotto' :
				$view = 'views/store/product-edit.php';
				$page_title = 'Aggiungi ' . $type;
				$page_description = 'Inserisci un prodotto';
				break;
			case 'categoria' :
				$view = 'views/store/category-edit.php';
				$page_title = 'Aggiungi ' . $type;
				$page_description = 'Inserisci una categoria';
				break;
		}
	} else/* TUTTI GLI ALTRI CASI */
		switch($controller) {
			/* per Aruba - caso solo cartella principale */
			case 'index' :
			case 'index.php' :
			case 'index.html' :
				$view = 'views/home.php';
				break;
			case 'breadcrumb' :
				$view = 'views/store/products.php';
				$page_title = 'Galleria';
				break;

			case 'prodotti' :
				if (isset($_GET['title'])) {
					$product = $products_dao -> get_product_by_field('nome', $_GET['title']);
					$view = 'views/store/product-view.php';
					$page_title = $product['nome'];
				} else {
					$view = 'views/store/products.php';
					$page_title = 'Galleria';
					$page_description = 'Visualizza i prodotti';
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
				$page_title = "Esci";
				break;
			case 'register' :
				$view = 'views/user/register.php';
				$page_title = "Registrazione";
				break;
			case 'lista-utenti' :
				$view = 'views/user/members.php';
				$page_title = "Lista utenti";
				break;
			case 'contatti' :
				$view = 'views/contact/contact.php';
				$page_title = "Contatti";
				break;
			case 'activate' :
				$view = 'views/users/activate.php';
				$page_title = 'attiva';
			default :
				$view = 'views/' . $controller . '.php';
				$page_title = $controller;
		}
}

// se passa il test non sono nella home
if (!empty($_GET['controller']) && strpos($controller, 'index') === false)
	include 'breadcrumb.php';

//var_dump($view);
require $view;

include 'footer.php';
?>
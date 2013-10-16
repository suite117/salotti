<?php
//error_reporting(E_ALL ^ E_WARNING);
include 'utils.php';

function curURL() {

	$uri = $_SERVER['REQUEST_URI'];
	$paths = explode("/", $uri);

	return '/'. $paths[1].'/' . $paths[2] . '/';

	//return "/web/htdocs/" . $_SERVER['HTTP_HOST'] . '/home'. $_SERVER['REQUEST_URI'];
}

require 'views/core/init.php';
include 'header.php';

$view = 'views/home.php';
$page_title = '';
$page_description ='';
$category = null;

/* informazioni generali del sito */
$site_name = 'Alessi Salotti';
$site_email = 'suite117@gmail.com';

var_dump($_GET);
var_dump($_POST);

// POST CONTROLLER
$errors = array();
if (isset($_POST))
foreach ($_POST as $key => $value) {
	${
		$key} = trim($value);
}

// GET CONTROLLER
// setta la categoria se esiste
$category = isset($_GET["category"]) ? $_GET["category"] : null;
$subcategory =  isset($_GET["subcategory"]) ? $_GET["subcategory"] : null;

$controller = null;
if (isset($_GET["controller"])) {
	$controller= $_GET["controller"];

	/* CASO MODIFICA */
	if ($controller === 'modifica') {
		$type = $_GET['category'];
		$id = $_GET['title'];

		switch($type) {
			case 'utente':
				$view  = 'views/user/register.php'. $id;
				$user = $users->get_user($id);
				$suffix = $user['id'];
				break;
			case 'prodotto':
				$view  = 'views/store/product-add.php';
				$product = $products->get_product('id', $id);
				//var_dump($product);
				$suffix = $product['nome'];
				break;
		}

		$page_title = 'Modifica ' .$suffix;
		$page_description = $type;
	}
	else /* TUTTI GLI ALTRI CASI */
		switch($controller) {
		/* per Aruba - caso solo cartella principale */
			case 'index':
			case 'index.php':
			case 'index.html':
				$view  = 'views/home.php';
				break;
			case 'breadcrumb':
				$view  = 'views/store/prodotti.php';
				$page_title = 'Galleria';
				break;
			case 'aggiungi':
				$view  = 'views/store/product-add.php';
				$page_title = 'Aggiungi '. $_GET['title'];
				$page_description = 'Inserisci un prodotto';
				break;
			case 'prodotti':
				if (isset($_GET['title'])) {
					$product = $products->get_single_product('nome', $_GET['title']);
					$view  = 'views/store/product.php';
					$page_title = $product['nome'];
				}
				else {
					$view  = 'views/store/prodotti.php';
					$page_title = 'Galleria';
					$page_description = 'Visualizza i prodotti';
				}
					
				break;
			case 'prodotto':
				$page_title = $_GET["title"];
				if ($page_title !== 'modifica')
					$view = 'views/store/product.php';
				else {
					$view = 'views/store/product-add.php';
					$category = null;
				}
				break;
			case 'login':
				$view = 'views/user/login.php';
				$page_title = "Accedi";
				break;
			case 'logout':
				$view = 'views/user/logout.php';
				$page_title = "Esci";
				break;
			case 'register':
				$view = 'views/user/register.php';
				$page_title = "Registrazione";
				break;
			case 'lista-utenti':
				$view = 'views/user/members.php';
				$page_title = "Lista utenti";
				break;
			case 'contatti':
				$view = 'views/contact/contact.php';
				$page_title = "Contatti";
				break;
			case 'activate':
				$view = 'views/users/activate.php';
				$page_title = 'attiva';
			default:
				$view = 'views/'. $controller . '.php';
				$page_title = $controller;


	}
}



// se passa il test non sono nella home
if (!empty($_GET['controller']) && strpos($controller, 'index')=== false)
	include 'breadcrumb.php';

//var_dump($view);F


require $view;

include 'footer.php';
?>
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
$title = '';
$description ='';
$category = null;

/* informazioni generali del sito */
$site_name = 'Alessi Salotti';
$site_email = 'suite117@gmail.com';

//var_dump($_GET);
//var_dump($_POST);

// POST CONTROLLER
$errors = array();
if (isset($_POST))
foreach ($_POST as $key => $value) {
	${
		$key} = trim($value);
}

// GET CONTROLLER
$controller = null;
if (isset($_GET["controller"])) {
	$controller= $_GET["controller"];
	switch($controller) {
		/* per Aruba - caso solo cartella principale */
		case 'index':
		case 'index.php':
			$view  = 'views/home.php';
			break;
		case 'aggiungi':
			$view  = 'views/store/product-add.php';
			$title = 'Aggiungi '. $_GET['title'];
			$description = 'Inserisci un prodotto';
			break;
		case 'modifica':
			$view  = 'views/store/product-add.php';
			$title = 'Modifica '. $_GET['title'];
			$description = 'Modifica un prodotto';
			break;
		case 'prodotti':
			$view  = 'views/store/prodotti.php';
			$title = 'Galleria';
			$description = 'Visualizza i prodotti';
			break;
		case 'prodotto':
			$view = 'views/store/prodotto.php';
			$title = $_GET["title"];
			break;
		case 'listaprodotti':
			$view  = 'views/store/listaprodotti.php';
			$title = 'Galleria';
			$description = 'Lista prodotti';
			break;
		case 'login':
			$view = 'views/login.php';
			$title = "Login ";
			break;
		case 'register':
			$view = 'views/register.php';
			$title = "Registrazione ";
			break;
		case 'contact':
			$view = 'views/contact/contact.php';
			$title = "Contatti ";
			break;
		default:
			$view = 'views/'. $controller . '.php';
			$title = $controller;


	}
}

// setta la categoria se esiste
$category = isset($_GET["category"]) ? $_GET["category"] : null;

// se passa il test non sono nella home
if (!empty($_GET['controller']) && strpos($controller, 'index')=== false)
	include 'breadcrumb.php';

//var_dump($view);F


require $view;

include 'footer.php';
?>
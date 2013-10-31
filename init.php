<?php 
ob_start(); // Added to avoid a common error of 'header already sent' (not discussed in the tutorial)
if(!isset($_SESSION))
	session_start();

require_once 'config/database.php';
require_once 'dao/users.php';
require_once 'dao/category_dao.php';
require_once 'dao/options_dao.php';
require_once 'dao/products_dao.php';
require_once 'dao/general.php';
require_once 'dao/bcrypt.php';

$users 		= new Users($db);
$products_dao	= new ProductsDAO($db);
$category_dao = new CategoryDAO($db);
$options_dao =  new OptionsDAO($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(); // Instantiating the Bcrypt class


if ($general->logged_in() === true)  { // check if the user is logged in
	$user_id 	= $_SESSION['id']; // getting user's id from the session.
	$user 	= $users->get_user($user_id); // getting all the data about the logged in user.
}

// Locale configuration
if ($isLocalhost)
	require_once('locale/gettext.inc');

// define constants
define('PROJECT_DIR', realpath('./'));
define('LOCALE_DIR', './locale/');
define('DEFAULT_LOCALE', "en_US");
//define('DEFAULT_LOCALE', "it-IT");
$encoding = "UTF-8";

// Set the text domain as 'messages'
$domain = 'messages';
$lang = (isset($_SESSION['lang']))? $_SESSION['lang'] : DEFAULT_LOCALE;

$supported_lang = array('it_IT', 'en_US');

// for windows compatibility (e.g. xampp) : theses 3 lines are useless for linux systems
putenv("LC_ALL=$lang"); // Windows locale
putenv('LANG='.$lang.'.'.$encoding);
putenv('LANGUAGE='.$lang.'.'.$encoding);
if (function_exists('bind_textdomain_codeset'))
	bind_textdomain_codeset($domain, $encoding);

// set locale
$loc= setlocale(LC_ALL, $lang.'.'.$encoding);

// gettext setup
bindtextdomain($domain, LOCALE_DIR);
textdomain($domain);

header("Content-type: text/html; charset=$encoding");


?>
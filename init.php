<?php
require_once 'utils.php';

ob_start(); // Added to avoid a common error of 'header already sent' (not discussed in the tutorial)
if(!isset($_SESSION))
	session_start();


/*
 * Aggiunta costante BASE_PATH che punta alla directory principale del file system
* Aggiunta costante BASE_URL che punta all'url principale del sito
* */
define('BASE_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

$tempPath1 = explode('/', str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME'])));
$tempPath2 = explode('/', substr(BASE_PATH, 0, -1));
$tempPath3 = explode('/', str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])));

for ($i = count($tempPath2); $i < count($tempPath1); $i++)
	array_pop ($tempPath3);

$BASE_URL = $_SERVER['HTTP_HOST'] . implode('/', $tempPath3);

if ($BASE_URL{strlen($BASE_URL) - 1}== '/')
	define('BASE_URL', 'http://' . $BASE_URL);
else
	define('BASE_URL', 'http://' . $BASE_URL . '/');

unset($tempPath1, $tempPath2, $tempPath3, $BASE_URL);


//gestione delle eccezioni in fase di connessione con PDO
// collegamento al database
$host = 'localhost';
$isLocalhost = true;
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost' || strpos($host, '192.') !== false)
	$isLocalhost = true;
else
	$isLocalhost = false;

require_once 'config/database.php';
require_once 'dao/users_dao.php';
require_once 'dao/category_dao.php';
require_once 'dao/options_dao.php';
require_once 'dao/products_dao.php';
require_once 'dao/general.php';
require_once 'dao/bcrypt.php';

// NEW DATABASE API
require_once "config/database/Db.class.php";

$users_dao 		= new UsersDAO($db);
$products_dao	= new ProductsDAO($db);
$category_dao = new CategoryDAO($db);
$options_dao =  new OptionsDAO($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(); // Instantiating the Bcrypt class


if ($general->logged_in() === true)  { // check if the user is logged in
	$user_id 	= $_SESSION['id']; // getting user's id from the session.
	$user 	= $users_dao->get_user($user_id); // getting all the data about the logged in user.
}

// Locale configuration
if ($isLocalhost)
	require_once('locale/gettext.inc');

// define constants
define('PROJECT_DIR', realpath('./'));
define('LOCALE_DIR', './locale/');
define('DEFAULT_LOCALE', "it_IT");
//define('DEFAULT_LOCALE', "it-IT");
$encoding = "UTF-8";

// Set the text domain as 'messages'
$domain = 'messages';
$lang = (isset($_SESSION['lang']))? $_SESSION['lang'] : DEFAULT_LOCALE;

$language_codes = array('it_IT', 'en_US');
$language_labels = array('Ita', 'Eng');

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

// Aggiunta linguaggio all'header
header("Content-language: $lang");


// recupero del metodo GET,POST,O DELETE
$method = $_SERVER['REQUEST_METHOD'];
?>
<?php 
ob_start(); // Added to avoid a common error of 'header already sent' (not discussed in the tutorial)
    if(!isset($_SESSION))   
        session_start(); 
     
require_once 'dao/users.php';
require_once 'dao/category_dao.php';
require_once 'dao/options_dao.php';
require_once 'config/database.php';
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


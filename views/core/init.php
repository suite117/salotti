<?php 
ob_start(); // Added to avoid a common error of 'header already sent' (not discussed in the tutorial)
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once 'classes/users.php';
require_once 'config/database.php';
require_once 'classes/products.php';
require_once 'classes/general.php';
require_once 'classes/bcrypt.php';

$users 		= new Users($db);
$products	= new Products($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(); // Instantiating the Bcrypt class


if ($general->logged_in() === true)  { // check if the user is logged in
	$user_id 	= $_SESSION['id']; // getting user's id from the session.
	$user 	= $users->userdata($user_id); // getting all the data about the logged in user.
}

$errors = array();
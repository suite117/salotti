<?php
//funzione che elimina gli utenti

$general->logged_out_protect();

if(empty($_POST)===false) {
	$user_id=$_POST['id'];

	$users -> deleteUser($user_id);

}



?>

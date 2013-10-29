<?php

$lang = @$_POST['lang'];

if ($lang == null)
	exit();
else {
	if(!isset($_SESSION))
		session_start();
	$_SESSION['lang'] = $lang;
}
	

header('Content-type: application/json');
echo json_encode($_SESSION['lang']);
?>
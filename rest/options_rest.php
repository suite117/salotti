<?php 

require '../init.php';

header('Content-type: application/json');

if( isset($_GET['id']))
	$options = $options_dao->get_options_by_id($_GET['id']);
elseif( isset($_GET['type'])){
	$options = $options_dao->get_options_by_type($_GET['type']);
}else{
	$options = $options_dao->get_options();
}


echo json_encode($options);
?>

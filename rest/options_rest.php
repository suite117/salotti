<?php 

require '../init.php';



if( isset($_GET['id']))
	$options = $options_dao->get_options_by_id($_GET['id']);
elseif( isset($_GET['type'])){
	$options = $options_dao->get_options_by_type($_GET['type']);
}else{
	$options = $options_dao->get_options();
}


header('Content-type: application/json');
echo json_encode($lang);
?>


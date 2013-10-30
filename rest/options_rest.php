<?php 

require '../init.php';

if( !empty($_POST))   {
	$product_id = $_GET['id'];
	$product_code = $_POST['option_code'];
	$option_is_selected = $_POST['selected'];

	if ($option_is_selected === 'true') {
		//var_dump('create');
		$options_dao->create_option($product_id, $product_code);
	}
	else
		$options_dao->delete_option($product_id, $product_code);

	$out = array('success' => true);
}
elseif( !empty($_GET)) {

	if( isset($_GET['id']))
		$options = $options_dao->get_options_by_id($_GET['id']);
	elseif( isset($_GET['type'])){
		$options = $options_dao->get_options_by_type($_GET['type']);
	}else{
		$options = $options_dao->get_options();
	}

	$out = $options;

}


header('Content-type: application/json');
echo json_encode($out);
?>


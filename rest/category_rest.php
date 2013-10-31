<?php 

require '../init.php';

$categories = array();

if( !empty($_POST))   {

}
elseif( !empty($_GET)) {
	if( isset($_GET['id'])){
		$categories = $category_dao->get_category($_GET['id']);
	}
	elseif( isset($_GET['type'])){
		$categories = $category_dao->get_categories_by_type($_GET['type']);
	}else{
		$categories = $category_dao->get_categories();
	}

}

header('Content-type: application/json');
echo json_encode($categories);
?>


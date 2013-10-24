<?php 

require '../init.php';

header('Content-type: application/json');


if( isset($_GET['type'])){
	$categories = $category_dao->get_categories_by_type($_GET['type']);
}else{
	$categories = $category_dao->get_categories();
}


echo json_encode($categories);
?>


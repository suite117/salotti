<?php 

require '../init.php';

$categories = array();

if( !empty($_POST))   {
	var_dump($_POST); 
	$category_dao->update_category($_GET['category_id'], $_GET['category_parent_id'], $_GET['order']);
	
}
elseif( !empty($_GET)) {
	if( isset($_GET['id']))
		$categories = $category_dao->get_category($_GET['id']);
	elseif( isset($_GET['type']))
	$categories = $category_dao->get_categories_by_type($_GET['type']);
	else
		$categories = $category_dao->get_categories();
}else
	$categories = $category_dao->get_categories();







if (@$_GET['nested'] === 'true')
	$categories = toNestedArray($categories, 'category_id' ,'category_parent_id');



//var_dump($categories);

header('Content-type: application/json');
echo json_encode($categories);
?>


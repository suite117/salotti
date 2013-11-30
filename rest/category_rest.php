<?php 

require '../init.php';
header('Content-type: application/json');

$categories = array();
//var_dump($_POST);
if( !empty($_POST) && !empty($_POST["data"]))   {


  foreach ($_POST["data"] as $index => $item) {
      //echo $index ;
      $category_dao->update_category($item["category_id"], @$item['category_parent_id'], $index);
  }
  

}
else {

  if( !empty($_GET)) {
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
  $output = $categories;
  echo json_encode($output);
}



?>


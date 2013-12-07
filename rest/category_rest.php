<?php 
require '../init.php';
$general->not_admin_out_protect();
$output = array();

switch($method) {
  case 'DELETE':
    $category_id = $_REQUEST['id'];
    //$category = $category_dao->get_category($category_id);
    $category_dao->delete($category_id);
    
    //$message = array("message" => "Categoria" . " " . $category["category_name"] . " " . "eliminata con successo." );
    //$output = $message;
    break;
  case 'POST':
    if(!empty($_POST["data"]))
    foreach ($_POST["data"] as $index => $item) {
      $category_dao->update_category($item["category_id"], @$item['category_parent_id'], $index);
    }
    break;
  case 'GET':
    $categories = array();

    if( !empty($_GET)) {
      if( isset($_GET['id']))
        $categories = $category_dao->get_category($_GET['id']);
      elseif( isset($_GET['type']))
      $categories = $category_dao->get_categories_by_type($_GET['type']);
      else
        $categories = $category_dao->get_categories();
    }else
      $categories = $category_dao->get_categories();

    // aggiunta pulsanti edit e delete
    for ($i = 0; $i < count($categories); $i++) {
        //$categories[$i]['category_name'] .= '<div class="ciao" style="float:right; z-index: 100000;">';
        //$categories[$i]['category_name'] .= '<a class="delete" href="modifica/categoria/' .  $categories[$i]['category_id'] . '.html">' . _('Edit') . ' <i class="icon-edit"></i></a>';
        //$categories[$i]['category_name'] .= '</div>';
    }
    if (@$_GET['nested'] === 'true')
      $categories = toNestedArray($categories, 'category_id' ,'category_parent_id');

    //var_dump($categories);
    $output = $categories;

    break;
}

header('Content-type: application/json');
echo json_encode($output);

?>


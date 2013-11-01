<?php
require 'init.php';
$categories = $category_dao -> get_categories_ordered_by_id();
//var_dump("categorie", $categories);
function has_children($rows,$id) {
  foreach ($rows as $row) {
    if ($row['category_parent_id'] == $id)
      return true;
  }
  return false;
}
function build_menu($rows,$parent=0)
{  
  $result = "<ul>";
  foreach ($rows as $row)
  {
    if ($row['category_parent_id'] == $parent){
      $result.= "<li>{$row['category_name']}";
      if (has_children($rows,$row['category_id']))
        $result.= build_menu($rows,$row['category_id']);
      $result.= "</li>";
    }
  }
  $result.= "</ul>";

  return $result;
}
echo build_menu($categories);

?>



<?php

$categories = $category_dao -> get_categories_ordered_by_id();
//var_dump("categorie", $categories);
function has_children($rows,$id) {
	foreach ($rows as $row) {
		if ($row['category_parent_id'] == $id)
			return true;
	}
	return false;
}
function build_menu($rows,$parent_id, $base_path, $relative_path='', $parent_name=null) {
	$result = '<ul>';

	if($parent_name != null)
		$result.= '<li><a href="' . $base_path . $relative_path. '">Tutti i ' . str_replace(" ", "-",$parent_name) . '</a></li>';

	foreach ($rows as $row) {

		$category_with_slash = str_replace(" ", "-", $row['category_name']) . '/';
		if ($row['category_parent_id'] == $parent_id){
			$result.= "<li";

			if (has_children($rows,$row['category_id'])) {
				$result.= ' class="dropdown-submenu"';
				$result.= '><a href="#">' . ucfirst($row['category_name']) . '</a>';

				$result.= build_menu($rows,$row['category_id'], $base_path, $category_with_slash, $row["category_name"]);

			}
			else {
				//var_dump($base_path);

				$result.= '><a href="' . $base_path . $relative_path . $category_with_slash . '">' . ucfirst($row["category_name"]) . '</a>';
			}

			$result.= "</li>";
		}
	}
	$result.= "</ul>";

	return $result;
}

echo build_menu($categories, 0, BASE_URL . 'prodotti/');



function build_menu2($rows,$parent_id=0)
{
	$result = "<ul>";
	foreach ($rows as $row)
	{
		if ($row['category_parent_id'] == $parent_id){
			$result.= "<li>{$row['category_name']}";
			if (has_children($rows,$row['category_id']))
				$result.= build_menu($rows,$row['category_id']);
			$result.= "</li>";
		}
	}
	$result.= "</ul>";

	return $result;
}
?>



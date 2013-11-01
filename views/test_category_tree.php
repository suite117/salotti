<?php

$categories = $category_dao -> get_categories_ordered_by_id();
//var_dump("categorie", $categories);
echo category_menu($categories, BASE_URL . 'prodotti/');



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



<?php

function toUL($arr){
	$html = '<ul>';
	foreach ($arr as $v) {
		if ($v['mark']) {
			$html .= '<li><a href="category.php?id=' . $v['catid'] . '">' . $v['name'] . '</a>';
			if (array_key_exists('children', $v)){
				$html .= toUL($v['children']);
			}
			$html .= '</li>';
		}
	}
	$html .= '</ul>';
	return $html;
}

$refs = array();
$list = array();


$list = $category_dao->get_categories();
markLikedSubtree($list);
echo toUL($list);
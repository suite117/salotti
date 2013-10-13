<?php

function getMetaTitle($path) {
	$exif = exif_read_data($path, 'IFD0', true);

	if (isset($exif["IFD0"]["ImageDescription"]))
		$title = $exif["IFD0"]["ImageDescription"];
	else
		$title = '';

	return $title;
}

function getImagePaths($subdir) {
	$imagePath = '';
	if ($handle = opendir('./' . $subdir)) {

		/* This is the correct way to loop over the directory. */
		while (false !== ($entry = readdir($handle))) {
			if ($entry != '.' && $entry != '..') {
				$path = curURL() . $subdir . '/' . $entry;
				//$title = getMetaTitle($path);

				$imagePath = $imagePath . '<img src="' . $path . '" />';
			}
		}

		closedir($handle);
	}
	return $imagePath;

}

?>
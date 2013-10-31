<?php
/*
 PekeUpload
Copyright (c) 2013 Pedro Molina
*/

// Define a destination
$targetFolder = isset($_GET['path']) ? $_GET['path'] : 'files/'; // Relative to the root


if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);

	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo _('Invalid type file.');
	}
}

?>
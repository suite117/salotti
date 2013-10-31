<?php

/* 
 * Aggiunta costante BASE_PATH che punta alla directory principale del file system 
 * Aggiunta costante BASE_URL che punta all'url principale del sito
 * */
define('BASE_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

$tempPath1 = explode('/', str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME'])));
$tempPath2 = explode('/', substr(BASE_PATH, 0, -1));
$tempPath3 = explode('/', str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])));

for ($i = count($tempPath2); $i < count($tempPath1); $i++)
	array_pop ($tempPath3);

$BASE_URL = $_SERVER['HTTP_HOST'] . implode('/', $tempPath3);

if ($BASE_URL{strlen($BASE_URL) - 1}== '/')
	define('BASE_URL', 'http://' . $BASE_URL);
else
	define('BASE_URL', 'http://' . $BASE_URL . '/');

unset($tempPath1, $tempPath2, $tempPath3, $BASE_URL);

function curURL() {

	$uri = $_SERVER['REQUEST_URI'];
	$uri = $_SERVER['HTTP_HOST'];
	$paths = explode("/", $uri);
	//return '/' . $paths[0].'/' . $paths[1] . '/'; 
	//return "/web/htdocs/" . $_SERVER['HTTP_HOST'] . '/home'. $_SERVER['REQUEST_URI'];

	return BASE_URL;
}


function translateDate($dt) {
	$nmeng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$nmtur = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
	$date = str_ireplace($nmeng, $nmtur, $dt);

	return $date;
}

function sendEmail($sender, $to, $subject, $email_content) {
	// Genera un boundary
	$mail_boundary = "=_NextPart_" . md5(uniqid(time()));

	$headers = "From: $sender\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: multipart/alternative;\n\tboundary=\"$mail_boundary\"\n";
	$headers .= "X-Mailer: PHP " . phpversion();

	// Corpi del messaggio nei due formati testo e HTML
	$text_msg = "messaggio in formato testo";
	$html_msg = "<b>messaggio</b> in formato <p><a href='http://www.aruba.it'>html</a><br><img src=\"http://hosting.aruba.it/image_top/top_01.gif\" border=\"0\"></p>";

	// Costruisci il corpo del messaggio da inviare
	$msg = "This is a multi-part message in MIME format.\n\n";
	$msg .= "--$mail_boundary\n";
	$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
	$msg .= "Content-Transfer-Encoding: 8bit\n\n";
	$msg .= "Email di prova";
	// aggiungi il messaggio in formato text

	$msg .= "\n--$mail_boundary\n";
	$msg .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$msg .= "Content-Transfer-Encoding: 8bit\n\n";
	$msg .= $email_content;

	// aggiungi il messaggio in formato HTML

	// Boundary di terminazione multipart/alternative
	$msg .= "\n--$mail_boundary--\n";

	// Imposta il Return-Path (funziona solo su hosting Windows)
	ini_set("sendmail_from", $sender);

	// Invia il messaggio, il quinto parametro "-f$sender" imposta il Return-Path su hosting Linux
	if (mail($to, $subject, $msg, $headers, "-f$sender")) {

		// send the user back to the form

		//echo "Mail inviata correttamente !<br><br>Questo di seguito è il codice sorgente usato per l'invio della mail:<br><br>";
		//highlight_file($_SERVER["SCRIPT_FILENAME"]);
		//unlink($_SERVER["SCRIPT_FILENAME"]);
		return true;
	} else {

		return false;
	}

}
?>


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

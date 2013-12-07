<?php

// collects all nodes that belong to a certain parent id
function toNestedArray($nodeList, $field, $parent_field, $parentId = null) {
    $nodes = array();

    foreach ($nodeList as $node) {
        if ($node[$parent_field] == $parentId) {
            $node['children'] = toNestedArray($nodeList, $field, $parent_field, $node[$field]);
            unset($node[$parent_field]);
            if (empty($node['children']))
                unset($node['children']);
            $nodes[] = $node;
        }
    }

    return $nodes;
}


function has_children($rows,$id) {
    foreach ($rows as $row) {
        if ($row['category_parent_id'] == $id)
            return true;
    }
    return false;
}

function category_menu($rows, $base_path, $relative_path='', $parent_id=null, $parent_name=null) {

    if($parent_id != null)
        $result = '<ul class="dropdown-menu">';
    else
        $result = '';

    if($parent_name != null)
        $result.= '<li><a href="' . $base_path . $relative_path. '">Tutti i ' . str_replace(" ", "-",$parent_name) . '</a></li>';

    foreach ($rows as $row) {

        $category_with_slash = str_replace(" ", "-", $row['category_name']) . '/';
        if ($row['category_parent_id'] == $parent_id){
            $result.= "<li";

            if (has_children($rows,$row['category_id'])) {
                $result.= ' class="dropdown-submenu"';
                $result.= '><a href="#">' . ucfirst($row['category_name']) . '</a>';

                $result.= category_menu($rows, $base_path, $category_with_slash, $row['category_id'], $row["category_name"]);

            }
            else {
                $result.= '><a href="' . $base_path . $relative_path . $category_with_slash . '">' . ucfirst($row["category_name"]) . '</a>';
            }

            $result.= "</li>";
        }
    }

    if($parent_name != null)
        $result.= "</ul>";

    return $result;
}

function left_menu($rows, $base_path, $relative_path='', $parent_id=null, $parent_name=null) {

    $result = '';

    foreach ($rows as $row) {

        $category_with_slash = str_replace(" ", "-", $row['category_name']) . '/';
        if ($row['category_parent_id'] == $parent_id){
            $result.= "<li";

            if (has_children($rows,$row['category_id'])) {
                $result.= '><label class="tree-toggle nav-header">' . ucfirst($row['category_name']) . '</label>';
                $result.= '<ul class="nav nav-list tree">';
                $result.= '<li><a href="' . $base_path . $relative_path. $row['category_name']. '/">Tutti i ' . $row['category_name'] . '</a></li>';
                $result.= left_menu($rows, $base_path, $category_with_slash, $row['category_id'], $row["category_name"]);
                //$result.= '</ul></li><li class="divider">&nbsp;</li>';
            }
            else {
                if($parent_id== null) {
                    $result.= '><label class="tree-toggle nav-header">' . ucfirst($row['category_name']) . '</label>';
                    $result.= '<li><a href="' . $base_path . $relative_path. $row['category_name'] . '/">Tutti i ' . $row['category_name'] . '</a></li>';
                }
                else
                    $result.= '><a href="' . $base_path . $relative_path . $category_with_slash . '">' . ucfirst($row["category_name"]) . '</a>';
            }

            $result.= "</li>";
        }
    }

    return $result;
}


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

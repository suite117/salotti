<?php
//echo Locale::getDefault();

    $locale = "en_US";
     
    echo putenv("LC_ALL=$locale");
    echo setlocale(LC_ALL, $locale);
    

    
    echo _("Hello World");
	echo _("Prodotti");
?>
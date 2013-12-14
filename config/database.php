<?php 

# We are storing the information in this config array that will be required to connect to the database.
if ($isLocalhost) {
    $config = array(
            'host'		=> 'localhost',
            'username'	=> 'root',
            'password'	=> '',
            'dbname' 	=> 'yii'
    );
}
else {
    $config = array(
            'host'		=> '62.149.150.115',
            'username'	=> 'Sql348329',
            'password'	=> '257fe2f2',
            'dbname' 	=> 'Sql348329_4'
    );
}

try {
    // connessione tramite creazione di un oggetto PDO
    // connecting to the database by supplying required parameters
    if (!isset($db)) {

        // fix utf-8 
        $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8', $config['username'],
                $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 

        //Setting the error mode of our db object, which is very important for debugging.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
// blocco catch per la gestione delle eccezioni
catch(PDOException $e) {
    // notifica in caso di errore
    print_r('Errore connessione al database');
    var_dump('Attenzione: '.$e->getMessage());
}


?>
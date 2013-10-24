<?php 

//gestione delle eccezioni in fase di connessione con PDO
// collegamento al database
$host = 'localhost';
$isLocalhost = true;
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost' || strpos($host, '192') !== false)
	$isLocalhost = true;
else
	$isLocalhost = false;

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
	$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);

	//Setting the error mode of our db object, which is very important for debugging.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
// blocco catch per la gestione delle eccezioni
catch(PDOException $e) {
	// notifica in caso di errore
	print_r('Errore connessione al database');
	var_dump('Attenzione: '.$e->getMessage());
}


?>
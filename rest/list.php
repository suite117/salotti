<?php

require '../init.php';
$general -> logged_out_protect();
header('Content-type: application/json');

if (isset($_GET['type'])) {
	$type = $_GET['type'];
	if (isset($_GET['id'])) {
		$id_value = ($_GET['id']);
		$query1 = $db -> prepare("SHOW KEYS FROM $type WHERE Key_name = 'PRIMARY'");
		try {
			$query1 -> execute();
			$result = $query1 -> fetch();
			$id_name = $result['Column_name'];
			print_r($id_name);
			
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
		
		
		$query = $db -> prepare("SELECT * FROM $type WHERE $id_name = ?");
		$query -> bindValue(1, $id_value);
		
		

	}else{
		$query = $db -> prepare("SELECT * FROM $type");
	}
	
	try {
			$query -> execute();
			$risultato = $query -> fetchAll();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	
	echo json_encode($risultato);

} 


?>

<?php
class Products {

	private $db;

	public function __construct($database) {
		$this -> db = $database;
	}


	public function insert($nome, $immagine, $descrizione, $schedatecnica, $idcategoria, $idversione){


		$query = $this -> db -> prepare("INSERT INTO `prodotto` (`nome`, `immagine`, `descrizione`, `schedatecnica`, `idcategoria`, `idversione`) VALUES ( ?, ?, ?, ?, ?, ?) ");


		$query -> bindValue(1, $nome);
		$query -> bindValue(2, $immagine);
		$query -> bindValue(3, $descrizione);
		$query -> bindValue(4, $schedatecnica);
		$query -> bindValue(5, $idcategoria);
		$query -> bindValue(6, $idversione);


		try{
			$query->execute();


		}catch(PDOException $e){
			die($e->getMessage());
		}
	}



	public function productdata($id) {

		$query = $this -> db -> prepare("SELECT * FROM `prodotto` WHERE `id`= ?");
		$query -> bindValue(1, $id);

		try {

			$query -> execute();

			return $query -> fetch();

		} catch(PDOException $e) {

			die($e -> getMessage());
		}
	}

	public function get_products() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `prodotto` ORDER BY `nome` DESC");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function update_product($nome, $immagine, $descrizione, $schedatecnica, $idcategoria, $idversione, $id){

		$query = $this->db->prepare("UPDATE `prodotto` SET
				`nome`				= ?,
				`immagine`		    = ?,
				`descrizione`		= ?,
				`schedatecnica`		= ?,
				`idcategoria`		= ?,
				`idversione`		= ?
					
				WHERE `id` 			= ?
				");

		$query->bindValue(1, $nome);
		$query->bindValue(2, $immagine);
		$query->bindValue(3, $descrizione);
		$query->bindValue(4, $schedatecnica);
		$query->bindValue(5, $idcategoria);
		$query->bindValue(6, $idversione);
		$query->bindValue(6, $id);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}


	//in field devi specificare id o nome in base se vuoi fare una ricerca per id o per nome
	public function get_single_product($field, $value){ 

		$allowed = array('id', 'nome');
		if (!in_array($field, $allowed, true)) {
			throw new InvalidArgumentException;
		}else{

			$query = $this->db->prepare("SELECT * FROM `prodotto` WHERE $field = ?");
			$query->bindValue(1, $value);

			try{
				$query->execute();
			} catch(PDOException $e){
				die($e->getMessage());
			}

			return $query->fetchAll()[0];
		}
	}




	public function fetch_info($what, $field, $value){

		$allowed = array('id', 'username', 'first_name', 'last_name', 'gender', 'bio', 'email'); // I have only added few, but you can add more. However do not add 'password' even though the parameters will only be given by you and not the user, in our system.
		if (!in_array($what, $allowed, true) || !in_array($field, $allowed, true)) {
			throw new InvalidArgumentException;
		}else{

			$query = $this->db->prepare("SELECT $what FROM `users` WHERE $field = ?");

			$query->bindValue(1, $value);

			try{

				$query->execute();

			} catch(PDOException $e){

				die($e->getMessage());
			}

			return $query->fetchColumn();
		}
	}

}

?>

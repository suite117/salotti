<?php
class ProductsDAO {

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

	public function get_types() {
		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT type FROM `prodotto` GROUP BY type");
	
		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	
		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}
	
	public function get_types_by_category($category) {
		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT type FROM `prodotto` WHERE type=$category GROUP BY type");
	
		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	
		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function get_products() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM prodotto as p, categoria as c where p.idcategoria = c.category_id ORDER BY p.type, p.nome");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function get_products_by_category($category_id, $category_name) {
		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM prodotto as p, categoria as c where p.idcategoria = c.category_id AND (c.category_name=? OR c.category_parent_id=?) ORDER BY p.type, p.nome");
		$query->bindValue(1, $category_name);
		$query->bindValue(2, $category_id);
		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll(PDO::FETCH_ASSOC);
	}


	//in field devi specificare id o nome in base se vuoi fare una ricerca per id o per nome

	public function get_product($id) {

		$query = $this -> db -> prepare("SELECT * FROM `prodotto` as p, categoria as c WHERE p.id = c.category_id AND p.id= ? ORDER BY p.nome");
		$query -> bindValue(1, $id);

		try {

			$query -> execute();

			return $query -> fetch();

		} catch(PDOException $e) {

			die($e -> getMessage());
		}
	}


	public function get_product_by_field($field, $value){

		$allowed = array('id', 'nome');
		if (!in_array($field, $allowed, true)) {
			throw new InvalidArgumentException;
		}else{

			if (isset($value)) {
				$query = $this->db->prepare("SELECT * FROM `prodotto` WHERE $field = ?");
				$query->bindValue(1, $value);
			}
			else {
				$query = $this->db->prepare("SELECT * FROM `prodotto` WHERE `id`= ?");
				$query->bindValue(1, $value);
			}

			try {
				$query->execute();
			} catch(PDOException $e){
				die($e->getMessage());
			}

			$row = $query->fetchAll();

			return $row[0];
		}
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



}

?>

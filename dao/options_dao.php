<?php 

class OptionsDAO {

	private $db;

	public function __construct($database) {
		$this -> db = $database;
	}
	

	public function get_options() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `options`");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function get_options_by_type($type) {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `options` WHERE product_type=?");
		$query -> bindValue(1, $type);

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}
	
	
	public function get_selected_options_by_product($product) {
		$query = $this -> db -> prepare("SELECT * FROM prodotto as p , product_options as po, options as o WHERE p.id= ? AND p.id=po.product_id AND po.option_code = o.option_code");
		$query -> bindValue(1, $product['id']);
		
		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
		
		return $query -> fetchAll();
	}

}

?>
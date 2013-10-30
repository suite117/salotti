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


	public function get_options_by_id($id) {
		$query = $this -> db -> prepare("SELECT o.option_code, o.option_name FROM prodotto as p , product_options as po, options as o WHERE p.id= ? AND p.id=po.product_id AND po.option_code = o.option_code");
		$query -> bindValue(1, $id);

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		return $query -> fetchAll();
	}


	public function delete_selected_options($product){

		$q = "DELETE FROM product_options WHERE product_id=? ";

		$query = $this->db->prepare($q);
		$query->bindValue(1, $product['id']);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function create_option($product_id, $option_code){


		$q = "INSERT INTO product_options (`product_id`, `option_code`)	VALUES ( ?, ?)";
		

		$query = $this->db->prepare($q);
		$query->bindValue(1, $product_id);
		$query->bindValue(2, $option_code);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function delete_option($product_id, $option_code){


		$q = "DELETE FROM product_options WHERE product_id=? AND option_code=? ";
		

		$query = $this->db->prepare($q);
		$query->bindValue(1, $product_id);
		$query->bindValue(2, $option_code);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

	}

	public function create_selected_options($options, $product){

		for ($i=0; $i < sizeof($options); $i++) {
			$q = "INSERT INTO product_options (`product_id`, `option_code`)	VALUES ( ?, ?)";
			var_dump($options[$i]);

			$query = $this->db->prepare($q);
			$query->bindValue(1, $product['id']);
			$query->bindValue(2, $options[$i]);

			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}

}

?>
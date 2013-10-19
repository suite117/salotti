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

}

?>
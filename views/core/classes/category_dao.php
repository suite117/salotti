<?php 

class CategoryDAO {

	private $db;

	public function __construct($database) {
		$this -> db = $database;
	}

	public function get_categories() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `categoria` ORDER BY nome");

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
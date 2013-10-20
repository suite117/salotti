<?php 

class CategoryDAO {

	private $db;

	public function __construct($database) {
		$this -> db = $database;
	}

	public function get_categories() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `categoria` ORDER BY category_name");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function get_category($id) {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `categoria` WHERE category_id=$id ORDER BY category_name");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll()[0];
	}

	

	public function get_categories_by_type($type) {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT c1.category_id, c1.category_name FROM categoria as c1, categoria as c2 WHERE c1.category_name=? OR (c1.category_parent_id=c2.category_id AND c2.category_name=?) GROUP BY c1.category_name");
		$query->bindValue(1, $type);
		$query->bindValue(2, $type);

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		$rows = $query -> fetchAll();

		return $rows;
	}

	public function get_category_by_name($category_name) {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `categoria` WHERE category_name=? ORDER BY category_name");
		$query->bindValue(1, $category_name);

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		$rows = $query -> fetchAll();
		if(empty($rows))
		 return array();
		else
			return $rows[0];
	}

	public function get_subcategories($category_id) {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		$query = $this -> db -> prepare("SELECT * FROM `categoria` WHERE category_id=$category_id OR category_parent_id=$category_id ORDER BY category_name");

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
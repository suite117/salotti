<?php
class Users {

	private $db;

	public function __construct($database) {
		$this -> db = $database;
	}

	public function user_exists($username) {

		$query = $this -> db -> prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ?");
		$query -> bindValue(1, $username);

		try {

			$query -> execute();
			$rows = $query -> fetchColumn();

			if ($rows == 1) {
				return true;
			} else {
				return false;
			}

		} catch (PDOException $e) {
			die($e -> getMessage());
		}

	}

	public function email_exists($email) {

		$query = $this -> db -> prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`= ?");
		$query -> bindValue(1, $email);

		try {

			$query -> execute();
			$rows = $query -> fetchColumn();

			if ($rows == 1) {
				return true;
			} else {
				return false;
			}

		} catch (PDOException $e) {
			die($e -> getMessage());
		}

	}

	public function register($ragionesociale, $partitaiva, $password, $email) {

		global $bcrypt;
		// making the $bcrypt variable global so we can use here

		$time = time();
		$ip = $_SERVER['REMOTE_ADDR'];
		$email_code = $email_code = uniqid('code_', true);
		$password = $bcrypt -> genHash($password);
		// generating a hash using the $bcrypt object
		$query = $this -> db -> prepare("INSERT INTO `users` (`ragionesociale`, `partitaiva`, `password`, `email`, `ip`, `time`, `email_code`) VALUES ( ?, ?, ?, ?, ?, ?, ?) ");

		//$query -> bindValue(1, $username);
		$query -> bindValue(1, $ragionesociale);
		$query -> bindValue(2, $partitaiva);
		$query -> bindValue(3, $password);
		$query -> bindValue(4, $email);
		$query -> bindValue(5, $ip);
		$query -> bindValue(6, $time);
		$query -> bindValue(7, $email_code);

		try {
			$query -> execute();
			//sendEmail($sender, $to, $subject, $email_content);
			$subject = "attivazione utente" . $email;
			$email_content = "Ciao, Un utente ha chiesto di registrarsi sul sito " . $username. ",\r\n email" . $email ." ,\r\n partitaiva:" . $partitaiva .",\r\n Ragione sociale: " . $ragionesociale . " Clicca sul link sottostante per attivarlo :\r\n\r\nhttp://http://www.pulenergy.it/git/salotti/activate.html?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team";
			sendEmail($site_email, $site_email, $subject, $email_content);
			mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\n"."http://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
			
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	}

	/* vecchia funzione di registrazione con sha1 non sicuro
	 public function register($ragionesociale, $partitaiva, $password, $email) {

	 $time = time();
	 $ip = $_SERVER['REMOTE_ADDR'];
	 $email_code = sha1($email + microtime());
	 $password = sha1($password);

	 $query = $this -> db -> prepare("INSERT INTO `users` (`ragionesociale`, `partitaiva`, `password`, `email`, `ip`, `time`, `email_code`) VALUES ( ?, ?, ?, ?, ?, ?, ?) ");

	 //$query -> bindValue(1, $username);
	 $query -> bindValue(1, $ragionesociale);
	 $query -> bindValue(2, $partitaiva);
	 $query -> bindValue(3, $password);
	 $query -> bindValue(4, $email);
	 $query -> bindValue(5, $ip);
	 $query -> bindValue(6, $time);
	 $query -> bindValue(7, $email_code);

	 try {
	 $query -> execute();

	 // mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
	 } catch(PDOException $e) {
	 die($e -> getMessage());
	 }
	 }
	 */
	public function activate($email, $email_code) {

		$query = $this -> db -> prepare("SELECT COUNT(`id`) FROM `users` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");

		$query -> bindValue(1, $email);
		$query -> bindValue(2, $email_code);
		$query -> bindValue(3, 0);

		try {

			$query -> execute();
			$rows = $query -> fetchColumn();

			if ($rows == 1) {

				$query_2 = $this -> db -> prepare("UPDATE `users` SET `confirmed` = ? WHERE `email` = ?");

				$query_2 -> bindValue(1, 1);
				$query_2 -> bindValue(2, $email);

				$query_2 -> execute();
				return true;

			} else {
				return false;
			}

		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	}

	public function login($email, $password) {

		global $bcrypt;
		// Again make the bcrypt variable global, which is defined in init.php, which is included in login.php where this function is called

		$query = $this -> db -> prepare("SELECT `password`, `ruolo`, `id` FROM `users` WHERE `email` = ?");
		$query -> bindValue(1, $email);

		try {

			$query -> execute();
			$data = $query -> fetch();
			$stored_password = $data['password'];
			// stored hashed password
			$id = $data['id'];
			$role = $data['ruolo'];

			if ($bcrypt -> verify($password, $stored_password) === true) {// using the verify method to compare the password with the stored hashed password.
				$login['id'] = $id;
				$login['role'] = $role;
				return $login;
			} else {
				return false;
			}

		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	}


	public function email_confirmed($username) {

		$query = $this -> db -> prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ? AND `confirmed` = ?");
		$query -> bindValue(1, $username);
		$query -> bindValue(2, 1);

		try {

			$query -> execute();
			$rows = $query -> fetchColumn();

			if ($rows == 1) {
				return true;
			} else {
				return false;
			}

		} catch(PDOException $e) {
			die($e -> getMessage());
		}

	}

	public function get_user($id) {

		$query = $this -> db -> prepare("SELECT * FROM `users` WHERE `id`= ?");
		$query -> bindValue(1, $id);

		try {
			$query -> execute();
			return $query -> fetch();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	}

	public function get_users() {

		#preparing a statement that will select all the registered users, with the most recent ones first.
		//$query = $this -> db -> prepare("SELECT * FROM `users` ORDER BY `time` DESC");
		$query = $this -> db -> prepare("SELECT * FROM `users` ORDER BY `id` ASC");

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}

		# We use fetchAll() instead of fetch() to get an array of all the selected records.
		return $query -> fetchAll();
	}

	public function update_user($first_name, $last_name, $gender, $bio, $image_location, $id) {

		$query = $this -> db -> prepare("UPDATE `users` SET
				`nome`	= ?,
				`cognome`		= ?,
				`gender`		= ?,
				`bio`			= ?,
				`image_location`= ?
					
				WHERE `id` 		= ?
				");

		$query -> bindValue(1, $first_name);
		$query -> bindValue(2, $last_name);
		$query -> bindValue(3, $gender);
		$query -> bindValue(4, $bio);
		$query -> bindValue(5, $image_location);
		$query -> bindValue(6, $id);

		try {
			$query -> execute();
		} catch(PDOException $e) {
			die($e -> getMessage());
		}
	}

	public function fetch_info($what, $field, $value) {

		$allowed = array('id', 'username', 'first_name', 'last_name', 'gender', 'bio', 'email');
		// I have only added few, but you can add more. However do not add 'password' even though the parameters will only be given by you and not the user, in our system.
		if (!in_array($what, $allowed, true) || !in_array($field, $allowed, true)) {
			throw new InvalidArgumentException;
		} else {

			$query = $this -> db -> prepare("SELECT $what FROM `users` WHERE $field = ?");

			$query -> bindValue(1, $value);

			try {

				$query -> execute();

			} catch(PDOException $e) {

				die($e -> getMessage());
			}

			return $query -> fetchColumn();
		}
	}
	
	public function deleteUser($user_id)
	{
		$query = $this -> db -> prepare("DELETE FROM `users` WHERE `id` = ?");
		$query -> bindValue(1, $user_id);
		
		try {

				$query -> execute();

			} catch(PDOException $e) {

				die($e -> getMessage());
			}

			
		}
	

}
?>
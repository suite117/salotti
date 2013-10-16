<?php
class General {

	#Check if the user is logged in.
	public function logged_in() {
		return (isset($_SESSION['id'])) ? true : false;
	}

	//controlla se l'utente ha ruolo amministratore
	public function isAdmin(){
		$is_admin = false;
		if ($_SESSION['role'] == 99) {
			$is_admin = true;
		}

		return $is_admin;
	}

	#if logged in then redirect to home.php
	public function logged_in_protect() {
		if ($this -> logged_in() === true) {
			header('Location: index.html');
			exit();
		}
	}

	#if not logged in then redirect to index.html
	public function logged_out_protect() {
		if ($this -> logged_in() === false) {
			header('Location: ' . curUrl() . 'login.html');
			exit();
		}
	}

	public function file_newpath($path, $filename){
		if ($pos = strrpos($filename, '.')) {
			$name = substr($filename, 0, $pos);
			$ext = substr($filename, $pos);
		} else {
			$name = $filename;
		}

		$newpath = $path.'/'.$filename;
		$newname = $filename;
		$counter = 0;

		while (file_exists($newpath)) {
			$newname = $name .'_'. $counter . $ext;
			$newpath = $path.'/'.$newname;
			$counter++;
		}

		return $newpath;
	}

}

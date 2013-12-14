<?php 

class DAO {

    protected $db;

    protected function __construct($table, $fields) {
        $this->table = $table;
        $this->fields = $fields;
        
        // fix utf-8
        $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8', $config['username'],
                $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        
        //Setting the error mode of our db object, which is very important for debugging.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    protected function query() {
        
    }
    
    

}

?>
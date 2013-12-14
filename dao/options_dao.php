<?php 

class OptionsDAO {

    private $db;

    public function __construct($database) {
        $this -> db = $database;
    }

    public function get_option($option_code) {


        #preparing a statement that will select all the registered users, with the most recent ones first.
        $query = $this -> db -> prepare("SELECT * FROM options WHERE option_code=?");
        $query -> bindValue(1, $option_code);

        try {
            $query -> execute();
        } catch(PDOException $e) {
            die($e -> getMessage());
        }

        # We use fetchAll() instead of fetch() to get an array of all the selected records.
        $rows = $query -> fetchAll();
        return $rows[0];


    }

    public function insert($option_code, $option_name, $product_type){

        $query = $this -> db -> prepare("INSERT INTO `options` (option_code, product_type, option_name) VALUES (?,?,?) ");
        $query -> bindValue(1, $option_code);
        $query -> bindValue(2, $product_type);
        $query -> bindValue(3, $option_name);

        try{
            $query->execute();


        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function update($option_code, $option_name, $product_type, $option_order){

        $query = $this->db->prepare("UPDATE `options` SET

                `option_name` = ?,
                `product_type` = ?,
                `option_order` = ?

                WHERE `option_code`	= ?
                ");

        $query->bindValue(1, $option_name);
        $query->bindValue(2, $product_type);
        $query->bindValue(3, $option_order);
        $query->bindValue(4, $option_code);
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function delete($option_code)
    {
        $query = $this -> db -> prepare("DELETE FROM `options` WHERE `option_code` = ?");
        $query -> bindValue(1, $option_code);

        try {

            $query -> execute();

        } catch(PDOException $e) {
            die($e -> getMessage());
        }
    }

    public function update_order($option_code, $order){

        $query = $this->db->prepare("UPDATE `options` SET
                 
                `option_order` = ?
                 
                WHERE `option_code`	= ?
                ");

        $query->bindValue(1, $order);
        $query->bindValue(2, $option_code);
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function get_options_by_product_ids() {

        #preparing a statement that will select all the registered users, with the most recent ones first.
        $query = $this -> db -> prepare("SELECT * FROM `options` ORDER BY option_order");

        try {
            $query -> execute();
        } catch(PDOException $e) {
            die($e -> getMessage());
        }

        # We use fetchAll() instead of fetch() to get an array of all the selected records.
        return $query -> fetchAll();
    }

    public function get_options_by_product_ids_by_type($type) {

        #preparing a statement that will select all the registered users, with the most recent ones first.
        $query = $this -> db -> prepare("SELECT * FROM `options` WHERE product_type=? ORDER BY option_order");
        $query -> bindValue(1, $type);

        try {
            $query -> execute();
        } catch(PDOException $e) {
            die($e -> getMessage());
        }

        # We use fetchAll() instead of fetch() to get an array of all the selected records.
        return $query -> fetchAll();
    }


    public function get_options_by_product_id($id) {
        $query = $this -> db -> prepare("SELECT o.option_code, o.option_name FROM prodotto as p , product_options as po, options as o WHERE p.id= ? AND p.id=po.product_id AND po.option_code = o.option_code ORDER BY option_order");
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
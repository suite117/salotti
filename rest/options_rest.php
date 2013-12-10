<?php 

require '../init.php';

switch($method) {
    case 'GET':
        if( isset($_GET['id']))
            $options = $options_dao->get_options_by_id($_GET['id']);
        elseif( isset($_GET['type'])){
            $options = $options_dao->get_options_by_type($_GET['type']);
        }else{
            $options = $options_dao->get_options();
        }

        $output = $options;
        break;
    case 'POST':
        $general->logged_out_protect();
        // seleziono il comando
        $command = @$_POST["command"];
        $data = $_POST["data"];

        switch($command) {
            case 'INSERT':  // caso inserimento
                echo 'insert';
                $options_dao->insert($data['option_code'], $data['option_name'], $data['product_type']);
                break;
            case 'UPDATE': // caso aggiornamento
                
                break;
            default: // invio non strutturato 
                $product_id = @$_GET['id'];
                if($product_id) {
                    $product_code = $_POST['option_code'];
                    $option_is_selected = $_POST['selected'];

                    if ($option_is_selected === 'true') {
                        //var_dump('create');
                        $options_dao->create_option($product_id, $product_code);
                    }
                    else
                        $options_dao->delete_option($product_id, $product_code);
                }
                else {
                    if(!empty($_POST["update"]))
                    foreach ($_POST["update"] as $index => $item) {
                        //$output[] = $item;
                        $options_dao->update_option($item["option_code"], $index);
                    }
                }
                break;
        }

        $output['success'] = true;
        break;
    default:
        $output = array();
}



header('Content-type: application/json');
echo json_encode($output);
?>


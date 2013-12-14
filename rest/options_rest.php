<?php 

require '../init.php';

switch($method) {
    case 'DELETE':
        $option_code = $_REQUEST['id'];
        $options_dao->delete($option_code);
        break;
    case 'GET':
        if( isset($_GET['id']))
            $options = $options_dao->get_options_by_product_id($_GET['id']);
        elseif( isset($_GET['type'])){
            $options = $options_dao->get_options_by_product_ids_by_type($_GET['type']);
        }else{
            $options = $options_dao->get_options_by_product_ids();
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
                $options_dao->insert($data['option_code'], $data['option_name'], $data['product_type']);
                $output =  'INSERT';
                break;
            case 'UPDATE': // caso aggiornamento
                foreach ($_POST["data"] as $index => $item) {
                    
                   $options_dao->update($item['option_code'], $item['option_name'], $item['product_type'], $index+1);
                }
                $output = 'non modificato!!!';
                break;
            case 'UPDATE_ORDER':
                foreach ($_POST["data"] as $index => $item) 
                    $options_dao->update_order($item["option_code"], $index+1);      
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
                break;
        }

        $output['success'] = true;
        break;
    default:
        $output = array();
}



header('Content-type: application/json');
echo json_encode(@$output);
?>


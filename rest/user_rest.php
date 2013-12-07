<?php
require '../init.php';
$general->not_admin_out_protect();
$output = array();

switch($method) {
  case 'DELETE':
    $user_id=$_REQUEST['id'];
    $users_dao -> delete($user_id);
    break;
}

header('Content-type: application/json');
echo json_encode($output);
?>

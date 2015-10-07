<?php
$type_id = $_POST['item'];

require_once('ConnectDB.php');

$db = new ConnectDB();
$get_food_name = $db->db_accessor("DISTINCT id, japanese", "Mlang", "type_id = '$type_id'");

$html = $get_food_name;
header('Content-type: application/json'); //指定されたデータタイプに応じたヘッダーを出力する
echo json_encode( $html );
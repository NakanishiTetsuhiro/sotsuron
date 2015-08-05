<?php

$type_id = $_POST['item'];

// var_dump($type_id);
// $html = $type_id;

// $kindBoxValue = $_POST["kindBoxValue"];

require_once('connect-db.php');

try {
  // $sql= "SELECT * FROM Mlang";
  $sql= "SELECT DISTINCT id, japanese FROM Mlang WHERE type_id = '$type_id'";
  $stmh = $pdo->prepare($sql);
  $stmh->execute();
  $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

$html = $row;
header('Content-type: application/json'); //指定されたデータタイプに応じたヘッダーを出力する
echo json_encode( $html );
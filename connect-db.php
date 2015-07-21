<?php
// データベースに接続
$db_user = "root";  // ユーザー名
$db_pass = "piro372";     // パスワード
$db_host = "localhost";   // ホスト名
$db_name = "sotsuron";    // データベース名
$db_type = "mysql";       // データベースの種類

$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
try {
  $pdo = new PDO($dsn, $db_user,$db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  // print "接続しました(」・ω・)」うー!(/・ω・)/にゃー!";
} catch(PDOException $Exception) {
  die('エラー :' . $Exception->getMessage());
}
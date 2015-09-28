<?php

class ConnectDB {
  // ↓メンバ変数（クラスの中にあるけど、メソッドの中にないもの）
  private $db_user = "root";  // ユーザー名
  private $db_pass = "vagrant";     // パスワード
  private $db_host = "localhost";   // ホスト名
  private $db_name = "sotsuron";    // データベース名
  private $db_type = "mysql";       // データベースの種類
  private $pdo = '';

  // コンストラクタは使わなくてもこういう風にかいておこう！
  // public function __construct() {}
  public function __construct() {
    $dsn = $this->db_type.":host=".$this->db_host.";dbname=".$this->db_name.";charset=utf8";
    try {
      $this->pdo = new PDO($dsn, $this->db_user, $this->db_pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      // print "接続しました(」・ω・)」うー!(/・ω・)/にゃー!";
    } catch(PDOException $Exception) {
      die('エラー :' . $Exception->getMessage());
    }
  }

  public function db_accessor($select, $from, $where){
    try {
      $sql= "SELECT $select FROM $from WHERE $where";
      $stmh = $this->pdo->prepare($sql);
      $stmh->execute();
      return $stmh->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $Exception) {
      print "エラー：" . $Exception->getMessage();
      return false;
    }
  }
}
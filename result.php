<?php
  require_once('connect-db.php');
  // $idTemp = $_POST["food-name-box"][0];
?>

<pre>
  <?php
  var_dump($_POST);
  ?>
  <br>
</pre>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>メニュー表出力結果</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="css/result.css">
</head>
<body class="content-print">

  <div class="wrapper">
  <h1 class="store_name"><?php echo $_POST["store-name"]; ?></h1>
  <div class="container">

    <section class="inner-box">
<!--
       <h1 class="kind-box">
        <?php
        try {
          $sql= "SELECT type_id, type FROM Mlang WHERE type_id = 'hebikame'";
          $stmh = $pdo->prepare($sql);
          $stmh->execute();
          $row = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
          print "エラー：" . $Exception->getMessage();
        }
        echo $row[0]['type'];
        ?>
      </h1>
-->
<!--
      <div class="item">
        <p class="chinese">
          <?php
          try {
            $sql= "SELECT id, chinese FROM Mlang WHERE id = $idTemp";
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            $row = $stmh->fetchall(PDO::FETCH_ASSOC);
          } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
          }
          echo $row[0]['chinese'];
          ?>
        </p>
        <p class="food-option">miso soup, rice, OKINAWA noodle set.</p>
        <p class="price"><?php echo $_POST["price"] ?> YEN</p>
      </div>
-->

<?php
  $i = 0;
  $itemCounter = count($_POST["food-name-box"]);  // 料理の品目数を取得

  foreach ($_POST as $key => $value) {
    // 品目の数だけdivタグを生成
    if ($i == 0) {
      $item = [];
      for ($j=0; $j < $itemCounter; $j++) {
        $item[$j] = "<div class=\"item\">";
      }
    }

    // 選択された言語で料理名を表示
    if ($key == "lang-select") {
      foreach ($value as $key => $lang) {
        if ($lang == "chinese") {
          foreach ($_POST["food-name-box"] as $key => $id) {
            $j = 0;
            // var_dump($id);
            try {
              $sql= "SELECT id, chinese FROM Mlang WHERE id = $id";
              $stmh = $pdo->prepare($sql);
              $stmh->execute();
              $row = $stmh->fetchall(PDO::FETCH_ASSOC);
            } catch (PDOException $Exception) {
              print "エラー：" . $Exception->getMessage();
            }
            // var_dump($row[0]['chinese']);
            $item[$j] .= "<h2 class=\"chinese\">".$row[0]['chinese']."</h2>";
            $j++;
          }
        }
      }
    }

    if ($i == $itemCounter) {
      for ($j=0; $j < $itemCounter; $j++) {
        $item[$j] .= "</div>";
        echo "$item[$j]";
      }
    }
    $i++;
    // echo "i= $i, ";
    // echo "$key<br>";
  }
?>

    </section>

  </div>
  </div>
</body>
</html>
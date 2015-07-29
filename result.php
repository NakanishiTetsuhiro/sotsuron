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

<!-- 料理の種類を表示させるとこ（旧）
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


<?php
  $i = 0;
  $itemCounter = count($_POST["food-name-box"]);  // 料理の品目数を取得

  foreach ($_POST as $key => $value) {
    if ($i == 0) {                        // 品目の数だけdivタグを生成
      $item = [];
      for ($j=0; $j < $itemCounter; $j++) {
        $item[$j] = "<div class=\"item\">";
      }
    }

    if ($key == "lang-select") {           // 選択された言語で料理名を表示
      foreach ($value as $key => $lang) {
        // var_dump($lang);
        if ($lang == "chinese") {
          $j = 0;
          foreach ($_POST["food-name-box"] as $key => $id) {
            // var_dump($id);
            try {
              $sql= "SELECT id, chinese FROM Mlang WHERE id = $id";
              $stmh = $pdo->prepare($sql);
              $stmh->execute();
              $row = $stmh->fetchall(PDO::FETCH_ASSOC);
            } catch (PDOException $Exception) {
              print "エラー：" . $Exception->getMessage();
            }
            // var_dump($row[0]);
            $item[$j] .= "<h2 class=\"chinese\">".$row[0]['chinese']."</h2>";
            $j++;
          }
        }
      }
    }

//---------------ここがうまくいかない--------------------------
    // if ($key == "price") {                                    // 金額を表示
    //   foreach ($value as $key => $price) {
    //   $j = 0;
    //     var_dump($price);
    //     $item[$j] .= "<p class=\"price\">".$price."YEN</p>";
    //     // $item[$j] .= "入ってる？？";
    //     $j++;
    //   }
    // }
//------------------------------------------------------------

    if ($i == $itemCounter) {                           // タグを閉じる処理と出力の処理
      for ($j=0; $j < $itemCounter; $j++) {
        $item[$j] .= "</div>";
        echo "$item[$j]";
      }
    }
    $i++;
  }
?>

    </section>

  </div>
  </div>
</body>
</html>
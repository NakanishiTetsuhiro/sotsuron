<!-- Database connect settings loading -->
<?php require_once('connect-db.php'); ?>

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
  $foodCounter = count($_POST["food-name-box"]);  // 料理の品目数を取得

  foreach ($_POST as $key => $value) {
    if ($i == 0) {                        // 品目の数だけdivタグを生成
      $item = array();
      for ($j=0; $j < $foodCounter; $j++) {
        $item[$j] = "<div class=\"item\">";
      }

      $k = 0;
      foreach ($_POST["food-name-box"] as $idKey => $id) {                  // 画像を表示させる
        // var_dump($id);
        try {
          $sql= "SELECT id, img_path FROM Mlang WHERE id = $id";
          $stmh = $pdo->prepare($sql);
          $stmh->execute();
          $row = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
          print "エラー：" . $Exception->getMessage();
        }
        $item[$k] .= "<img class=\"food-img\" src=". $row[0]['img_path'] .">";
        $k++;
      }

      // $item[0] .= "<img class=\"food-img\" src=\"img/test/su-chika.JPG\">";
      // $item[1] .= "<img class=\"food-img\" src=\"img/test/go-ya.jpg\">";
      // $item[2] .= "<img class=\"food-img\" src=\"img/test/inamuruchi.jpg\">";
    }


    if ($key == "lang-select") {                               // 選択された言語で料理名を表示

      for ($j=0; $j < $foodCounter; $j++) {
        $item[$j] .= "<div class=\"lang-box\">";
      }

      foreach ($value as $langKey => $lang) {
        // var_dump($lang);
        if ($lang == "chinese") {                                   // 中国語
          $j = 0;
          foreach ($_POST["food-name-box"] as $idKey => $id) {
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

        if ($lang == "japanese") {                                  // 日本語
          $j = 0;
          foreach ($_POST["food-name-box"] as $idKey => $id) {
            try {
              $sql= "SELECT id, japanese FROM Mlang WHERE id = $id";
              $stmh = $pdo->prepare($sql);
              $stmh->execute();
              $row = $stmh->fetchall(PDO::FETCH_ASSOC);
            } catch (PDOException $Exception) {
              print "エラー：" . $Exception->getMessage();
            }
            $item[$j] .= "<p class=\"japanese\">".$row[0]['japanese']."</p>";
            $j++;
          }
        }
      }

      for ($j=0; $j < $foodCounter; $j++) {
        $item[$j] .= "</div>";
      }

    }

    // if ($key == "food-option") {                           // オプションを表示
    //   $j = 0;
    //   var_dump($value);

    //   foreach ($value as $foodOptionKey => $foodOption) {
    //     // if ($_POST["tax"] == "included") {
    //     //   $item[$j] .= "<p class=\"food-option\">".$foodOption."</p>";
    //     // } elseif ($_POST["tax"] == "exclusive") {
    //     //   $item[$j] .= "<p class=\"food-option\">".$foodOption."</p>";
    //     // }
    //     $j++;
    //   }
    // }

    if ($key == "price") {                                    // 金額を表示
      $j = 0;
      foreach ($value as $priceKey => $price) {
        // echo "$j<BR>";
        // var_dump($price);
        // echo "<BR>";
        if ($_POST["tax"] == "included") {
          $item[$j] .= "<p class=\"price\">".$price."YEN</p>";
        } elseif ($_POST["tax"] == "exclusive") {
          $item[$j] .= "<p class=\"price\">".$price."YEN +TAX</p>";
        }
        $j++;
      }
    }

    $postCounter = count($_POST);
    $postCounter--;
    if ($i == $postCounter) {                           // タグを閉じる処理と出力の処理
      for ($j=0; $j < $foodCounter; $j++) {
        $item[$j] .= "</div>";
        echo $item[$j];
      }
    }
    $i++;
    // echo $i;
  }
?>

    </section>

  </div>
  </div>
</body>
</html>
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
          <?php
          $i = 0;

          // 料理の品目数を取得
          $foodCounter = count($_POST["food-name-box"]);
          foreach ($_POST as $key => $value) {

          // 品目の数だけdivタグを生成
          if ($i == 0) {
          $item = array();
          for ($j=0; $j < $foodCounter; $j++) {
          $item[$j] = "<div class=\"item\">";
            }
            $k = 0;

            // 画像を表示させる
            foreach ($_POST["food-name-box"] as $idKey => $id) {
            try {
              $sql= "SELECT id, img_path FROM Mlang WHERE id = $id";
              // print $sql."<br>";
              $stmh = $pdo->prepare($sql);
              $stmh->execute();
              $row = $stmh->fetchall(PDO::FETCH_ASSOC);
            } catch (PDOException $Exception) {
              print "エラー：" . $Exception->getMessage();
            }

            // ↓ここがうまくいかない。。
            db_accessor("id, img_path", "Mlang", "id = $id");
            // ↑ここがうまくいかない。。

            $item[$k] .= "<img class=\"food-img\" src=". $row[0]['img_path'] .">";
            $k++;
            }
            }

            // 選択された言語で料理名を表示
            if ($key == "lang-select") {
            for ($j=0; $j < $foodCounter; $j++) {
            $item[$j] .= "<div class=\"lang-box\">";
              }
              foreach ($value as $langKey => $lang) {
              // var_dump($lang);
              // 中国語
              if ($lang == "chinese") {
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
              // 日本語
              if ($lang == "japanese") {
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

            // オプションを表示
            // if ($key == "food-option") {
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

            // 金額を表示
            if ($key == "price") {
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

            // タグを閉じる処理と出力の処理
            if ($i == $postCounter) {
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
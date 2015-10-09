  <!-- Database connect settings loading -->
<?php require_once('ConnectDB.php'); ?>

<pre>
  <?php var_dump($_POST); ?>
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
          <?php
          $i = 0;
          $db = new ConnectDB();

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
                  $get_image = $db->db_accessor("id, img_path", "Mlang", "id = $id");
                  $item[$k] .= "<img class=\"food-img\" src=". $get_image[0]['img_path'] .">";
                  $k++;
                }
              }

              // 選択された言語で料理名を表示
              if ($key == "lang-select") {
                for ($j=0; $j < $foodCounter; $j++) {
                  $item[$j] .= "<div class=\"lang-box\">";
                }
                foreach ($value as $langKey => $lang) {
                  // 中国語
                  if ($lang == "chinese") {
                    $j = 0;
                    foreach ($_POST["food-name-box"] as $idKey => $id) {
                      $get_chinese = $db->db_accessor("id, chinese", "Mlang", "id = $id");
                      $item[$j] .= "<h2 class=\"chinese\">".$get_chinese[0]['chinese']."</h2>";
                      $j++;
                    }
                  }
                  // 日本語
                  if ($lang == "japanese") {
                    $j = 0;
                    foreach ($_POST["food-name-box"] as $idKey => $id) {
                      $get_japanese = $db->db_accessor("id, japanese", "Mlang", "id = $id");
                      $item[$j] .= "<p class=\"japanese\">".$get_japanese[0]['japanese']."</p>";
                      $j++;
                    }
                  }
                }
                for ($j=0; $j < $foodCounter; $j++) {
                  $item[$j] .= "</div>";
                }
              }

              // 金額を表示
              if ($key == "price") {
                $j = 0;
                foreach ($value as $priceKey => $price) {
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
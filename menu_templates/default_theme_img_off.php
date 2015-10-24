<?php
session_start();

// Database connect settings loading
require_once('../ConnectDB.php');
?>


<pre> <?php var_dump($_SESSION); ?> </pre>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>メニュー表出力結果</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="../css/result.css">
  </head>
  <body class="content-print">
    <div class="wrapper">
      <h1 class="store_name"><?php echo $_SESSION["storeName"]; ?></h1>
      <div class="container">
        <section class="inner-box">
          <?php
          $i = 0;
          $db = new ConnectDB();

          // 料理の品目数を取得
          $foodCounter = count($_SESSION["foodNameBox"]);
          foreach ($_SESSION as $key => $value) {

            // 品目の数だけdivタグを生成
            if ($i == 0) {
              $item = array();
              for ($j=0; $j < $foodCounter; $j++) {
                $item[$j] = "<div class=\"item\">";
              }
            }

            // 選択された言語で料理名を表示
            if ($key == "langSelect") {
              for ($j=0; $j < $foodCounter; $j++) {
                $item[$j] .= "<div class=\"lang-box\">";
              }
              foreach ($value as $langKey => $lang) {
                // 中国語
                if ($lang == "chinese") {
                  $j = 0;
                  foreach ($_SESSION["foodNameBox"] as $idKey => $id) {
                    $get_chinese = $db->db_accessor("id, chinese", "Mlang", "id = $id");
                    $item[$j] .= "<h2 class=\"chinese\">".$get_chinese[0]['chinese']."</h2>";
                    $j++;
                  }
                }
                // 日本語
                if ($lang == "japanese") {
                  $j = 0;
                  foreach ($_SESSION["foodNameBox"] as $idKey => $id) {
                    $get_japanese = $db->db_accessor("id, japanese", "Mlang", "id = $id");
                    $item[$j] .= "<p class=\"japanese\">".$get_japanese[0]['japanese']."</p>";
                    $j++;
                  }
                }
              }


                // lang-boxの閉じタグを追加
                for ($j=0; $j < $foodCounter; $j++) {
                  $item[$j] .= "</div>";
                }
              }


              // 料理にセットで付いてくるオプションを表示
              for ($j=0; $j < $foodCounter; $j++) {
                if ($key === "foodOption".$j) {
                  foreach ($value as $foodOptionKey => $foodOption) {
                    if ($foodOption == "misoSoup") {
                      $item[$j] .= "<p class=\"miso_soup\">味噌汁付き</p>";
                    }

                    if ($foodOption == "rice") {
                      $item[$j] .= "<p class=\"rice\">ご飯付き</p>";
                    }

                    if ($foodOption == "miniSoba") {
                      $item[$j] .= "<p class=\"mini_soba\">ミニそば付き</p>";
                    }
                  }
                }
              }


              // 金額を表示
              if ($key == "price") {
                $j = 0;
                foreach ($value as $priceKey => $price) {
                  if ($_SESSION["tax"] == "included") {
                    $item[$j] .= "<p class=\"price\">".$price."YEN</p>";
                  } elseif ($_SESSION["tax"] == "exclusive") {
                    $item[$j] .= "<p class=\"price\">".$price."YEN +TAX</p>";
                  }
                  $j++;
                }
              }


              // タグを閉じる処理と出力の処理
              $postCounter = count($_SESSION);
              $postCounter--;
              if ($i == $postCounter) {
                for ($j=0; $j < $foodCounter; $j++) {
                  $item[$j] .= "</div>";
                  echo $item[$j];
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
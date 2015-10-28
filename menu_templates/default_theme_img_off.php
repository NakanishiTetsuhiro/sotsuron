<?php
session_start();

// Database connect settings loading
require_once('../ConnectDB.php');
?>


<!-- <pre><?php var_dump($_SESSION); ?></pre> -->


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
          $postElementCount = 0;
          $db = new ConnectDB();
          $foodCounter = count($_SESSION["foodNameBox"]);

          foreach ($_SESSION as $key => $valueOfSESSION) {

            if ($postElementCount == 0) {
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

              foreach ($valueOfSESSION as $langKey => $lang) {

                if ($lang == "chinese") {
                  $j = 0;

                  foreach ($_SESSION["foodNameBox"] as $idKey => $id) {
                    $get_chinese = $db->db_accessor("id, chinese", "Mlang", "id = $id");
                    $item[$j] .= "<p>".$get_chinese[0]['chinese']."</p>";
                    $j++;
                  }
                }

                if ($lang == "japanese") {
                  $j = 0;

                  foreach ($_SESSION["foodNameBox"] as $idKey => $id) {
                    $get_japanese = $db->db_accessor("id, japanese", "Mlang", "id = $id");
                    $item[$j] .= "<p>".$get_japanese[0]['japanese']."</p>";
                    $j++;
                  }
                }
              }

              for ($j=0; $j < $foodCounter; $j++) {
                $item[$j] .= "</div>";
              }
            }


            // 料理にセットで付いてくるオプションを表示
            if ($key == "foodOption") {

              for ($j=0; $j < $foodCounter; $j++) {
                $item[$j] .= "<div class=\"food-option-box\">";
              }

              foreach ($valueOfSESSION as $foodOptionArrayKey => $foodOptionArray) {

                // $foodOptionKeyは使ってない！
                foreach ($foodOptionArray as $foodOptionKey => $foodOptionValue) {

                  if ($foodOptionValue == "misoSoup") {
                    $item[$foodOptionArrayKey] .= "<p class=\"miso_soup\">味噌汁付き</p>";
                  }

                  if ($foodOptionValue == "rice") {
                    $item[$foodOptionArrayKey] .= "<p class=\"rice\">ご飯付き</p>";
                  }

                  if ($foodOptionValue == "miniSoba") {
                      $item[$foodOptionArrayKey] .= "<p class=\"mini_soba\">ミニそば付き</p>";
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

              foreach ($valueOfSESSION as $priceKey => $price) {

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
              if ($postElementCount == $postCounter) {
                for ($j=0; $j < $foodCounter; $j++) {
                  $item[$j] .= "</div>";
                  echo $item[$j];
                }
              }
            $postElementCount++;
          }
          ?>
        </section>
      </div>
    </div>
  </body>
</html>
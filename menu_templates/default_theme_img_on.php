<?php
session_start();
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
  <body id="default_on" class="content-print">
    <div class="wrapper">
      <h1 class="store_name"><?php echo $_SESSION["storeName"]; ?></h1>
      <div class="container">
        <section class="inner-box">

          <?php
          $db = new ConnectDB();
          $foodCount = count($_SESSION["foodNameBox"]);

          // $_SESSIONの値を分割
          $storeName     = $_SESSION['storeName'];
          $langSelects   = $_SESSION['langSelect'];
          $foodBoxId     = $_SESSION['foodBoxId'];
          $tax           = $_SESSION['tax'];
          $foodNameBoxes = $_SESSION['foodNameBox'];
          $foodOptions   = $_SESSION['foodOption'];
          $prices        = $_SESSION['price'];
          $foodImages    = $_SESSION["upImgFile"];

          $item = array();

          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] = "<div class=\"item\">";
          }


          // 画像を表示
          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "<div class=\"img_box\">";
          }

          $j = 0;

          foreach ($foodImages as $key => $foodImage) {
            if ($foodImage != null) {
              $image = base64_encode($foodImage);
              $item[$j] .= "<img src=\"data:image/png;base64,$image\">";

            } else {
              $item[$j] .= "<img src=\"../img/noimage.gif\" alt=\"noimage\">";
            }
            $j++;
          }

          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "</div>";
          }


          // 選択された言語で料理名を表示
          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "<div class=\"lang-box\">";
          }

          foreach ($langSelects as $key => $language) {
            if ($language == "chinese") {
              $j = 0;
              foreach ($foodNameBoxes as $Key => $id) {
                $get_chinese = $db->db_accessor("id, chinese", "Mlang", "id = $id");
                $item[$j] .= "<p>".$get_chinese[0]['chinese']."</p>";
                $j++;
              }
            }

            if ($language == "japanese") {
              $j = 0;
              foreach ($foodNameBoxes as $Key => $id) {
                $get_japanese = $db->db_accessor("id, japanese", "Mlang", "id = $id");
                $item[$j] .= "<p>".$get_japanese[0]['japanese']."</p>";
                $j++;
              }
            }
          }

          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "</div>";
          }


          // 料理にセットで付いてくるオプションを表示
          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "<div class=\"food-option-box\">";
          }

          $j = 0;

          foreach ($foodOptions as $key => $foodOptionArray) {
            if ($foodBoxId[$j] == $key) {
              foreach ($foodOptionArray as $key => $foodOption) {
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
            $j++;
          }


          for ($j=0; $j < $foodCount; $j++) {
            $item[$j] .= "</div>";
          }


        // 金額を表示
        foreach ($prices as $key => $price) {

          if ($tax == "included") {
            $item[$key] .= "<p class=\"price\">".$price."YEN</p>";

          } elseif ($tax == "exclusive") {
            $item[$key] .= "<p class=\"price\">".$price."YEN +TAX</p>";
          }
        }


        // タグを閉じる処理と出力の処理
        for ($j=0; $j < $foodCount; $j++) {
          $item[$j] .= "</div>";
          echo $item[$j];
        }
        ?>

        </section>
      </div>
    </div>
  </body>
</html>
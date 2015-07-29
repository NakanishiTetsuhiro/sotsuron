<?php
  require_once('connect-db.php');
  // $idTemp = $_POST["food-name-box"][0];
?>

<pre>
  <?php
  var_dump($_POST);
  // var_dump($idTemp);
  echo(count($_POST));
  ?>
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
  foreach ($_POST as $key => $value) {
    $itemCounter = count($_POST["food-name-box"]);
    if ($i == 0) {
      // $item = array();
      $item = [];
      for ($j=0; $j < $itemCounter; $j++) {
        $itemTagStart = "<div class=\"item\">" + "回目";
        // $itemTagStart = "<div class=\"item\">" + $j+1 + "回目";
        // $item[] = "<div class=\"item\">" + $j + "回目";
        $item[] = $itemTagStart;
      }
      echo $item[0];
    }

    // if ($i == $itemCounter) {
    //   for ($j=0; $j < $itemCounter; $j++) {

    //     // $item1 .= "</div>";
    //     // $item2 .= "</div>";
    //     // echo "$item1";
    //     // echo "$item2";
    //   }
    // }
    $i++;
  }
?>

    </section>

  </div>
  </div>
</body>
</html>
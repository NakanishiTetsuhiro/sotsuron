<?php require_once('connect-db.php'); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>メニュー表作成画面</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

  <body id="setting">
    <div class="top">
      <header>
        <div class="container">
          <a href="index.php"><h1>食堂メニュー変換サービス</h1></a>
        </div>
      </header><!-- /header -->
    </div><!-- /top -->

    <section class="container">
      <form action="hogehoge" method="get" accept-charset="utf-8">
      <div class="item-box">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">店舗名</label>
              <input type="store-name" class="form-control" id="exampleInputEmail1" placeholder="店舗名を入力してください">
            </div>
          </div>

          <div class="col-md-4">
            <label for="exampleInputEmail1" class="block-label">表示したい言語</label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> 日本語
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox3" value="option3"> ローマ字
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox2" value="option2"> 中国語
            </label>
<!--
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox3" value="option3"> 英語
            </label>
-->
          </div>
          <div class="col-md-4">
            <label for="exampleInputEmail1" class="block-label">消費税の表示</label>
            <label class="radio-inline">
              <input type="radio" name="tax" id="inlineRadio1" value="option1">内税
            </label>
            <label class="radio-inline">
              <input type="radio" name="tax" id="inlineRadio2" value="option2">外税
            </label>
          </div>
        </div> <!-- /row -->
      </div> <!-- /item-box -->

      <ul id="food-list">
        <li id="food-box-1" class="item-box">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">料理の種類</label>
                <select name="kindBox" class="kind-box form-control">
                  <?php
                  try {
                    // $sql= "SELECT * FROM Mlang";
                    $sql= "SELECT DISTINCT type_id, type FROM Mlang";
                    $stmh = $pdo->prepare($sql);
                    $stmh->execute();
                    $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます
                  } catch (PDOException $Exception) {
                    print "エラー：" . $Exception->getMessage();
                  }

                  $i = 0;
                  foreach ($row as $key => $value) {
                  ?>
                  <option value="<?php echo $value['type_id'] ?>">
                  <?php
                  echo $value['type'];
                  // var_dump($value);
                  // echo $value;
                  ?>
                  </option>
                  <?php
                  $i++;
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">料理名</label>
                <select name="food-name-box" class="food-name-box form-control">
                  <?php
                  try {
                    // $sql= "SELECT * FROM Mlang";
                    $sql= "SELECT DISTINCT id, type_id, japanese FROM Mlang";
                    $stmh = $pdo->prepare($sql);
                    $stmh->execute();
                    $row = $stmh->fetchall(PDO::FETCH_ASSOC); // $rowに結果を格納してます
                  } catch (PDOException $Exception) {
                    print "エラー：" . $Exception->getMessage();
                  }
                  $i = 0;
                  foreach ($row as $key => $value) {
                  ?>
                  <option value="<?php echo $value['type_id'] ?>">
                  <?php
                  echo $value['japanese'];
                  // var_dump($value);
                  // echo $value;
                  ?>
                  </option>
                  <?php
                    $i++;
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1" class="block-label">オプション</label>
              <label class="checkbox-inline">
                <input type="checkbox" class="misoshiru" value="option1"> 味噌汁
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" class="rice" value="option2"> ご飯
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" class="minisoba" value="option3"> ミニそば
              </label>
            </div>
          </div> <!-- /row -->
          <div class="row">
            <div class="col-md-5 col-md-offset-7">
              <div class="form-group">
                <label for="exampleInputEmail1">金額</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="メニューの金額を入力してください">
              </div>
            </div>
          </div>
        </li> <!-- /.item-box -->
      </ul>

      <div class="row">
        <button type="button" id="btn_add" class="btn btn-default pull-right">品目を追加する</button>
      </div>
      <div class="row">
        <button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top:20px;">メニュー表を作る</button>
      </div>
    <div id="test"></div>
      </form>
    </section>


<?php require_once('footer.php'); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

    <script src="js/my.js"></script>
    <script src="js/item-add.js"></script>
  </body>
</html>
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
      <form action="result.php" method="post" accept-charset="utf-8">
      <div class="item-box">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="store-name">店舗名</label>
              <input type="text" name="store-name" class="form-control" id="store-name" placeholder="店舗名を入力してください">
            </div>
          </div>

          <div class="col-md-4">
            <label for="languages" class="block-label">表示したい言語</label>
            <label class="checkbox-inline">
              <input type="checkbox" name="lang-select[]" id="languages" value="japanese"> 日本語
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="lang-select[]" id="languages" value="ro-ma"> ローマ字
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="lang-select[]" id="languages" value="chinese"> 中国語
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
              <input type="radio" name="tax" id="inlineRadio1" value="included">内税
            </label>
            <label class="radio-inline">
              <input type="radio" name="tax" id="inlineRadio2" value="exclusive">外税
            </label>
          </div>
        </div> <!-- /row -->
      </div> <!-- /item-box -->

      <ul id="food-list"></ul>

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

    <script src="js/food-box-add.js"></script>
  </body>
</html>
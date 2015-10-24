<!-- Database connect settings loading -->
<?php require_once('ConnectDB.php'); ?>

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
                    <label for="storeName">店舗名</label>
                    <input type="text" name="storeName" class="form-control" id="storeName" placeholder="店舗名を入力してください">
                  </div>
                </div>
                <div class="col-md-4 mb">
                  <label for="languages" class="block-label">表示したい言語</label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="langSelect[]" class="languages" value="chinese" checked="checked"> 中国語
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="langSelect[]" class="languages" value="japanese" checked="checked"> 日本語
                  </label>
                </div>
                <div class="col-md-4 mb">
                  <label for="exampleInputEmail1" class="block-label">消費税の表示</label>
                  <label class="radio-inline">
                    <input type="radio" name="tax" id="inlineRadio1" value="included">内税
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="tax" id="inlineRadio2" value="exclusive" checked="checked">外税
                  </label>
                </div>
              </div> <!-- /row -->

              <div class="row">
                <div class="col-md-8">
                  <label for="imageSwitch" class="block-label">画像の表示・非表示</label>
                  <label class="image_switcher radio-inline">
                    <input type="radio" name="imageSwitch" value="imgOn">画像あり（料理の画像を用意する必要があります）
                  </label>
                  <label class="image_switcher radio-inline">
                    <input type="radio" name="imageSwitch" value="imgOff" checked="checked">画像なし
                  </label>
                </div>
              </div> <!-- /row -->
            </div> <!-- /item-box -->

            <div class="item-box">
              <div class="row">
                <div class="col-md-4">
                  <label for="" class="block-label">使用するテーマを選択してください</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="menu_theme" value="default_theme" checked="checked">デフォルト
                  </label>
                  <img src="img/noimage.gif" alt="No image">
                </div>
                <div class="col-md-4 col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="menu_theme" value="verticalWriting">縦書き
                  </label>
                  <img src="img/noimage.gif" alt="No image">
                </div>
                <div class="col-md-4 col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="menu_theme" value="verticalWriting">縦書き
                  </label>
                  <img src="img/noimage.gif" alt="No image">
                </div>
              </div>
            </div> <!-- /item-box -->

            <ul id="food-list"></ul>

            <div class="row">
              <button type="button" id="btn_add" class="btn btn-default pull-right">品目を追加する</button>
            </div>
            <div class="row">
              <button type="submit" class="btn btn-primary btn-lg pull-right" style="margin-top:20px;">メニュー表を作る</button>
            </div>
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
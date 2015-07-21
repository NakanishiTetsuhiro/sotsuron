<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>食堂メニュー変換サービス</title>

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
  <body>
    <div class="top">
      <header>
        <div class="container">
          <h1>食堂メニュー変換サービス</h1>
        </div>
      </header><!-- /header -->
      <div class="inner_top">
        <div class="container">
          <h1 class="text-center">沖縄の食堂、他言語化します</h1>
          <p class="text-center">簡単操作でメニュー表を即生成！</p>
          <button onClick="location.href='setting.php'" class="btn btn-primary btn-lg center-block">メニュー表を生成</button>
        </div>
      </div>
    </div><!-- /top -->

  <section class="description">
    <div class="container">
      <h1 class="text-center">4つの言語で表示されたメニューが<span style="color: red">無料</span>で作れる！！</h1>
    </div>
  </section>

  <?php require_once('footer.php'); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
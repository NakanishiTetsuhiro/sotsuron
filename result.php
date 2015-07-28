
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

<pre>
<?php var_dump($_POST); ?>
</pre>

  <div class="wrapper">
  <h1 class="store_name">うちな〜屋本店</h1>
  <div class="container">
    <div class="inner_box">
      <h1 class="food_kind">料理の種類</h1>
      <div class="item">
      <h2 class="food_name_top">日本語</h2>
        <ul class="language_list">
          <li>Romaji</li>
          <li>中国語</li>
        </ul>
        <p class="price">4,500YEN</p>
      </div>
    </div>
    <div class="inner_box">

    </div>
  </div>
  </div>
</body>
</html>
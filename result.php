<pre>
  <?php var_dump($_POST); ?>
</pre>

<?php

if ('imgOn' === $_POST['menu_theme']) {

  echo "Image On!";

} elseif ('imgOff' === $_POST['menu_theme']) {

  switch ($_POST['menu_theme']){
    case 'default_theme':
      // ここにdefault_themeへリダイレクトする命令をかきたい
      break;
    default:
      echo "Error!";
  }
}
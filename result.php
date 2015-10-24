<h1>POST</h1>
<pre><?php var_dump($_POST); ?></pre>

<?php
session_start();

$_SESSION = $_POST;

if ('imgOn' === $_POST['imageSwitch']) {

  switch ($_POST['menu_theme']){
    case 'default_theme':
      header("Location: menu_templates/default_theme_img_on.php");
      break;
    case 'verticalWriting':
      header("Location: menu_templates/default_theme_img_on.php");
      break;
    case 'default_theme':
      header("Location: menu_templates/default_theme_img_on.php");
      break;
    default:
      echo "Error!";
    }

} elseif ('imgOff' === $_POST['imageSwitch']) {

  switch ($_POST['menu_theme']){
    case 'default_theme':
      header("Location: menu_templates/default_theme_img_off.php");
      break;
    case 'verticalWriting':
      header("Location: menu_templates/default_theme_no_img_off.php");
      break;
    case 'default_theme':
      header("Location: menu_templates/default_theme_no_img_off.php");
      break;
    default:
      echo "Error!";
  }
}
?>

<h1>SESSION</h1>
<pre> <?php var_dump($_SESSION); ?> </pre>
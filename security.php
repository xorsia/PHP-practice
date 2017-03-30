<?php
  // Безопастность;
  // Запрет для js работать с сессиями;
  ini_set('session.httponly', '1');
  // Сессии;
  session_start();
  $_SESSION['artur'] = 'king';
  echo $_SESSION['artur'];
  // Запрет перехвата id сессии, пишется перед закрытием сессии;
  session_regenerate_id();
  unset($_SESSION['artur']);
  session_destroy();
  $a = 'Данные, пока что, не пришли обработчику';
  if(isset($_POST['wr'])) {
    $a = 'Пришли следующие данные: ' . $_POST['wr'];
  }
// Проверка входных данных;
$b = filter_has_var(INPUT_POST, 'wr');
var_dump($b);
$c = filter_input(INPUT_POST, 'wr', FILTER_VALIDATE_INT);
var_dump($c);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv = "content-type" content = "text/html; charset=utf-8">
  <title>Безопастность, суперглобальный массив пост</title>
</head>
<body>
  <form action="security.php" method="post">
    <h3>
      <?php echo $a;?>
	</h3>
    <input type="text" name="wr" placeholder="Введите данные">
    <input type="submit" value="Отправить обработчику">
  </form>
</body>
</html>
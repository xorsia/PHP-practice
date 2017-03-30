<?php
  // Безопастность;
  // Запрет для js работать с сессиями;
  ini_set('session.httponly', '1');
  // Сессии;
  session_start();
  $_SESSION['artur'] = 'king';
  echo $_SESSION['artur'] . '<br>';
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
// Правильная проверка и хранение паролей;
// незащищенный пароль;
$old_pass = '1234';
// защищенный пароль;
$p_hash = password_hash($old_pass, PASSWORD_DEFAULT);
// Проверка пароля;
// Пароль, который нужно проверить;
$chek_pass = '1234';
// Ф-ция проверки защищенного пароля;
if(password_verify($chek_pass, $p_hash)) {
  echo 'Пароль правильный';
} else {
  echo 'Пароль неверный';
}

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
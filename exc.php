<?php
// Обработка ошибок, исключений;
ini_set('display_errors', '1');
error_reporting(E_ALL);
// Автозагрузка классво через класс (использование ооп);
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);
// Класс для примера, в нем выпадет исключение класса Er;
try {
  $a = new Avrelii();
}
catch(FileEr $e) {
  $p2 = new FileEr();
  $p2->hand();
  throw new FileEr('Передадим в класс FileEr');
}
catch(DataEr $e) {
  $p3 = new DataEr();
  $p3->hand();
  throw new DataEr('Передадим в класс DataEr');
}
catch(Exception $e) {
  echo 'Исключения остальные';
}
$p1 = new Er();
$p1->hand();
//Выскочит нефатальная ошибка;
//include 'D:\test.php';
// Выскочит фатальная ошибка;
//require 'D:\test.php';

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
$p1 = new Er();
$p1->hand();
try {
  try {
    $a = new Avrelii();
  }
  catch (FileEr $e) {
    $p2 = new FileEr();
    // Получили и передали направленно в метод для работы с исключениями;
    $p2->hand3($e);
    //throw new FileEr('Передадим в класс FileEr');
  }
  catch (DataEr $e) {
    $p3 = new DataEr();
    $p3->hand3($e);
  }
  catch (Exception $e) {
    echo "<br>" . 'Исключения базового класса Exception';
  } 
  finally {
    echo "<br>" . 'Текст после finally';
  //Выскочит нефатальная ошибка;
  include 'D:\test.php';
  // Выскочит фатальная ошибка;
  //require 'D:\test.php';
  }
}
catch (Exception $e) {
  echo "<br>" . 'Необработанное исключение';
}
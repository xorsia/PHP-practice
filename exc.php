<?php
// Обработка ошибок, исключений;
ini_set('display_errors', '1');
error_reporting(E_ALL);
// Автозагрузка классво через класс (использование ооп);
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);
// Создание класса для работы с ошибками-исключениями;
$p = new Er();
$p->hand();
$a = new Avrelii();
// Выскочит нефатальная ошибка;
//include 'D:\test.php';
// Выскочит фатальная ошибка;
//require 'D:\test.php';

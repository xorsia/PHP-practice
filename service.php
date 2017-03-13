<?php
  // Настройка показа ошибок;
  ini_set('display_errors', '1');
  ini_set('log-errors', '1');
  $p = __DIR__ . '\er.log';
  ini_set('error_log', $p);
  ini_set('session.httponly', '1');
  // Информация о сервере;
  // phpinfo();
  echo getcwd();    // как узнать текущую папку;
  echo "<br>" . 'Пять больше одного:' . "<br>";
  echo assert(5>1);
  echo "<br>" . $_SERVER['REQUEST_URI'];
  
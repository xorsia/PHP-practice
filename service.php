<?php
  // Настройка показа ошибок;
  ini_set('display_errors', '1');
  ini_set('log-errors', '1');
  $p = __DIR__ . '\er.log';
  ini_set('error_log', $p);
  // Информация о сервере;
  // phpinfo();
  echo getcwd();    // как узнать текущую папку;
  echo "<br>" . 'Пять больше одного:' . "<br>";
  echo asert(5>1);

<?php
  // Подключаемый файл;
  $p = 'path-subsidiary.php';
  // Путь разбит на составные;
  require __DIR__ . '\\' . $p;
  // Текущая папка;
  $a1 = './';
  // Путь для проверки DIRECTORY_SEPARATOR
  $a2 = 'C:/';
  $b = realpath($a2 . DIRECTORY_SEPARATOR);
  echo 'Проверка работы константы слешей ' . $b;
<?php
  require __DIR__ . '\path-subsidiary.php';
  $a1 = './';
  $a2 = 'C:/';
  $b = realpath($a2 . DIRECTORY_SEPARATOR);
  echo 'Проверка работы константы слешей ' . $b;
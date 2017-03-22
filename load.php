<?php
class Load {
  public function loadclass($a) {
    $b = __DIR__ . '\\Classes\\' . $a . '.php';
    if (!file_exists($b)) {
      echo 'нет такого класса! ' . "<br>" . $a . "<br>" . 'По адресу: ' . "<br>" . $b;
      exit;
    }
    //echo  'Используется spl_autoload_register';
    require_once $b;
  }
}
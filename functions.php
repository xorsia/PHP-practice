<?php
  // Аргумент по ссылке
  function arg(&$a) {
    echo $a;
    $a += 5;
    return 'hello, world';
    echo "<br>" . 'эта часть кода уже не выполнится';
  }
  $c = 4;
  $b = arg($c);
  echo "<br>" . $c;
  echo "<br>" . $b;
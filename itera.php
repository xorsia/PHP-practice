<?php
// Автозагрузка классво через класс (использование ооп);
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);
$a = ['Один', 'Два', 'Три'];
$it = new Myiterator($a);
foreach ($it as $a => $b) {
    //echo $a;
}
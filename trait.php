<?php
// Автозагрузка классво через класс (использование ооп);
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);
// Будет создан обьект класса, в котором используется трейт;
$a = new Traitor();

<?php
// Простая автозагурзка классов;
$p = __DIR__ . '\autoload.php';
require_once $p;
$a = new Fr();
$a->pa();
$a->lio();
$a->lio();
$b = new De();
$b->lio2();
$b->lio2();
$c = new Sp();
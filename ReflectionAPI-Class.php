<?php
// Подключение через Composer;
// require_once __DIR__ . '\New-Modules\vendor\autoload.php';
// Одна точка подключения, а далее можно использовать любые классы подключенных фреймворков, движков, шаблонизаторов, модулей;

/* Обычная автозагрузка с исп. ООП */
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);

// Reflection API of Class
$a = new ReflectionClass('Avrelii');
echo $a->getName() . "<br>";
$b0 = $a->isUserDefined();
$b1 = $a->isInternal();
$b2 = $a->isInterface();
$b3 = $a->isAbstract();
$b4 = $a->isFinal();
$b5 = $a->isCloneable();
$b6 = $a->isInstantiable();
$b7 = $a->getFileName();
$b8 = $a->getStartLine();
$b9 = $a->getEndLine();
$b10 = $a->getProperties();         // название класса и его родителя;
$b11 = @file($a->getFileName());    // массив всех строк;
$b12 = Reflection::export($a);
$b13 = $a->getConstants();

var_dump($b13);

phpinfo();


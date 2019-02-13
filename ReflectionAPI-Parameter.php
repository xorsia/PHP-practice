<?php
// Подключение через Composer;
// require_once __DIR__ . '\New-Modules\vendor\autoload.php';
// Одна точка подключения, а далее можно использовать любые классы подключенных фреймворков, движков, шаблонизаторов, модулей;

/* Обычная автозагрузка с исп. ООП */
$p = __DIR__ . '\load.php';
require_once $p;
$loader = new Load();
spl_autoload_register([$loader, 'loadclass']);

// Reflection API of Parameter
$a = new ReflectionClass('Mark');
// Будет объект типа ReflectionMethod;
$method = $a->getMethod('__construct');
// Будет массив обьектов ReflectionParameter;
$params = $method->getParameters();
// Извлечение каждого ReflectionParameter;
foreach ($params as $param) {
    //var_dump($param);
    echo parameterData($param) . "<br>";
}

// Получаем сложный тип данныых ReflectionParameter, далее работаем с его методами;
function parameterData(ReflectionParameter $arg) {
    $details = "";
    $name = $arg->getName();
    $class = $arg->getClass();
    $position = $arg->getPosition();
    $details .= "$$name" . ' находится в позиции ' . $position . "<br>";
    if (!empty($class)) {
        $details .= "$$name" . ' должен быть объектом  типа ' . $class->getName() . "<br>";
    }
    if ($arg->isPassedByReference()) {
        $details .= "$$name" . ' передан по ссылке' . "<br>";
    }
    if ($arg->isDefaultValueAvailable()) {
        $details .= "$$name" . ' по умолчанию равно ' . $arg->getDefaultValue() . "<br>";
    }
    return $details;
}

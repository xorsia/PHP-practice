<?php
// Работа с XML
$path = __DIR__ . DIRECTORY_SEPARATOR . 'config.xml';
$a = @simplexml_load_file($path);
var_dump($a);
echo "<br>";

foreach ($a->command as $b) {
    echo $b['status'];
    echo "<br>";
}
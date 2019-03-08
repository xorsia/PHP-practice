<?php
// Работа с XML
$path = __DIR__ . DIRECTORY_SEPARATOR . 'config.xml';
$a = @simplexml_load_file($path);
//var_dump($a);

foreach ($a->command as $b) {
    echo $b->view;
    echo "<br>";
    echo $b->status['value'];
    echo "<br>";
    echo $b->status->forward;
    echo "<br><br>";


}
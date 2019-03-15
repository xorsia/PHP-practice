<?php
require_once 'setting.php';
require_once 'autoload.php';
$pdo = new PDO(DSN, USER, PASSWORD);
$mapper = new VenueMapper($pdo);

$ven = new Venue(null, 'marcipan');
$mapper->insert($ven);
$a = $mapper->find('2');
var_dump($a);


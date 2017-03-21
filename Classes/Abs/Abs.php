<?php
namespace Abs;
abstract class Abs {
    public $a = 'Абстрактный класс';
    public static $b = 1;
    public function lio() {
        echo "<br>" . self::$b++;
    }
    public function lio2() {
        echo "<br>" . static::$b++;
    }
}
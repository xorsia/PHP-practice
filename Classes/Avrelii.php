<?php
class Avrelii extends Mark {
    public function mr() {
        //$this->yii(); не сработает, так как метод yii - private;
        parent::hi();   // будет работать!
        echo 'текст дочернего класса' . "<br>";
    }
    public function __toString()
    {
        return 'Это класс Avrelii';
    }
    const HELLO = 'Константа класса Avrelii';
    public function ps() {
        return self::HELLO;
    }
    public static $xb = 1;
    public function wii() {
        echo self::$xb++;
    }
}
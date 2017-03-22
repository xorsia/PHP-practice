<?php
// Абстрактный клас пространства имен Abs;
namespace Abs;
abstract class Abs {
  public $a = 'Подключен абстрактный класс';
  public static $b = 1;
  // self - принадлежит родителю, а не дочернему;
  public function lio() {
    echo "<br>" . self::$b++;
  }
  // static - принадлежит дочернему, а не родителю;
  public function lio2() {
    echo "<br>" . static::$b++;
  }
  // ;
  final public function endsh() {
    echo "<br>" . 'Классы наследники не могут поменять эту ф-цию';
  }
}
<?php
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
class Fr extends Abs {
  public function pa () {
  echo $this->a;
    }
}
class De extends  Abs {
  public static $b = 1;
}
$a = new Fr();
$a->pa();
$a->lio();
$a->lio();
$b = new De();
$b->lio2();
$b->lio2();
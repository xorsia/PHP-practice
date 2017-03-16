<?php
abstract class Abs {
  public $a = 'Абстрактный класс';
  public $b = 1;
  public function lio() {
    echo "<br>" . $this->b++;
  }
}
class Fr extends Abs {
  public function pa () {
  echo $this->a;
    }
}
class De extends  Abs {

}
$a = new Fr();
$a->pa();
$a->lio();
$a->lio();
$b = new De();
$b->lio();
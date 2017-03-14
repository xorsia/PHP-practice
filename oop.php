<?php
  class Mark {
    public $a1 = 10;
    public function __construct($b = 3) {
      echo $this->a1;
      $this->a1 += 3;
      echo "<br>" . $this->a1;
    }
    public function hi() {
      // пустая функция;
    }
    public function __get($t) {
      return $this->$t = 6;
    }
  }
  $hq = new Mark();
  echo "<br>";
  // есть ли такое свойство в классе;
  var_dump(property_exists($hq, 'a1'));
  echo "<br>";
  // есть ли такой класс;
  var_dump(class_exists('Mark'));
  echo "<br>";
  // есть ли такой метод в классе;
  var_dump(method_exists('Mark', 'hi'));
  // Сэтеры и гетэры и их работа;
  echo "<br>" . 'Прочитаем несуществующее свойсво обьекта: ' . $hq->a22;
  echo "<br>";
  // Появилось ли в обьекте класса свойство, которого не было изначально;
  var_dump(property_exists($hq, 'a22'));
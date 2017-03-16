<?php
  class Mark {
    public $a1 = 10;
    public function __construct($b = 3) {
      echo $this->a1;
      $this->a1 += 3;
      echo "<br>" . $this->a1;
    }
    public function hi() {
      $this->yii();
    }
    public function __get($t) {
      return $this->$t = 'такое свойства не было, но оно создано';
    }
    public function __set($t1, $t2) {
      // свойство создано и ему установлено значение, которое было передано;
      return $this->$t1 = $t2;
    }
    private function yii() {
      echo 'текст родительского класса' . "<br>";
    }
  }
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
  echo "<br>" . 'Прочитаем несуществующее свойсво обьекта: ' . $hq->a22 . "<br>";
  // Появилось ли в обьекте класса свойство, которого не было изначально;
  var_dump(property_exists($hq, 'a22'));
  // Появилось ли в обьекте класса свойство, которого не было изначально;
  echo "<br>" . 'Установим значение несуществующего свойства обьекта класса: ' . $hq->a33 = 7 . "<br>";
  var_dump(property_exists($hq, 'a33'));
  $uq = new Avrelii();
  echo "<br>";
  $uq->mr();
  echo $uq;
  //$hq->hi();

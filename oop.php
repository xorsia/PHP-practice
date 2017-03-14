<?php
  class Mark {
    public $a1 = 10;
    public function __construct($b = 3) {
      echo $this->a1;
      $this->a1 += 3;
      echo "<br>" . $this->a1;
    }
    public function hi() {

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

<?php
class Mark {
  public $a1 = 10;
  public function __construct($b = 3) {
    echo "<br>" . $this->a1;
    $this->a1 += 3;
    echo "<br>" . $this->a1;
    // Выкину исключение;
    if(!isset($tr)) {
      throw new FileEr('Нет данных');
    }
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
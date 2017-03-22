<?php
// Наследует абстрактный класс;
class Fr extends Abs\Abs {
  public function pa () {
    echo $this->a;
  }
  // Нижестоящий код не может быть выполнен;
  //public function endsh() {
  //  echo 'Дочерняя ф-ция меняет метод';
  //}
}
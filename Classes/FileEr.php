<?php
// Дочерний класс - наследник Er (Extension);
class FileEr extends Er {
  public  function hand3(\Exception $e) {
    // Сначала будет использован метод hand3 класса Er;
    parent::hand3($e);
    // А уже потом измененный метод hand3 дочернего класса;
    echo "<br>" . 'Использован родительский метод + дочерний класса ' . get_class($this);
    //var_dump($e->getTrace());
    throw new Exception();
  }
  public function hand4() {
    return 1;
  }
}
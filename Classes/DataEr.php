<?php
// Дочерний класс - наследник Er (Extension);
class DataEr extends Er {
  public function hand3(\Exception $e) {
    echo 'Ошибкой занимается класс 2' . get_class($e);
  }
}
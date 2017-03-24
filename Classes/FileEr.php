<?php
// Дочерний класс - наследник Er (Extension);
class FileEr extends Er {
  public function hand3(\Exception $e) {
    echo 'Ошибкой занимается класс 1' . get_class($e);
  }
}
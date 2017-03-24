<?php
// Базовый класс работы с исключениями и ошибками;
class Er extends Exception{
  public function hand() {
    set_error_handler([$this, 'hand1']);
    register_shutdown_function([$this, 'hand2']);
    set_exception_handler([$this, 'hand3']);
  }
  public function hand1($errno, $errstr, $errfile, $errline) {
    echo "<br>" . 'Какая то нефатальная ошибка ';
  }
  public function hand2() {
    if($error = error_get_last()) {
      ob_get_clean();
      echo "<br>" . 'Фатальная ошибка ';
    }
  }
  public function hand3(\Exception $e) {
    //echo "<br>" . 'Поймано исключение класса ' . get_class($e) . ' Текст ошибки: ' . $e->getMessage();
  }
}
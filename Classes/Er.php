<?php
class Er {
  public function hand() {
    set_exception_handler([$this, 'hand3']);
  }
  public function hand3(\Exception $e) {
    echo "<br>" . $e->getMessage();
  }
}
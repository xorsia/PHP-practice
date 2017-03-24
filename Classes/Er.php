<?php
class Er {
  public function hand() {
    set_exception_handler([$this, 'hand3']);
  }
  private function hand3(\Exception $e) {

  }
}
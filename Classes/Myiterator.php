<?php
class Myiterator implements Iterator {
  private $obj;
  public function __construct($arr) {
    if(is_array($arr)) {
      $this->obj = $arr;
    }
  }
  public function current() {
    $b = current($this->obj);
    echo "<br>" . 'Текущий: ' . $b;
    return $b;
  }
  public function key() {
    $b = key($this->obj);
    echo "<br>" . 'Ключ текущего: ' . $b;
    return $b;
  }
  public function next() {
    $b = next($this->obj);
    echo "<br>" . 'Переход к следующему: ' . $b;
    return $b;
  }
  public function rewind() {
    $b = reset($this->obj);
    echo "<br>" . 'На начало: ' . $b;
    return $b;
  }
  public function valid() {
    $key = key($this->obj);
    $b = ($key !== NULL && $key !== FALSE);
    //echo "<br>" . "верный: $var\n";
    return $b;
  }
}
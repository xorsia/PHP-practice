<?php
// Трейт - переиспользуемый код;
trait Tr1 {
  public function Aa() {
    echo 'Метод трейта 1';
  }
}
trait Tr2 {
  public function Aa() {
    echo 'Метод трейта 2';
  }
}
// Класс в котором код будет использован;
class Traitor {
  // Подключение трейта;
  use Tr1, Tr2 {
    // При одинаковых методах: растановка приоритетов;
    Tr2::Aa insteadof Tr1;
  }
  public function __construct() {
    // Обращение к методу подключенного ранее трейта;
    $this->Aa();
  }
}
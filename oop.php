<?php
  class Mark {
    public $a1 = 10;
    public function __construct($b = 3) {
      echo $this->a1;
      $this->a1 += 3;
      echo "<br>" . $this->a1;
    }
  }
  $hq = new Mark();
  echo "<br>";
  var_dump(property_exists($hq, 'a2'));
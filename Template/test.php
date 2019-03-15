<?php
class Mapa {
    private $abrams;

    public function getAbrams () {
        return $this->abrams;
    }
}

$a = new Mapa();
var_dump($a->getAbrams());
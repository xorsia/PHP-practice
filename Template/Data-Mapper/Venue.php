<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.03.2019
 * Time: 0:10
 */
class Venue {
    private $id;
    private $name;
    function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }
    function setName($name){
        $this->name = $name;
    }
    function setId($id){
        $this->name = $id;
    }
    function getName(){
        return $this->name;
    }
    function getId(){
        return $this->name;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 15.03.2019
 * Time: 22:59
 */
abstract class Mapper {
    protected static $pdo;

    function __construct(\PDO $pdo) {
        self::$pdo = $pdo;
    }

    function find($id) {
        $this->selectStmt()->execute(array($id));
        $array = $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();
        if(! is_array($array) || ! isset($array['id'])) {
            return null;
        }
        $object = $this->createObject($array);
        return $object;
    }

    function createObject($array) {
        $obj = $this->doCreateObject($array);
        return $obj;
    }

    function insert(Venue $obj) {
        $this->doInsert($obj);
    }

    protected abstract function doCreateObject(array $array);
    protected abstract function selectStmt();
    protected abstract function doInsert(Venue $obj);
}
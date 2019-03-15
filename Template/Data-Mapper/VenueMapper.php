<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 15.03.2019
 * Time: 23:27
 */
class VenueMapper extends Mapper {
    protected $selectStmt;
    protected $insertStmt;
    function __construct(PDO $pdo) {
        parent::__construct($pdo);

        $q1 = "SELECT * FROM venue WHERE id=?";
        $this->selectStmt = self::$pdo->prepare($q1);

        $q2 = "INSERT into venue ( name ) values( ? )";
        $this->insertStmt = self::$pdo->prepare($q2);
    }
    function selectStmt() {
        return $this->selectStmt;
    }

    function doInsert(Venue $obj) {
        $values = array($obj->getName());
        $this->insertStmt->execute($values);
        $id = self::$pdo->lastInsertId();
        $obj->setId($id);
    }
    function doCreateObject(array $array) {
        $obj = new Venue($array['id']);
        $obj->setName($array['name']);
        return $obj;
    }
}
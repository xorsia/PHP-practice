<?php
$dsn = 'mysql:dbname=test2;host=localhost;charset=utf8';
$user = 'root';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password); // передача в конструктор;
}
catch(PDOException $e) {
  echo 'Ошибка подключения: '. $e->getMessage();
}

// экранирование, защита от ошибок;
$id = 1;
$id = $dbh->quote($id);
// теперь $id будет с кавычками;

/*
// Простой запрос;
$sql = 'SELECT * FROM tabl1';
$sth = $dbh->query($sql);
$m = [];
while($row = $sth->fetch()) {
  $m[] = $row;
}
var_dump($m[0]['Название товара']);

*/
// Запрос с последовательной подстановкой;
$sql = 'SELECT * FROM tabl1 WHERE Name=:t1 AND Price=:t2';
$sth = $dbh->prepare($sql);
$a = 'Монитор';
$b = 500;
//$sth->bindValue(1, $a, PDO::PARAM_STR);
$sth->bindValue(':t1', $a, PDO::PARAM_STR);
$sth->bindValue(':t2', $b, PDO::PARAM_INT);
$sth->execute();
while ($row = $sth->fetch(PDO::FETCH_NUM)) {
  var_dump($row);
}


/*
// Трансакции;
// Изменений в БД не будет, пока не будет завершена трансакция;
try {
  $dbh->beginTransaction();
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // выполнение запроса;
  // выполнение запроса;  
  $dbh->comit();  // трансакция выполнена успешно;  
}
catch(PDOException $e) {
  echo 'Ошибка' . $e->getMessage();
  $dbh->rollBack();  // откат трансакции;
}
*/